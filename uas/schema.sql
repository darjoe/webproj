-- Create database
CREATE DATABASE penggemar_burung_bontang;

-- Use the database
USE penggemar_burung_bontang;

-- Table: master_pakan
CREATE TABLE master_pakan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis_pakan VARCHAR(100) NOT NULL
);

-- Table: master_burung
CREATE TABLE master_burung (
    id INT AUTO_INCREMENT PRIMARY KEY,
    spesies VARCHAR(100) NOT NULL,
    nama VARCHAR(100),
    status_perlindungan ENUM('Dilindungi', 'Tidak Dilindungi') NOT NULL,
    pakan_id INT,
    FOREIGN KEY (pakan_id) REFERENCES master_pakan(id)
);

-- Table: penggemar
CREATE TABLE penggemar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    no_telepon VARCHAR(15)
);

-- Table: penggemar_burung
CREATE TABLE penggemar_burung (
    id INT AUTO_INCREMENT PRIMARY KEY,
    penggemar_id INT NOT NULL,
    burung_id INT NOT NULL,
    FOREIGN KEY (penggemar_id) REFERENCES penggemar(id),
    FOREIGN KEY (burung_id) REFERENCES master_burung(id)
);

-- Table: prestasi_burung
CREATE TABLE prestasi_burung (
    id INT AUTO_INCREMENT PRIMARY KEY,
    penggemar_burung_id INT NOT NULL,
    nama_prestasi VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    FOREIGN KEY (penggemar_burung_id) REFERENCES penggemar_burung(id)
);

-- Table: user
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    penggemar_id INT,
    FOREIGN KEY (penggemar_id) REFERENCES penggemar(id)
);

-- Table: `group`
CREATE TABLE `group` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name ENUM('admin', 'editor', 'guest') NOT NULL
);

-- Table: user_group (to associate users with roles)
CREATE TABLE user_group (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    group_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (group_id) REFERENCES `group`(id)
);