# Tasks
- Modularize and split frontend and backend work
- Database migration
- Dockerize development environment
- Setup GitHub repository

# Progress
- Split the work between frontend and backend
- Modularize backend Endpoint/API
- Majority of the endpoint documentation completed
- Sample endpoint implementation made
- Sample front-end implementation made with AngularJS 
- Finished majority of the database migration files
- Successfully Dockerized development environment
- Setup GitHub repository


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