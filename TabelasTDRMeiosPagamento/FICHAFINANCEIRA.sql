-- ESIM.dbo.FICHAFINANCEIRA definition

-- Drop table

-- DROP TABLE ESIM.dbo.FICHAFINANCEIRA GO

CREATE TABLE ESIM.dbo.FICHAFINANCEIRA (
	FICHAFINANCEIRAID bigint NOT NULL,
	TIPOORIGEMFICHAFINANCEIRAID smallint NULL,
	ITEMCERTIFICADOAPOLICEID bigint NOT NULL,
	SEQUENCIAL smallint NOT NULL,
	COMPETENCIAINICIAL date NOT NULL,
	COMPETENCIAFINAL date NOT NULL,
	VALORCONTRIBUICAOPREVISTA numeric(14,2) NOT NULL,
	VALORBENEFICIO numeric(14,2) NOT NULL,
	VALORCAPITALSEGURADO numeric(14,2) NOT NULL,
	TAXACONTRIBUICAOBENEFICIO numeric(30,10) NULL,
	VALORCONTRIBUICAOMOEDACORRENTE numeric(30,15) NULL,
	VALORBENEFICIOMOEDACORRENTE numeric(30,15) NULL,
	VALORCAPITALSEGURADOMOEDACORRENTE numeric(30,15) NULL,
	PERCENTUALREAJUSTE numeric(9,6) NULL,
	VALORIOF numeric(14,2) NOT NULL,
	PERCENTUALATUALIZACAOMONETARIA numeric(9,6) NULL,
	PERCENTUALREENQUADRAMENTO numeric(9,6) NULL,
	COMPETENCIAULTIMOREAJUSTE date NULL,
	VALORREPACTUACAO numeric(18,2) NULL,
	VALORCARREGAMENTO numeric(18,2) DEFAULT 0 NULL,
	PERCENTUALDECRESCIMOAPLICADO numeric(15,10) NULL,
	VALORBENEFICIODECRESCIMOORIGINALATUALIZADO numeric(15,2) NULL,
	VALORCAPITALSEGURADODECRESCIMOORIGINALATUALIZADO numeric(15,2) NULL,
	DATAHORAINCLUSAOFICHAFINANCEIRA datetime DEFAULT getdate() NULL,
	DATAHORAULTIMAALTERACAOFICHAFINANCEIRA datetime NULL,
	CONSTRAINT AK_AK_FICHAFINANCEIRA_FICHAFINANCEIRA UNIQUE (ITEMCERTIFICADOAPOLICEID,SEQUENCIAL),
	CONSTRAINT PK_FICHAFINANCEIRA PRIMARY KEY (FICHAFINANCEIRAID)
) GO
CREATE UNIQUE INDEX AK_AK_FICHAFINANCEIRA_FICHAFINANCEIRA ON ESIM.dbo.FICHAFINANCEIRA (ITEMCERTIFICADOAPOLICEID,SEQUENCIAL) GO
 CREATE NONCLUSTERED INDEX FICHAFINANCEIRA_COMPETENCIAINICIAL_ITEMCERTIFICADOAPOLICEID ON dbo.FICHAFINANCEIRA (  COMPETENCIAINICIAL ASC  , ITEMCERTIFICADOAPOLICEID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX FICHAFINANCEIRA_FICHAFINANCEIRAID_COMPETENCIAINICIAL ON dbo.FICHAFINANCEIRA (  FICHAFINANCEIRAID ASC  , COMPETENCIAINICIAL ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX FICHAFINANCEIRA_INDEX_00002 ON dbo.FICHAFINANCEIRA (  ITEMCERTIFICADOAPOLICEID ASC  , FICHAFINANCEIRAID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX FICHAFINANCEIRA_ITEMCERTIFICADOAPOLICEID_COMPETENCIAFINAL ON dbo.FICHAFINANCEIRA (  ITEMCERTIFICADOAPOLICEID ASC  , COMPETENCIAFINAL ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX FICHAFINANCEIRA_TIPOORIGEMFICHAFINANCEIRAID_ITEMCERTIFICADOAPOLICEID_COMPETENCIAINICIAL ON dbo.FICHAFINANCEIRA (  TIPOORIGEMFICHAFINANCEIRAID ASC  , ITEMCERTIFICADOAPOLICEID ASC  , COMPETENCIAINICIAL ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_FICHAFINANCEIRA_ITEMCERTIFICADOAPOLICE ON dbo.FICHAFINANCEIRA (  ITEMCERTIFICADOAPOLICEID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_FICHAFINANCEIRA_TIPOORIGEMFICHAFINANCEIRA ON dbo.FICHAFINANCEIRA (  TIPOORIGEMFICHAFINANCEIRAID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO;


-- ESIM.dbo.FICHAFINANCEIRA foreign keys

ALTER TABLE ESIM.dbo.FICHAFINANCEIRA ADD CONSTRAINT FK_FICHAFINANCEIRA_ITEMCERTIFICADOAPOLICE FOREIGN KEY (ITEMCERTIFICADOAPOLICEID) REFERENCES ESIM.dbo.ITEMCERTIFICADOAPOLICE(ITEMCERTIFICADOAPOLICEID) GO
ALTER TABLE ESIM.dbo.FICHAFINANCEIRA ADD CONSTRAINT FK_FICHAFINANCEIRA_TIPOORIGEMFICHAFINANCEIRA FOREIGN KEY (TIPOORIGEMFICHAFINANCEIRAID) REFERENCES ESIM.dbo.TIPOORIGEMFICHAFINANCEIRA(TIPOORIGEMFICHAFINANCEIRAID) GO;