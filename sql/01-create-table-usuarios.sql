create table `usuarios` (
	`id` int PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(250) not null,
    `email` varchar(250) not null,
    `password` varchar(250) not null
);