INSERT INTO users(user_name, alias, email, password, created_on, updated_on) VALUES('Jonathan Ben-Ammi', 'JBA', 'jben-ammi@gmail.com', 123456789, now(), now());


-- query to be used for inserting a new book with review --
INSERT INTO authors(auth_name) VALUE('JK Rowling');
INSERT INTO books(title, created_on, updated_on, authors_id) VALUES('Harry Potter and the goblet of fire', now(), now(), 1);
-- query to be used for inserting a new book with review and for adding a new review to an existing book --
INSERT INTO reviews(review, rating, users_id, books_id, created_on, updated_on) VALUES('This is by far the best book in the series to date', '5', '2', '3', now(), now());


-- query for selecting book informaiton with reviews --
SELECT books.id AS book_id, books.title, books.author, reviews.id AS review_id, reviews.rating, reviews.review, reviews.created_on, users.alias, users.id as users_id FROM reviews
JOIN users
ON reviews.users_id = users.id
JOIN books
ON reviews.books_id = books.id
WHERE books.id = '2';

-- query for selecting 
SELECT books.id AS book_id, books.title, reviews.id AS review_id, count(reviews.id) AS total_reviews, users.user_name, users.email, users.alias, users.id as users_id FROM reviews
left JOIN users
ON reviews.users_id = users.id
left JOIN books
ON reviews.books_id = books.id
WHERE users.id = '2';

-- user book list query
SELECT books.title, books.id AS book_id FROM reviews 
JOIN users 
ON users_id = users.id 
JOIN books
ON books_id = books.id
where users.id = 2;

-- user page info query
SELECT count(reviews.id) AS total_reviews, user_name, users.email, users.id AS user_id, users.alias FROM reviews 
JOIN users 
ON users_id = users.id 
JOIN books
ON books_id = books.id
Join authors
ON books.authors_id = authors.id
where users.id = 2;

SELECT books.author FROM books;




SELECT reviews.id AS review_id, reviews.review, reviews.rating, reviews.created_on, users.id AS user_id, users.alias, books.title, books.id AS book_id FROM reviews 
JOIN users 
ON users_id = users.id 
JOIN books
ON books_id = books.id
ORDER BY reviews.created_on DESC;

SELECT books.title, books.id FROM books;