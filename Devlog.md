# Tasks
- Modulizing and splitting front end and backend
- Database migration
- Dockerized development environment
- Setup GitHub repository

# Progress
- Split the work to frontend and backend
- Modulize backend Endpoint/API
- Majority endpoint documentation
- Sample endpoint implementation
- Sample front-end implementation with AngularJs 
- Finished majority of database migration file
- Successfully Dockerized development environment
- Setup GitHub repository


# Challenge We met and How did we solve it
1.Implementation of angularjs

It is annoying initially to setup the frontend with angularjs for some sample implementation because some angular elements like "md-content" are new to us. We solved it by using div tag instead, though this is not a proper way to do this.

2.Modulizing frontend and backend

In recent tech stacks like MEAN stack, data is mainly passed as JSON format, while in LAMP stack, we don't have the idea of JSON. It took us quite a while to come out with sample endpoint implementation for our frontend team to be using by using google and StackOverflow a lot.



3. CROS, cross-origin request.
Sometimes I have problem about cross origin request problem. I solved it by adding 
```
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
```

to the beginning of the PHP code to allow cross-origin access.