-- Create Database
CREATE DATABASE IF NOT EXISTS market;
USE market;

-- Create Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Categories Table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Products Table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    product_name VARCHAR(100),
    price DECIMAL(10, 2),
    quantity INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Create Orders Table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create Order_Products Table
CREATE TABLE IF NOT EXISTS order_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    amount INT,
    price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Insert Data into Users Table
INSERT INTO users (first_name, last_name, email, password) VALUES
('Mohamed', 'Said', 'mohamed@example.com', 'password1'),
('Ali', 'Hassan', 'ali@example.com', 'password2'),
('Sara', 'Ahmed', 'sara@example.com', 'password3');

-- Insert Data into Categories Table
INSERT INTO categories (category_name) VALUES
('Electronics'),
('Books'),
('Clothing');

-- Insert Data into Products Table
INSERT INTO products (category_id, product_name, price, quantity) VALUES
(1, 'Laptop', 1500.00, 10),
(1, 'Smartphone', 800.00, 20),
(2, 'Novel', 15.00, 100),
(3, 'T-Shirt', 20.00, 50);

-- Insert Data into Orders Table
INSERT INTO orders (user_id, total_price) VALUES
(1, 2300.00),
(2, 15.00),
(3, 20.00);

-- Insert Data into Order_Products Table
INSERT INTO order_products (order_id, product_id, amount, price) VALUES
(1, 1, 1, 1500.00),
(1, 2, 1, 800.00),
(2, 3, 1, 15.00),
(3, 4, 1, 20.00);

-- Query: Get Orders Details for the First User
SELECT o.id AS order_id, o.total_price, op.product_id, p.product_name, op.amount, op.price
FROM orders o
JOIN order_products op ON o.id = op.order_id
JOIN products p ON op.product_id = p.id
WHERE o.user_id = 1;

-- Query: Get Orders Count for Each User
SELECT u.id AS user_id, COUNT(o.id) AS orders_count
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
GROUP BY u.id;

-- Query: Get Total Orders Price for Each User
SELECT u.id AS user_id, SUM(o.total_price) AS total_order_price
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
GROUP BY u.id;

-- Query: Select Last Order for Each User
SELECT u.id AS user_id, MAX(o.created_at) AS last_order_date
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
GROUP BY u.id;

-- Query: Select User with the Highest Order Price
SELECT u.id AS user_id, MAX(o.total_price) AS highest_order_price
FROM users u
JOIN orders o ON u.id = o.user_id
GROUP BY u.id
ORDER BY highest_order_price DESC
LIMIT 1;

-- Query: Select Users with Orders in the Current Month
SELECT DISTINCT u.id AS user_id, CONCAT(u.first_name, ' ', u.last_name) AS name
FROM users u
JOIN orders o ON u.id = o.user_id
WHERE MONTH(o.created_at) = MONTH(CURRENT_DATE) AND YEAR(o.created_at) = YEAR(CURRENT_DATE);

-- Query: Select Users Who Didn’t Have Orders in the Last 2 Months
SELECT u.id AS user_id, CONCAT(u.first_name, ' ', u.last_name) AS name
FROM users u
WHERE u.id NOT IN (
    SELECT DISTINCT o.user_id
    FROM orders o
    WHERE o.created_at >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
);

-- Query: Select the Month with the Highest Number of Orders
SELECT MONTH(o.created_at) AS month, COUNT(o.id) AS orders_count
FROM orders o
GROUP BY MONTH(o.created_at)
ORDER BY orders_count DESC
LIMIT 1;

-- Query: Select the Month with the Highest Orders Price
SELECT MONTH(o.created_at) AS month, SUM(o.total_price) AS total_order_price
FROM orders o
GROUP BY MONTH(o.created_at)
ORDER BY total_order_price DESC
LIMIT 1;

-- Query: Select User with the Highest Order Price in the Current Month
SELECT u.id AS user_id, CONCAT(u.first_name, ' ', u.last_name) AS name, MAX(o.total_price) AS highest_order_price
FROM users u
JOIN orders o ON u.id = o.user_id
WHERE MONTH(o.created_at) = MONTH(CURRENT_DATE) AND YEAR(o.created_at) = YEAR(CURRENT_DATE)
GROUP BY u.id
ORDER BY highest_order_price DESC
LIMIT 1;

