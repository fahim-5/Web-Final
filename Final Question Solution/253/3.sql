-- ----------------------------------------------------
-- CREATE DATABASE
-- ----------------------------------------------------

-- Create a database named campus_library.

CREATE DATABASE campus_library;

-- Select this database.

USE campus_library;



-- ----------------------------------------------------
-- CREATE TABLE
-- ----------------------------------------------------

CREATE TABLE book_loans (

    -- Unique Loan ID.
    -- PRIMARY KEY prevents duplicate IDs.
    LoanID INT PRIMARY KEY,

    -- Student Name.
    -- Maximum 50 characters.
    StudentName VARCHAR(50),

    -- Book Title.
    -- Maximum 100 characters.
    BookTitle VARCHAR(100),

    -- Number of overdue days.
    DaysOverdue INT,

    -- Fine charged to the student.
    -- DECIMAL(10,2)
    // Stores numbers with 2 decimal places.
    PenaltyFee DECIMAL(10,2),

    -- Current status of the borrowed book.
    --
    -- Examples:
    -- Returned
    -- Overdue
    -- Lost
    -- Grace Period
    Status VARCHAR(30)
);



-- ----------------------------------------------------
-- INSERT SAMPLE DATA
-- ----------------------------------------------------

-- Insert sample records into the table.

INSERT INTO book_loans VALUES

(
101,
'Abdul',
'Data Structures',
0,
0.00,
'Returned'
),

(
102,
'Jabbar',
'Operating Systems',
12,
24.00,
'Overdue'
),

(
103,
'Barkat',
'Discrete Math',
5,
10.00,
'Overdue'
),

(
104,
'Rahim',
'Linear Algebra',
2,
4.00,
'Overdue'
),

(
105,
'Karim',
'Data Structures',
15,
30.00,
'Lost'
),

(
106,
'Fahim',
'Operating Systems',
0,
0.00,
'Returned'
);