# Team 7

Jonathan Caicedo, Chelsea Carlson, Andrew Leaf, Honghao Li, Yuze Ma 

# Borilliant_Sandwich
Repo for a great sandwich statistic site

# Getting Started
*This project is developed with XAMPP, thus XAMPP is recommended for deploying and testing. Go to [XAMPP](https://www.apachefriends.org/index.html) for more information.*

## If you are a docker user, we have an image published on docker hub. After downloading docker, use 
```
$ docker pull bobmayuze/itws_2110
```
to pull the image and 
```
$  docker run -tid --name itws bobmayuze/itws_2110:latest /bin/zsh
```
To start a container. You may also need [kitematic](https://kitematic.com/) to do port fowarding. Forward the port 80 from container to the host.

Then, you may use docker cp to copy the file. Here is an example how I use this command. For more dockr commands, check out [Docker](https://www.docker.com/)

```
$ docker cp /Users/user/Documents/Projects/Borilliant_Sandwich/htdocs itws:/opt/lampp/
```



1. Download from github or unzip it from the zip file
```
$ git clone https://github.com/bobmayuze/Borilliant_Sandwich

```

2. Copy and paste the whole htdocs folder after deleting the original one

3. Start XAMPP 
For docker, after run 
```
$ docker exec -ti itws /bin/zsh  
```

type 
```
$ ./opt/lampp/xampp start
```

4. Go to localhost/phpmyadmin, and import the file in db_migration/migration.sql

5. Go to the localhost and you are all set.

## If you are not using docker

1. Download from github or unzip it from the zip file
```
$ git clone https://github.com/bobmayuze/Borilliant_Sandwich

```
2. Start your XAMPP and Go to localhost/phpmyadmin, and import the file in db_migration/migration.sql

3. You can then set up a virtual server within Apache to point at the file location and restart your server

4. Navigate to "Your-virtual-server"/htdocs/dev/main.html and theres the homepage

5. Sign as admin account: account: "yuze@123.com", password: "123456". This will lead you the the admin page.

## Download the project, if you don't already have it, you can download it from this repo 

# Purpose
The purpose of this project is to help people construct and learn about 
new types of sandwiches. This can not only help people find new sandwiches that
they can enjoy, but can also shorten lines at sandwich eateries all over the
world. People can plan what sandwich they want in advance at home or in 
line, allowing them to know exactly what they want to eat when it's their
turn to order. The website also gives calorie information on all ingredients
so the user can know how healthy they're eating. With our website, sandwich
lines will be shorter, people can find new types of sandwiches they may enjoy,
and people can learn more nutrition facts about what they eat.

# Milestones
1.DB migration
    - tbl_ingredient_vegetable (Andrew)
    - tbl_ingredient_meat (Andrew)
    - tbl_ingredient_cheese (Chelsa)
    - tbl_ingredient_sauce (Hangen)
    - tbl_ingredient_bread (Hangen)

2.User framework implementation 
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
## Implementation of AngularJS

It was initially difficult to setup the frontend with AngularJS to make sample implementation because some angular elements, like "md-content", are new to us. We solved this by using "div" tags instead. This isn't the best way to solve the problem but it works. 

## Modularizing frontend and backend

In newer tech stacks, like the MEAN stack, data is mostly passed in the JSON format. In the LAMP stack though, we don't have JSON. It took us quite a while to create a sample endpoint implementation for our frontend team because of this. We were able to solve this problem by using PHP code to collect the data from the SQL table, turn it into a JSON string, and then return the string.

## CORS, Cross-Origin Request
Sometimes we had problems with cross origin requests. We were able to solve it by adding: 
```
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
```
to the beginning of the PHP code. This then allowed us to use cross origin requests.
