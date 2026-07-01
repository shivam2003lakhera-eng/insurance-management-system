CREATE DATABASE insurance_management;
USE insurance_management;

-- CLIENTS TABLE

CREATE TABLE clients (client_id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL, email VARCHAR(100) UNIQUE NOT NULL, phone VARCHAR(20) NOT NULL, address TEXT,
 dob DATE NOT NULL, join_date DATE NOT NULL, nominee VARCHAR(100), nominee_relation VARCHAR(50), city VARCHAR(50));


-- POLICIES TABLE

CREATE TABLE policies ( policy_id INT AUTO_INCREMENT PRIMARY KEY, policy_type VARCHAR(100) NOT NULL, start_date DATE NOT NULL,
 end_date DATE NOT NULL, premium DECIMAL(10,2) NOT NULL);


-- CLAIMS TABLE


CREATE TABLE claims (claim_id INT AUTO_INCREMENT PRIMARY KEY, client_id INT NOT NULL, policy_id INT NOT NULL, claim_date DATE NOT NULL, claim_amount DECIMAL(10,2) NOT NULL,
 claim_status ENUM( 'Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
 FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE,
 FOREIGN KEY (policy_id) REFERENCES policies(policy_id) ON DELETE CASCADE);


-- PAYMENTS TABLE

CREATE TABLE payments (payment_id INT AUTO_INCREMENT PRIMARY KEY, client_id INT NOT NULL, policy_id INT NOT NULL, payment_date DATE NOT NULL, amount DECIMAL(10,2) NOT NULL,
 payment_status ENUM('Pending', 'Completed' ) DEFAULT 'Pending',
 FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE,
 FOREIGN KEY (policy_id) REFERENCES policies(policy_id) ON DELETE CASCADE );
 
 
 INSERT INTO clients
(name,email,phone,address,dob,join_date,nominee,nominee_relation,city)
VALUES
('Amit Sharma','amit.sharma@gmail.com','9876543210', 'Bhopal, MP','1990-05-15','2023-01-10', 'Priya Sharma','Wife','Bhopal'),

('Rahul Verma','rahul.verma@gmail.com','9876543211', 'Indore, MP','1988-08-22','2023-02-05', 'Neha Verma','Wife','Indore'),

('Suresh Patel','suresh.patel@gmail.com','9876543212', 'Jabalpur, MP','1993-03-11','2023-03-12', 'Anita Patel','Mother','Jabalpur'),

('Vikram Singh','vikram.singh@gmail.com','9876543213', 'Gwalior, MP','1987-09-28','2023-04-01', 'Kavita Singh','Wife','Gwalior'),

('Deepak Joshi','deepak.joshi@gmail.com','9876543214', 'Ujjain, MP','1992-07-17','2023-05-08', 'Sunita Joshi','Mother','Ujjain'),

('Rohit Tiwari','rohit.tiwari@gmail.com','9876543215', 'Sagar, MP','1995-11-06','2023-06-14', 'Pooja Tiwari','Sister','Sagar'),

('Manish Dubey','manish.dubey@gmail.com','9876543216', 'Rewa, MP','1991-02-09','2023-07-20', 'Meena Dubey','Wife','Rewa');


INSERT INTO policies
(policy_type,start_date,end_date,premium)
VALUES
('Life Insurance','2024-01-01','2034-01-01',25000),

('Health Insurance','2024-02-01','2025-02-01',18000),

('Term Insurance','2024-03-01','2044-03-01',22000),

('Motor Insurance','2024-04-01','2025-04-01',12000),

('Child Plan','2024-05-01','2039-05-01',28000),

('Pension Plan','2024-06-01','2046-06-01',32000),

('ULIP Plan','2024-07-01','2039-07-01',35000);

 
 INSERT INTO payments
(client_id,policy_id,payment_date,amount,payment_status)
VALUES
(1,1,'2025-01-05',25000,'Completed'),

(2,2,'2025-02-08',18000,'Completed'),

(3,3,'2025-03-10',22000,'Pending'),

(4,4,'2025-04-05',12000,'Completed'),

(5,5,'2025-05-09',28000,'Completed'),

(6,6,'2025-06-15',32000,'Pending'),

(7,7,'2025-07-03',35000,'Completed');