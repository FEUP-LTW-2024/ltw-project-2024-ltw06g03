PRAGMA foreign_keys=OFF;

CREATE TABLE users (
    id INTEGER  PRIMARY KEY AUTOINCREMENT,
    username VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    location VARCHAR NOT NULL,
    register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE seler (
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


CREATE TABLE posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    modle VARCHAR NOT NULL,
    size VARCHAR NOT NULL,
    condition VARCHAR NOT NULL,
    brand VARCHAR NOT NULL,
    price INTEGER NOT NULL,
    seler_id INTEGER,
    FOREIGN KEY(seler_id) REFERENCES seler(id)
);

CREATE TABLE categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR NOT NULL
);

CREATE TABLE post_categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    post_id INTEGER,
    category_id INTEGER,
    FOREIGN KEY(post_id) REFERENCES posts(id),
    FOREIGN KEY(category_id) REFERENCES categories(id)
);

CREATE TABLE images (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    post_id INTEGER,
    image ...,
    FOREIGN KEY(post_id) REFERENCES posts(id)
);