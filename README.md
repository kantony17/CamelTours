# CamelTours

### 1. Set up a local server
Download xampp here: https://www.apachefriends.org/index.html 
Note for Windows users: When you install xampp, do not install it in your Program Files folder.
Open xampp, start Apache and MySQL 

### 2. Load the database
In the browser, go to: localhost/phpmyadmin (make sure that xampp is running the MySQL module) 
On the left column, where all the databases are listed, click +New
Create a new database named camel_igniter
Click on the newly created database, on the top menu, click Import. Click Choose File, and select the file at /mysql/camel_igniter.sql from your downloaded folder.

### 3. Run CamelTours
In the browser, go to: localhost/[your_folder_address]/homedir/public_html/
You should see the home page. CamelTours is now running locally on your computer!
There are two user accounts:
user - password: ChangeThis123
admin - password: ChangeThis123
