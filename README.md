<h1 align="center"> Shopping Site </h1>

<h4 align="center">Overview</h4>
<div align="center">

In this project, I try to develop a Shopping Site for selling Long Play vinyl records. These records may contain several categories such as Rock, Pop, Turkish, and so on. Therefore, customers can visit the website and choose the best records for them and enjoy the high-quality music.

<IMG SRC="gifs/generalOverview.gif">

</div>

## TECHNOLOGIES USED

- In this website project, four main languages are used; HTML, CSS, JavaScript, and PHP.
- For the skeleton of the site, HTML is used, and for having better looking, we used some CSS technologies. Icons from Font-awesome and text font types from Google Fonts are used for making the website more attractive. In addition, Bootstrap 4 is used on almost every step of the website. This is because the ready-to-use templates of Bootstrap 4 make the design more manageable. Bootstrap 4 input, button, form, table, and alert templates are used in this project. In addition, the grid system of Bootstrap is used for creating and replacing the HTML div blocks in harmony
- JavaScript and JQuery are used to take ordinary web elements and make them interactive. Thanks to this technology, we can communicate with the user. For example, when a user clicks a button to add a product to his/her basket, we used JavaScript to make this operation happen and for displaying a small success message Sweet Alert is used.
- PHP was an essential part of this project. PHP is used for the interaction between the website and the database. Before using this technology, Xampp downloaded, and via Xampp, we reach the database and control it with  MySQL commands inside the PHP blocks. In addition, the most valuable part of using PHP was the POST and GET methods inside the forms. For some parts of this project, this beautiful PHP feature is used to communicate between the user and the system without using JavaScript codes. Admin Console was created by only using PHP commands, and in the basket page, PHP Session has been used to keep specific user basket information like a dictionary. 

## HOW PROGRAM WORKS STEP BY STEP

- First of all, you can register and create an account on the register page, and after that system will direct you to the Login page. You can enter your ‘email’ and ‘password’ to access your account on the Login page. Then the system will direct you to the homepage.

<div align="center">
<IMG SRC="gifs/register.gif">
</div>

- After you logged in to the system, you can see the products on the homepage. Also, you will see your name on the navigation bar.
- The user easily can add a product into the basket with a click to the ‘Add to Cart' button and there will be an alert on the right corner such as ‘Added to Cart’.
- The user also can searches for a specific vinyl record by typing in the Search Bar on the right top.

<div align="center">
<IMG SRC="gifs/homepage.gif">
</div>

- After choosing the perfect products for you, you can visit the basket page by clicking the ‘Cart’ button on the navigation bar. On the basket page, users can see all the products that he/she added to the basket and may increase or decrease the number of products using the ‘up’ and ‘down’ buttons. Users also can remove an item from the basket cart by clicking the ‘Trash’ icon on the left.
- After that, the user can continue shopping or buy the products from the same page. The user should click on the ‘Continue Shopping’ button to continue, and this button redirects the user to the home page. Users should fill in all the necessary information to pay and buy the products added into the basket. There are two payment methods as Wire Transfer and Credit Card. After filling in, all the necessary information user can purchase the products by clicking the ‘Pay and Buy’ button.

<div align="center">
<IMG SRC="gifs/cart.gif">
</div>

- Users can update their personal information and passwords. To do that user should hover over the navbar section, which contains the user name, and click the ‘Edit Profile’ button.

<div align="center">
<IMG SRC="gifs/editprofile.gif">
</div>

## ADMIN PANEL
- Admins are users with administrative privileges and they have their special user interfaces called Amin Panel to manage the website. Admins can go to Admin Panel by clicking the ‘Go to Admin Panel’ in the Login Page and being directed to the Admin Login Panel.
- After the admin logs in to the Admin Panel, he/she can receive the information about how many Products, Categories, Users, and Admins exist on the website.
- Admin can add, delete, view, search and update the Admins, Products and Categories by using the given templates.

<div align="center">
<IMG SRC="gifs/adminpanel.gif">
</div>
