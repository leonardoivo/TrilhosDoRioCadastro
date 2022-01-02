-- ESIM.dbo.CONVENIOBOLETOFORMAGERACAOMOVT definition

-- Drop table

-- DROP TABLE ESIM.dbo.CONVENIOBOLETOFORMAGERACAOMOVT GO

CREATE TABLE ESIM.dbo.CONVENIOBOLETOFORMAGERACAOMOVT (
	CONVENIOID smallint NOT NULL,
	FORMAGERACAOMOVTOBOLETOID smallint NOT NULL,
	CONSTRAINT PK_CONVENIOBOLETOFORMAGERACAOM PRIMARY KEY (CONVENIOID,FORMAGERACAOMOVTOBOLETOID)
) GO
 CREATE NONCLUSTERED INDEX IN_FK_CONVENIOBOLETOFORMAGERA2 ON dbo.CONVENIOBOLETOFORMAGERACAOMOVT (  FORMAGERACAOMOVTOBOLETOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOFGMB_BOLETOBA ON dbo.CONVENIOBOLETOFORMAGERACAOMOVT (  CONVENIOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO;


-- ESIM.dbo.CONVENIOBOLETOFORMAGERACAOMOVT foreign keys

ALTER TABLE ESIM.dbo.CONVENIOBOLETOFORMAGERACAOMOVT ADD CONSTRAINT FK_CONVENIOFGMB_BOLETOBA FOREIGN KEY (CONVENIOID) REFERENCES ESIM.dbo.BOLETOBANCARIO(CONVENIOID) GO;