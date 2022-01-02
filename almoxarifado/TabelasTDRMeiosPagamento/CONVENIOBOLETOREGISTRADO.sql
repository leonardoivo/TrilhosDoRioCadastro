-- ESIM.dbo.CONVENIOBOLETOREGISTRADO definition

-- Drop table

-- DROP TABLE ESIM.dbo.CONVENIOBOLETOREGISTRADO GO

CREATE TABLE ESIM.dbo.CONVENIOBOLETOREGISTRADO (
	CONVENIOID smallint NOT NULL,
	TIPOQTDEDIASID smallint NULL,
	TIPOQTDEDIASREGISTROBANCOPRATI smallint NULL,
	TIPOQTDEDIASREGISTROBANCOCONTR smallint NULL,
	QTDEDIASREGISTROBANCOCONTRATO smallint NOT NULL,
	QTDEDIASTREGISTROBANCOPRATICA smallint NOT NULL,
	TEMCOMANDOCANCELAMENTO smallint NULL,
	QTDEDIASCOMANDOCANCELAMENTO smallint NULL,
	ARQUIVOCRITICA smallint NULL,
	TEMRATEIO numeric(1,0) DEFAULT 1 NOT NULL,
	IDENTIFICADORRATEIO varchar(1) COLLATE Latin1_General_CI_AI DEFAULT 'R' NOT NULL,
	PROXIMOVENCIMENTO date DEFAULT '2009-01-01' NOT NULL,
	DATAREFERENCIAPROXIMOVENCIMENTO date DEFAULT '2009-01-01' NOT NULL,
	CONSTRAINT PK_CONVENIOBOLETOREGISTRADO PRIMARY KEY (CONVENIOID)
) GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBR_TIPOQTDE1 ON dbo.CONVENIOBOLETOREGISTRADO (  TIPOQTDEDIASID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBR_TIPOQTDE2 ON dbo.CONVENIOBOLETOREGISTRADO (  TIPOQTDEDIASREGISTROBANCOCONTR ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBR_TIPOQTDE3 ON dbo.CONVENIOBOLETOREGISTRADO (  TIPOQTDEDIASREGISTROBANCOPRATI ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO;


-- ESIM.dbo.CONVENIOBOLETOREGISTRADO foreign keys

ALTER TABLE ESIM.dbo.CONVENIOBOLETOREGISTRADO ADD CONSTRAINT FK_CONVENIOBR_BOLETOBA FOREIGN KEY (CONVENIOID) REFERENCES ESIM.dbo.BOLETOBANCARIO(CONVENIOID) GO
ALTER TABLE ESIM.dbo.CONVENIOBOLETOREGISTRADO ADD CONSTRAINT FK_CONVENIOBR_TIPOQTDE1 FOREIGN KEY (TIPOQTDEDIASID) REFERENCES ESIM.dbo.TIPOQTDEDIAS(TIPOQTDEDIASID) GO
ALTER TABLE ESIM.dbo.CONVENIOBOLETOREGISTRADO ADD CONSTRAINT FK_CONVENIOBR_TIPOQTDE2 FOREIGN KEY (TIPOQTDEDIASREGISTROBANCOCONTR) REFERENCES ESIM.dbo.TIPOQTDEDIAS(TIPOQTDEDIASID) GO
ALTER TABLE ESIM.dbo.CONVENIOBOLETOREGISTRADO ADD CONSTRAINT FK_CONVENIOBR_TIPOQTDE3 FOREIGN KEY (TIPOQTDEDIASREGISTROBANCOPRATI) REFERENCES ESIM.dbo.TIPOQTDEDIAS(TIPOQTDEDIASID) GO;