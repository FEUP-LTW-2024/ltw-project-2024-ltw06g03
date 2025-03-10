PRAGMA foreign_keys=OFF;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS seller;
DROP TABLE IF EXISTS buyer;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS post_categories;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS inquiries;
DROP TABLE IF EXISTS shipping_forms;
DROP TABLE IF EXISTS wishlist;
DROP TABLE IF EXISTS shopping_cart;
DROP TABLE IF EXISTS chat;
DROP TABLE IF EXISTS messages;
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    location VARCHAR,
    register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    name VARCHAR NOT NULL
);

CREATE TABLE seller (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE buyer (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE admin (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR NOT NULL
);

CREATE TABLE items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    seller_id INTEGER,
    category_id INTEGER,
    brand VARCHAR NOT NULL,
    model VARCHAR NOT NULL,
    condition VARCHAR NOT NULL,
    price INTEGER NOT NULL,
    description VARCHAR NOT NULL,
    title VARCHAR NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(seller_id) REFERENCES seller(id) ON DELETE CASCADE, 
    FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE post_categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    item_id INTEGER,
    category_id INTEGER,
    FOREIGN KEY(item_id) REFERENCES items(id) ON DELETE CASCADE,
    FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE inquiries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    item_id INTEGER,
    buyer_id INTEGER,
    message TEXT,
    response TEXT,
    FOREIGN KEY(item_id) REFERENCES items(id) ON DELETE CASCADE,
    FOREIGN KEY(buyer_id) REFERENCES buyer(id) ON DELETE CASCADE
);

CREATE TABLE shipping_forms (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    item_id INTEGER,
    seller_id INTEGER,
    buyer_id INTEGER,
    shipping_details VARCHAR NOT NULL,
    quantity INTEGER,
    FOREIGN KEY(item_id) REFERENCES items(id),
    FOREIGN KEY(seller_id) REFERENCES seller(id) ON DELETE CASCADE,
    FOREIGN KEY(buyer_id) REFERENCES buyer(id) ON DELETE CASCADE
);

CREATE TABLE wishlist (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    item_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES buyer(id) ON DELETE CASCADE,
    FOREIGN KEY(item_id) REFERENCES items(id) ON DELETE CASCADE
);

CREATE TABLE shopping_cart (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    item_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES buyer(id) ON DELETE CASCADE,
    FOREIGN KEY(item_id) REFERENCES items(id) ON DELETE CASCADE
);

CREATE TABLE chat (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    sender_id INTEGER,
    receiver_id INTEGER,   
    FOREIGN KEY(sender_id) REFERENCES users(id),
    FOREIGN KEY(receiver_id) REFERENCES users(id)
);

CREATE TABLE messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    chat_id INTEGER,
    sender_id INTEGER,
    receiver_id INTEGER,
    message TEXT,
    FOREIGN KEY(chat_id) REFERENCES chat(id),
    FOREIGN KEY(sender_id) REFERENCES users(id),
    FOREIGN KEY(receiver_id) REFERENCES users(id)
);