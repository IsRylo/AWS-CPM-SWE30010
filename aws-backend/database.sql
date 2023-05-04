DROP DATABASE IF EXISTS aws_cpm; 
CREATE DATABASE aws_cpm;
USE aws_cpm;

CREATE TABLE managers(
    manager_ID varchar(256) PRIMARY KEY,
    manager_name varchar(256),
    manager_email varchar(256), 
    manager_pass varchar(256)
) engine=InnoDB;

CREATE TABLE customers(
    customer_ID varchar(256) PRIMARY KEY,
    customer_name varchar(256),
    customer_pass varchar(256),
    customer_email varchar(256),
    manager_assigned varchar(256),
    FOREIGN KEY (manager_assigned) REFERENCES managers(manager_ID)
) engine=InnoDB;

CREATE TABLE transactions(
    transaction_ID varchar(256) PRIMARY KEY,
    transaction_Date date,
    transactions_Value float(24),
    transactions_Desc text(65535),
    transactions_Owner varchar(256),
    FOREIGN KEY (transactions_Owner) REFERENCES customers(customer_ID)
) engine=InnoDB;

CREATE TABLE reports(
    report_ID varchar(256) PRIMARY KEY,
    customer_ID varchar(256),
    manager_ID varchar(256),
    report_Description text(65535),
    FOREIGN KEY (customer_ID) REFERENCES customers(customer_ID),
    FOREIGN KEY (manager_ID) REFERENCES managers(manager_ID)
) engine=InnoDB;


-- Assigns managers with the least customers to newly created customers
DELIMITER //
CREATE TRIGGER insert_manager_before_insert_new_customers
BEFORE INSERT ON employee FOR EACH ROW
    BEGIN
        IF NEW.manager_assigned IS NULL THEN SET NEW.manager_assigned = (SELECT managers.manager_ID
            FROM customers AS c
            RIGHT JOIN managers ON customers.manager_assigned = managers.manager_ID
            GROUP BY managers.manager_ID
            ORDER BY COUNT(*) ASC LIMIT 1;)
    END //
DELIMITER ;

-- Selecting the managers with the least manager assigned.
SELECT managers.manager_ID
FROM customers AS c
RIGHT JOIN managers ON customers.manager_assigned = managers.manager_ID
GROUP BY managers.manager_ID
ORDER BY COUNT(*) ASC LIMIT 1;
