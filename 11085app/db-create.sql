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