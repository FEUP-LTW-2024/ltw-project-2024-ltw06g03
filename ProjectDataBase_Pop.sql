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


-- Insert sample users
INSERT INTO users (username, password, email, location) VALUES 
('seller1', 'seller1pass', 'seller1@example.com', 'Location A'),
('seller2', 'seller2pass', 'seller2@example.com', 'Location B'),
('buyer1', 'buyer1pass', 'buyer1@example.com', 'Location C'),
('buyer2', 'buyer2pass', 'buyer2@example.com', 'Location D'),
('admin1', 'admin1pass', 'admin1@example.com', 'Location E');

-- Insert sample seller records
INSERT INTO seller (user_id) VALUES (1), (2);

-- Insert sample buyer records
INSERT INTO buyer (user_id) VALUES (3), (4);

-- Insert sample admin records
INSERT INTO admin (user_id) VALUES (5);

-- Insert sample categories
INSERT INTO categories (name) VALUES 
('Electronics'), ('Clothing'), ('Furniture'), ('Books');

-- Insert sample items
INSERT INTO items (seller_id, category_id, brand, model, size, condition, price) VALUES 
(1, 1, 'Apple', 'iPhone X', 'N/A', 'Used', 500),
(2, 2, 'Nike', 'Air Max 270', 'US 10', 'New', 150),
(1, 3, 'IKEA', 'Billy Bookcase', 'N/A', 'Used', 50),
(2, 4, 'Penguin Books', '1984 by George Orwell', 'N/A', 'New', 10);

-- Insert sample posts
INSERT INTO posts (item_id, description) VALUES 
(1, 'Used iPhone X in good condition, unlocked, with charger and box.'),
(2, 'New Nike Air Max 270, size US 10, available in multiple colors.'),
(3, 'IKEA Billy Bookcase in oak finish, lightly used, assembly required.'),
(4, 'Brand new copy of 1984 by George Orwell, paperback edition.');

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
