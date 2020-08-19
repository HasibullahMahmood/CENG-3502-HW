<?php


"CREATE DATABASE IF NOT EXISTS bookshop;";
"USE bookshop";

"CREATE  TABLE IF NOT EXISTS `user` (
    `id` INT  AUTOINCREMENT ,
    `fullName` VARCHAR(100) NOT NULL ,
    `gender` VARCHAR(6) ,
    `date_of_birth` DATE ,
    `physical_address` VARCHAR(255) ,
    `postal_address` VARCHAR(255) ,
    `contact_number` VARCHAR(75) ,
    `email` VARCHAR(255) ,
    PRIMARY KEY (`membership_number`) )
  ENGINE = InnoDB";


"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1000', 'Chain of Gold', '86', 'img-1.jpg', 'This is an amazing Book.', '1')";
"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1001', 'The Plague', '56', 'img-2.jpg', 'This is an amazing Book.', '2')";
"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1002', 'Our House is On Fire', '126', 'img-3.jpg', 'This is an amazing Book.', '5')";
"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1003', 'Damascus', '150', 'img-4.jpg', 'This is an amazing Book.', '4')";
"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1004', 'The Gaurdian', '170', 'img-5.jpg', 'This is an amazing Book.', '3')";
"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1005', 'Hatchet', '190', 'img-6.jpg', 'This is an amazing Book.', '6')";
"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1006', 'Alaska Home', '205', 'img-7.jpg', 'This is an amazing Book.', '5')";
"INSERT INTO `book` (`id`, `name`, `price`, `image`, `description`, `categoryID`) VALUES ('1007', 'Blue Gold', '110', 'img-8.jpg', 'This is an amazing Book.', '5')";

"CREATE TABLE user (name VARCHAR(20), owner VARCHAR(20),
       species VARCHAR(20), sex CHAR(1), birth DATE, death DATE)";

?>