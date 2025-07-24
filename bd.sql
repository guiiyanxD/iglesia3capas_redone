#create database proyectoiglesiaBD;
use iglesia3capas_redone;
create table cargo(
    id int not null AUTO_INCREMENT,
    nombre varchar(100) not null,
    descripcion varchar(255) not null,
    PRIMARY KEY(id)
);

create table usuario(
    id int not null AUTO_INCREMENT,
    idCargo int,
    nombres varchar(100) not null,
    apellidos varchar(100),
    email varchar(100) not null,
    pwd varchar(100) not null,
    primary key(id),
    FOREIGN KEY(idCargo) references cargo(id) ON DELETE SET NULL ON UPDATE CASCADE 
);

create table tipoEvento(
    id int not null AUTO_INCREMENT,
    nombre varchar(100) not null,
    frecuencia varchar(255) not null,
    descripcion varchar(255) not null,
    PRIMARY KEY(id)
);

create table ministerio(
    id int not null AUTO_INCREMENT,
    nombre varchar(100) not null,
    mision text not null,
    vision text not null,
    fechaCreacion date not null,
    activo boolean DEFAULT 1,
    idLider int null,
    PRIMARY KEY(id),
    foreign key (idLider) references usuario(id) ON DELETE SET NULL
);

create table miembro(
    idUsuario int not null,
    idMinisterio int not null,
    fechaIncorpporacion date not null,
    idRol varchar(100),
    PRIMARY KEY (idUsuario, idMinisterio),
    FOREIGN KEY (idMinisterio) REFERENCES ministerio(id) ON DELETE CASCADE,
    FOREIGN KEY (idUsuario) REFERENCES usuario(id) ON DELETE CASCADE
);

create table evento(
    id int not null AUTO_INCREMENT,
    nombre varchar(50),
    fecha_incio date,
    fecha_final date,
    ubicacion varchar(100),
    descripcion varchar(100),
    estado enum('programado', 'realizado', 'cancelado'),
    id_tipo_evento int not null,
    id_ministerio int not null,
    primary key(id),
    foreign key (id_tipo_evento) references tipoEvento(id) on delete restrict,
    foreign key (id_ministerio) references ministerio(id) on delete restrict
);
