
CREATE DATABASE foro_dardo;
USE foro_dardo;

CREATE TABLE usuarios(
    id            int(255) auto_increment NOT NULL,
    nombre        VARCHAR(100) NOT NULL,
    apellidos     VARCHAR(100) ,
    email         VARCHAR(100) NOT NULL,
    password      VARCHAR(100) NOT NULL,
    rol           VARCHAR(100) NOT NULL, 
    imagen        VARCHAR(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_unique UNIQUE(email)

)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL, 'dardo', 'bugnon', 'bugnonezequiel@admin.com', '12345', 'admin', null);

CREATE TABLE categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id) 
)ENGINE=InnoDb;


CREATE TABLE topic(
    id_topic         int(255) auto_increment NOT NULL,
    id_us_topic        int(255) NOT NULL,
    id_categoria       int(255) NOT NULL,
    nombre          VARCHAR(100) NOT NULL,
    CONSTRAINT pk_topic PRIMARY KEY(id_topic),
    CONSTRAINT fk_topic_usuario  FOREIGN KEY (id_us_topic) REFERENCES usuarios(id),
    CONSTRAINT fk_topic_categoria  FOREIGN KEY (id_categoria) REFERENCES categorias(id)
)ENGINE=InnoDb;



CREATE TABLE comentarios(
    id_comentarios      int(255) auto_increment NOT NULL,
    id_usuario          int(255) NOT NULL,
    contenido           text NOT NULL,
    id_topic_comment    int(255) not null
    CONSTRAINT pk_comentarios PRIMARY KEY(id_comentarios),
    CONSTRAINT fk_comentario_usuario  FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    CONSTRAINT fk_comentario_usuario  FOREIGN KEY (id_topic_comment) REFERENCES topic(id_topic),
)ENGINE=InnoDb;