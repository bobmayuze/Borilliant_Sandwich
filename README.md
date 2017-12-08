# Borilliant_Sandwich
Repo for a great sandwich statistic site

# Getting Started
0. This project is developed with XAMPP, thus XAMPP is recommended for deploying and testing. Go to [XAMPP](https://www.apachefriends.org/index.html) for more information.

If you are a docker user, we have an image published on docker hub. After downloading docker, use 
```
$ docker pull bobmayuze/itws_2110
```
to pull the image and 
```
$  docker run -tid --name itws bobmayuze/itws_2110:latest /bin/zsh
```
To start a container. You may also need [kitematic](https://kitematic.com/) to do port fowarding. Forward the port 80 from container to the host.

Then, you may docker cp to copy the file. Here is an example how I do use this command. For more dockr command, check out [Docker](https://www.docker.com/)

```
$ docker cp /Users/user/Documents/Projects/Borilliant_Sandwich/htdocs itws:/opt/lampp/
```



1. Download from github or unzip it from the zip file
```
$ git clone https://github.com/bobmayuze/Borilliant_Sandwich

```

2. Copy and paste the whole htdocs folder after delete the original one

3. Start XAMPP 
For docker, after run 
```
$ docker exec -ti itws /bin/zsh  
```

type 
```
$ ./opt/lampp/xampp start
```

4. Go to localhost/phpmyadmin, and create a new db called "gredients". Choose the db, and import the file in db_migration/migration.sql

5. Go to the localhost and you are all set.



## Download the project, if you don't have access it, you can 

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

# Challenges we've met and how we solved them
1. Implementation of AngularJS

It was initially difficult to setup the frontend with AngularJS to make sample implementation because some angular elements, like "md-content", are new to us. We solved this by using "div" tags instead. This isn't the best way to solve the problem but it works. 

2. Modularizing frontend and backend

In newer tech stacks, like the MEAN stack, data is mostly passed in the JSON format. In the LAMP stack though, we don't have JSON. It took us quite a while to create a sample endpoint implementation for our frontend team because of this. We were able to solve this problem by using PHP code to collect the data from the SQL table, turn it into a JSON string, and then return the string.

3. CROS, Cross-Origin Request
Sometimes we had problems with cross origin requests. We were able to solve it by adding: 
```
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
```
to the beginning of the PHP code. This then allowed us to use cross origin requests.