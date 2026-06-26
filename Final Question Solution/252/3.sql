-- ----------------------------------------------------
-- CREATE DATABASE
-- ----------------------------------------------------

-- Create a new database named sundarban.

CREATE DATABASE sundarban;

-- Select this database for use.

USE sundarban;



-- ----------------------------------------------------
-- CREATE TABLE
-- ----------------------------------------------------

CREATE TABLE sales_data (

    -- Unique ID for every sale.
    -- PRIMARY KEY means duplicate IDs are not allowed.
    SaleID INT PRIMARY KEY,

    -- Product name.
    -- VARCHAR(100) stores up to 100 characters.
    ProductName VARCHAR(100),

    -- Category ID.
    CategoryID INT,

    -- Category name.
    CategoryName VARCHAR(100),

    -- Quantity sold.
    Quantity INT,

    -- Revenue earned from that product.
    Revenue INT
);



-- ----------------------------------------------------
-- INSERT SAMPLE DATA
-- ----------------------------------------------------

-- Insert records into the sales_data table.

INSERT INTO sales_data
(
SaleID,
ProductName,
CategoryID,
CategoryName,
Quantity,
Revenue
)

VALUES

(
1,
'Laptop',
301,
'Electronics',
5,
350000
),

(
2,
'Mouse',
301,
'Electronics',
15,
45000
),

(
3,
'Chair',
302,
'Furniture',
8,
64000
),

(
4,
'Desk',
302,
'Furniture',
6,
72000
),

(
5,
'Bottle',
303,
'Accessories',
20,
30000
),

(
6,
'Pen',
303,
'Accessories',
25,
20000
);