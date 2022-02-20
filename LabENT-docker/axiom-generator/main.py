import os
from flask import Flask, flash, request, redirect, render_template, send_file
from werkzeug.utils import secure_filename

import io
import csv

from src.generator import  AxiomGenerator

app=Flask(__name__)

app.secret_key = "daikiri-key"

path = os.getcwd()
## file Upload
UPLOAD_FOLDER = "uploads" 

if not os.path.isdir(UPLOAD_FOLDER):
    os.mkdir(UPLOAD_FOLDER)

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER #'../uploads/'

ALLOWED_EXTENSIONS = set(['csv', 'owl', 'xml', 'rdf'])

def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

@app.route('/')
def upload_form():
    return render_template('upload.html')

@app.route('/', methods=['POST'])
def upload_file():
    if request.method == 'POST':
        # check if the post request has the file part
        if 'files[]' not in request.files:
            flash('No file selected for uploading.')
            return redirect(request.url)

        files = request.files.getlist('files[]')

        file_paths=[]
        for file in files:
            if file and allowed_file(file.filename):
                filename = secure_filename(file.filename)
                file_path=os.path.join(app.config['UPLOAD_FOLDER'], filename)
                file.save(file_path)
                file_paths.append(file_path)

            file.close()
        
        reader_file1= csv.reader(open(file_paths[0],'r'))
        reader_file2= csv.reader(open(file_paths[1],'r'), delimiter = " ")

        next(reader_file1)
        next(reader_file2)

        AxiomGenerator(reader_file1, reader_file2)

        flash('File successfully uploaded and converted to OWL ontology')

        return redirect('/')
    else:
        flash('Error Allowed file types are csv, owl, xml, rdf')
        return redirect(request.url)

@app.route('/download', methods = ['GET', 'POST']) # this is a job for GET, not POST
def download_file():
    return send_file("../uploads/semantification-ontology.owl",
                    attachment_filename='semantification-ontology.owl',
                     as_attachment=True)


if __name__ == "__main__":
    app.run(host = '0.0.0.0',port = 7007, debug = True)