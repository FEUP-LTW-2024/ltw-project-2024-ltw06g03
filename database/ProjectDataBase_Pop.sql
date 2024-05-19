DELETE FROM shopping_cart;
DELETE FROM wishlist;
DELETE FROM shipping_forms;
DELETE FROM inquiries;
DELETE FROM post_categories;
DELETE FROM items;
DELETE FROM categories;
DELETE FROM admin;
DELETE FROM buyer;
DELETE FROM seller;
DELETE FROM users;

INSERT INTO users (username,password,email,name) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.com', 'Mr. Admin'),
('teste', '1234', 'teste@teste.com', 'Teste');

INSERT INTO seller (user_id) VALUES (1);
INSERT INTO buyer (user_id) VALUES (1);
INSERT INTO admin (user_id) VALUES (1);

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
('Pet Supplies'),
('Other');
-- Insert sample items
INSERT INTO items (seller_id, category_id, brand, model, condition, price, description, title) VALUES 
(1, 1, 'Apple', 'iPhone X', 'Used', 500, 'Used iPhone X in good condition, unlocked, with charger and box.', 'Used iPhone X'),
(1, 2, 'Nike', 'Air Max 270', 'New', 150, 'New Nike Air Max 270, size US 10, available in multiple colors.', 'New Nike Air Max 270'),
(1, 3, 'IKEA', 'Billy Bookcase', 'Used', 50, 'IKEA Billy Bookcase in oak finish, lightly used, assembly required.', 'Used IKEA Billy Bookcase'),
(1, 4, 'Penguin Books', '1984 by George Orwell', 'New', 10, 'Brand new copy of 1984 by George Orwell, paperback edition.', 'New 1984 by George Orwell'),
(1, 1, 'Apple', 'iPhone 11', 'Used', 600, 'Used iPhone 11 in good condition, unlocked, with charger and box.', 'Used iPhone 11'),
(1, 2, 'Nike', 'Air Max 720', 'New', 200, 'New Nike Air Max 720, size US 10, available in multiple colors.', 'New Nike Air Max 720'),
(1, 3, 'IKEA', 'Kallax Shelf Unit', 'Used', 60, 'IKEA Kallax Shelf Unit in oak finish, lightly used, assembly required.', 'Used IKEA Kallax Shelf Unit'),
(1, 4, 'Penguin Books', 'Animal Farm by George Orwell', 'New', 15, 'Brand new copy of Animal Farm by George Orwell, paperback edition.', 'New Animal Farm by George Orwell'),
(1, 1, 'Apple', 'iPhone 12', 'Used', 700, 'Used iPhone 12 in good condition, unlocked, with charger and box.', 'Used iPhone 12'),
(1, 2, 'Nike', 'Air Max 90', 'New', 250, 'New Nike Air Max 90, size US 10, available in multiple colors.', 'New Nike Air Max 90'),
(1, 3, 'IKEA', 'Malm Dresser', 'Used', 80, 'IKEA Malm Dresser in white finish, lightly used, assembly required.', 'Used IKEA Malm Dresser'),
(1, 4, 'Penguin Books', 'Brave New World by Aldous Huxley', 'New', 12, 'Brand new copy of Brave New World by Aldous Huxley, paperback edition.', 'New Brave New World by Aldous Huxley'),
(1, 5, 'Toyota', 'Camry', 'Used', 20000, 'Used Toyota Camry 2018 in excellent condition, clean title, 30,000 miles.', 'Used Toyota Camry 2018'),
(1, 6, 'KitchenAid', 'Blender', 'New', 100, 'New KitchenAid Blender, 5-Speed Diamond, available in multiple colors.', 'New KitchenAid Blender'),
(1, 7, 'DeWalt', 'Circular Saw', 'Used', 80, 'Used DeWalt Circular Saw, 15-Amp, with blade and case.', 'Used DeWalt Circular Saw'),
(1, 8, 'Wilson', 'Tennis Balls', 'New', 5, 'New Wilson Tennis Balls, 3-pack, US Open edition.', 'New Wilson Tennis Balls'),
(1, 9, 'Yamaha', 'Keyboard', 'Used', 300, 'Used Yamaha Keyboard, PSR-E363, with stand and power adapter.', 'Used Yamaha Keyboard'),
(1, 10, 'LEGO', 'Star Wars X-Wing Starfighter', 'New', 80, 'New LEGO Star Wars X-Wing Starfighter, 730 pieces, ages 8+.', 'New LEGO Star Wars X-Wing Starfighter'),
(1, 11, 'Winsor & Newton', 'Oil Paint Set', 'Used', 40, 'Used Winsor & Newton Oil Paint Set, 12 tubes, with palette and brushes.', 'Used Winsor & Newton Oil Paint Set'),
(1, 12, 'Purina', 'Cat Food', 'New', 15, 'New Purina Cat Food, Friskies Classic Pate, Variety Pack, 24 cans.', 'New Purina Cat Food'),
(1, 1, 'Samsung', 'Galaxy S9', 'Used', 300, 'Used Samsung Galaxy S9 in good condition, unlocked, with charger and box.', 'Used Samsung Galaxy S9'),
(1, 2, 'Adidas', 'NMD R1', 'New', 120, 'New Adidas NMD R1, size US 10, available in multiple colors.', 'New Adidas NMD R1'),
(1, 5, 'Toyota', 'Corolla', 'Used', 15000, 'Used Toyota Corolla 2015 in good condition, clean title, 60,000 miles.', 'Used Toyota Corolla 2015'),
(1, 6, 'KitchenAid', 'Stand Mixer', 'New', 300, 'New KitchenAid Stand Mixer, 5-Qt, available in multiple colors.', 'New KitchenAid Stand Mixer'),
(1, 7, 'Black+Decker', 'Cordless Drill', 'Used', 50, 'Used Black+Decker Cordless Drill, 20V, with charger and extra battery.', 'Used Black+Decker Cordless Drill'),
(1, 8, 'Wilson', 'Tennis Racket', 'New', 100, 'New Wilson Tennis Racket, Ultra 100, grip size 4 3/8.', 'New Wilson Tennis Racket'),
(1, 9, 'Yamaha', 'Acoustic Guitar', 'Used', 200, 'Used Yamaha Acoustic Guitar, FG800, with case and capo.', 'Used Yamaha Acoustic Guitar'),
(1, 10, 'LEGO', 'Star Wars Millennium Falcon', 'New', 150, 'New LEGO Star Wars Millennium Falcon, 7,541 pieces, ages 16+.', 'New LEGO Star Wars Millennium Falcon'),
(1, 11, 'Winsor & Newton', 'Watercolor Set', 'Used', 50, 'Used Winsor & Newton Watercolor Set, 24 half pans, with brushes.', 'Used Winsor & Newton Watercolor Set'),
(1, 12, 'Purina', 'Dog Food', 'New', 20, 'New Purina Dog Food, Pro Plan Savor, Shredded Blend Adult Chicken & Rice, 35 lb bag.', 'New Purina Dog Food'),
(1, 1, 'Samsung', 'Galaxy S10', 'Used', 400, 'Used Samsung Galaxy S10 in good condition, unlocked, with charger and box.', 'Used Samsung Galaxy S10'),
(1, 2, 'Adidas', 'Ultra Boost', 'New', 180, 'New Adidas Ultra Boost, size US 10, available in multiple colors.', 'New Adidas Ultra Boost');

