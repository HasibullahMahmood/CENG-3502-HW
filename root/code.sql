	DROP DATABASE IF EXISTS bookshop;
	CREATE DATABASE IF NOT EXISTS bookshop;
	USE bookshop;
	-- -----------------------------------------------------
	-- Schema bookshop
	-- -----------------------------------------------------

	-- -----------------------------------------------------
	-- Table `user`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `user` ;

	CREATE TABLE IF NOT EXISTS `user` (
	  `id` INT NOT NULL AUTO_INCREMENT,
	  `fullName` VARCHAR(100) NULL,
	  `email` VARCHAR(100) NOT NULL,
	  `password` VARCHAR(100) NOT NULL,
	  `phoneNo` VARCHAR(15) NULL,
	  `birthDate` DATE NULL,
	  `loginStatus` VARCHAR(10) NULL,
	  `accountStatus` VARCHAR(10) NULL,
	  `userType` VARCHAR(100) NULL,
	  PRIMARY KEY (`id`))
	ENGINE = InnoDB;


	-- -----------------------------------------------------
	-- Table `category`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `category` ;

	CREATE TABLE IF NOT EXISTS `category` (
	  `id` INT NOT NULL AUTO_INCREMENT,
	  `name` VARCHAR(100) NOT NULL,
	  PRIMARY KEY (`id`))
	ENGINE = InnoDB;


	-- -----------------------------------------------------
	-- Table `book`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `book` ;

	CREATE TABLE IF NOT EXISTS `book` (
	  `id` INT NOT NULL AUTO_INCREMENT,
	  `name` VARCHAR(100) NULL,
	  `price` INT(10) NULL,
	  `image` VARCHAR(100) NULL,
	  `description` VARCHAR(100) NULL,
	  `categoryID` INT NOT NULL,
	  PRIMARY KEY (`id`, `categoryID`),
	  CONSTRAINT `fk_book_category1`
		FOREIGN KEY (`categoryID`)
		REFERENCES `category` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
	ENGINE = InnoDB;



	-- -----------------------------------------------------
	-- Table `cart`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `cart` ;

	CREATE TABLE IF NOT EXISTS `cart` (
	  `userID` INT NOT NULL,
	  `bookID` INT NOT NULL,
	  `quantity` INT NULL,
	  PRIMARY KEY (`bookID`, `userID`),
	  CONSTRAINT `fk_cart_user`
		FOREIGN KEY (`userID`)
		REFERENCES `user` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	  CONSTRAINT `fk_cart_book1`
		FOREIGN KEY (`bookID`)
		REFERENCES `book` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
	ENGINE = InnoDB;


	-- -----------------------------------------------------
	-- Data for table `user`
	-- -----------------------------------------------------
	START TRANSACTION;
	INSERT INTO `user` (`id`, `fullName`, `email`, `password`, `phoneNo`, `birthDate`, `loginStatus`, `accountStatus`, `userType`) VALUES (1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0555555555', '1996/01/01', 'offline', 'active', 'admin');
	INSERT INTO `user` (`id`, `fullName`, `email`, `password`, `phoneNo`, `birthDate`, `loginStatus`, `accountStatus`, `userType`) VALUES (2, 'customer', 'customer@gmail.com', '202cb962ac59075b964b07152d234b70', '0511111111', '1990/01/01', 'offline', 'active', 'customer');

	COMMIT;


	-- -----------------------------------------------------
	-- Data for table `category`
	-- -----------------------------------------------------
	START TRANSACTION;
	INSERT INTO `category` (`id`, `name`) VALUES (1, 'Romance');
	INSERT INTO `category` (`id`, `name`) VALUES (2, 'Adventure');
	INSERT INTO `category` (`id`, `name`) VALUES (3, 'Science');
	INSERT INTO `category` (`id`, `name`) VALUES (4, 'Business');
	INSERT INTO `category` (`id`, `name`) VALUES (5, 'Comics');
	INSERT INTO `category` (`id`, `name`) VALUES (6, 'Cooking');

	COMMIT;


	-- -----------------------------------------------------
	-- Data for table `book`
	-- -----------------------------------------------------
	START TRANSACTION;
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1001, 'Chain of Gold', 125, 'img-1.jpg', 'This is an amazing book.', 1);
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1002, 'The Plague', 150, 'img-2.jpg', 'This is an amazing book.', 5);
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1003, 'Our House is On Fire', 58, 'img-3.jpg', 'This is an amazing book.', 3);
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1004, 'Damascus', 96, 'img-4.jpg', 'This is an amazing book.', 4);
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1005, 'The Gaurdian', 105, 'img-5.jpg', 'This is an amazing book.', 6);
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1006, 'Hatchet', 90, 'img-6.jpg', 'This is an amazing book.', 2);
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1007, 'Alaska Home', 80, 'img-7.jpg', 'This is an amazing book.', 4);
	INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES (1008, 'Blue Gold', 75, 'img-8.jpg', 'This is an amazing book.', 1);

	COMMIT;

