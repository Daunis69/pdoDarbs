CREATE DATABASE blog;

USE blog;

CREATE TABLE categories(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
category_name VARCHAR(5200) NOT NULL
);

INSERT INTO categories
(category_name)
VALUES
("Svētki"),
("Mūzika"),
("Sports");

CREATE TABLE posts(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
content VARCHAR(5200) NOT NULL,
category_id INT,
FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO posts
(content, category_id)
VALUES
("Lieldienas nāk", 1),
("Šodien bija lieliska koncerta pieredze!", 2);
categories
SELECT posts.*, categories.category_name 
FROM posts 
LEFT JOIN categories ON posts.category_id = categories.id 
WHERE posts.id = 1;


CREATE TABLE coments(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
coment VARCHAR(5200) NOT NULL,
postdate DATETIME,
postid INT,
FOREIGN KEY (postid) REFERENCES posts(id)
);

