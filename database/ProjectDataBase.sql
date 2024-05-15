PRAGMA foreign_keys=OFF;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS seller;
DROP TABLE IF EXISTS buyer;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS post_categories;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS inquiries;
DROP TABLE IF EXISTS shipping_forms;
DROP TABLE IF EXISTS wishlist;
DROP TABLE IF EXISTS shopping_cart;

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    location VARCHAR NOT NULL,
    register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    name VARCHAR NOT NULL
);

CREATE TABLE seller (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE buyer (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE admin (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES users(id)
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
    FOREIGN KEY(seller_id) REFERENCES seller(id),
    FOREIGN KEY(category_id) REFERENCES categories(id)
);

CREATE TABLE post_categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    post_id INTEGER,
    category_id INTEGER,
    FOREIGN KEY(post_id) REFERENCES posts(id),
    FOREIGN KEY(category_id) REFERENCES categories(id)
);

CREATE TABLE inquiries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    item_id INTEGER,
    buyer_id INTEGER,
    message TEXT,
    response TEXT,
    FOREIGN KEY(item_id) REFERENCES items(id),
    FOREIGN KEY(buyer_id) REFERENCES buyer(id)
);

CREATE TABLE shipping_forms (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    item_id INTEGER,
    seller_id INTEGER,
    buyer_id INTEGER,
    shipping_details TEXT,
    FOREIGN KEY(item_id) REFERENCES items(id),
    FOREIGN KEY(seller_id) REFERENCES seller(id),
    FOREIGN KEY(buyer_id) REFERENCES buyer(id)
);

CREATE TABLE wishlist (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    item_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES buyer(id),
    FOREIGN KEY(item_id) REFERENCES items(id)
);

CREATE TABLE shopping_cart (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    item_id INTEGER,
    FOREIGN KEY(user_id) REFERENCES buyer(id),
    FOREIGN KEY(item_id) REFERENCES items(id)
);
