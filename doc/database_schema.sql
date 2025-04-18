CREATE DATABASE Kepler;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE DEFAULT NULL,
    password VARCHAR(100) DEFAULT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,
    profile_picture_path VARCHAR(255) DEFAULT NULL
);

CREATE TABLE planets (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),               
    diameter_km FLOAT,               
    mass_kg DOUBLE,                  
    gravity FLOAT,                   
    distance_from_sun_km BIGINT,     
    number_of_moons INT,                          
    mean_temperature_celsius FLOAT   
);

CREATE TABLE eclipses (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,                
    type VARCHAR(50),                   
    magnitude FLOAT,                            
    max_eclipse_time TIME,                      
    duration TIME,                                                     
    path_width_km INT                           
);
