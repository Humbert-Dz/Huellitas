create database huellitas;

use huellitas;


create table razas(
    id int auto_increment not null,
    nombre varchar(30) not null unique,
    created_at datetime not null,
    updated_at datetime null,
    primary key (id)
);

create table dietas(
    id int auto_increment not null,
    nombre varchar(50) not null,
    descripcion varchar(255) not null,
    created_at datetime not null,
    updated_at datetime null,
    primary key (id)
);

create table ingredientes(
    id int auto_increment not null,
    nombre varchar(120) not null,
    created_at datetime not null,
    updated_at datetime null,
    primary key (id)
);

create table dietas_ingredientes(
    id int auto_increment not null,
    id_dieta int not null,
    id_ingrediente int not null,
    porcion float not null,
    primary key (id,id_dieta, id_ingrediente),
    foreign key (id_dieta) references dietas(id),
    foreign key (id_ingrediente) references ingredientes(id)
);

create table adoptador(
    id int auto_increment not null,
    nombre varchar(50) not null,
    apellido_paterno varchar(120) not null,
    apellido_materno varchar(120) not null,
    sexo char(1) not null,
    estado varchar(50) not null,
    municipio varchar(50) not null,
    localidad varchar(50) not null,
    calle varchar(50) not null,
    numero_casa int not null,
    telefono varchar(20) not null,
    correo varchar(20) not null unique,
    primary key (id)
);

create table especies(
    id int auto_increment not null,
    nombre varchar(120) not null,
    created_at datetime not null,
    updated_at datetime null,
    primary key (id)
);

create table mascotas(
    id int auto_increment not null ,
    nombre varchar(50) not null unique,
    fecha_nacimiento date  not null,
    especie int not null,
    raza int not null,
    dieta int not null,
    primary key (id, especie, raza, dieta),
    foreign key (especie) references especies(id),
    foreign key (raza) references razas(id),
    foreign key (dieta) references dietas(id)
);


create table mascotas_adoptadores(
    id int auto_increment not null,
    id_mascota int not null,
    id_adoptador int not null,
    fecha_adopcion datetime not null,
    primary key (id, id_mascota, id_adoptador),
    foreign key (id_mascota) references mascotas(id),
    foreign key (id_adoptador) references adoptador(id)
);
