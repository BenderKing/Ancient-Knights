CREATE TABLE users (
        id int NOT NULL AUTO_INCREMENT,
        username varchar(250),
        password varchar(50),
        PRIMARY KEY(id)
);
CREATE TABLE items (
        id int NOT NULL AUTO_INCREMENT,
        name varchar(200),
        description text,
        PRIMARY KEY(id)
);
CREATE TABLE user_inventory (
        id int NOT NULL AUTO_INCREMENT,
        item_id int,
        user_id int,
        quantity int,
        PRIMARY KEY(id)
);
