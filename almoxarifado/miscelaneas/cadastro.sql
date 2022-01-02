create table(id_associado int primary key not null AUTOINCREMENT, nome varchar(100), sobrenome varchar (200), data_De_nascimento date, email varchar(60), telefone varchar(40),CONSTRAINT fk_interesses FOREIGN KEY ( id_interesse ) REFERENCES Interesses (id_interesse ) )

alter table cadastroAssociado add CONSTRAINT fk_OrigemAssociado FOREIGN KEY ( id_origem ) REFERENCES OrigemAssociado (id_origem) ; 
 