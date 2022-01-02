-- ESIM.dbo.TIPOCOBRANCA3 definition

-- Drop table

-- DROP TABLE ESIM.dbo.TIPOCOBRANCA3 GO

CREATE TABLE ESIM.dbo.TIPOCOBRANCA3 (
	TIPOCOBRANCAID smallint NOT NULL,
	SIGLA varchar(20) COLLATE Latin1_General_CI_AI NULL,
	DESCRICAO varchar(100) COLLATE Latin1_General_CI_AI NULL,
	ORDEMAPRESENTACAO smallint NULL,
	EXCLUIDO smallint NULL,
	CONSTRAINT PK_TIPOCOBRANCA3 PRIMARY KEY (TIPOCOBRANCAID)
) GO;