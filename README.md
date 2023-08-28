# blogen

database: blog

tables: 
accounts: 
CREATE TABLE `accounts` (
 `account_id` int(255) NOT NULL AUTO_INCREMENT,
 `username` varchar(15) NOT NULL,
 `password` varchar(255) NOT NULL,
 `role` varchar(1) NOT NULL DEFAULT 'U',
 PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

categories: 
CREATE TABLE `categories` (
 `category_id` int(255) NOT NULL AUTO_INCREMENT,
 `category_name` varchar(45) NOT NULL,
 PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

posts: 
CREATE TABLE `posts` (
 `post_id` int(255) NOT NULL AUTO_INCREMENT,
 `post_title` varchar(45) NOT NULL,
 `post_message` text NOT NULL,
 `date_posted` date NOT NULL,
 `category_id` int(255) NOT NULL,
 `account_id` int(255) NOT NULL,
 PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

users: 
CREATE TABLE `users` (
 `user_id` int(255) NOT NULL AUTO_INCREMENT,
 `first_name` varchar(45) NOT NULL,
 `last_name` varchar(45) NOT NULL,
 `contact_number` varchar(45) NOT NULL,
 `address` varchar(45) NOT NULL,
 `avatar` varchar(45) DEFAULT NULL,
 `account_id` int(255) NOT NULL,
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
