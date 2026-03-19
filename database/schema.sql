-- Database aanmaken
CREATE DATABASE todolist_db;
USE todolist_db;

-- =========================
-- Tabel: User
-- =========================
CREATE TABLE User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mail VARCHAR(255) NOT NULL UNIQUE,
    naam VARCHAR(100) NOT NULL,
    achternaam VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    geboortedatum DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- Tabel: Taak
-- =========================
CREATE TABLE Taak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(255) NOT NULL,
    deadline DATETIME,
    beschrijving TEXT,
    assignee INT,
    
    CONSTRAINT fk_assignee
        FOREIGN KEY (assignee)
        REFERENCES User(id)
        ON DELETE SET NULL
);

-- =========================
-- Voorbeeld data
-- =========================

INSERT INTO User (mail, naam, achternaam, password, geboortedatum)
VALUES
('peter@example.com', 'Peter', 'Marzina', 'hashed_password', '2000-05-10'),
('anna@example.com', 'Anna', 'Jansen', 'hashed_password', '1998-09-20');

INSERT INTO Taak (titel, deadline, beschrijving, assignee)
VALUES
('Database maken', '2026-03-10 23:59:00', 'Maak de MySQL database voor de planner', 1),
('Frontend maken', '2026-03-12 18:00:00', 'Maak een eenvoudige interface', 2);