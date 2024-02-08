CREATE TABLE ESTADO (
    id integer PRIMARY KEY NOT NULL,
    sigla char(2),
    nome text
);

CREATE TABLE CIDADE (
    id integer PRIMARY KEY NOT NULL,
    nome text,
    id_estado integer REFERENCES estado (id)
);

CREATE TABLE pessoa(
    id integer PRIMARY KEY NOT NULL,
    nome text,
    endereco text,
    bairro text,
    telefone text,
    email text,
    id_cidade integer REFERENCES cidade (id)
);

INSERT INTO estado VALUES(1, 'AC', 'Acre');
INSERT INTO cidade VALUES(1, 'Rio Branco', 1);
