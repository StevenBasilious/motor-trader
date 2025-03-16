
USE motortraderdb;

DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS users;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cars Table
CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    make VARCHAR(100),
    model VARCHAR(100),
    year INT,
    mileage INT,
    price DECIMAL(10,2),
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert users
INSERT INTO users (name, email, password, phone)
VALUES
('John Doe', 'john@example.com', 'password123', '123456789'),
('Jane Smith', 'jane@example.com', 'password456', '987654321'),
('Mike Brown', 'mike@example.com', 'password789', '555123456'),
('Emily Davis', 'emily@example.com', 'password000', '666987654'),
('David Wilson', 'david@example.com', 'password111', '777654321');

-- Insert cars
INSERT INTO cars (user_id, make, model, year, mileage, price, description, image)
VALUES
(1, 'Toyota', 'Corolla', 2018, 45000, 15000.00, 'Well-maintained, single owner, great condition.', 'toyota_corolla.jpg'),
(2, 'Honda', 'Civic', 2017, 60000, 14000.00, 'Sporty and fuel-efficient, clean interior.', 'honda_civic.jpg'),
(3, 'Ford', 'Focus', 2016, 55000, 12000.00, 'Compact car, runs smoothly, great for city driving.', 'ford_focus.jpg'),
(4, 'Chevrolet', 'Malibu', 2019, 30000, 18000.00, 'Spacious sedan, modern features, low mileage.', 'chevrolet_malibu.jpg'),
(5, 'BMW', '3 Series', 2015, 75000, 22000.00, 'Luxury sedan with leather interior, well maintained.', 'bmw_3series.jpg'),
(6, 'Nissan', 'Altima', 2020, 25000, 19000.00, 'Sleek design, fuel-efficient, advanced safety features.', 'nissan_altima.jpg'),
(7, 'Hyundai', 'Elantra', 2019, 40000, 16000.00, 'Comfortable ride, modern tech, excellent value.', 'hyundai_elantra.jpg'),
(8, 'Kia', 'Sorento', 2018, 35000, 21000.00, 'Spacious SUV, great for families, reliable performance.', 'kia_sorento.jpg'),
(9, 'Volkswagen', 'Golf', 2017, 50000, 13000.00, 'Compact and fun to drive, perfect for urban living.', 'volkswagen_golf.jpg'),
(10, 'Subaru', 'Outback', 2019, 30000, 24000.00, 'All-wheel drive, rugged yet comfortable, ideal for adventures.', 'subaru_outback.jpg'),
(11, 'Mazda', 'CX-5', 2020, 20000, 25000.00, 'Stylish crossover, excellent handling, premium interior.', 'mazda_cx5.jpg'),
(12, 'Audi', 'A4', 2018, 45000, 28000.00, 'Luxury sedan with cutting-edge technology, smooth ride.', 'audi_a4.jpg'),
(13, 'Jeep', 'Wrangler', 2017, 40000, 27000.00, 'Iconic off-road vehicle, rugged and versatile.', 'jeep_wrangler.jpg'),
(14, 'Tesla', 'Model 3', 2021, 15000, 45000.00, 'Electric car, fast acceleration, autopilot features.', 'tesla_model3.jpg'),
(15, 'Lexus', 'RX 350', 2019, 30000, 38000.00, 'Luxury SUV, quiet cabin, smooth and powerful ride.', 'lexus_rx350.jpg');

-- Insurances Table
CREATE TABLE insurances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT,
    provider VARCHAR(100),
    insurance_type VARCHAR(100),
    price DECIMAL(10,2),
    duration_months INT,
    FOREIGN KEY (car_id) REFERENCES cars(id)
);

-- Orders Table (Optional - to track purchases)
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    car_id INT,
    insurance_id INT,
    total_price DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (car_id) REFERENCES cars(id),
    FOREIGN KEY (insurance_id) REFERENCES insurances(id)
);


-- --ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss

-- USE motortraderdb;

-- DROP TABLE IF EXISTS cars;
-- DROP TABLE IF EXISTS users;

-- -- Users Table
-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100),
--     email VARCHAR(100) UNIQUE,
--     password VARCHAR(255),
--     phone VARCHAR(20),
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- -- Cars Table
-- CREATE TABLE cars (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT,
--     make VARCHAR(100),
--     model VARCHAR(100),
--     year INT,
--     mileage INT,
--     price DECIMAL(10,2),
--     description TEXT,
--     image VARCHAR(255),
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     FOREIGN KEY (user_id) REFERENCES users(id)
-- );

-- -- Insert users
-- INSERT INTO users (name, email, password, phone)
-- VALUES
-- ('John Doe', 'john@example.com', 'password123', '123456789'),
-- ('Jane Smith', 'jane@example.com', 'password456', '987654321'),
-- ('Mike Brown', 'mike@example.com', 'password789', '555123456'),
-- ('Emily Davis', 'emily@example.com', 'password000', '666987654'),
-- ('David Wilson', 'david@example.com', 'password111', '777654321');

-- -- Insert cars
-- INSERT INTO cars (user_id, make, model, year, mileage, price, description, image)
-- VALUES
-- (1, 'Toyota', 'Corolla', 2018, 45000, 15000.00, 'Well-maintained, single owner, great condition.', 'toyota_corolla.jpg'),
-- (2, 'Honda', 'Civic', 2017, 60000, 14000.00, 'Sporty and fuel-efficient, clean interior.', 'honda_civic.jpg'),
-- (3, 'Ford', 'Focus', 2016, 55000, 12000.00, 'Compact car, runs smoothly, great for city driving.', 'ford_focus.jpg'),
-- (4, 'Chevrolet', 'Malibu', 2019, 30000, 18000.00, 'Spacious sedan, modern features, low mileage.', 'chevrolet_malibu.jpg'),
-- (5, 'BMW', '3 Series', 2015, 75000, 22000.00, 'Luxury sedan with leather interior, well maintained.', 'bmw_3series.jpg');
