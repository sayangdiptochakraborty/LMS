# Lead Management System for TrippyIgloo.
I made this for my current company [TrippyIgloo](https://www.trippyigloo.com/) to efficiently manage their leads.

The first page loaded is the Login Page.
The Lead Management System gathers data of leads from **MongoDB** and displays them in a table. The table can be searched, and the entries/leads can be updated.

## Tech Used :

**PHP**, **HTML**, **CSS** and **JS** with **MongoDB** (*php-mongo*)

## Dummy Dataset:

{"group_size" : "3", "form" : "tour_request_quote_form", "phone" : "9999999999", "url" : "https://trippyigloo.com/lead/", "referrer" : "https://trippyigloo.com/tour/kabini-wildlife-safari-bangalore-weekend-getaway-nagarhole-tiger-reserve-nilgiri-bioreserve-kabini-jungle-tour/", "base_url" : "https://trippyigloo.com/lead/", "headers" : { "User-Agent" : "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36" }, "tour_date" : "04-24-2019", "email" : "a@gmail.com", "company_list" : [ "LetsHimalaya", "Sattvanic", "Robo" ], "person_list" : [ "A", "B", "C" ], "lead_status" : [ "Follow Up", "New Lead", "Booked" ], "lead_assigned" :"NIL", "person_assigned": "NIL", "status":"New Lead"}

{"group_size" : "4", "form" : "tour_request_quote_form", "phone" : "9099090999", "url" : "https://trippyigloo.com/lead/", "referrer" : "https://trippyigloo.com/tour/kabini-wildlife-safari-bangalore-weekend-getaway-nagarhole-tiger-reserve-nilgiri-bioreserve-kabini-jungle-tour/", "base_url" : "https://trippyigloo.com/lead/", "headers" : { "User-Agent" : "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36" }, "tour_date" : "05-26-2019", "email" : "ab@gmail.com", "company_list" : [ "LetsHimalaya", "Sattvanic", "Robo" ], "person_list" : [ "A", "B", "C" ], "lead_status" : [ "Follow Up", "New Lead", "Booked" ], "lead_assigned" :"NIL", "person_assigned": "NIL", "status":"New Lead"}

## Utility of Files:

- login.php : loads the login page for user login
- index.php : loads the table from MongoDB in HTML that can be updated 
- connections.php : connects to MongoDB 
- db.php : used to update details in MongoDB. Later may be used to insert/delete entries as needed.
- utils.php : any other validation functions if used are kept here.

## Work Left:

UI improvements of the index page. Table Load.


## Issues: 

The updation will produce error if the entries don't have distinct phone numbers. 
Will fix once I finish loading in DB.

## Version:

2.0.0

## Created by:

Sayangdipto Chakraborty

## Screenshots:

- For Login Page

  ![](https://github.com/sayangdiptochakraborty/LMS/blob/master/img/Capture.PNG)
  
  
- For display of table from MongoDB

  ![](https://github.com/sayangdiptochakraborty/LMS/blob/master/img/Capture2.PNG)
  
  
- Searching and Displaying entries from the table

  ![](https://github.com/sayangdiptochakraborty/LMS/blob/master/img/Capture3.PNG)
