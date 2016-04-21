INSERT INTO users(user_name, alias, email, password, created_on, updated_on) VALUES('Jonathan Ben-Ammi', 'JBA', 'jben-ammi@gmail.com', 123456789, now(), now());


-- query to be used for inserting a new book with review --
INSERT INTO books(title, author, created_on, updated_on) VALUES('Harry Potter and the goblet of fire', 'JK Rowling', now(), now());
-- query to be used for inserting a new book id with review and for adding a new review to an existing book --
SELECT books.id FROM books
WHERE books.title = 'Harry Potter and the goblet of fire'
ORDER BY books.created_on DESC;
-- query to be used for inserting a new book with review and for adding a new review to an existing book --
INSERT INTO users_books(users_id, books_id) VALUES('2', '3');
-- query to be used for inserting a new book with review and for adding a new review to an existing book --
INSERT INTO reviews(review, rating, users_id, books_id, created_on, updated_on) VALUES('This is by far the best book in the series to date', '5', '2', '3', now(), now());


-- query for selecting book informaiton with reviews --
SELECT books.id AS book_id, books.title, books.author, reviews.id AS review_id, reviews.rating, reviews.review, reviews.created_on, users.alias, users.id as users_id FROM books
JOIN users_books
ON users_books.books_id = books.id
JOIN users
ON users_books.users_id = users.id
JOIN reviews
ON reviews.users_id = users.id
WHERE books.id = '2';

-- query for selecting user informaiton with posted info --
SELECT books.id AS book_id, books.title, reviews.id AS review_id, count(reviews.id) AS total_reviews, users.user_name, users.email, users.alias, users.id as users_id FROM books
JOIN users_books
ON users_books.books_id = books.id
JOIN users
ON users_books.users_id = users.id
JOIN reviews
ON reviews.users_id = users.id
WHERE users.id = '2';

-- reviews.id as r_id, rating, users_id, review, user_name, books_id 
SELECT reviews.id AS review_id, reviews.review, reviews.rating, reviews.created_on, users.id AS user_id, users.alias, books.title, books.id AS book_id FROM reviews 
JOIN users 
ON users_id = users.id 
JOIN books
ON books_id = books.id;


SELECT books.title, books.id FROM books;