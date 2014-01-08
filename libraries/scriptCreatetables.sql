create database EQV;
CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON EQV.* TO 'newuser'@'localhost';
use EQV;

create table user(
    userName varchar(6) not null,
    password varchar(6),
    description varchar(200),
    primary key (userName)
    );
INSERT INTO user values ("root","999999","adfgsdfugjhasdf");
insert into user values ("jonh","123456","he is one guy");
insert into user values ("Dennis","123456","he is my teacher");
insert into user values ("Robert","123456","it's mee");
insert into user values ("Lazy","123456","a user without articles");

 CREATE TABLE article (
    article_id int NOT NULL AUTO_INCREMENT,
    author varchar(6),
    artCategory varchar(12),
    artText varchar(200),
    artDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    artRate int DEFAULT 0,
    artComNum int DEFAULT 0,
    PRIMARY KEY (article_id),
    FOREIGN KEY (author) REFERENCES user(userName) 
    );
INSERT INTO article (author,artText,artCategory) VALUES ("root","asdfhasdkjfakjshd","restaturant");
INSERT INTO article (author,artText,artCategory) VALUES ("jonh","mi unica idea era camelarte era llevarte a cualquier part","hotel");
INSERT INTO article (author,artText,artCategory) VALUES ("Dennis","mi unica idea era camelarte era llevarte a cualquier parte","interesting");
INSERT INTO article (author,artText,artCategory) VALUES ("Robert","era una tarde tonta y caliente de esas que te pega el sol en la frente","report");
INSERT INTO article (author,artText,artCategory) VALUES ("root","asdfhasdkjfakjshd1","restaurant");
INSERT INTO article (author,artText,artCategory) VALUES ("Robert","1111111111111111111111111111111111111111","hotel");
INSERT INTO article (author,artText,artCategory) VALUES ("Robert","2222222222222222222222222222222222222222","hostel");
INSERT INTO article (author,artText,artCategory) VALUES ("Robert","333333333333333333333333333333333333333333","motel");
INSERT INTO article (author,artText,artCategory) VALUES ("Robert","4444444444444444444444444444444444444444","hotel");
INSERT INTO article (author,artText,artCategory) VALUES ("Robert","55555555555555555555555555555555555555555555555","interesting");
INSERT INTO article (author,artText,artCategory) VALUES ("Robert","6666666666666666666666666666666666666666666666","interesting");

CREATE TABLE comments(
    com_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    art_id int NOT NULL,
    comTitle varchar (12),
    comText varchar (200),
    FOREIGN KEY (art_id) REFERENCES article(article_id) 
    );
    
INSERT INTO comments (art_id,comTitle,comText) VALUES (1,"las rosas", "give me a rouse bouquet");