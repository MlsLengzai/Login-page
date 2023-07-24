How the Project Works:
HTML: The HTML code represents the login form with two input fields for the username and password, a "Remember Me" checkbox, and a "Log in" button. The form submits the data to createRecordLogin.php when the user clicks the "Log in" button.

CSS: The CSS code defines the styling for the login form and sets up a background image for the page.

PHP (createRecordLogin.php): This PHP script handles the login process and user authentication. Here's how it works:

The script starts by obtaining the submitted username and password from the login form.
It checks if the username exists in the register table. If the username exists, it continues with the authentication process.
If the username exists, the script checks if the username is also present in the user_login table.
If the username exists in the user_login table, it updates the user's password with the provided password.
If the username does not exist in the user_login table, it inserts a new record with the provided username and password.
Next, it queries the register table to determine the role of the user based on the provided username and password.
If the role is "admin," it redirects the user to admin_page.php.
If the role is any other type of user, it redirects the user to user_page.php.
If the provided password is incorrect, it redirects the user back to the login page with an alert message.
If the username doesn't exist in the register table, it redirects the user back to the login page with an alert message.

How to Set Up and Run the Project:
Create Database: You need to set up a MySQL database that includes the required tables (register and user_login) with appropriate fields (username, password, userType, etc.).

PHP Configuration: Ensure that the PHP configuration is set correctly with database connection details (e.g., host, username, password, database name) in connection_database.php. This file should contain the necessary code to establish a connection to the MySQL database.

File Structure: Place the login.html, login.css, createRecordLogin.php, and background6.jpg files in the appropriate directories of your web server.

Accessing the Login Page: Open your web browser and navigate to the URL where the login.html file is located. This will display the login form to the user.

User Registration: Before logging in, ensure that the user has been registered with a valid username and password in the register table of the database.

Tips/Notes:
Security: This code is for educational purposes only and lacks important security features such as password hashing and protection against SQL injection. In a real-world scenario, it is essential to implement secure authentication and use prepared statements to prevent SQL injection attacks.

Remember Me: The "Remember Me" functionality is not implemented in the provided code. If you want to add this feature, you'll need to handle cookies or sessions to remember the user's login status.

Styling: The provided CSS code is straightforward and uses a background image. You can modify the CSS to match your preferred design and layout.

Handling Errors: Consider enhancing error handling and providing more informative messages to users when login attempts fail.

Roles and Permissions: The code uses a userType field in the register table to determine user roles. You can extend this concept to implement different roles with specific permissions.

Accessibility: Ensure that the login form is accessible to users with disabilities by providing appropriate labels, ARIA attributes, and focus indicators.

Front-end Validation: The current code lacks front-end validation, so you may want to add JavaScript validation to ensure the username and password fields are not empty before submitting the form.
