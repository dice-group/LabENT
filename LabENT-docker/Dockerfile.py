FROM alpine:3.7

ADD . /axiom-generator
WORKDIR /axiom-generator

RUN apk add --no-cache --update python3

RUN python3 -m pip install --upgrade pip

COPY requirements.txt /axiom-generator/requirements.txt 
RUN pip3 install -r requirements.txt

RUN pip3 install owlready2

EXPOSE 7007
COPY . .

CMD [ "python3", "./axiom-generator/main.py" ]
