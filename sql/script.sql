create table dependencia(
  dep_id integer not null,
  dep_nombre varchar(100) not null,
  primary key(dep_id)
);

insert into dependencia values 
  ('1','Contabilidad');
insert into dependencia values 
  ('2','Ventas');
insert into dependencia values 
  ('3','Mercadeo');
insert into dependencia values 
  ('4','Logistica');

create table persona(
  per_id varchar(20) not null,
  per_nombre varchar(100) not null,
  per_apellido varchar(100) not null,
  per_fecha_nacimiento date not null,
  per_salario float not null,
  per_dependencia_id integer not null,
  primary key(per_id),
  FOREIGN KEY (per_dependencia_id) REFERENCES dependencia(dep_id)
);


insert into persona values 
  ('1010','María José','Mejia Acero','1999-03-16',200000,1);
insert into persona values 
  ('1011','José María','Mejia Acero','1995-05-18',300000,2);
insert into persona values 
  ('1012','Carlos','Acero','2000-09-28',250000,3);
insert into persona values 
  ('1013','Martha','Perez','1980-09-28',360000,4);