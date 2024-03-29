-- ESIM.dbo.CONVENIOBOLETOFORMAENVIOBOLETO definition

-- Drop table

-- DROP TABLE ESIM.dbo.CONVENIOBOLETOFORMAENVIOBOLETO GO

CREATE TABLE ESIM.dbo.CONVENIOBOLETOFORMAENVIOBOLETO (
	CONVENIOID smallint NOT NULL,
	FORMAENVIOBOLETOID smallint NOT NULL,
	CONSTRAINT PK_CONVENIOBOLETOFORMAENVIOBOLETO PRIMARY KEY (CONVENIOID,FORMAENVIOBOLETOID)
) GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBOLETOFORMAENVIOBOLETO_FORMAENVIOBOLETO ON dbo.CONVENIOBOLETOFORMAENVIOBOLETO (  FORMAENVIOBOLETOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOFEB_BOLETOBA ON dbo.CONVENIOBOLETOFORMAENVIOBOLETO (  CONVENIOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO;


-- ESIM.dbo.CONVENIOBOLETOFORMAENVIOBOLETO foreign keys

ALTER TABLE ESIM.dbo.CONVENIOBOLETOFORMAENVIOBOLETO ADD CONSTRAINT FK_CONVENIOBOLETOFORMAENVIOBOLETO_FORMAENVIOBOLETO FOREIGN KEY (FORMAENVIOBOLETOID) REFERENCES ESIM.dbo.FORMAENVIOBOLETO(FORMAENVIOBOLETOID) GO
ALTER TABLE ESIM.dbo.CONVENIOBOLETOFORMAENVIOBOLETO ADD CONSTRAINT FK_CONVENIOFEB_BOLETOBA FOREIGN KEY (CONVENIOID) REFERENCES ESIM.dbo.BOLETOBANCARIO(CONVENIOID) GO;