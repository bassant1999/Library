CREATE TABLE users (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    mail varchar(255),
    pwd varchar(255),
    type int
);

INSERT INTO users (name, mail, pwd, type)
VALUES ('bassant', 'b@gmail.com', '123456', 0);

INSERT INTO users (name, mail, pwd, type)
VALUES ('b', 'bass@gmail.com', '123456',1);

INSERT INTO users (name, mail, pwd, type)
VALUES ('ba', 'bassant@gmail.com', '123456',1);


CREATE TABLE Book (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    author varchar(255),
    description varchar(800),
    img_url varchar(800),
   max_num int
  added_by int,
 FOREIGN KEY (added_by ) REFERENCES users(id)
);

INSERT INTO Book (title, author, description, max_num, added_by)
VALUES ("Sherlok Holmes 1", "Arthur Conan Doyle", "Watson describes Sherlock Holmes as being more than six feet tall, very lean, with piercing eyes and a thin hawk-like nose. Holmes's voice was high and occasionally strident. We learn later that his eyes were gray and he had a narrow face and black hair. ", 5,  1);

CREATE TABLE Borrow (
   user_id int,
   book_id int,
 FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (book_id) REFERENCES Book(id)
);

ALTER TABLE Borrow
ADD CONSTRAINT PK_Borrow PRIMARY KEY (user_id, book_id);
