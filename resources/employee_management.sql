DROP DATABASE IF EXISTS employee_management;
-- CREATE DATABASE IF NOT EXISTS employee_management;
-- -- USE employee_management;

-- SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

-- DROP TABLE IF EXISTS users, 
--                      employees;

-- CREATE TABLE users (
--     user_ID          INT                     NOT NULL,
--     user_name        VARCHAR(16)             NOT NULL,
--     user_password    VARCHAR(16)             NOT NULL,
--     email            VARCHAR(30)             NOT NULL,
-- );

-- CREATE TABLE employees (
--     employee_ID         INT                     NOT NULL,
--     employee_name       VARCHAR(16)             NOT NULL,
--     employee_lastName   VARCHAR(16)             NOT NULL,
--     email               VARCHAR(30)             NOT NULL,
--     gender              ENUM ('M','F')          NOT NULL,    
--     age                 INT                     NOT NULL,
--     streetAddress       VARCHAR(50)             NOT NULL,
--     city                VARCHAR(16)             NOT NULL,
--     country_state       VARCHAR(16)             NOT NULL,
--     postalCode          INT                     NOT NULL,
--     phoneNumber         INT                     NOT NULL,
--     photo               VARCHAR(150)            NOT NULL,
-- );
