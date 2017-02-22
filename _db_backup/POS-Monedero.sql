DROP TABLE IF EXISTS fdp;
CREATE TABLE fdp(
	 fdpfdp int(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID del sistema'
	,fdpnom varchar(255) DEFAULT ''                          COMMENT 'Nombre'
);
INSERT INTO fdp (fdpfdp, fdpnom) VALUES 
 (1, 'Efectivo')
,(2, 'Tarjeta')
,(3, 'Otra forma de pago')
;

