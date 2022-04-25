-- SQLite
-- CREATE TABLE article (
--     id INTEGER PRIMARY KEY AUTOINCREMENT,
--     img VARCHAR(150),
--     article VARCHAR(150),
--     content TEXT,
--     prix INTERGER,
--     quantiter INTERGER
--     );

-- CREATE TABLE admin (
--     id  INTEGER PRIMARY KEY AUTOINCREMENT,
--     user VARCHAR(150),
--     password VARCHAR(150)
--     );



--INSERT INTO article (img, article, content, prix, quantiter) VALUES ('https://picsum.photos/200/300', 'Drone X1', 'Drone facile à utiliser', 120, 10);

-- DELETE FROM article 


--  DROP TABLE admin

--INSERT INTO admin (user,password) VALUES ('admin','secret')


--ALTER TABLE article ADD COLUMN type VARCHAR(150) ; 

--ALTER TABLE article ADD COLUMN promo INTEGER ; 

--UPDATE article SET type = 'Article' WHERE id = 1;


--ALTER TABLE article DROP COLUMN type; 

--ALTER TABLE article ADD COLUMN category VARCHAR(150) ;


--UPDATE article SET category = 'Article' WHERE id = 1;

--DELETE FROM article WHERE id = 4


--SELECT * FROM article WHERE category = 'article'

UPDATE article SET category = 'article' WHERE id = 6