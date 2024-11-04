SELECT * FROM `cadastropedkids`.usuarios;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci