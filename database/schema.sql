CREATE DATABASE IF NOT EXISTS product_db;
USE product_db;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price) VALUES
('Laptop', 'Powerful laptop voor ontwikkelaars', 1299.99),
('Mouse', 'Ergonomische muis', 29.99),
('Keyboard', 'Mechanisch toetsenbord', 89.99);