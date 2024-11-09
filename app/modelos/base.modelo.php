<?php
require_once 'config.php';

class ModeloBase {
    protected $bd;

    public function __construct() {
        $this->bd = new PDO(
            "mysql:host=".MYSQL_HOST . ";dbname=".MYSQL_DB.";charset=utf8",  MYSQL_USER, MYSQL_PASS);
        $this->_desplegar();
    }

    private function _desplegar() {
        $consulta = $this->bd->query('SHOW TABLES');
        $tablas = $consulta->fetchAll();
    
        if (count($tablas) == 0) {
            $sql = <<<SQL
                CREATE TABLE `autor` (
                    `id_autor` int(11) NOT NULL,
                    `nombre_apellido` varchar(45) NOT NULL,
                    `nacionalidad` varchar(45) NOT NULL,
                    `biografia` text NOT NULL,
                    `imagen_url` varchar(2083) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
                INSERT INTO `autor` (`id_autor`, `nombre_apellido`, `nacionalidad`, `biografia`, `imagen_url`) VALUES
                (1, 'Guillermo Martínez', 'Argentina', 'Guillermo Martínez (1962-) es un destacado escritor...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXkSgjkrOaShpFgxEmqkiJukJ4ruGufbAV2g&s'),
                (2, 'Julio Verne', 'Francés', 'Julio Verne (1828-1905) fue un célebre novelista francés...', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQT5Gc93ToeK-TggVoXJ6ts6Bvolqx_vldIrRmh4cqdn11eUahgSoQXEYl9DlWPKIP8iTUg2mfEKlPe2pDj05xYSnJY9-HvWtqNi4vbljQ'),
                (3, 'Alfonsina Storni', 'Argentina', 'Alfonsina Storni (1892-1938) fue una influyente poeta...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjozmwm8D_X-rQ_OxYQBymvPac10FVBdGjmw&s'),
    
    
                CREATE TABLE `libro` (
                    `id_libro` int(11) NOT NULL,
                    `titulo` varchar(45) NOT NULL,
                    `genero` varchar(45) NOT NULL,
                    `editorial` varchar(45) NOT NULL,
                    `anio_publicacion` int(4) NOT NULL,
                    `sinopsis` text NOT NULL,
                    `id_autor` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
                INSERT INTO `libro` (`id_libro`, `titulo`, `genero`, `editorial`, `anio_publicacion`, `sinopsis`, `id_autor`) VALUES
                (1, 'Crímenes Imperceptibles', 'Suspenso y novela policíaca', 'Grupo Editorial Planeta', 2003, 'Pocos días después de haber llegado a Oxford...', 1),
                (2, 'La muerte lenta de Luciana B', 'Suspenso', 'Grupo Editorial Planeta', 2007, 'Tras las trágicas muertes...', 1),
                (3, 'La Última vez', 'Ficción Moderna Y Contemporánea.', 'Grupo Editorial Planeta', 2022, 'Barcelona, años 90. Un notorio escritor...', 1),
                (4, 'La isla misteriosa', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1974, 'En ella se aprecia la admiración...', 2),
                (5, 'Veinte mil leguas de viaje submarino', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1869, 'Veinte mil leguas de viaje submarino es una obra narrada...', 2),
                (6, 'La vuelta al mundo en ochenta días', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1872, 'Phileas Fogg es un adinerado caballero inglés...', 2),
                (7, 'La inquietud del Rosal', 'Poesía', 'Losada', 1916, '', 3),
                (8, 'Mundo de siete pozos', 'Poesía', 'Losada', 1934, '', 3),
                (9, 'Mariposa', 'Poesía', 'Losada', 1927, '', 3),
    
                CREATE TABLE `usuario` (
                    `id_usuario` int(11) NOT NULL,
                    `usuario` varchar(45) NOT NULL,
                    `contrasenia` char(60) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
                INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasenia`) VALUES
                (1, 'webadmin', '\$2y\$10\$QRX1i88TJtip1Fhpu/s1i.cY2ck8yT4pvlLknZYU2oQUKNsGkQZHK');
    

                ALTER TABLE `autor` ADD PRIMARY KEY (`id_autor`);
                ALTER TABLE `libro` ADD PRIMARY KEY (`id_libro`), ADD KEY `id_autor` (`id_autor`);
                ALTER TABLE `usuario` ADD PRIMARY KEY (`id_usuario`), ADD UNIQUE KEY `usuario` (`usuario`);
    

                ALTER TABLE `autor` MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
                ALTER TABLE `libro` MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
                ALTER TABLE `usuario` MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
    

                ALTER TABLE `libro` ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);
            SQL;
    
            // Ejecutar la consulta SQL
            $this->bd->query($sql);
        }
    }
}
    