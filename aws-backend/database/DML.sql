USE aws_cpm;

-- Insert managers (manager1 and manager 2)
INSERT INTO managers VALUES
('380f9771d2df8566ce2bd5b8ed772b0bb74fd6457fb803ab2d267c394d89c750', 'Manager Dorian', 'manager1@gmail.com', '380f9771d2df8566ce2bd5b8ed772b0bb74fd6457fb803ab2d267c394d89c750'),
('9d05b6092d975b0884c6ba7fadb283ced03da9822ebbd13cc6b6d1855a6495ec', 'Manager Hassan', 'manager2@gmail.com', '9d05b6092d975b0884c6ba7fadb283ced03da9822ebbd13cc6b6d1855a6495ec');

-- Insert customers (customer1, customer 2, and customer 3)
INSERT INTO customers VALUES
('dea26157fa355301663174eac368538cff8939f36681d6712dedba439ab98b70', "John Dorian ", 'dea26157fa355301663174eac368538cff8939f36681d6712dedba439ab98b70', 'customer1@gmail.com', '380f9771d2df8566ce2bd5b8ed772b0bb74fd6457fb803ab2d267c394d89c750'),
('c8c7cb5b9e8f7a1b3d1d02602ada62327132391dbe0e8ee07913cd550eea1f3b', "James Lily", 'c8c7cb5b9e8f7a1b3d1d02602ada62327132391dbe0e8ee07913cd550eea1f3b', 'customer2@gmail.com', '9d05b6092d975b0884c6ba7fadb283ced03da9822ebbd13cc6b6d1855a6495ec'),
('18c5c9be898c65c5e5c51ac3e94feacff0b991f8463a3a18eb524e9f7e6131a8', 'Patrick Doyle', '18c5c9be898c65c5e5c51ac3e94feacff0b991f8463a3a18eb524e9f7e6131a8', 'customer3@gmail.com', '9d05b6092d975b0884c6ba7fadb283ced03da9822ebbd13cc6b6d1855a6495ec');

-- Insert Transactions (trans1, trans2, trans3)
INSERT INTO transactions VALUES
('1f0887801b76b9223b3c73a60205b647f2652bb64d2d37630c30b4f39f907bc7', '2016-02-25', 509.20, 'Coal Investment Dividents', 'dea26157fa355301663174eac368538cff8939f36681d6712dedba439ab98b70'),
('92afb464e471ed6b58c1fbe0ae16853d1b05f325c125d8cc0451b607fbe1e21b', '2016-12-25', -5.20, 'Parking Ticket', 'dea26157fa355301663174eac368538cff8939f36681d6712dedba439ab98b70'),
('bb9c7f7b3d92b502f0e312c557ba285f49542dd8f783090753fc052f22028535', '2018-02-20', 1205.30, 'Weekly Salary', 'c8c7cb5b9e8f7a1b3d1d02602ada62327132391dbe0e8ee07913cd550eea1f3b'),
('03645ecb208448a16bc31d26347c2f8065ed1f53f15689e3b551cd871b6c5fcd', '2018-03-15', 1205.30, 'Weekly Salary', 'c8c7cb5b9e8f7a1b3d1d02602ada62327132391dbe0e8ee07913cd550eea1f3b'),
('b78f1bfebf58b83d4f474ecb296defcfb923650c94c13d7665e2d73b15fcdb33', '2019-11-10', 121120.30, 'Apple Shares Sold', '18c5c9be898c65c5e5c51ac3e94feacff0b991f8463a3a18eb524e9f7e6131a8'),
('c85ac8c6f65a19a7baaeb10d1683b9dd3c116aac081e65fabcda4ba2001be8b5', '2006-03-26', -1520.30, 'Real Estate Tax', '18c5c9be898c65c5e5c51ac3e94feacff0b991f8463a3a18eb524e9f7e6131a8');

-- Insert a Financial Report/Advice from a manager to a customer
INSERT INTO reports VALUES
('0789f2af7b3d6c1e16f680ea850431adc195dbea458b488bee85ad618be1afae', 'dea26157fa355301663174eac368538cff8939f36681d6712dedba439ab98b70', '380f9771d2df8566ce2bd5b8ed772b0bb74fd6457fb803ab2d267c394d89c750', 'Invest into Apple stocks for $1200'),
('bcec6f1140d4353d83c8b06479a63515c941b44f3997787e6d181e8aea281ad2', 'c8c7cb5b9e8f7a1b3d1d02602ada62327132391dbe0e8ee07913cd550eea1f3b', '9d05b6092d975b0884c6ba7fadb283ced03da9822ebbd13cc6b6d1855a6495ec', 'Invest into crypto for about 0.002 ETH'),
('0743f68ea330bc0db40493845e15740e92ebc3d2f8094c730a31b28a9951d066', '18c5c9be898c65c5e5c51ac3e94feacff0b991f8463a3a18eb524e9f7e6131a8', '9d05b6092d975b0884c6ba7fadb283ced03da9822ebbd13cc6b6d1855a6495ec', 'Invest into Real estate about $50000');