--Insert sample post_categories
INSERT INTO post_categories (item_id, category_id) VALUES 
(1, 1), 
(2, 2), 
(3, 3), 
(4, 4);

-- Insert sample inquiries
INSERT INTO inquiries (item_id, buyer_id, message, response) VALUES 
(1, 3, 'Is the phone unlocked?', 'Yes, it is unlocked.'),
(2, 4, 'Do you have these in other sizes?', 'Yes, we have sizes 9 and 11 available.'),
(3, 3, 'Is assembly difficult?', 'Assembly is fairly straightforward with provided instructions.'),
(4, 4, 'Is this a hardcover or paperback edition?', 'It is a paperback edition.');

-- Insert sample wishlist items
INSERT INTO wishlist (user_id, item_id) VALUES (3, 2), (4, 3);

-- Insert sample shopping cart items
INSERT INTO shopping_cart (user_id, item_id) VALUES (3, 1), (4, 4);

-- Insert sample chats
INSERT INTO chat (sender_id, receiver_id) VALUES 
(1, 2), 
(2, 1);

-- Insert sample messages
INSERT INTO messages (chat_id, sender_id, receiver_id, message) VALUES 
(1, 1, 2, 'Hello, how are you?'),
(1, 2, 1, 'I am fine, thank you. How about you?'),
(1, 2, 1, 'Hey, are you there?'),
(1, 1, 2, 'Yes, I am here. What can I do for you?');
