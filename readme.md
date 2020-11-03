# RestApi
This a simple example of a basic REST API build with Laravel framework. By using this api a user can access data regarding to book records stored in the database.
The endpoints allow the user to get all the attributes of the Book model and also to filter for specific data. Also by using this api the user can edit/delete or search for a single book record.

The main files are contained in the app folder. 
The api is implemented in BookController.php file while the test are implemented in the BookApiTest.php file.
The endpoints are located in api.php file.

INSTALL & Run

1-To run the application you must intsall composer with the command composer install.

2- You must generate an application key with the command php artisan key:generate

3- Add configurations in .env file. You must add a database name and the credentials as in the exmaple below:
    
    Example:(DB_DATABASE=api_test DB_USERNAME=root DB_PASSWORD=secret)

4-Run the migrations to create books table on the database with the command php artisan migrate

Run the app
To run the app use this command php artisan serve

Run Tests

Each test has a special group name in the comments section of the file BookApiTest.php.

To run all tests use this command 

./vendor/bin/phpunit.

To run a single test use the group name in the command 

./vendor/bin/phpunit --group=testname.

Requests

Get all book records
    
    GET http://127.0.0.1:8000/api/books 
    
 Read single book
    
    GET http://127.0.0.1:8000/api/books/{id} 
    
Create a new book 
    
    POST http://127.0.0.1:8000/api/books 
    
Find a single book 
    
    GET http://127.0.0.1:8000/api/books/{bookId} 
    
Update a book record
    
    PUT  http://127.0.0.1:8000/api/books/{id} 
    
Delete a book record
    
DELETE   http://127.0.0.1:8000/api/books/{id} 

