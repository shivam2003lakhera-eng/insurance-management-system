-- CLIENTS TABLE

CREATE TABLE clients (client_id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL, email VARCHAR(100) UNIQUE NOT NULL, phone VARCHAR(20) NOT NULL, address TEXT,
 dob DATE NOT NULL, join_date DATE NOT NULL, nominee VARCHAR(100), nominee_relation VARCHAR(50), city VARCHAR(50));


-- POLICIES TABLE

CREATE TABLE policies ( policy_id INT AUTO_INCREMENT PRIMARY KEY, client_id INT NOT NULL, policy_type VARCHAR(100) NOT NULL, start_date DATE NOT NULL,
 end_date DATE NOT NULL, premium DECIMAL(10,2) NOT NULL, FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE );


-- CLAIMS TABLE


CREATE TABLE claims (claim_id INT AUTO_INCREMENT PRIMARY KEY, policy_id INT NOT NULL, claim_date DATE NOT NULL, claim_amount DECIMAL(10,2) NOT NULL,
 claim_status VARCHAR(20) DEFAULT 'Pending',
 FOREIGN KEY (policy_id) REFERENCES policies(policy_id) ON DELETE CASCADE);


-- PAYMENTS TABLE

CREATE TABLE payments (payment_id INT AUTO_INCREMENT PRIMARY KEY, policy_id INT NOT NULL, payment_date DATE NOT NULL, amount DECIMAL(10,2) NOT NULL,
 payment_status VARCHAR(20) DEFAULT 'Pending', payment_method VARCHAR(30),
 FOREIGN KEY (policy_id) REFERENCES policies(policy_id) ON DELETE CASCADE );
 
 
 INSERT INTO clients
(name,email,phone,address,city,dob,join_date,nominee,nominee_relation)
VALUES
('Amit Sharma','amit.sharma@gmail.com','9876543210', 'Shanti Nagar','Katni','1990-05-15','2023-01-10', 'Priya Sharma','Wife'),

('Rahul Verma','rahul.verma@gmail.com','9876543211', 'Gayatri Nagar','Katni','1988-08-22','2023-02-05', 'Neha Verma','Wife'),

('Suresh Patel','suresh.patel@gmail.com','9876543212', 'Sadar','Jabalpur','1993-03-11','2023-03-12', 'Anita Patel','Mother'),

('Vikram Singh','vikram.singh@gmail.com','9876543213', 'Shastri Colony','Katni','1987-09-28','2023-04-23', 'Kavita Singh','Wife'),

('Deepak Joshi','deepak.joshi@gmail.com','9876543214', 'Gandhi Ganj','Katni','1992-07-17','2023-05-08', 'Sunita Joshi','Mother'),

('Rohit Tiwari','rohit.tiwari@gmail.com','9876543215', 'Wright Town','Jabalpur','1995-11-06','2023-06-14', 'Pooja Tiwari','Sister'),

('Manish Dubey','manish.dubey@gmail.com','9876543216', 'Napier Town','Jabalpur','1991-02-09','2023-07-20', 'Meena Dubey','Wife');


INSERT INTO policies
(client_id,policy_type,start_date,end_date,premium)
VALUES
(1,'Life Insurance','2024-06-01','2034-06-01',25000),

(2,'Health Insurance','2024-02-22','2025-02-21',18000),

(3,'Term Insurance','2024-03-07','2044-03-06',22000),

(4,'Motor Insurance','2024-04-11','2025-04-11',12000),

(5,'Child Plan','2024-05-09','2039-05-09',28000),

(6,'Pension Plan','2024-06-28','2046-06-26',32000),

(7,'ULIP Plan','2024-07-15','2039-07-13',35000);

INSERT INTO claims
(policy_id,claim_date,claim_amount,claim_status)
VALUES

(1,'2025-01-10',50000,'Approved'),

(2,'2025-02-15',25000,'Pending'),

(3,'2025-03-12',40000,'Rejected'),

(4,'2025-04-09',15000,'Approved'),

(5,'2025-05-18',30000,'Pending'),

(6,'2025-06-11',45000,'Approved'),

(7,'2025-07-01',38000,'Rejected');
 
 INSERT INTO payments
(policy_id,payment_date,amount,payment_status,payment_method)
VALUES
(1,'2025-01-05',25000,'Completed','Cash'),

(2,'2025-02-08',18000,'Completed','UPI'),

(3,'2025-03-10',22000,'Pending','Cash'),

(4,'2025-04-05',12000,'Completed','Bank Transfer'),

(5,'2025-05-09',28000,'Completed','Bank Transfer'),

(6,'2025-06-15',32000,'Pending','UPI'),

(7,'2025-07-03',35000,'Completed','Cash');
