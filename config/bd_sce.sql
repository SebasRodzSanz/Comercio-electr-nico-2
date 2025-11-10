-- crear la base de datos
create schema if not exists ecommerce;

use ecommerce;

-- tabla usuario
create table if not exists Usuario(
    IdUsuario int primary key not null auto_increment,
    Nombre varchar(60) not null,
    Apellido_paterno varchar(80) not null,
    Apellido_materno varchar(80) null,
    Direccion varchar(150) not null default 'Dato faltante',
    Estado varchar(60) not null default 'Dato faltante',
    Municipio varchar(100) not null default 'Dato faltante',
    Codigo_postal int not null default 10000,
    Telefono varchar(15) not null default 'Dato faltante',
    Email varchar(150) not null,
    contrasenia varchar(255) not null
);
-- tabla roless
create table if not exists Rol(
    IdRol int primary key not null auto_increment,
    Nombre varchar(60) not null
);
-- tabla usuario-rol
create table if not exists Usuario_rol(
	IdUsuario int not null,
	IdRol int not null,
	constraint fk_usuario_r foreign  key (IdUsuario) references Usuario (IdUsuario),
	constraint fk_rol_r foreign key (IdRol) references Rol (IdRol)
);

-- tabla productos
create table if not exists Producto(
    IdProducto int not null auto_increment,
    Nombre varchar(90) not null,
    Descripcion text not null,
    Medidas varchar(190) not null,
    Precio float not null,
    Material  varchar(150) not null,
    Categoria varchar (60) not null,
    Imagen_url varchar (90) not null,
    primary key (IdProducto)
);
-- tabla pago
create table if not exists Pago (
    FolioPago int not null AUTO_INCREMENT,
    MetodoPago varchar(50) not null,
    EstadoPago varchar(50) not null,
    TotalPago float not null,
    primary key (FolioPago)
);

-- tabla venta
create table if not exists Venta(
    FolioVenta int not null AUTO_INCREMENT,
    IdProducto int not null,
    IdUsuario int not null,
    FolioPago int not null,
    Cantidad FLOAT not null,
    FechaVenta DATE not null,
    primary key (FolioVenta),
    constraint fk_idProducto_v foreign key (IdProducto) references Producto(IdProducto),
    constraint fk_idUsuario_v foreign key (IdUsuario) references Usuario(IdUsuario),
    constraint fk_folio_v foreign key (FolioPago) references Pago(FolioPago)
);

-- tabla de envio
create table if not exists Envio(
    IdEnvio int not null AUTO_INCREMENT,
    FolioVenta int not null,
    EstadoEnvio varchar(70) not null default 'En proceso',
    FechaEntrega DATE not null,
    Nota text,
    primary key (IdEnvio),
    constraint fk_folioVenta_env foreign key (FolioVente) references Venta(FolioVenta)
);

-- tabla almacen
create table if not exists Almacen(
    IdProducto int not null,
    Cantidad int not null,
    Estado varchar(50) null,
    constraint fk_idProducto_alm foreign key (IdProducto) references Producto(IdProducto)
);


