-- ----------------------------------------------------
-- CREATE DATABASE
-- ----------------------------------------------------

-- Create a new database.

CREATE DATABASE uiutech_final;


-- Select this database.

USE uiutech_final;



-- ----------------------------------------------------
-- CREATE TABLE
-- ----------------------------------------------------

CREATE TABLE employee_final (

    -- Unique Employee ID.
    -- PRIMARY KEY means
    -- no duplicate values are allowed.
    EmployeeID INT PRIMARY KEY,

    -- Employee Name
    -- VARCHAR(100)
    -- means maximum 100 characters.
    EmployeeName VARCHAR(100),

    -- Department ID
    DepartmentID INT,

    -- Department Name
    DepartmentName VARCHAR(100),

    -- Employee Salary
    Salary INT,

    -- Performance Rating
    --
    -- CHAR(1)
    -- Stores only one character.
    --
    -- Example:
    -- A
    -- B
    -- C
    -- D
    PerformanceRating CHAR(1)
);


-- Insert sample employee records.

INSERT INTO employee_final
(
EmployeeID,
EmployeeName,
DepartmentID,
DepartmentName,
Salary,
PerformanceRating
)

VALUES

(
1,
'Arif Rahman',
201,
'Software Development',
45000,
'B'
),

(
2,
'Marium Khan',
201,
'Software Development',
52000,
'A'
),

(
3,
'Sabbir Hossain',
202,
'Quality Assurance',
38000,
'C'
),

(
4,
'Samira Begum',
203,
'UI/UX Design',
42000,
'B'
);