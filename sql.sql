DROP TABLE IF EXISTS `users`;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS `formulario`;
CREATE TABLE `formulario` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL
);