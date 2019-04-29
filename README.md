# Lead Management System for TrippyIgloo.

The first page loaded is the Login Page. Currently only "admin" as username and "password" as password are the login details.
The Lead Management System gathers data of leads from **MongoDB** and displays them in a table. The table can be searched, and the entries/leads can be updated.

## Tech Used :

PHP, HTML, CSS and JS with basics of MongoDB (php-mongo)

## Dummy Dataset:

{"group_size" : "3", "form" : "tour_request_quote_form", "phone" : "9999999999", "url" : "https://trippyigloo.com/lead/", "referrer" : "https://trippyigloo.com/tour/kabini-wildlife-safari-bangalore-weekend-getaway-nagarhole-tiger-reserve-nilgiri-bioreserve-kabini-jungle-tour/", "base_url" : "https://trippyigloo.com/lead/", "headers" : { "User-Agent" : "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36" }, "tour_date" : "04-24-2019", "email" : "a@gmail.com", "company_list" : [ "LetsHimalaya", "Sattvanic", "Robo" ], "person_list" : [ "A", "B", "C" ], "lead_status" : [ "Follow Up", "New Lead", "Booked" ], "lead_assigned" :"NIL", "person_assigned": "NIL", "status":"New Lead"}

{"group_size" : "4", "form" : "tour_request_quote_form", "phone" : "9099090999", "url" : "https://trippyigloo.com/lead/", "referrer" : "https://trippyigloo.com/tour/kabini-wildlife-safari-bangalore-weekend-getaway-nagarhole-tiger-reserve-nilgiri-bioreserve-kabini-jungle-tour/", "base_url" : "https://trippyigloo.com/lead/", "headers" : { "User-Agent" : "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36" }, "tour_date" : "05-26-2019", "email" : "ab@gmail.com", "company_list" : [ "LetsHimalaya", "Sattvanic", "Robo" ], "person_list" : [ "A", "B", "C" ], "lead_status" : [ "Follow Up", "New Lead", "Booked" ], "lead_assigned" :"NIL", "person_assigned": "NIL", "status":"New Lead"}


## Work Left:

The Login page needs to be integrated with MongoDB as well.

UI improvements of the index page. Table Load.


## Issues: 

The updation will produce error if the entries don't have distinct phone numbers. 
Will fix once I finish loading in DB.

## Version:

1.5.0

## Created by:

Sayangdipto Chakraborty