# Lead Management System for TrippyIgloo.

The first page loaded is the Login Page.
The Lead Management System gathers data of leads from **MongoDB** and displays them in a table. The table can be searched, and the entries/leads can be updated.

## Tech Used :

**PHP**, **HTML**, **CSS** and **JS** with basics of **MongoDB** (*php-mongo*)

## Dummy Dataset:

{"group_size" : "3", "form" : "tour_request_quote_form", "phone" : "9999999999", "url" : "#", "referrer" : "#", "base_url" : "#", "headers" : { "User-Agent" : "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36" }, "tour_date" : "04-24-2019", "email" : "a@gmail.com"}

{"group_size" : "4", "form" : "tour_request_quote_form", "phone" : "9099090999", "url" : "#", "referrer" : "#", "base_url" : "#", "headers" : { "User-Agent" : "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36" }, "tour_date" : "05-26-2019", "email" : "ab@gmail.com"}

## Utility of Files:

- login.php : loads the login page for user login
- index.php : loads the table from MongoDB in HTML that can be updated 
- connections.php : connects to MongoDB 
- db.php : used to update details in MongoDB. Later may be used to insert/delete entries as needed.
- utils.php : any other validation functions if used are kept here.

## Work Left:

Logout Button, work on upload and insert data.


## Issues: 

The updation will produce error if the entries don't have distinct phone numbers. 
Will fix once I finish loading in DB.

## Version:

2.5.0

## Created by:

Sayangdipto Chakraborty
