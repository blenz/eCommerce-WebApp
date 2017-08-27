Brett Lenz
76382638

URL:	http://andromeda-52.ics.uci.edu:5052/

PA 1

The site contains 3 different main pages. The first is the homepage which is basically a welcome screen. Next, is the products pages which has a table of the 10 products. Each image will get larger when hovered over it using CSS. The last main page is the about page. This page has an overview of the company and meant to be informative to the consumers. 

On the products page, a user can click an image and it will take them to the corresponding product page. The specific product page has a description of the product along with some of its key features. At the bottom of the page, is the order form which must be filled out correctly in order to send an email to the owner. Javascript with regular expressions are used in real time to ensure the validity of the form. It basically checks to make sure that a text box is not empty and if its values are correct for the type of text required - all number, all letter, etc

PA 2

For PA2, the same design and navigation as PA1 exists but is done using php with some tweaks. All products use 1 php (product.php) page that dynamically fills in the product information. After the user places an order, they're information gets saved in a database and they are taken to a confirmation page that lists the details of the order. I used 4 different table which include creditcards, customer_order, customers, and products. I decided to split the tables into these areas to keep all relevant information together. A join is used from the customer order table to get all the details of order including the customer and the product they ordered. Lastly, on the order form I used AJAX in two places. The first part is that the shipping city, state, and zip are all autocompleted based on the user's input. The second part is when the user fills out the zip code an AJAX call is made to update the tax cost of the order based on the zip. All of the AJAX information is pulled from the csv files in the root directory.

