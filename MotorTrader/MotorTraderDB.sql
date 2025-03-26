USE motortraderdb;

DROP TABLE IF EXISTS cars;
DROP TABLE IF EXISTS users;

-- Users Table (for website users, e.g., admins or registered users)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cars Table (with additional details)
CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(100),
    model VARCHAR(100),
    year INT,
    mileage INT,
    price DECIMAL(10,2),
    description TEXT,
    image VARCHAR(255),
    registration VARCHAR(50),
    owners INT,
    fuel_type VARCHAR(50),
    body_type VARCHAR(50),
    engine VARCHAR(100),
    gearbox VARCHAR(50),
    doors INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Insert users (website users, not car owners)
INSERT INTO users (name, email, password, phone)
VALUES
('John Doe', 'john@example.com', 'password123', '123456789'),
('Jane Smith', 'jane@example.com', 'password456', '987654321'),
('Mike Brown', 'mike@example.com', 'password789', '555123456'),
('Emily Davis', 'emily@example.com', 'password000', '666987654'),
('David Wilson', 'david@example.com', 'password111', '777654321');

-- Insert cars
INSERT INTO cars (make, model, year, mileage, price, description, image, registration, owners, fuel_type, body_type, engine, gearbox, doors, images)
VALUES
('Toyota', 'Corolla', 2018, 45000, 15000.00, 'Well-maintained, single owner, great condition.', 'e761b09d9bcc49e18a88f27b173ea7e0.jpg', 'AB12 CDE', 1, 'Petrol', 'Sedan', '1.8L', 'Automatic', 4),
('Honda', 'Civic', 2017, 60000, 14000.00, 'Sporty and fuel-efficient, clean interior.', 'honda_civic.jpg', 'XY34 ZGH', 2, 'Diesel', 'Sedan', '1.6L', 'Manual', 4),
('Ford', 'Focus', 2016, 55000, 12000.00, 'Compact car, runs smoothly, great for city driving.', 'ford_focus.jpg', 'LM56 HJI', 2, 'Petrol', 'Hatchback', '1.5L', 'Automatic', 5),
('Chevrolet', 'Malibu', 2019, 30000, 18000.00, 'Spacious sedan, modern features, low mileage.', 'chevrolet_malibu.jpg', 'RT34 XYZ', 1, 'Gasoline', 'Sedan', '2.0L', 'Automatic', 4),
('BMW', '3 Series', 2015, 75000, 22000.00, 'Luxury sedan with leather interior, well maintained.', 'bmw_3series.jpg', 'BW12 JKL', 3, 'Petrol', 'Sedan', '2.5L', 'Manual', 4);

-- Insurances Table (optional, if needed)
CREATE TABLE insurances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT,
    provider VARCHAR(100),
    insurance_type VARCHAR(100),
    price DECIMAL(10,2),
    duration_months INT,
    FOREIGN KEY (car_id) REFERENCES cars(id)
);

-- Orders Table (optional - to track purchases)
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

