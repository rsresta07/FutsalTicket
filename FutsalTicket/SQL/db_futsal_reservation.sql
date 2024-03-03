`bookings``field_status``bookings``tbl_field``field_status`CREATE DATABASE futsal_reservation;

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  full_name VARCHAR(255),
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(14) NOT NULL,
  PASSWORD VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE bookings (
  booking_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  field_id INT,
  booking_date DATE,
  booking_time TIME,
  STATUS VARCHAR(50),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (field_id) REFERENCES tbl_field(field_id)
);

CREATE TABLE tbl_field (
  field_id INT PRIMARY KEY AUTO_INCREMENT,
  field_name VARCHAR(255) NOT NULL,
  field_description TEXT,
  field_image VARCHAR(255),
  field_price DECIMAL(10, 2),
  field_capacity INT
);

CREATE TABLE field_status (
  field_status_id INT PRIMARY KEY AUTO_INCREMENT,
  field_id INT,
  user_id INT,
  `Date` DATE,
  `Time` TIME,
  STATUS VARCHAR(50),
  FOREIGN KEY (field_id) REFERENCES tbl_field(field_id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);


CREATE TABLE services (
  service_id INT PRIMARY KEY AUTO_INCREMENT,
  service_name VARCHAR(255) NOT NULL,
  service_description TEXT,
  service_image VARCHAR(255),
  service_price DECIMAL(10, 2)
);

CREATE TABLE ADMIN (
  admin_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  PASSWORD VARCHAR(255) NOT NULL
);

