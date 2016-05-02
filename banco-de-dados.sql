CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE usuario(
   uuid UUID PRIMARY KEY DEFAULT gen_random_uuid(),
   email varchar(256) NOT NULL,
   senha varchar(256) NOT NULL
);

insert into usuario("email", "senha") values ('ulbra@interacao.total', '123');

select * from usuario;
