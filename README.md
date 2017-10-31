# Borilliant_Sandwich
Repo for a great sandwich statistic site


# Helpful pages:

1.[CRUD with php](https://github.com/chapagain/crud-php-simple)

2.[CRUD with php and angularjs](http://angularcode.com/demo-of-a-simple-crud-restful-php-service-used-with-angularjs-and-mysql/)

3.[CRUD with php and angularjs](https://www.youtube.com/watch?v=Y_nJIp0UqI0)

# Meeting record

## Oct, 30th 
- Database schema is determined
- (possibly) Finish the DB migration file, others can import it on phpmyadmin

# TODO 
- Backend:
    - User framework implementaion 
        - Sign up
        - Sign out?
        - Log in
    - Endpoint implementation 
        - [0]Get bread list
            Endpoint: GET /api/ingredient/bread
            Authorization: public
            Request Body: Empty
            Response: 200
        - [1]Get meat list
            Endpoint: GET /api/ingredient/meat
            Authorization: public
            Request Body: Empty
            Response: 200
        - [2]Get cheese list
            Endpoint: GET /api/ingredient/cheese
            Authorization: public
            Request Body: Empty
            Response: 200
        - [3]Get vegetables list
            Endpoint: GET /api/ingredient/vegetabl
            Authorization: public
            Request Body: Empty
            Response: 200
        - [4]Get sauce list
            Endpoint: GET /api/ingredient/sauce
            Authorization: public
            Request Body: Empty
            Response: 200
        - [5]Get product list
            Endpoint: GET /api/products
            Authorization: public
            Request Body: Empty
            Response: 200
        - [6]Get product by user id
            Endpoint: GET /api/:user_id
            Authorization: user
            Request Body: Empty
            Response: 200
