DROP DATABASE IF EXISTS store_online;
CREATE DATABASE IF NOT EXISTS store_online;
USE store_online;

CREATE TABLE users (
  userId INT UNSIGNED NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(100) NOT NULL,
  lastname VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  userPass VARCHAR(100) NOT NULL DEFAULT '123',
  userType ENUM('admin', 'customer') NOT NULL,
  isActive BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (userId)
);

CREATE TABLE item (
  itemId INT UNSIGNED NOT NULL AUTO_INCREMENT,
  itemName VARCHAR(100) NOT NULL,
  brand VARCHAR(100) NOT NULL, 
  model VARCHAR(100) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  price DECIMAL(15,2) NOT NULL DEFAULT 0,
  isActive BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (itemId)
);

CREATE TABLE shopping (
	shoppingId INT UNSIGNED NOT NULL AUTO_INCREMENT,
  userId INT UNSIGNED NOT NULL,
  itemId INT UNSIGNED NOT NULL,
  quantity INT NOT NULL,
  createdAt TIMESTAMP NOT NULL,
  PRIMARY KEY (shoppingId),
  FOREIGN KEY (userId)
    REFERENCES users (userId) ON DELETE CASCADE,
  FOREIGN KEY (itemId)
    REFERENCES item (itemId) ON DELETE CASCADE
);

INSERT INTO users 
VALUES ( 1, 'Daniel', 'DanieruZ', 'danieruzeta@gmail.com', 'admin', 'admin', true),
       ( 2, 'Susan', 'Simon', 'simon@gmail.com', '123', 'customer', true),
       ( 3, 'Karl', 'Edmon', 'edmon@gmail.com', '123', 'customer', true),
       ( 4, 'Jane', 'Mason', 'mason@gmail.com', '123', 'customer', true),
       ( 5, 'Luis', 'Powers', 'powers@gmail.com', '123', 'customer', true),
       ( 6, 'David', 'Evans', 'evans@gmail.com', '123', 'customer', true),
       ( 7, 'Kevin', 'Meyer', 'meyer@gmail.com', '123', 'customer', true),
       ( 8, 'Robin', 'Nixon', 'nixon@gmail.com', '123', 'customer', true),
       ( 9, 'Alex', 'Joyce', 'joyce@gmail.com', '123', 'customer', true),
       ( 10, 'Jen', 'Wiley', 'wiley@gmail.com', '123', 'customer', true);

INSERT INTO item
VALUES (1, 'Cafetera de vidrio', 'Liliana', '92173b', 3, 14223.47, true),
			 (2, 'Cargador inalambrico Negro', 'Dinax', 'dxcar3x1', 8, 15441.91, true),  
       (3, 'Mouse USB Negro', 'Netmak', 'nm-m630', 5, 4695.79, true),
       (4, 'Disco SSD', 'Dahua', 'v800', 4, 78555.62, true),  
       (5, 'Notebook Gris', 'Lenovo', '82qd00cjus', 2, 723974.65, true),  
       (6, 'Auricular Negro', 'JBL', 't770nc', 3, 127931.73, true), 
       (7, 'Impresora Gris', 'Global', 'g1000nw', 1, 292353.76, true), 
       (8, 'Monitor 19 LCD', 'LG', '19mva', 1, 101511.05, true), 
       (9, 'Teclado Negro', 'Solarmax', 'kb302w', 6, 12698.94, true),  
       (10, 'Microfono Negro', 'Razer', 'seiren', 2, 93042.52, true),
       (11, 'Microfono Blanco', 'Razer', 'seiren', 2, 93042.52, true),
       (12, 'Memoria RAM 8GB DDR4 3200MHz', 'Hiiksemi', 'hiker', 2, 29463.72, true),
       (13, 'Smartwatch Negro', 'Colmi', 'c8max', 2,  56520.75, true),
       (14, 'Memoria RAM 4GB DDR4 3200MHz', 'Hiiksemi', 'hiker', 2, 26701.50, true),
       (15, 'Fuente 650W', 'Gigabyte', 'gp-p650b', 2, 133086.69, true),
       (16, 'Auricular Azul', 'JBL', 't770nc', 2, 127931.73, true),
       (17, 'Tostadora Gris', 'Dinax', 'tostm900', 2, 30605.44, true),
       (18, 'Monitor 19 LED', 'LG', '19m38a-b', 4, 153251.34, true),
       (19, 'Teclado Rojo', 'Solarmax', 'kb302w', 6, 12698.94, true),
       (20, 'Mouse USB Rojo', 'Netmak', 'nm-m630', 3, 4695.79, true),
       (21, 'Cargador inalambrico Blanco', 'Dinax', 'dxcar3x1', 8, 15441.91, true),
       (22, 'Smartwatch Negro', 'Colmi', 'm42', 2,  82957.88, true),
			 (23, 'Monitor 23 LED', 'LG', '23m38a-b', 3, 258512.60, true), 
       (24, 'Tablet 10.1 Gris', 'Lenovo', 'm10 plus', 2, 243075.69, true), 
       (25, 'Placa de video', 'Asus', 'rtx 4060', 2,  774177.66, true),
       (26, 'Auricular Rosa', 'Netmak', 'nm-live-p', 2, 22839.96, true),
       (27, 'Fuente 600W', 'Solarmax', 'kc-cda-600', 2, 38453.99, true),
       (28, 'Teclado Negro Retroiluminado', 'Razer', 'Cynosa', 1, 12698.94, true),
       (29, 'Impresora Negra', 'Epson', 'l3150', 1, 369999.99, true), 
       (30, 'Mouse USB Blanco', 'Netmak', 'nm-m630', 5, 4695.79, true);
	
INSERT INTO shopping
VALUES (1, 5, 19, 1,  '2024-10-10 06:30:00'),
			 (2, 5, 20, 1,  '2024-10-10 06:30:00'),
       (3, 8, 24, 1,  '2024-10-10 15:06:00'),     
       (4, 8, 21, 1,  '2024-10-10 15:06:00'),
       (5, 8, 17, 1,  '2023-12-05 18:22:00'),     
       (6, 8, 1, 1,  '2023-12-05 18:22:00');
  