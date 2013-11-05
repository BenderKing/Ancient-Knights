CREATE TABLE users (
        id int NOT NULL AUTO_INCREMENT,
        username varchar(250),
        password varchar(50),
        attack int,
        defence int,
        magic int,
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
CREATE TABLE stats (
        id int NOT NULL AUTO_INCREMENT,
        display_name text,
        short_name varchar(10),
        PRIMARY KEY(id)
);
CREATE TABLE user_stats (
        id int NOT NULL AUTO_INCREMENT,
        user_id int,
        stat_id int,
        value text,
        PRIMARY KEY(id)
);
INSERT INTO stats(display_name,short_name) VALUES ('Magic Defence','mdef');
INSERT INTO stats(display_name,short_name) VALUES ('Magic','mag');
INSERT INTO stats(display_name,short_name) VALUES ('Attack','atk');
ALTER TABLE `users` ADD `is_admin` tinyint(1) NOT NULL DEFAULT '0';
ALTER TABLE `users` ADD `last_login` timestamp NULL;
SELECT value
FROM user_stats
WHERE stat_id = (
SELECT id
FROM stats
WHERE display_name = <foo> OR short_name = <foo>)
AND user_id = <bar>
</bar></foo></foo>