ALTER TABLE Producto ADD Rating int;
-- las medidas son: 75cm x 75cm x 1cm, 90cm x 90cm x 2cm y 100cm x 100cm x 3cm.
-- las categorias son: Cyberpunk, Luminismo, Surrealismo, Cubismo, Clasicismo y Barroco
-- los materiales son: Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno. 
insert into producto (Nombre, Descripcion,Medidas,Precio,Material,Categoria,Imagen_url)
values ("Neón Metropolitano","Un viaje visual por la ciudad iluminada por luces de neón.","90cm x 90cm",2600, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.","Cyberpunk","Ciberpunk1.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Neón Metropolitano", "Un viaje visual por la ciudad iluminada por luces de neón.", "75cm x 75cm x 1cm", 2600, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk1.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Ecos del Futuro", "Fusión entre tecnología y humanidad en un entorno cibernético.", "90cm x 90cm x 2cm", 3100, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk2.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Sombras Digitales", "Una visión oscura del futuro urbano.", "100cm x 100cm x 3cm", 2900, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk3.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Ciudad Infinita", "Inspiración en la expansión sin fin de las urbes futuristas.", "75cm x 75cm x 1cm", 3400, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk4.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Ritmo Eléctrico", "Reflejo del movimiento urbano y la energía nocturna.", "90cm x 90cm x 2cm", 2700, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk5.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Luz Sintética", "Tonos eléctricos que representan la vida artificial.", "100cm x 100cm x 3cm", 3200, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk6.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Caos Programado", "La belleza del desorden dentro del control tecnológico.", "75cm x 75cm x 1cm", 3800, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk7.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Metrópolis Azul", "Un horizonte urbano envuelto en brillos cobalto.", "90cm x 90cm x 2cm", 3300, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk8.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Reflejo Digital", "Reflexión moderna del alma digital.", "100cm x 100cm x 3cm", 3100, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk9.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Noche Cibernética", "La calma dentro del ruido tecnológico.", "75cm x 75cm x 1cm", 3500, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cyberpunk", "Ciberpunk10.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Renacimiento Dorado", "Inspiración en la luz y armonía del arte clásico.", "90cm x 90cm x 2cm", 5600, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico1.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Cielos Eternos", "Representación de la divinidad en la pintura tradicional.", "100cm x 100cm x 3cm", 5900, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico2.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("El Jardín de los Dioses", "Escena mitológica con detalles barrocos.", "75cm x 75cm x 1cm", 6200, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Barroco", "Clasico3.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Majestad Antigua", "El poder y la gloria de una época perdida.", "90cm x 90cm x 2cm", 5800, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico4.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Virtud y Belleza", "Equilibrio entre humanidad y divinidad.", "100cm x 100cm x 3cm", 5400, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico5.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("El Banquete de los Héroes", "Recreación de una escena épica.", "75cm x 75cm x 1cm", 6000, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico6.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Sombras del Imperio", "Representación dramática del poder clásico.", "90cm x 90cm x 2cm", 5700, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico7.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Aurora del Arte", "El amanecer del arte como expresión eterna.", "100cm x 100cm x 3cm", 6100, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico8.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Melodía de Mármol", "La suavidad de la piedra convertida en emoción.", "75cm x 75cm x 1cm", 5500, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico9.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Revelación", "Una mirada espiritual desde el arte antiguo.", "90cm x 90cm x 2cm", 6300, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "Clasico10.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Fragmentos del Pensamiento", "Formas geométricas que revelan el alma humana.", "100cm x 100cm x 3cm", 2700, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo1.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Composición Urbana", "Líneas que se cruzan en un caos armonioso.", "75cm x 75cm x 1cm", 3000, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo2.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Rostros de Cristal", "El reflejo del ser descompuesto en figuras.", "90cm x 90cm x 2cm", 3300, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo3.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Dimensión Fragmentada", "Exploración del tiempo y la forma.", "100cm x 100cm x 3cm", 3200, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo4.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Equilibrio Abstracto", "Simetría imposible dentro del desorden.", "75cm x 75cm x 1cm", 3100, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo5.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Visión Interna", "El ojo que mira más allá de lo visible.", "90cm x 90cm x 2cm", 2800, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo6.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Ecos Geométricos", "Movimiento en planos y perspectivas.", "100cm x 100cm x 3cm", 3500, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo7.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Ruptura y Síntesis", "Una colisión entre el color y la estructura.", "75cm x 75cm x 1cm", 3600, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo8.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Códigos del Arte", "Composición visual que reta la lógica.", "90cm x 90cm x 2cm", 3400, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo9.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Punto y Línea", "La simplicidad de lo esencial.", "100cm x 100cm x 3cm", 3000, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "cubismo10.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Atardecer Dorado", "La luz del sol en su máxima expresión pictórica.", "75cm x 75cm x 1cm", 2400, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Luminismo", "Luminismo1.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Bruma de Invierno", "Tonos suaves y atmósfera melancólica.", "90cm x 90cm x 2cm", 2300, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Luminismo", "Luminismo2.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Resplandor del Alba", "Juego de luces entre la noche y el amanecer.", "100cm x 100cm x 3cm", 2500, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Luminismo", "Luminismo3.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Luz del Horizonte", "La naturaleza bañada en destellos cálidos.", "75cm x 75cm x 1cm", 2600, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Luminismo", "Luminismo4.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Claridad Serena", "Paz y pureza en la luz de un nuevo día.", "90cm x 90cm x 2cm", 2700, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Luminismo", "Luminismo5.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Sueño y Realidad", "Exploración del subconsciente en colores vivos.", "100cm x 100cm x 3cm", 3900, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo1.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Puerta al Infinito", "Una conexión entre mundos imposibles.", "75cm x 75cm x 1cm", 4100, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo2.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Silencio de los Relojes", "El tiempo detenido en la mente del artista.", "90cm x 90cm x 2cm", 4200, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo3.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("El Ojo del Caos", "Una mirada a la locura del pensamiento.", "100cm x 100cm x 3cm", 4000, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo4.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Universo Interior", "El alma representada en metáforas visuales.", "75cm x 75cm x 1cm", 4300, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo5.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Geometría del Sueño", "El equilibrio entre lo real y lo ilusorio.", "90cm x 90cm x 2cm", 4400, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo6.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Ecos del Desierto", "Paisaje onírico que refleja soledad y grandeza.", "100cm x 100cm x 3cm", 4500, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo7.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Sombras Transparentes", "La luz y la oscuridad en diálogo eterno.", "75cm x 75cm x 1cm", 4700, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo8.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Memoria Líquida", "El pasado y el presente fundidos en un instante.", "90cm x 90cm x 2cm", 4600, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo9.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Dimensión Oculta", "La puerta hacia lo desconocido.", "100cm x 100cm x 3cm", 4800, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "Surrealismo10.png");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Forma y Silencio", "Exploración contemporánea del espacio vacío.", "75cm x 75cm x 1cm", 3100, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "producto1.jpg");

insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Trama de Colores", "Ritmo visual entre textura y movimiento.", "90cm x 90cm x 2cm", 2900, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Cubismo", "producto 2.jpg");
insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Mirada Intangible", "Retrato introspectivo con enfoque minimalista.", "100cm x 100cm x 3cm", 3300, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Surrealismo", "producto3.jpg");
insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Movimiento Perfecto", "La fuerza y precisión del instante deportivo.", "75cm x 75cm x 1cm", 2800, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "mesi1.jpg");
insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Inspiración en el Juego", "Captura del talento en movimiento.", "90cm x 90cm x 2cm", 2700, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "mesi2.jpg");
insert into producto (Nombre, Descripcion, Medidas, Precio, Material, Categoria, Imagen_url)
values ("Pasión y Gloria", "La energía del deporte convertida en arte.", "100cm x 100cm x 3cm", 2900, "Tinta resistente al desgaste, Poliuretano, Madera y Poliestireno.", "Clasicismo", "mesi3.jpg");

update producto set Rating = 4 
where IdProducto BETWEEN 1 and 10;
update producto set Rating = 5 
where IdProducto BETWEEN 11 and 19;
update producto set Rating = 3 
where IdProducto BETWEEN 20 and 30;
update producto set Rating = 4 
where IdProducto BETWEEN 31 and 40;
update producto set Rating = 3 
where IdProducto BETWEEN 41 and 48;
update producto set Rating = 5
where IdProducto BETWEEN 49 and 51;

INSERT INTO usuario (Nombre,Apellido_paterno,Apellido_materno,Email,contrasenia) 
VALUES ('Sebastian','Rodriguez','Valencia','sebas.practicas.fesc@gmail.com','sebas123'),
('Bernardo','Miguel','Madrid','bernard.mimad@gmail.com','berna123');

INSERT INTO `usuario_rol`(`IdUsuario`, `IdRol`) VALUES (1,2),(2,2);

SELECT us.IdUsuario, us.Nombre, us.Apellido_paterno, us.Apellido_materno, rll.Nombre AS 'rol'
FROM usuario us
INNER JOIN usuario_rol usr ON us.IdUsuario = usr.IdUsuario
INNER JOIN rol rll ON usr.IdRol = rll.IdRol;

-- Sentencias de venta
insert into pago(MetodoPago,EstadoPago,TotalPago) values ('Paypal', 'Completado',3300);
insert into Venta (IdProducto,IdUsuario,FolioPago,Cantidad,FechaVenta) values (2,1,1,'2025-11-09');
insert into Envio (FolioVenta,FechaEntrega,Nota) values (1,'2025-11-22','Hola, deja el paquete en la puerta de la entrada');
SELECT ve.FolioVenta, ve.FechaVenta, pro.Nombre, pro.Precio, ve.Cantidad, pa.MetodoPago,pa.EstadoPago, pa.TotalPago, en.FechaEntrega, en.Nota  
FROM Usuario us
INNER JOIN Venta ve ON us.IdUsuario = venta.IdUsuario
INNER JOIN Pago pa ON ve.FolioPago = pa.FolioPago
INNER JOIN Envio en ve.FolioVenta = en.FolioVenta
INNER JOIN Producto pro ON ve.IdProducto = pro.IdProducto
WHERE us.IdUsuario = 1;