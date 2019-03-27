CREATE DATABASE epiz_23652834_crud1;

use epiz_23652834_crud1;

CREATE TABLE crudtable (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	item VARCHAR(100),
	amount VARCHAR(50),
	purchasedate VARCHAR(30),
    category VARCHAR(30),
	date TIMESTAMP
);

CREATE DATABASE epiz_23652834_registration;

use epiz_23652834_registration;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
