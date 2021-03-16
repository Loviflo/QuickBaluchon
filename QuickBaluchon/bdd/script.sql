CREATE TABLE IF NOT EXISTS Staff(
    username VARCHAR(50) PRIMARY KEY NOT NULL,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS Package(
    id_package INT PRIMARY KEY NOT NULL,
    weight FLOAT,
    destination VARCHAR(220),
    qrcode VARCHAR(255),
    additional_info TEXT,
    delivery_date DATETIME,
    pckg_follow_up VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS Bill(
    id_bill INT PRIMARY KEY NOT NULL,
    payment_date DATETIME,
    amount INT,
    file_bill VARCHAR(255),
    billing_addr VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Depot(
    id_depot INT PRIMARY KEY NOT NULL,
    address_depot VARCHAR(255),
    depot_capacity INT,
    package INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Client(
    company_name VARCHAR(100) PRIMARY KEY NOT NULL,
    cli_pwd VARCHAR(50),
    mail VARCHAR(50),
    billing_address VARCHAR(255),
    comf_cli BOOLEAN,
    package INT NOT NULL,
    bill INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Paysheet(
    id_sheet INT PRIMARY KEY NOT NULL,
    payment_date DATETIME,
    amount INT,
    file_pay VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Deliveryman(
    username VARCHAR(50) PRIMARY KEY NOT NULL,
    password VARCHAR(50) NOT NULL,
    delivery_range FLOAT,
    nb_km FLOAT,
    nb_pck INT,
    iban VARCHAR(255),
    vehicle_type VARCHAR(50),
    vehicle_brand VARCHAR(50),
    vehicle_capacity INT,
    comf_del BOOLEAN,
    package INT NOT NULL,
    pay_sheet INT NOT NULL
);

ALTER TABLE Client
ADD CONSTRAINT FK_Package_Client
FOREIGN KEY (package) REFERENCES Package(id_package),
ADD CONSTRAINT FK_Bill_Client
FOREIGN KEY (bill) REFERENCES Bill(id_bill);

ALTER TABLE Depot
ADD CONSTRAINT FK_Package_Depot
FOREIGN KEY (package) REFERENCES Package(id_package);

ALTER TABLE Deliveryman
ADD CONSTRAINT FK_Package_Deliveryman
FOREIGN KEY (package) REFERENCES Package(id_package),
ADD CONSTRAINT FK_Pay_Client
FOREIGN KEY (pay_sheet) REFERENCES Paysheet(id_sheet);