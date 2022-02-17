FROM alpine:3.7

ADD . /axiom-generator
WORKDIR /axiom-generator

RUN apk add --no-cache --virtual .build-deps g++ python3-dev libffi-dev openssl-dev && \
    apk add --no-cache --update python3

RUN apk add musl-dev
RUN apk --no-cache add lapack libstdc++ && apk --no-cache add --virtual .builddeps gcc gfortran musl-dev lapack-dev && pip3 install scipy && apk del .builddeps && rm -rf /root/.cache
RUN pip3 install Cython

RUN apk add --no-cache git

RUN apk update && apk add g++ gcc libxml2 libxslt-dev
RUN python3 -m pip install --upgrade pip

RUN pip3 install --upgrade pip setuptools wheel

RUN apk add zlib-dev jpeg-dev gcc musl-dev

COPY requirements.txt /axiom-generator/requirements.txt 
RUN pip3 install -r requirements.txt
RUN pip3 install numpy pandas

RUN pip3 install rdflib
RUN apk add libc6-compat

RUN git clone https://github.com/dice-group/vectograph.git
WORKDIR "/axiom-generator/vectograph"
RUN pip3 install -e .

WORKDIR "../"

EXPOSE 7007
COPY . .

CMD [ "python3", "./axiom-generator/flaskAPP-AxiomGenerator.py" ]
