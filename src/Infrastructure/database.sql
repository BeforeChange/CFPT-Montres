CREATE DATABASE cfpt_montres;

USE cfpt_montres;

CREATE TABLE roles (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL
    );

CREATE TABLE users (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    last_name varchar(50) NOT NULL,
    first_name varchar(50) NOT NULL,
    email varchar(50) NOT NULL UNIQUE,
    password_hash varchar(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_role INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_role) REFERENCES roles(id)
    );

CREATE TABLE brands (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL
    );
    
CREATE TABLE versions (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    id_brand INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_brand) REFERENCES brands(id)
    );
    
CREATE TABLE watches (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    image LONGBLOB NOT NULL,
    id_version INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_version) REFERENCES versions(id)
    );
    
CREATE TABLE categories (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL
    );
    
CREATE TABLE watch_categories (
    id_watch INT UNSIGNED NOT NULL,
    id_category INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_watch, id_category),
    FOREIGN KEY (id_watch) REFERENCES watches(id),
    FOREIGN KEY (id_category) REFERENCES categories(id)
    );
  
CREATE TABLE carts (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_user INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
    );
    
CREATE TABLE cart_watches (
    id_cart INT UNSIGNED NOT NULL,
    id_watch INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_cart, id_watch),
    FOREIGN KEY (id_cart) REFERENCES carts(id),
    FOREIGN KEY (id_watch) REFERENCES watches(id)
    );
    
CREATE TABLE purchases (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    buy_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_user INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
    );
    
CREATE TABLE purchase_watches (
    id_purchase INT UNSIGNED NOT NULL,
    id_watch INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_purchase, id_watch),
    FOREIGN KEY (id_purchase) REFERENCES purchases(id),
    FOREIGN KEY (id_watch) REFERENCES watches(id)
    );
    
CREATE TABLE logs (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    message TEXT NOT NULL
    );
    
CREATE INDEX idx_cart_watches_watch ON cart_watches(id_watch);
CREATE INDEX idx_purchase_watches_watch ON purchase_watches(id_watch);
CREATE INDEX idx_watches_version ON watches(id_version);
CREATE INDEX idx_versions_brand ON versions(id_brand);
