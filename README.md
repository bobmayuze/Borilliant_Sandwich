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

# How to use Google Drive as CDN
1.Login in to your gmail and access you Google drive and create a folder. Once created the folder right click on it , from the list of options select Share
2.A Dialog Box will appear.Click on Advance (Another Dialog Box will Appear).
3.Click on Change in front of Private – Only you can access (Another Dialog Box will Appear).
4.Select First Option On-Public on the web and hit Save Button.
5.Now your new folder is CDN folder and it can accessible without login
6.Now upload your files to your CDN folder , to use files out of google drive you need File ID of each file.To Find that ID just right click on selected file that are in your shared folder and click on Share (a Dialog Box will Appear). Here you can see File ID & sharing link .Just Copy That and Use it Wherever you want.
7.If you want to show images on your website from google drive then just copy FILE ID not whole link and use it like this :
<img src=”https://drive.google.com/uc?export=view&id=0B7aEKHxTUkvPbEtNdDBKaVB3aGc” alt=”image from google drive"/>
