--  DISCLAIMER
--  To the best of our knowledge, this data is fabricated, and
--  it does not correspond to real people. 
--  Any similarity to existing people is purely coincidental.
-- 

DROP DATABASE IF EXISTS employee_management;
CREATE DATABASE IF NOT EXISTS employee_management;
USE employee_management;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

DROP TABLE IF EXISTS users, 
                     employees;

/*!50503 set default_storage_engine = InnoDB */;
/*!50503 select CONCAT('storage engine: ', @@default_storage_engine) as INFO */;

CREATE TABLE employees (
    employee_ID         INT                     NOT NULL,
    employee_name       VARCHAR(16)             NOT NULL,
    employee_lastName   VARCHAR(16)             NOT NULL,
    email               VARCHAR(30)             NOT NULL,
    gender              ENUM ('M','F')          NOT NULL,    
    age                 INT                     NOT NULL,
    streetAddress       VARCHAR(50)             NOT NULL,
    city                VARCHAR(16)             NOT NULL,
    country_state       VARCHAR(16)             NOT NULL,
    postalCode          INT                     NOT NULL,
    phoneNumber         INT                     NOT NULL,
    photo               VARCHAR(150)            NOT NULL,
);

CREATE TABLE users (
    user_ID          INT                     NOT NULL,
    user_name        VARCHAR(16)             NOT NULL,
    user_password    VARCHAR(16)             NOT NULL,
    email            VARCHAR(30)             NOT NULL,
);



CREATE OR REPLACE VIEW dept_emp_latest_date AS
    SELECT emp_no, MAX(from_date) AS from_date, MAX(to_date) AS to_date
    FROM dept_emp
    GROUP BY emp_no;

# shows only the current department for each employee
CREATE OR REPLACE VIEW current_dept_emp AS
    SELECT l.emp_no, dept_no, l.from_date, l.to_date
    FROM dept_emp d
        INNER JOIN dept_emp_latest_date l
        ON d.emp_no=l.emp_no AND d.from_date=l.from_date AND l.to_date = d.to_date;