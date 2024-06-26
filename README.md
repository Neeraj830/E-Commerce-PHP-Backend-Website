﻿# E-Commerce-PHP-Backend-Website
Setting up a PHP project with phpMyAdmin involves several steps. Below is a detailed guide to help you through the process:

### Step 1: Install a Web Server
You need a web server that can run PHP. Popular choices are Apache or Nginx. For simplicity, you can use XAMPP, WAMP, or MAMP, which come with Apache, MySQL, and PHP pre-installed.

#### For XAMPP (cross-platform):
1. **Download XAMPP** from the [official website](https://www.apachefriends.org/index.html).
2. **Install XAMPP** by following the installation wizard.
3. **Start Apache and MySQL** from the XAMPP Control Panel.

#### For WAMP (Windows):
1. **Download WAMP** from the [official website](https://www.wampserver.com/en/).
2. **Install WAMP** by following the installation wizard.
3. **Start WAMP** by launching it and ensuring the Apache and MySQL services are running.

#### For MAMP (macOS):
1. **Download MAMP** from the [official website](https://www.mamp.info/en/).
2. **Install MAMP** by following the installation wizard.
3. **Start MAMP** by launching it and starting the servers.

### Step 2: Download and Install phpMyAdmin
1. **Download phpMyAdmin** from the [official website](https://www.phpmyadmin.net/downloads/).
2. **Extract the downloaded file** to a directory accessible by your web server. For example, you can place it in the `htdocs` directory for XAMPP or the `www` directory for WAMP/MAMP.

   - For XAMPP: `C:\xampp\htdocs\phpmyadmin`
   - For WAMP: `C:\wamp64\www\phpmyadmin`
   - For MAMP: `/Applications/MAMP/htdocs/phpmyadmin`

### Step 3: Configure phpMyAdmin
1. **Rename `config.sample.inc.php` to `config.inc.php`** in the `phpmyadmin` directory.
2. **Edit `config.inc.php`** using a text editor:
   - Set the blowfish secret (a random string for cookie authentication):
     ```php
     $cfg['blowfish_secret'] = 'your_random_secret_string'; // you should generate a secure random string
     ```
   - Configure the database server connection settings:
     ```php
     $cfg['Servers'][$i]['host'] = 'localhost'; // MySQL hostname
     $cfg['Servers'][$i]['user'] = 'root'; // MySQL username
     $cfg['Servers'][$i]['password'] = ''; // MySQL password (leave empty if no password set)
     $cfg['Servers'][$i]['auth_type'] = 'cookie'; // Authentication method (cookie is recommended)
     ```

### Step 4: Set Up Your PHP Project
1. **Create a project directory** within the web server’s root directory.
   - For XAMPP: `C:\xampp\htdocs\your_project`
   - For WAMP: `C:\wamp64\www\your_project`
   - For MAMP: `/Applications/MAMP/htdocs/your_project`
2. **Create an `index.php` file** in your project directory:
   ```php
   <?php
   echo "Hello, World!";
   ?>
   ```

### Step 5: Create a Database for Your Project
1. **Open phpMyAdmin** by navigating to `http://localhost/phpmyadmin` in your web browser.
2. **Log in** with your MySQL credentials (default is usually `root` with no password for local setups).
3. **Create a new database** by clicking on the "New" button and entering a name for your database.
4. **Create tables** within your database as needed for your project.

### Step 6: Connect Your PHP Project to the Database
1. **Create a `config.php` file** in your project directory to store database connection details:
   ```php
   <?php
   $servername = "localhost";
   $username = "root";
   $password = ""; // Enter your MySQL password if set
   $dbname = "your_database_name";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>
   ```

2. **Include `config.php`** in your project files where database access is required:
   ```php
   <?php
   include 'config.php';

   $sql = "SELECT * FROM your_table";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
       }
   } else {
       echo "0 results";
   }
   $conn->close();
   ?>
   ```

### Step 7: Test Your Setup
1. **Navigate to your project** by entering `http://localhost/your_project` in your web browser.
2. **Verify** that your PHP script runs and displays "Hello, World!".
3. **Verify** database connection by running scripts that interact with your database.

By following these steps, you will have a PHP project set up and integrated with phpMyAdmin for database management.
