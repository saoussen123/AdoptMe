-- Database Schema for AdoptMe
-- Use this file to initialize your MySQL database

CREATE DATABASE IF NOT EXISTS adopt_me;
USE adopt_me;

-- Professional Reset: Drop and Recreate
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS adoption_forms;
DROP TABLE IF EXISTS adoptions;
DROP TABLE IF EXISTS animals;
DROP TABLE IF EXISTS users;
SET FOREIGN_KEY_CHECKS = 1;

-- Table for users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(30) DEFAULT NULL,
    reset_token VARCHAR(100) DEFAULT NULL,
    token_expires DATETIME DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for animals
CREATE TABLE IF NOT EXISTS animals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(100) NOT NULL,
    image VARCHAR(255) DEFAULT 'placeholder.png',
    description TEXT,
    available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for adoptions
CREATE TABLE IF NOT EXISTS adoptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    animal_id INT NOT NULL,
    adoption_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE CASCADE
);

-- Table for adoption forms
CREATE TABLE IF NOT EXISTS adoption_forms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    animal_id INT NOT NULL,

    -- Informations personnelles
    full_name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    city VARCHAR(255) NOT NULL,
    phone VARCHAR(30) NOT NULL,

    -- Situation de vie
    housing_type ENUM('apartment', 'house_with_garden', 'other') NOT NULL,
    lives_alone BOOLEAN NOT NULL,
    has_children BOOLEAN NOT NULL,
    children_ages VARCHAR(255) DEFAULT NULL,

    -- Expérience avec les animaux
    had_pet_before BOOLEAN NOT NULL,
    has_current_pets BOOLEAN NOT NULL,
    current_pets_description VARCHAR(255) DEFAULT NULL,

    -- Santé & Allergies
    has_allergies BOOLEAN NOT NULL,
    household_allergies BOOLEAN NOT NULL,

    -- Mode de vie
    hours_at_home ENUM('less_4h', '4_8h', 'more_8h') NOT NULL,
    has_garden BOOLEAN NOT NULL,

    -- Motivation
    motivation TEXT NOT NULL,

    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE CASCADE
);

-- Seed some initial data
INSERT INTO animals (name, type, image, description) VALUES
('Rex', 'Dog', 'dog1.jpg', 'A friendly golden retriever.'),
('Buddy', 'Dog', 'dog2.jpg', 'Very active and loves playing fetch.'),
('Charlie', 'Dog', 'dog3.jpg', 'A calm and loyal companion.'),
('Whiskers', 'Cat', 'cat1.jpg', 'Very playful and loves attention.'),
('Luna', 'Cat', 'cat2.jpg', 'Calm and loves sleeping all day.'),
('Misty', 'Cat', 'cat3.jpg', 'Independent but very sweet.'),
('Bluey', 'Bird', 'parrot1.jpg', 'A colorful parrot that can talk!'),
('Sunny', 'Bird', 'parrot2.jpg', 'Cheerful and loves to whistle.'),
('Kiwi', 'Bird', 'parrot3.jpg', 'Small, energetic and very curious.');