DELETE FROM shopping_cart;
DELETE FROM wishlist;
DELETE FROM shipping_forms;
DELETE FROM inquiries;
DELETE FROM post_categories;
DELETE FROM posts;
DELETE FROM items;
DELETE FROM categories;
DELETE FROM admin;
DELETE FROM buyer;
DELETE FROM seller;
DELETE FROM users;

-- Insert sample categories
INSERT INTO categories (name) VALUES 
('Electronics'), 
('Clothing'), 
('Furniture'), 
('Books'),
('Automobiles'), 
('Kitchen Appliances'), 
('Gardening'), 
('Sports Equipment'), 
('Musical Instruments'), 
('Toys'), 
('Art Supplies'), 
('Pet Supplies');

-- Insert sample post categories
INSERT INTO post_categories (post_id, category_id) VALUES 
(1, 1), (2, 2), (3, 3), (4, 4);

-- Insert sample inquiries
INSERT INTO inquiries (item_id, buyer_id, message, response) VALUES 
(1, 3, 'Is the phone unlocked?', 'Yes, it is unlocked.'),
(2, 4, 'Do you have these in other sizes?', 'Yes, we have sizes 9 and 11 available.'),
(3, 3, 'Is assembly difficult?', 'Assembly is fairly straightforward with provided instructions.'),
(4, 4, 'Is this a hardcover or paperback edition?', 'It is a paperback edition.');

-- Insert sample shipping forms
INSERT INTO shipping_forms (item_id, seller_id, buyer_id, shipping_details) VALUES 
(1, 1, 3, 'Item will be shipped within 2 business days via USPS Priority Mail.'),
(2, 2, 4, 'Item will be shipped within 1 business day via FedEx Ground.'),
(3, 1, 3, 'Local pickup available. Contact for details.'),
(4, 2, 4, 'Item will be shipped within 1 business day via USPS Media Mail.');

-- Insert sample wishlist items
INSERT INTO wishlist (user_id, item_id) VALUES (3, 2), (4, 3);

-- Insert sample shopping cart items
INSERT INTO shopping_cart (user_id, item_id) VALUES (3, 1), (4, 4);
