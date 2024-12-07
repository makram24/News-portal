Documentation


Introduction
Makram New’s project is a web-based application designed to manage and display news articles dynamically. It allows admin users to create, edit, and categorize news, while visitors can view the latest updates based on categories and topics. The system is built using PHP, HTML, CSS, Bootstrap, AJAX CALL & JavaScript, with a MySQL database managed via phpMyAdmin.


Features
Admin Panel: Manage articles, categories, and users.
Dynamic News Display: News categorized by topics.
Responsive Design: Mobile-friendly layout using Bootstrap.
Search Functionality: Search for articles by title or tags.
User Authentication: Login and registration for admin and other user roles.
Media Management: Upload and manage images and videos for articles.


System Requirements
Web Server: Apache (XAMPP, WAMP, or LAMP)
Programming Language: PHP 7.4 or above
Database: MySQL 5.7 or above
Frontend: HTML, CSS, Bootstrap 5, JavaScript
Browser: Modern browser with JavaScript enabled


Installation Guide
Set Up the Environment:
Install XAMPP or WAMP.
Start Apache and MySQL services.
Download the Project:
Clone or download the project files into the htdocs directory.
Set Up the Database:
Open phpMyAdmin at http://localhost/phpmyadmin.
Create a new database (news_portal).
Import the provided SQL file (news_portal.sql) into the database.
Run the Project:
Open the browser and go to http://localhost/newsportal.


Technologies Used
Frontend: HTML, CSS, Bootstrap, JavaScript
Backend: PHP, AJAX
Database: MySQL
Admin Interface: PHP with Bootstrap
Tools: phpMyAdmin for database management


Database Structure
Tables
Users
Authors
Media
User Preferences
Comments
Article Tags
Tags
Categories
Articles
Article Views
Advertisements
Subscribe


Core Functionalities
Admin Panel:
Manage categories.
Add, edit, and delete articles.
Add, edit, and delete users.
Monitor user activity.
Public Interface:
Display articles.
Categorized navigation.
Search bar for articles.
Authentication: Secure login and registration.
Media Management: Upload images and videos for articles.


User Roles
Admin: Full access to manage content and users.
Editor: Limited to managing articles and categories.
Viewer: Can only view published articles.


Key Modules
Home Page: Displays recent and featured news.
Category Page: Lists articles by category.
Article Details Page: Full article view with images and videos.
Admin Dashboard: Overview of website statistics.


Future Enhancements
Improved Personalization: Utilizing AI-driven algorithms to refine recommendations based on user behavior and preferences. 
Mobile App Development: Creating mobile applications for Android and iOS to enhance accessibility and reach a wider audience. 
Enhanced Security: Implementing multi-factor authentication and other advanced measures to ensure user data privacy and secure interactions. 
Globalization and Localization: Adding multilingual support to cater to users from 04 different regions and linguistic backgrounds


Conclusion
Makram New’s project is a robust and scalable solution for managing and delivering news content dynamically. Its modular structure and responsive design ensure ease of use and accessibility across devices. This documentation serves as a guide for installation, configuration, and understanding the system's functionality.
