DROP DATABASE IF EXISTS residentz;
CREATE DATABASE residentz;
USE residentz;

DROP TABLE IF EXISTS maintenance;
DROP TABLE IF EXISTS event;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    A_ID INT PRIMARY KEY AUTO_INCREMENT,
    Email_ID VARCHAR(50) NOT NULL,
    Password INT(15) NOT NULL UNIQUE,
    Name VARCHAR(10) NOT NULL,
    DOB INT(8) NOT NULL,
    Mobile_No INT(10) NOT NULL UNIQUE,
    Gender VARCHAR(5) NOT NULL
);

CREATE TABLE user (
    E_ID INT PRIMARY KEY AUTO_INCREMENT,
    Email_id VARCHAR(50) NOT NULL,
    Password INT(7) NOT NULL UNIQUE,
    Name VARCHAR(10) NOT NULL,
    Mobile_No INT(10) NOT NULL UNIQUE,
    Gender VARCHAR(5) NOT NULL
);

CREATE TABLE event (
    P_ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(10) NOT NULL,
    Email_id VARCHAR(50) NOT NULL,
    Mobile_No INT(10) NOT NULL UNIQUE
);

CREATE TABLE maintenance (
    M_ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(10) NOT NULL,
    Email_id VARCHAR(50) NOT NULL,
    Mobile_No INT(10) NOT NULL UNIQUE,
    Password INT(7) NOT NULL UNIQUE
);

CREATE TABLE polls (
    poll_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    created_by INT,
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    end_date DATETIME NOT NULL,
    status ENUM('active', 'closed') DEFAULT 'active',
    FOREIGN KEY (created_by) REFERENCES user(E_ID)
);

CREATE TABLE poll_options (
    option_id INT PRIMARY KEY AUTO_INCREMENT,
    poll_id INT,
    option_text VARCHAR(255) NOT NULL,
    FOREIGN KEY (poll_id) REFERENCES polls(poll_id) ON DELETE CASCADE
);

CREATE TABLE poll_votes (
    vote_id INT PRIMARY KEY AUTO_INCREMENT,
    poll_id INT,
    option_id INT,
    user_id INT,
    voted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (poll_id) REFERENCES polls(poll_id) ON DELETE CASCADE,
    FOREIGN KEY (option_id) REFERENCES poll_options(option_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user(E_ID),
    UNIQUE KEY unique_vote (poll_id, user_id)
);
