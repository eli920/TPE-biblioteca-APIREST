-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2024 a las 01:40:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe-biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre_apellido` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) NOT NULL,
  `biografia` text NOT NULL,
  `imagen_url` varchar(2083) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre_apellido`, `nacionalidad`, `biografia`, `imagen_url`) VALUES
(1, 'Guillermo Martínez', 'Argentina', 'Guillermo Martínez (1962-) es un destacado escritor y matemático argentino, conocido por sus novelas y ensayos que combinan elementos de la matemática y el misterio. Nació en Bahía Blanca y estudió matemáticas en la Universidad Nacional del Sur. Su novela más conocida, \"Los crímenes de Oxford\" (2003), explora el vínculo entre el crimen y las matemáticas, y ha sido adaptada al cine. Martínez ha recibido varios premios literarios por su trabajo y es reconocido por su habilidad para entrelazar la precisión matemática con la narrativa literaria.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXkSgjkrOaShpFgxEmqkiJukJ4ruGufbAV2g&s'),
(2, 'Julio Verne', 'Francés', 'Julio Verne (1828-1905) fue un célebre novelista francés, pionero en el género de la ciencia ficción. Nacido en Nantes, Verne es conocido por sus imaginativas novelas de aventuras y exploraciones, como \"Veinte mil leguas de viaje submarino\" y \"La vuelta al mundo en ochenta días\". Su obra, que combina la ciencia y la tecnología con tramas emocionantes, ha influido profundamente en la literatura de aventuras y la ciencia ficción, estableciendo a Verne como uno de los grandes visionarios de su época.\r\n\r\n\r\n\r\n', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQT5Gc93ToeK-TggVoXJ6ts6Bvolqx_vldIrRmh4cqdn11eUahgSoQXEYl9DlWPKIP8iTUg2mfEKlPe2pDj05xYSnJY9-HvWtqNi4vbljQ'),
(3, 'Alfonsina Storni', 'Argentina', 'Alfonsina Storni (1892-1938) fue una influyente poeta y escritora argentina, nacida en Sala Capriasca, Suiza. Se mudó a Argentina en su infancia y se convirtió en una figura central de la literatura latinoamericana. Reconocida por su aguda crítica social y su enfoque en temas feministas, Storni dejó un legado duradero con su poesía, ensayos y obras de teatro, marcando un importante precedente para las escritoras de su tiempo.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjozmwm8D_X-rQ_OxYQBymvPac10FVBdGjmw&s')
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `editorial` varchar(45) NOT NULL,
  `anio_publicacion` int(4) NOT NULL,
  `sinopsis` text NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `genero`, `editorial`, `anio_publicacion`, `sinopsis`, `id_autor`) VALUES
(1, 'Crímenes Imperceptibles', 'Suspenso y novela policíaca', 'Grupo Editorial Planeta', 2003, 'Pocos días después de haber llegado a Oxford, un joven estudiante argentino encuentra el cadáver de una anciana que ha sido asfixiada con un almohadón. El asesinato resulta ser un desafío intelectual lanzado a uno de los lógicos más eminentes del siglo, Arthur Seldom, y el primero de una serie de crímenes.', 1),
(2, 'La muerte lenta de Luciana B', 'Suspenso', 'Grupo Editorial Planeta', 2007, 'Tras las trágicas muertes primero de su novio y después, uno a uno, de sus seres más queridos, Luciana vive aterrorizada, vigilando cada sombra, cada persona que se cruza a su lado, con la sospecha de que esas muertes no pueden ser casuales, sino parte de una venganza metódica urdida contra ella, un círculo a su alrededor que sólo se cerrará con el número siete.', 1),
(3, 'La Última vez', 'Ficción Moderna Y Contemporánea.', 'Grupo Editorial Planeta', 2022, 'Barcelona, años 90. Un notorio escritor argentino, recluido por una enfermedad degenerativa, escribe su última novela y teme no llegar a verla publicada.', 1),
(4, 'La isla misteriosa', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1974, 'En ella se aprecia la admiración de su autor por la ciencia aplicada, tan presente en toda su obra, sintetizándola a través de uno de sus personajes que encierra en sí mismo el conocimiento y la capacidad de adaptación al medio del hombre: el ingeniero Cyrus Smith (Cyrus Harding en la versión de Agnes Kinloch). Dicho personaje, dotado con un amplio conocimiento general, articula la historia y la hace verosímil. El libro forma parte de una trilogía que además componen Veinte mil leguas de viaje submarino y Los hijos del capitán Grant. Tal como el propio Verne aclaraba a su editor, esta sería «una novela que tratase sobre química»: partiendo prácticamente de cero, los protagonistas consiguen fabricar incluso ácido sulfúrico, uno de los productos químicos más avanzados de la época.', 2),
(5, 'Veinte mil leguas de viaje submarino ', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1869, 'Veinte mil leguas de viaje submarino es una obra narrada en primera persona por el profesor francés Pierre Aronnax, notable biólogo que es hecho prisionero por el Capitán Nemo y es conducido por los océanos a bordo del submarino Nautilus, en compañía de su criado Conseil o (también llamado depende de la edición) Consejo y el arponero canadiense Ned Land.', 2),
(6, 'La vuelta al mundo en ochenta días', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1872, '\r\nPortada de una edición francesa editada en 1873.\r\nPhileas Fogg es un adinerado caballero inglés que lleva una tranquila y solitaria vida en Londres. A pesar de su fortuna, Fogg vive modestamente y lleva a cabo sus hábitos y costumbres con una precisión matemática. Se sabe muy poco de su vida social aparte de que es miembro del Reform Club, donde pasa la mayor parte del día. Tras despedir a su sirviente por traerle el agua para afeitarse a una temperatura ligeramente más baja de lo ordenado, Fogg contrata al joven francés Jean Passepartout como sustituto.', 2),
(7, 'La inquietud del Rosal', 'Poesía', 'Losada', 1916, '', 3),
(8, 'Mundo de siete pozos', 'Poesía', 'Losada', 1934, '', 3),
(9, 'Mariposa', 'Poesía', 'Losada', 1927, '', 3),

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasenia` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasenia`) VALUES
(1, 'webadmin', '$2y$10$QRX1i88TJtip1Fhpu/s1i.cY2ck8yT4pvlLknZYU2oQUKNsGkQZHK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
