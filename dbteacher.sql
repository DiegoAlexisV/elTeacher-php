

CREATE TABLE USUARIO ( idu int AUTO_INCREMENT, 
						nick varchar(50),
						sexo varchar(3),
						PRIMARY KEY(idu)
			           );
CREATE TABLE CUENTA (idcuenta int AUTO_INCREMENT,
					 idu int,
					 nombrec varchar(50),
					 passwor varchar(100),
					 tipo int,
					 PRIMARY KEY(idcuenta),
					 FOREIGN KEY(idu) REFERENCES USUARIO(idu)
					 );
CREATE TABLE DOCENTE ( iddoc int AUTO_INCREMENT,
						idu int,
						grado varchar(10),
						nombre varchar(20),
						apellido varchar(30),
						PRIMARY KEY(iddoc),
						FOREIGN KEY(idu) REFERENCES USUARIO(idu)
					 );

CREATE TABLE MATERIA(   sigla varchar(10),
						iddoc int,
						idu int,
						nombremat varchar(150),
						PRIMARY KEY(sigla),
						FOREIGN KEY(iddoc) REFERENCES DOCENTE(iddoc),
						FOREIGN KEY(idu) REFERENCES USUARIO(idu)
						);
CREATE TABLE DESCRIPCION(iddesc int AUTO_INCREMENT,
						descri TEXT,
						PRIMARY KEY(iddesc)
						);
--entidad debil (sin clave primaria)
CREATE TABLE MATERIAL(	idm int AUTO_INCREMENT,
						idu int,
						sigla varchar(10),
						iddesc int,
						archivo LONGBLOB,
						extencion varchar(10),
						PRIMARY KEY(idm),
						FOREIGN KEY(idu) REFERENCES USUARIO(idu),
						FOREIGN KEY(iddesc) REFERENCES DESCRIPCION(iddesc),
						FOREIGN KEY(sigla) REFERENCES MATERIA(sigla)
						);
CREATE TABLE LIBRO (	idm int,
						titulo TEXT,
						autor TEXT,
						PRIMARY KEY(idm)
					);
CREATE TABLE APUNTE(	idm int,
						PRIMARY KEY(idm)
						);
CREATE TABLE VIDEO (	idm int,
						PRIMARY KEY(idm)
						);
