# MVP
The YoungLife Mnager is a web application that enables members of YoungLife Oxford to post event information on calender and post and update students’ information. The YoungLife Manager also has specific people who have administrative privileges to post, update, delete information of leaders, staff and committee of YoungLife Oxford.

‬
## ‭1.1 Dependencies
### 1.1.1 Operating Environment/System
You need a web server that supports PHP 8.2.12 such as Apache and Nginx. For database, you need a database server that supports MySQL 8.0.30 such as MariaDB. The frontend files in Bootstrap, CSS and JavaScript are included in the PHP files. Currently, the application is hosted on Turing, ​​a student development server in the Department of Computer and Information Science at the University of Mississippi. The link for the current host site is below:
https://turing.cs.olemiss.edu/~knishida/

### 1.1.2 Hosting the Application
You are able to obtain the source code through Github link below:
https://github.com/koichinishida21/senior_project

In dbConnect funtion of “database.php”,

you must enter server name($servername), username($username), password($username) for the web server and database username($db) for the database server. Then, upload the source code on a web server. For database, MySQL file, “younglife.sql”, has to run on database server such as MariaDB first to connect with the source code in PHP. In order to create tables, you enter “source younglife.sql;” on the database server. Since the css/js files are already connected in PHP files, you do not need to manually connect the PHP files with the files.





## 1.2 Administration and Maintenance
### 1.2.1 Administration
You first need to create an admin account to log in as an admin. To create an account using the database format you would need to insert values to Comittee table if you are admin committee or Leader table if you are admin leader. Here are the two tables:

If you want to use our specific algorithm for a hashed password, you would use blowfish with a cost of 10 using the hash format: "$2y$10$" and blowfish salts should be 22 characters or more. More details can be found in the “included_functions.php” file.
