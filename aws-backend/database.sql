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
    transaction_Value float(24),
    transaction_Desc text(65535),
    transaction_Owner varchar(256),
    FOREIGN KEY (transaction_Owner) REFERENCES customers(customer_ID)
) engine=InnoDB;

CREATE TABLE reports(
    report_ID varchar(256) PRIMARY KEY,
    customer_ID varchar(256),
    manager_ID varchar(256),
    report_Description text(65535),
    FOREIGN KEY (customer_ID) REFERENCES customers(customer_ID),
    FOREIGN KEY (manager_ID) REFERENCES managers(manager_ID)
) engine=InnoDB;

CREATE TABLE managers_archives(
    manager_ID varchar(256) PRIMARY KEY,
    manager_name varchar(256),
    manager_email varchar(256), 
    delete_date datetime
) engine=InnoDB;

CREATE TABLE customers_archives(
    customer_ID varchar(256) PRIMARY KEY,
    customer_name varchar(256),
    customer_email varchar(256),
    manager_assigned varchar(256),
    delete_date datetime
) engine=InnoDB;

CREATE TABLE transactions_archives(
    transaction_ID varchar(256) PRIMARY KEY,
    transaction_Date date,
    transaction_Value float(24),
    transaction_Desc text(65535),
    transaction_Owner varchar(256),
    delete_date datetime
) engine=InnoDB;

CREATE TABLE reports_archives(
    report_ID varchar(256) PRIMARY KEY,
    customer_ID varchar(256),
    manager_ID varchar(256),
    report_Description text(65535),
    delete_date datetime
) engine=InnoDB;


-- Assigns managers with the least customers to newly created customers
DELIMITER //
CREATE TRIGGER insert_manager_before_insert_new_customers
    BEFORE INSERT ON customers FOR EACH ROW
    BEGIN
        IF NEW.manager_assigned IS NULL THEN 
            SET NEW.manager_assigned = (SELECT managers.manager_ID
            FROM managers
            LEFT JOIN customers ON customers.manager_assigned = managers.manager_ID
            GROUP BY managers.manager_ID
            ORDER BY COUNT(*) LIMIT 1);
        END IF;
    END //
DELIMITER ;

-- Trigger to drop customers
DELIMITER //
CREATE TRIGGER delete_transactions_reports_before_delete_customer
    BEFORE DELETE ON customers FOR EACH ROW
    BEGIN
        INSERT INTO customers_archives VALUES 
        (OLD.customer_ID, OLD.customer_name, OLD.customer_email, OLD.manager_assigned, NOW());
        DELETE FROM transactions WHERE transaction_Owner = OLD.customer_ID;
        DELETE FROM reports WHERE customer_ID = OLD.customer_ID;
    END //
DELIMITER ;

-- Trigger to drop managers
DELIMITER //
CREATE TRIGGER before_delete_manager
    BEFORE DELETE ON managers FOR EACH ROW
    BEGIN
        INSERT INTO managers_archives VALUES 
        (OLD.manager_ID, OLD.manager_name, OLD.manager_email, NOW());
        UPDATE customers SET manager_assigned = NULL WHERE manager_assigned = OLD.manager_ID;
    END //
DELIMITER ;

-- Trigger to drop transactions
DELIMITER //
CREATE TRIGGER before_delete_transactions
    BEFORE DELETE ON transactions FOR EACH ROW
    BEGIN
        INSERT INTO transactions_archives VALUES 
        (OLD.transaction_ID, OLD.transaction_Date, OLD.transaction_Value, OLD.transaction_Desc, OLD.transaction_Owner, NOW());
    END //
DELIMITER ;

-- Trigger to drop reports
DELIMITER //
CREATE TRIGGER before_delete_reports
    BEFORE DELETE ON reports FOR EACH ROW
    BEGIN
        INSERT INTO reports_archives VALUES 
        (OLD.report_ID, OLD.customer_ID, OLD.manager_ID, OLD.report_Description, NOW());
    END //
DELIMITER ;