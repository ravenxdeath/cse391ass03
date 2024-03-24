-- Client table
CREATE TABLE Client (
    ClientID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Username VARCHAR(50) UNIQUE,
    PasswordHash VARCHAR(255),
    Phone VARCHAR(20),
    Email VARCHAR(100)
);


-- Admin table
CREATE TABLE Admin (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Username VARCHAR(50) UNIQUE,
    PasswordHash VARCHAR(255),
    Email VARCHAR(100),
    Phone VARCHAR(20)
);

-- Mechanic table
CREATE TABLE Mechanic (
    MechanicID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) UNIQUE,
    Name VARCHAR(100),
    PasswordHash VARCHAR(255),
    Specialization VARCHAR(100),
    DailyCarCapacity INT,
    AverageRating DECIMAL(3,2),
    TotalRatings INT
);

ALTER TABLE Mechanic
ADD DailyCarCount INT;

-- Appointment table
CREATE TABLE Appointment (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    ClientID INT,
    MechanicID INT,
    AdminID INT,
    AppointmentDate DATE,
    AppointmentTime TIME,
    AppointmentType VARCHAR(50),
    AppointmentStatus VARCHAR(50),
    ServiceRequested TEXT,
    PartsNeeded TEXT,
    Notes TEXT,
    FOREIGN KEY (ClientID) REFERENCES Client(ClientID),
    FOREIGN KEY (MechanicID) REFERENCES Mechanic(MechanicID),
    FOREIGN KEY (AdminID) REFERENCES Admin(AdminID)
);

ALTER TABLE Appointment
ADD COLUMN CarID INT,
ADD FOREIGN KEY (CarID) REFERENCES Car(CarID);


-- Car table
CREATE TABLE Car (
    CarID INT AUTO_INCREMENT PRIMARY KEY,
    ClientID INT,
    MechanicID INT,
    CarColor VARCHAR(50),
    CarLicenseNumber VARCHAR(50),
    CarEngineNumber VARCHAR(50),
    CarModel VARCHAR(100),
    YearOfManufacture INT,
    AdditionalDetails TEXT,
    MaintenanceHistory TEXT,
    FOREIGN KEY (ClientID) REFERENCES Client(ClientID),
    FOREIGN KEY (MechanicID) REFERENCES Mechanic(MechanicID)
);

-- Rating table
CREATE TABLE Rating (
    RatingID INT AUTO_INCREMENT PRIMARY KEY,
    MechanicID INT,
    ClientID INT,
    Rating DECIMAL(3,2),
    Review TEXT,
    Date DATE,
    FOREIGN KEY (MechanicID) REFERENCES Mechanic(MechanicID),
    FOREIGN KEY (ClientID) REFERENCES Client(ClientID)
);
