create schema if not exists gesuas;
use gesuas;

create table if not exists cidadao (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(120) NOT NULL,
	nis VARCHAR(11) NOT NULL,
    UNIQUE KEY(nis)
) ENGINE=INNODB;