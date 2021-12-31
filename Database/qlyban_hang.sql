USE qlyban_hang;

DROP TABLE IF EXISTS `catalogs`;

CREATE TABLE `catalogs` (
  `catalog_id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  PRIMARY KEY (`catalog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
 
 DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `transaction_id` int(225) NOT NULL AUTO_INCREMENT,
  `user_id` int(225) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `process` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`transaction_id`),
  KEY `FK_transaction` (`user_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(225) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(225) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(225) NOT NULL,
  `image_link` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `soluong` int(225) NOT NULL,
  PRIMARY KEY (`product_id`,`name`),
  KEY `FK_product` (`catalog_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`catalog_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(225) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(225) NOT NULL,
  `product_id` int(225) NOT NULL,
  `soluong` int(225) NOT NULL DEFAULT '1',
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `order_product` (`product_id`),
  KEY `order_trans` (`transaction_id`),
  CONSTRAINT `order_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trans_order` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `loai_chude`;

CREATE TABLE `loai_chude` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `chude` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `detail_report`;

CREATE TABLE `detail_report` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `detail` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `id_chude` int(225) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `title_report` (`id_chude`),
  CONSTRAINT `title_report` FOREIGN KEY (`id_chude`) REFERENCES `loai_chude` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `detail_product`;

CREATE TABLE `detail_product` (
  `detail_id` int(225) NOT NULL AUTO_INCREMENT,
  `product_id` int(225) NOT NULL,
  `kichthuoc` varchar(50) DEFAULT NULL,
  `trongluong` varchar(20) DEFAULT NULL,
  `manhinh` varchar(100) DEFAULT NULL COMMENT 'Độ phân giải',
  `cpu` varchar(2000) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `ocung` varchar(100) DEFAULT NULL,
  `dohoa` varchar(2000) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL,
  `cong` varchar(1000) DEFAULT NULL COMMENT 'HDMI,USB,WIFI,LAN,....',
  `webcam` varchar(10) DEFAULT NULL,
  `loa` varchar(10) DEFAULT 'có',
  `diaquang` varchar(20) DEFAULT NULL,
  `HDH` varchar(100) DEFAULT NULL,
  `baohanh` varchar(2000) DEFAULT 'Bảo hành 1 năm chính hãng.',
  PRIMARY KEY (`detail_id`),
  UNIQUE KEY `detail_id` (`detail_id`),
  KEY `detail_product` (`product_id`),
  CONSTRAINT `detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

insert  into `catalogs`(`catalog_id`,`name`) values (1,'DELL'),(2,'ASUS'),(3,'HP'),(4,'ACER');

insert  into `users`(`user_id`,`name`,`username`,`date_of_birth`,`gender`,`phone`,`address`,`password`,`level`) values (1,'Admin','admin','1998-04-02','male',' ',' ','12345',1),(2,'123','1','0000-00-00','1','1','1','1',0),(3,'abc','11','0000-00-00','male','123','123','11',0),(4,'123','123','0000-00-00','female','123','123','123',0),(5,'22','22','2018-07-19','male','22','22','1',0),(6,'Mai Đức Tin','tin27','2018-07-09','male','0905553087','đâsdasdasda','1' ,0) ;

insert  into `transactions`(`transaction_id`,`user_id`,`amount`,`process`) values (51,6,9000000,1),(52,3,86500000,1),(54,2,93200000,1),(56,3,5990000,0);

insert  into `product`(`product_id`,`catalog_id`,`name`,`price`,`image_link`,`image_name`,`soluong`) values 
(1,1,' Dell Vostro 3491 (70225483) ',15000000,'images/dell/dell01.jpg','dell01.jpg',35),
(2,1,'Dell Vostro 3405 ',9890000,'images/dell/dell02.jpg','dell02.jpg',34),
(3,1,'Dell Latitude 3420 (L3420I5SSD)  ',20000000,'images/dell/dell03.jpg','dell03.jpg',28),
(4,1,'Dell Inspiron 5502 (P102F002) ',23300000,'images/dell/dell04.jpg','dell04.jpg',24),
(5,1,'Dell Latitude 3400 (YX51W1) ',16000000,'images/dell/dell05.jpg','dell05.jpg',40),
(6,2,'Asus ExpertBook P2451FA',20500000,'images/asus/asus01.jpg','asus01.jpg',19),
(7,2,'Asus Gaming ROG Strix G713QM ',43000000,'images/asus/asus02.jpg','asus02.jpg',20),
(8,2,'Asus E210KA-GJ008T ',7500000,'images/asus/asus03.jpg','asus03.jpg',41),
(9,2,'Asus X415MA-BV088T ',89000000,'images/asus/asus04.jpg','asus04.jpg',40),
(10,2,'Asus A456UA-WX034T ',12000000,'images/asus/asus05.jpg','asus05.jpg',50),
(11,3,'HP Envy 13-ba1030TU ',27900000,'images/hp/hp01.jpg','hp01.jpg',28),
(12,3,'HP 245 G8 (345R8PA)',14000000,'images/hp/hp02.jpg','hp02.jpg',30),
(13,3,'HP Gaming Pavilion 15-dk159TX ',28000000,'images/hp/hp03.jpg','hp03.jpg',25),
(14,3,'HP 15s-du1055TU (1W7P3PA)',7890000,'images/hp/hp04.jpg','hp04.jpg',45),
(15,3,'HP Spectre Convertible 13-aw21TU ',48790000,'images/hp/hp05.jpg','hp05.jpg',20),
(16,4,'Acer Gaming Aspire 7 A715 ',19990000,'images/acer/acer01.jpg','acer01.jpg',49),
(17,4,'Acer Aspire 3 A315-56-37DV ',12000000,'images/acer/acer02.jpg','acer02.jpg',30),
(18,4,'Acer Swift 3 SF314-59-5178 ',18000000,'images/acer/acer03.jpg','acer03.jpg',35),
(19,4,'Acer Aspire 3 A315-23-R1XZ ',10500000,'images/acer/acer04.jpg','acer04.jpg',24),
(20,4,'Acer Aspire A514-54-39KU ',12900000,'images/acer/acer05.jpg','acer05.jpg',19);

insert  into `orders`(`order_id`,`transaction_id`,`product_id`,`soluong`,`status`) values (80,51,1,2,1),(81,52,4,5,1),(83,54,1,2,1),(84,54,2,3,1),(85,54,3,4,1),(86,56,16,1,1);

insert  into `loai_chude`(`id`,`chude`) values (1,'Tư vấn'),(2,'Khiếu nại - Phản ánh'),(3,'Hợp tác với WEBSITE'),(4,'Góp ý cải tiến');

insert  into `detail_report`(`id`,`title`,`name`,`detail`,`email`,`phone`,`id_chude`,`status`) values (1,'Cần cải thiện thêm','Doãn Văn Nam','--can cai thien them--','namdoanct@gmail.com','0963920340',4,1);

INSERT INTO `detail_product` (`detail_id`, `product_id`, `kichthuoc`, `trongluong`, `manhinh`, `cpu`, `ram`, `ocung`, `dohoa`, `pin`, `cong`, `webcam`, `loa`, `diaquang`, `HDH`, `baohanh`) VALUES
(1, 1, '35 x 32.5 x 2.4 cm', '1.77 Kg', '14 inch', 'Intel Core i5 1135G7 (2.4Ghz/8MB cache)', '4GB DDR4 3200Mhz', '256GB PCIe NVMe SSD', 'Intel HD Graphics 620', '42Wh', '2 USB 3.2 Type-A, 1 USB 2.0; 1 Ethernet RJ-45, 1 HDMI 1.4, 1 USB 3.2 Gen 2 Type-C™ (Optional)', 'Có', 'Có', 'Không', 'Win 10 Home SL 64', '12 tháng'),
(2, 2, '34.5 x 24.3 x 2.14 cm', '1.59Kg', '14-inch HD, 1366 x 768 Anti-Glare', 'AMD Ryzen 3 3250U (2.6Ghz/4MB cache)', '4GB DDR4 2400Mhz', '1TB 5400rpm SATA (có khe cắm M2 SSD)', 'AMD® Radeon™ Graphics', '3 cell 42Wh', '2 USB 3.2 Gen1 Type-A ports, 1 USB 2.0 port, 1 Universal Audio Jack, 1 HDMI 1.4 port, 1 DC-in port', 'có', 'có', 'không', 'Win 10 Home SL 64', 'Bảo hành 1 năm chính hãng.'),
(3, 3, '34.5 x 24.3 x 2.14 cm', '1.52Kg', '14 inch HD (1366 x 768) AG Non-Touch, 220nits', 'Intel Core™ i5 1135G7 (2.4GHz, 8MB Cache)\r\n', '8GB DDR4 3200Mhz ', '256GB SSD M2 PCIe NVMe (có khe cắm HDD 2.5”)', ' Intel® Iris® Xe Graphics', '3 cell 41Wh', 'Audio jack , 1 x USB 2.0 1 x  USB 3.2 Gen 1 Type-A port 1 x RJ-45 ; 1 x lock slot, 1 x HDMI 1.4 , 1 x USB 3.2 Gen 1 Type-A port PowerShare, 1 x USB 3.2 Gen2x2 Type-C™ port', 'có', 'có', 'không', 'Fedora', 'Bảo hành 1 năm chính hãng.'),
(4, 4, '38 x 26 x 2.365 cm', '1.7Kg', '15.6 inch FHD, 1920x1080 Anti-Glare Non Touch', 'Intel Core i7 1165G7 (2.8Ghz/12MB cache)', '8GB DDR4 3200Mhz', '512GB PCIe NVMe SSD', 'Nvidia Geforce MX330 2G DDR5', '4 cell 53Wh', '2 x USB 3.2 Gen 1 ports, 1 x USB 3.2 Gen 2 Type-C port with DisplayPort and PowerDelivery, 1 x headset (headphone and microphone combo), 1 x HDMI 1.4', 'có ', 'có', 'không', 'Win 10 Home SL 64\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(5, 5, '34.5 x 24.3 x 2.14 cm', '1.67Kg', '14 inch HD (1366x768) Anti-Glare', 'Intel Core™ i5 8265U (1.6Ghz, 4MB Cache)\r\n\r\n', '8GB DDR4 2400Mhz ', '1TB 5400rpm\r\n\r\n', 'Intel UHD 620\r\n\r\n', '3 cell (42Whr)', '(1) VGA; (1) HDMI; (1) USB Type–C 3.1 Gen 1; (2) USB 3.1 Gen 1; (1) USB 2.0 port; (1) Universal audio jack; (1) RJ-45;\r\n\r\n', 'có', 'có', 'có', 'Ubuntu', 'Bảo hành 1 năm chính hãng.'),
(6, 6, '32.53 x 23.29 x 1.99 cm', '1.50 kg', '14 inch', 'Intel® Core™ i7 10510U Processor 1.8 GHz (6M Cache, up to 4.9 GHz, 4 cores)\r\n\r\n', '8GB DDR4 SO-DIMM', '512GB SSD\r\n\r\n', 'Share\r\n\r\n', '48WHrs, 3S1P, 3-cell Li-ion', '1x HDMI 1.4\r\n\r\n1x VGA Port (D-Sub)\r\n\r\n1x 3.5mm Combo Audio Jack\r\n\r\n1x RJ45 LAN Jack for LAN insert(10/100/1000)\r\n\r\n1x DC-in//1x USB 2.0 Type-A\r\n\r\n1x USB 3.2 Gen 2 Type-C support display / power delivery\r\n\r\n2x USB 3.2 Gen 1 Type-A//Micro SD card reader', 'có', 'có', 'không', 'Free DOS', 'Bảo hành 1 năm chính hãng.'),
(7, 7, '39.5 x 28.2 x 2.34 ~ 2.83 cm ', '2.73 kg', '17.3” inch WQHD (2560 x 1440) IPS-level, 165Hz, 3ms, Anti-Glare', 'AMD Ryzen 9 5900HX Processor (8 x 3.30 GHz), Max Boost Clock up to 4.60 GHz\r\n\r\n', '16GB DDR4/ 3200MH', '512GB SSD1 PCIe (M.2 2280)\r\n\r\n', 'NVIDIA GeForce RTX 3060 Laptop GPU (6GB of GDDR6 SDRAM, Bus Width : 192-bit) ; AMD Radeon Graphics\r\n\r\n', '4 Cell Int (90Wh)', '1 x USB 3.1 Gen 2 Type-C (support DisplayPort, Power Delivery) ; 3 x USB 3.1 Gen 1 Type-A ; 1 x HDMI ; 1 x RJ45 ; 1 x Headphone/Microphone combo audio jack ; 1 x SSD2 PCIe (M.2 2280)\r\n\r\n', 'có', 'có ', 'có', 'Windows 10 Home Single Language 64-bit\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(8, 8, ' 27.90 x 19.10 x1.69  cm', '1.05 kg', '11.6 inch', 'Intel® Celeron® N4500 Processor 1.1 GHz (4M Cache, up to 2.8 GHz, 2 cores)\r\n\r\n', '4GB DDR4 on board', '128G iSSD\r\n\r\n', 'Intel® UHD Graphics 600\r\n\r\n', 'ø4.0, 33W AC Adapter, 38WHrs, 2S1P, 2-cell Li-ion', '1x HDMI 1.4//1x 3.5mm Combo Audio Jack//Micro SD card reader\"\r\n\r\n1x USB 2.0 Type-A//1x USB 3.2 Gen 1 Type-A//1x USB 3.2 Gen 1 Type-C', 'có ', 'có', 'có', 'Windows 10 bản quyền\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(9, 9, '32.54 x 21.60 x 1.99 cm', '1.404 kg', '14.0\" inch HD', 'Intel Pentium Silver N5030 Processor (4 x 1.10 GHz)\r\n\r\n', '4GB DDR4/ 3200MHz', '256GB SSD PCIe (M.2 2280)\r\n\r\n', 'Intel HD Graphics 620', '	 2 Cell Int (37Wh)', '2 x USB 2.0 Type-A ; 1 x USB 3.1 Gen 1 Type-A ; 1 x USB 3.1 Gen 1 Type-C ; 1 x HDMI ; 1 x Headphone/Microphone combo audio jack ; 1 x SATA3 (no cable)\r\n\r\n', 'có', 'có', 'không', 'Windows 10 Home Single Language 64-bit\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(10, 10, '38.3 x 25.5 x 3 cm', '2.5 Kg', '15.6 inch Anti-Glare LED backlit FHD', 'Intel Core i5 7300HQ, 2.80 GHz, 6 MB Cache - 3.80 GHz\r\n', '8 GB DDR4 2400MHz ', 'HDD 1 TB\r\n', 'NVIDIA Geforce GTX 1050 4GB GDDR5 +Intel HD Graphics 630\r\n', '4 cell', '2 x USB 3.0; 1 x USB 2.0; 1 x USB 3.1 Type C; 1 x RJ45; 1 x HDMI\r\n', 'có', 'có ', 'có', 'Windows 10', 'Bảo hành 1 năm chính hãng.'),
(11, 11, '30.65 x 19.46 x 1.69 cm', '1.231 kg', '13.3\" inch diagonal FHD', '11th Gen Intel Core i7-1165G7 Processor (4 x 2.80 GHz), Max Turbo Frequency : 4.70 GHz\r\n\r\n', '8GB onboard DDR4', '512GB SSD PCIe (M.2 2280)\r\n\r\n', 'Intel Iris Xe Graphics\r\n\r\n', '3 Cell Int (51Wh)', '1 x Thunderbolt 3 (USB Power Delivery, DisplayPort 1.4, HP Sleep and Charge) ; 2 x USB 3.1 Gen 1 Type-A (one port with HP Sleep and Charge) ; 1 x Headphone/microphone combo audio jack\r\n\r\n', 'có', 'có ', 'có', 'Windows 10 Home Single Language 64-bit + OFFICE\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(12, 12, '32.4 x 22.59 x 1.99 cm', '1.47 kg', '14.0 Inch Full HD\r\n\r\n', 'Ryzen 5 3500U (2.1 GHz base clock, up to 3.7 GHz max boost clock, 4 MB L3 cache, 4 cores)\r\n\r\n', '4 GB DDR4-2400 ', '256GB SSD\r\n\r\n', 'AMD Radion Graphic\r\n\r\n', '3-cell, 41 Wh Li-ion', '	\r\n\r\n2 Super Speed USB Type-A 5Gbps signaling rate; 1 SuperSpeed USB Type-C® 5Gbps signaling rate; 1 RJ-45; 1\r\nheadphone/microphone combo; 1 HDMI1.4b; 1 AC power', 'có', 'có ', 'không', 'Windows 10 Home\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(13, 13, '37.8 x 25.21 x 2.25 cm', '2.23 kg', '15.6 inch FHD\r\n\r\n', '	\r\nIntel® Core™ i7-10750H (2.6 GHz base frequency, up to 5 GHz with Intel® Turbo Boost Technology, 12 MB L3 cache, 6 cores)', '8 GB DDR4-2933 SDR', '512 GB PCIe® NVMe™ M.2 SSD+32GB SSD\r\n\r\n', 'NVIDIA® GeForce® GTX 1650 Ti (4 GB GDDR6 dedicated)\r\n\r\n', '3-cell, 52.5 Wh Li-ion', 'Integrated 10/100/1000 GbE LAN\r\n\r\n', 'có', 'có ', 'không', 'Windows 10 Home Single Language 64\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(14, 14, '35,85 x 24,2 x 1,99 cm', '1,74 kg', '15.6 inch', 'Pentium 6504U\r\n\r\n', '4 GB DDR4(1 x 4 GB)', '256Gb SSD\r\n\r\n', 'Intel® UHD Graphics\r\n\r\n', '3 Cell', '1 USB 3.1 Type-C™ Thế hệ 1 (Chỉ để truyền dữ liệu, Tốc độ truyền dữ liệu lên tới 5 Gb/s); 2 USB 3.1 Type-A Thế hệ 1 (Chỉ để truyền dữ liệu); 1 RJ-45; 1 bộ chuyển đổi điện xoay chiều thông minh; 1 HDMI 1.4b; 1 bộ tai nghe/micrô\r\n\r\n', 'có', 'có', 'có', 'Windows 10 Home\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(15, 15, '30.6 x 19.45 x 1.69 cm', '1,27 kg', '13.3 inch UHD (3840 x2160 Pixel), cảm ứng', 'Intel® Core™ i7-1165G7\r\n\r\n', '16 GB DDR4', '1TB SSD+32GB SSD\r\n\r\n', 'Tích hợp\r\n\r\n', '4-cell', '2 USB 3.1 Gen 2 Type-C™ with Thunderbolt™ 3 (40 Gb/s signaling rate, Power Delivery 3.0, DisplayPort™ 1.4, HP Sleep and Charge); 1 USB 3.1 Gen 1 Type-A (HP Sleep and Charge); 1 headphone/microphone combo\r\n\r\n', 'có', 'có', 'có', 'Windows 10 Home Single Language 64\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(16, 16, '36.34 x 25.45 x 2.325 cm', '2.1kg', '15.6 inch FHD', 'AMD Ryzen™ 7 3750H\r\n\r\n', '8GB DDR4', '512GB PCIe NVMe SSD (nâng cấp được tối đa 1TB SSD)\r\n\r\n', 'NVIDIA® GeForce® GTX 1650Ti 4G-GDDR6\r\n\r\n', '48Wh, Li-ion', '2 x USB 3.2, 1 x USB Type C, 1 x USB 2.0, 1 x HDMI, 1 x Ethernet\r\n\r\n', 'có', 'có', 'có', 'Win 10\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(17, 17, ' 27.90 x 19.10 x1.69  cm', ' 1.7 kg ', '15.6 inch Full HD', 'Intel® Core™ i3-1005G1 (1.2Ghz, 4MB cache)\r\n', '4GB DDR4 (Onboard)', ' 256GB SSD PCIe NVMe\r\n', ' Intel UHD\r\n\r\n', ' 2-cell (36.7Wh)', ' 1 x USB 3.1, 2 x USB 2.0, 1 x HDMI, 1 x Ethernet, 1 x 3.5 mm headphone/speaker jack, 1 x DC Jack\r\n\r\n', 'có', 'có', 'không', 'Win 10\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(18, 18, '32.34 x 21.89 x 1.595 cm', '1.19kg', '14.0 inch FHD', 'Intel® Core™ i5-1135G7 (2.4Ghz/8MB cache)\r\n\r\n', '8 GB LPDDR4X onboard', '512GB PCIe NVMe SSD (nâng cấp tối đa 1TB SSD)\r\n\r\n', 'Intel® Iris® Xe Graphics\r\n\r\n', '48Wh Li-ion battery', '1 x USB Type-C port: USB 3.2 Gen 2 (up to 10 Gbps)\r\n\r\n• USB 3.2 Gen 2 (up to 10 Gbps)\r\n\r\n• DisplayPort over USB-C\r\n\r\n• Thunderbolt 4\r\n\r\n• USB charging 5 V; 3 A\r\n\r\n• DC-in port 19 V; 65 W\r\n\r\n1 x USB 3.2 Gen 1 port featuring power-off USB charging\r\n\r\n1 x USB 2.0 port\r\n\r\n1 x HDMI®2.0 port with HDCP support\r\n\r\n1 x DC-in jack for AC adapte', 'có', 'có', 'không', 'Win 10 Home\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(19, 19, '36.34 x 25.05 x 1.99 cm', '1.7 kg ', '15.6 inch FHD Acer ComfyView IPS LED LCD\r\n\r\n', 'AMD Ryzen™ 3 3250U\r\n\r\n', '4GB DDR4 2400 Mhz ', '256GB PCIe Gen3 NVMe (nâng cấp tối đa 2TB HDD và 1TB SSD PCIe NVMe)\r\n\r\n', 'Integrated', '2-cell', '	\r\n2 x USB 3.2 Gen 1, 1 x USB 2.0, 1 x HDMI, 1 x Ethernet\r\n\r\n1 x Kensington lock', 'có', 'có', 'không', 'Windows 10 Home\r\n\r\n', 'Bảo hành 1 năm chính hãng.'),
(20, 20, '32.88 x 23.6 x 1.795  cm', '1.46kg', '14.0 inch FHD', 'Intel® Core™ i3-1115G4 (3.0 GHz,6MB) – CPU thế hệ 11 (Tiger lake mới nhất)\r\n\r\n', '4GB DDR4', '256GB PCIe NVMe SSD\r\n\r\n', 'Intel Iris Xe Graphics\r\n\r\n', '48Wh Li-ion battery', '1 x USB Type C, 2 x USB 3.1, 1 x USB 2.0, 1 x HDMI® port, 1 x 3.5 mm headphone/speaker jack\r\n\r\n', 'có', 'có', 'có', 'Win 10 Home\r\n\r\n', 'Bảo hành 1 năm chính hãng.');









