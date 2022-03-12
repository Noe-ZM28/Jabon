CREATE TABLE IF NOT EXISTS productos(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(1024) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(1024) NOT NULL,
    precio DECIMAL(9,2)
);
CREATE TABLE IF NOT EXISTS carrito_usuarios(
    id_sesion VARCHAR(255) NOT NULL,
    id_producto BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES productos(id)
    ON UPDATE CASCADE ON DELETE CASCADE
);
xt529aIFR0ua>v=(

INSERT INTO `productos` (`imagen`, `nombre`, `descripcion`, `precio`) VALUES
('../Multimedia/Imagenes/jablav4.jpg', 'Jabón de lavanda', 'El jabón de lavanda es un jabón muy respetuoso con la piel. La lavanda es conocida por sus extraordinarias propiedades que hacen que este jabón sea apto para todo tipo de pieles, incluidas las pieles con problemas. El aroma a lavanda de este jabón natural ayudará a relajarte mientras lo usas.', 45.00),
('../Multimedia/Imagenes/jabaven1.jpg', 'Jabón de avena', 'Jabón en barra echo a base de ingredientes 100% naturales, el proceso de obtención de nuestro jabón es a base de una saponificación en frio por lo tanto sus propiedades nunca se pierden durante el proceso de elaboración a cambio de un proceso de saponificación en caliente.', 39.00),
('../Multimedia/Imagenes/jabsav7.jpg', 'Jabón de Sábila', 'La sábila contiene minerales muy valiosos, entre los cuales posee calcio, hierro, magnesio y zinc, entre otros. Además, es rica en vitaminas A, C, E y también del grupo B. ', 33.00),
('../Multimedia/Imagenes/jabros8.jpg', 'Jabón de café y miel ', 'El jabón de café y miel de abeja es un exfoliante natural intenso que ayuda a la hora de eliminar toxinas y grasas consiguiendo una piel más tersa. \r\nSu uso es recomendado generalmente por la mañana para animarnos a despertar la piel, la mente y el cuerpo con la energía necesaria para nuestro día.', 52.00),
('../Multimedia/Imagenes/javlech10.jpg', 'Jabón de coco', 'El jabón a base de coco, tanto si lleva coco natural rallado y aceite de coco como si solo tiene uno de los dos ingredientes, está lleno de propiedades que ofrecen grandes beneficios a nuestra piel. Entre ellos, destacamos las siguientes propiedades y beneficios del jabón de coco.', 40.00);
