##Hair Salon##

The Hair Salon app allow the owner of a hair salon to add a list of their stylists and view which clients are associated with a given stylist.

#By Kelly de Vries#
#3.20.15

#Setup instructions:#
1.  PHP must be installed on your machine (consult other sources for tutorials)

2.  In your terminal, type:
	a.  Clone this repository- https://github.com/kdv24/HairSalon.git .
	b.  Start your php server in the web directory (e.g., by typing in the command php -S localhost:8000)

3.  Open a new tab in terminal and type:
	a.  psql
	b.  CREATE DATABASE hair_salon;
	c.  \c hair_salon;
	d.  \i hair_salon.sql;

3.  In a web browser window, type localhost:8000

4.  Now you should be able to see the Hair Salon app.


If the import doesn't work or you want to also view the test database and you need to recreate the database in psql, you can also type in the following commands:

CREATE DATABASE hair_salon;
\c hair_salon;
CREATE TABLE stylists (id serial PRIMARY KEY, stylist_name varchar);
CREATE TABLE clients (id serial PRIMARY KEY, client_name varchar);
CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;

Copyright (c) 2015 Kelly de Vries
#license-mit
