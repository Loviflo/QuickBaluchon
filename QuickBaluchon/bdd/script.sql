CREATE TABLE Staff(
    username VARCHAR(50) PRIMARY KEY NOT NULL,
    password VARCHAR(50) NOT NULL
)

CREATE TABLE Package(
    id_package INT PRIMARY KEY NOT NULL,
    weight FLOAT,
    destination VARCHAR(220),
    qrcode VARCHAR(255),
    additional_info TEXT,
    delivery_date DATETIME,
    pckg_follow_up VARCHAR(30)
)

CREATE TABLE Bill(
    id_bill INT PRIMARY KEY NOT NULL,
    payment_date DATETIME,
    amount INT,
    file VARCHAR(255),
    billing_addr VARCHAR(255)
)

CREATE TABLE Depot(
    id_depot INT PRIMARY KEY NOT NULL,
    address_depot VARCHAR(255),
    depot_capacity INT,
    package INT NOT NULL
)

CREATE TABLE Client(
    company_name VARCHAR(100) PRIMARY KEY NOT NULL,
    cli_pwd VARCHAR(50),
    mail VARCHAR(50),
    billing_address VARCHAR(255),
    comf_cli BOOLEAN,
    package INT NOT NULL,
    bill INT NOT NULL
)

CREATE TABLE Paysheet(
    id_sheet INT PRIMARY KEY NOT NULL,
    payment_date DATETIME,
    amount INT,
    file VARCHAR(255)
)

CREATE TABLE Deliveryman(
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
)

ALTER TABLE Client
ADD CONSTRAINT FK_Package
FOREIGN KEY (package) REFERENCES Package(id_package);

ADD CONSTRAINT Client(package) REFERENCES Package(id_package)