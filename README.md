# Borilliant_Sandwich
Repo for a great sandwich statistic site


# TODO 
- Backend
    - Fix the allProducts.php(Honghao)
- Frontend
    - New footer(Chelsea)
    - Put random name for generated combos(Chelsea)
    - Make generate button into an actual button looklike(Chelsea)
    - Link to user login, and analytics (Yuze)
- WriteUp
    - Fix the English(Jonathon, Andrew)
    - Purpose of the project (Jonathon, Andrew)
    - How to setup(Yuze)
    - Fixing code structure(Yuze)
    - Comment code($creater)

# Progress
1.DB migtation
    - tbl_ingredient_vegetable (Andrew)
    - tbl_ingredient_meat (Andrew)
    - tbl_ingredient_cheese (Chelsa)
    - tbl_ingredient_sauce (Hangen)
    - tbl_ingredient_bread (Hangen)

2.User framework implementaion 
    - Sign up
    - Sign out
    - Log in
3.Endpoint implementation 
- [0]Get bread list
    - Endpoint: GET /api/ingredient/bread.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
- [1]Get meat list
    - Endpoint: GET /api/ingredient/meat.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
- [2]Get cheese list
    - Endpoint: GET /api/ingredient/cheese.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
- [3]Get vegetables list
    - Endpoint: GET /api/ingredient/vegetable.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
- [4]Get sauce list
    - Endpoint: GET /api/ingredient/sauce.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
- [5]Get product list
    - Endpoint: GET /api/products.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
- [6]Get product by user id
    - Endpoint: GET /api/user_id.php
    - Authorization: user
    - Request Body: Empty
    - Response: 200
- [7]Get all product list
    - Endpoint: GET /api/allProducts.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
- [8]Calculate calories 
    - Endpoint: GET /api/getCalories.php
    - Authorization: public
    - Request Body: product id
    - Response: 200
- [9]Get most popular ingredients
    - Endpoint: GET /api/analytics.php
    - Authorization: public
    - Request Body: Empty
    - Response: 200
