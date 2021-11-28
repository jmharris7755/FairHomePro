# Step 1. Create all tables first
# Create homeowners table
CREATE TABLE IF NOT EXISTS homeowners(
    HO_name VARCHAR(45) NOT NULL,
    HO_email VARCHAR(100) PRIMARY KEY UNIQUE NOT NULL,
    password VARCHAR(16) NOT NULL,
    HO_phone INT NOT NULL,
    HO_creditcard BIGINT UNSIGNED,
    HO_bankaccount BIGINT UNSIGNED
);

#Create service_types table
CREATE TABLE IF NOT EXISTS service_types(
	service_ID int AUTO_INCREMENT,
    service VARCHAR(45) NOT NULL,
	primary key (service_ID)
);

INSERT INTO service_types(service)
VALUES ("Lawn Mowing"), ("Window Cleaning"), ("Hedge Trimming"), ("Garden upkeeping");

# Create the homes table
CREATE TABLE IF NOT EXISTS homes(
    street VARCHAR(100) NOT NULL,
    city VARCHAR(45) NOT NULL,
    state VARCHAR(21) NOT NULL,
    zip BIGINT UNSIGNED NOT NULL,
    constr_type VARCHAR(45) NOT NULL,
    floors VARCHAR(45) NOT NULL,
    h_sq_ft BIGINT UNSIGNED NOT NULL,
    y_sq_ft BIGINT UNSIGNED NOT NULL,
	primary key (state, zip, city, street)
);

CREATE TABLE IF NOT EXISTS owns(
	HO_email VARCHAR(45) NOT NULL,
	zip BIGINT UNSIGNED NOT NULL,
	state VARCHAR(21) NOT NULL,
	city VARCHAR(45) NOT NULL,
	street VARCHAR(100) NOT NULL,
	FOREIGN KEY (state, zip, city, street) REFERENCES homes(state, zip, city, street),
    FOREIGN KEY (HO_email) REFERENCES homeowners(HO_email)
);

# Create the plant_type table
CREATE TABLE IF NOT EXISTS plant_types(
	street VARCHAR(100) NOT NULL,
    city VARCHAR(45) NOT NULL,
    state VARCHAR(21) NOT NULL,
    zip BIGINT UNSIGNED NOT NULL,
	plant_type varchar(100) NOT NULL,
	FOREIGN KEY (state, zip, city, street) REFERENCES homes(state, zip, city, street)
);

# Create service_professionals table
CREATE TABLE IF NOT EXISTS service_pros(
    Business_Name VARCHAR(45) NOT NULL,
    SP_email VARCHAR(100) UNIQUE PRIMARY KEY NOT NULL ,
    SP_password VARCHAR(16) NOT NULL,
    SP_creditcard BIGINT UNSIGNED,
    SP_bankaccount BIGINT UNSIGNED
);

# Create services table
CREATE TABLE IF NOT EXISTS services(
	SP_email VARCHAR(100),
    s_type VARCHAR(100) NOT NULL,
    s_price BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (SP_email) REFERENCES service_pros (SP_email)
);

# Create specialties table
CREATE TABLE IF NOT EXISTS specialties(
SP_email VARCHAR(100),
specialties VARCHAR(100),
FOREIGN KEY (SP_email) REFERENCES service_pros (SP_email)
);

# Create licenses table
CREATE TABLE IF NOT EXISTS licenses(
SP_email VARCHAR(100),
licenses VARCHAR(100),
FOREIGN KEY (SP_email) REFERENCES service_pros (SP_email)
);

# Create service_area table
CREATE TABLE IF NOT EXISTS licenses(
SP_email VARCHAR(100),
service_zip VARCHAR(100),
FOREIGN KEY (SP_email) REFERENCES service_pros (SP_email)
);

#Create bid_request table
CREATE TABLE IF NOT EXISTS bid_request(
request_ID int NOT NULL AUTO_INCREMENT,
zip BIGINT UNSIGNED NOT NULL,
state VARCHAR(100),
city VARCHAR(100),
street VARCHAR(100),
bid_date VARCHAR(100),
service_type VARCHAR(100),
price INT,
HO_email VARCHAR(100),
SP_email VARCHAR(100),
PRIMARY KEY (request_ID)
);

#Create contract table
CREATE TABLE IF NOT EXISTS contract(
contract_ID int NOT NULL AUTO_INCREMENT,
contract_date VARCHAR(100),
service_type VARCHAR(100),
price INT,
SP_email VARCHAR(100),
HO_email VARCHAR(100),
PRIMARY KEY (contract_ID)
);

#Create complaints table
CREATE TABLE IF NOT EXISTS complaints(
complaint_ID int not NULL AUTO_INCREMENT,
contract_ID VARCHAR(100),
contract_date VARCHAR(100),
SP_email VARCHAR(100),
HO_email VARCHAR(100),
PRIMARY KEY (complaint_ID)
);

#Create transaction table
CREATE TABLE IF NOT EXISTS transaction(
transaction_ID int not NULL AUTO_INCREMENT,
HO_email VARCHAR(100),
SP_email VARCHAR(100),
service_type VARCHAR(100),
price INT,
contract_ID VARCHAR(100),
PRIMARY KEY (transaction_ID)
);

# Step 2. Add constraints in this section

# Step 3. Save changes
COMMIT;