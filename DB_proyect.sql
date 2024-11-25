create database DB_proyect;
use DB_proyect;

CREATE TABLE InicioSesion (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL
);

CREATE TABLE Registro (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    numero VARCHAR(15) NOT NULL
);

CREATE TABLE Contactanos (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL
);

CREATE TABLE ReservaVuelo (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    ciudad_salida VARCHAR(100) NOT NULL,
    ciudad_llegada VARCHAR(100) NOT NULL,
    fecha_salida DATE NOT NULL,
    fecha_regreso DATE,
    numero_pasajeros TINYINT NOT NULL CHECK (numero_pasajeros BETWEEN 1 AND 5), -- Máximo 5 personas
    clase ENUM('Económica', 'Bussines', 'Primera') NOT NULL, -- Opciones limitadas
    calificacion_hotel TINYINT NOT NULL CHECK (calificacion_hotel BETWEEN 1 AND 5) -- Valor entre 1 y 5
);

