-- 10:44 - 11:19

-- Selection for all customer data by ID
select * from customers where customer_Email = 'customer1@gmail.com';

-- Selection for all customer data by wrong ID
select * from customers where customer_Email = 'wrongemail@gmail.com';

-- Selection for all manager data by ID
select * from managers where manager_Email = 'manager1@gmail.com';

-- Selection for all manager data by wrong ID
select * from managers where manager_Email = 'some random stirng ';

-- Selection for all transaction data by customer ID
select * from transactions where transaction_Owner = 'dea26157fa355301663174eac368538cff8939f36681d6712dedba439ab98b70';

-- Selection for all transaction data by wrong customer ID
select * from transactions where transaction_Owner = 'wrongcustomerID';

-- Selection for all report data by customer ID
select * from reports where customer_id = 'dea26157fa355301663174eac368538cff8939f36681d6712dedba439ab98b70';

-- Selection for all report data by wrong customer ID
select * from reports where customer_id = 'wrongcustomerID';

-- (newmanager, newcustomer)
-- Insertion for manager, customer, transaction, and report data using correct ID.
INSERT INTO managers VALUES
('f967bd65a4551290a52b88f7f64a34ca6b5847c0cd6b2c3650e0695a520d6f9e', 'Manager Loysing', 'manager3@gmail.com', 'f967bd65a4551290a52b88f7f64a34ca6b5847c0cd6b2c3650e0695a520d6f9e');
INSERT INTO customers VALUES
('d1967cf8e156c346a9282d490b88e5c6f5f9ee2ea89dc9606027a6ef4af6ea04', "John Dorian Jr. ", 'd1967cf8e156c346a9282d490b88e5c6f5f9ee2ea89dc9606027a6ef4af6ea04', 'customer5@gmail.com', '9d05b6092d975b0884c6ba7fadb283ced03da9822ebbd13cc6b6d1855a6495ec');
INSERT INTO transactions VALUES
('f96768d60f42242ab3440d13eebbe9e616ac556941cf9746bf9ae5c920ac74f0', '2022-02-25', 5021.20, 'Monthly Profits', 'd1967cf8e156c346a9282d490b88e5c6f5f9ee2ea89dc9606027a6ef4af6ea04');
INSERT INTO reports VALUES
('4ca3168d66e2d300c67dc03a5c7bda4a82989e705104c9a60c361e6083704b61', 'd1967cf8e156c346a9282d490b88e5c6f5f9ee2ea89dc9606027a6ef4af6ea04', 'f967bd65a4551290a52b88f7f64a34ca6b5847c0cd6b2c3650e0695a520d6f9e', 'Do not invest in anything yet');

-- Insertion for manager, customer, transaction, and report data using wrong customer ID.
INSERT INTO managers VALUES
(NULL, 'Manager Loysing', 'manager3@gmail.com', 'f967bd65a4551290a52b88f7f64a34ca6b5847c0cd6b2c3650e0695a520d6f9e');
INSERT INTO customers VALUES
('d1967cf8e156c346a9282d490b88e5c6f5f9ee2ea89dc9606027a6ef4af6ea04', "John Dorian ", 'd1967cf8e156c346a9282d490b88e5c6f5f9ee2ea89dc9606027a6ef4af6ea04', 'customer5@gmail.com', 'wrongmanagerID');
INSERT INTO transactions VALUES
('4ca3168d66e2d300c67dc03a5c7bda4a82989e705104c9a60c361e6083704b61', '2022-02-25', 5021.20, 'Monthly Profits', 'wrongcustomerID');
INSERT INTO reports VALUES
('0789f2af7b3d6c1e16f680ea850431adc195dbea458b488bee85ad618be1afae', 'd1967cf8e156c346a9282d490b88e5c6f5f9ee2ea89dc9606027a6ef4af6ea04', 'wrongmanagerID', 'Do not invest in anything yet');

-- Testing the trigger during customer insertion with null manager_assigned 
INSERT INTO customers VALUES
('40da051f5f56be1cdeaeac8e9736d53542798ce999b9e08f484c414c9c20e55b', "Mary Louis", '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'password@gmail.com', NULL);

-- Update for manager, customer, transaction, and report data using correct ID.
UPDATE managers SET manager_Name = 'Changed manager name' WHERE manager_Email = 'manager1@gmail.com';
UPDATE customers SET customer_Name = 'Changed customer name' WHERE customer_Email = 'customer1@gmail.com';
UPDATE transactions SET transaction_Desc = 'Profits to hello' WHERE transaction_ID = 'f96768d60f42242ab3440d13eebbe9e616ac556941cf9746bf9ae5c920ac74f0';
UPDATE reports SET report_Description = 'You should not invest at all' WHERE report_ID = '0789f2af7b3d6c1e16f680ea850431adc195dbea458b488bee85ad618be1afae';

-- Update for manager, customer, transaction, and report data using wrong customer ID.
UPDATE managers SET manager_Name = 'Changed manager name' WHERE manager_Email = 'wrong@gmail.com';
UPDATE customers SET customer_Name = 'Changed customer name' WHERE customer_Email = 'wrong@gmail.com';
UPDATE transactions SET transaction_Desc = 'Profits to hello' WHERE transaction_ID = 'wrong ';
UPDATE reports SET report_Description = 'You should not invest at all' WHERE report_ID = 'wrong';

-- Delete for manager, customer, transaction, and report data using correct ID.
DELETE FROM reports WHERE report_ID = 'bcec6f1140d4353d83c8b06479a63515c941b44f3997787e6d181e8aea281ad2';
DELETE FROM transactions WHERE transaction_ID = '03645ecb208448a16bc31d26347c2f8065ed1f53f15689e3b551cd871b6c5fcd';
DELETE FROM customers WHERE customer_Email = 'customer2@gmail.com';
DELETE FROM managers WHERE manager_Email = 'manager2@gmail.com';


-- Delete for manager, customer, transaction, and report data using wrong customer ID.
DELETE FROM customers WHERE customer_Email = 'wrong@gmail.com';
DELETE FROM managers WHERE manager_Email = 'wrong@gmail.com';
DELETE FROM reports WHERE report_ID = 'not an id';
DELETE FROM transactions WHERE transaction_ID = 'not an id';


-- Testing: 11:25 - 12:05