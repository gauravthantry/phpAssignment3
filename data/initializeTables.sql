create database if not exists gamingforum;
use gamingforum;

create table if not exists user_details(
  userID int primary key auto_increment,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  email VARCHAR(30) NOT NULL,
  profile_pic LONGBLOB NOT NULL,
  age INT NOT NULL,
  gender VARCHAR(10)
);

create table if not exists Post(
	post_id INT NOT NULL AUTO_INCREMENT,
  userID INT,
  lang VARCHAR (2),
  post_title VARCHAR (200),
  post_content VARCHAR (3000),
  post_create_date DATETIME NOT NULL DEFAULT(NOW()),
  PRIMARY KEY (post_id),
  FOREIGN KEY (userID) REFERENCES user_details(userID)

);

create table if not exists user_credentials (
  _id int NOT NULL AUTO_INCREMENT,
  userID int,
  current_password varchar(200),
  first_previous_password varchar(200),
  second_previous_password varchar(200),
  third_previous_password varchar(200),
  PRIMARY KEY (_id),
  FOREIGN KEY (userID) REFERENCES user_details(userID)
  );