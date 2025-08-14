📝 Article Manager PHP Project
A lightweight PHP & MySQL web application to manage articles with full Create, Read, Update, Delete (CRUD) functionality.
Built for beginners using XAMPP and a simple, responsive Bootstrap interface.

📌 Features
Create new articles

View all articles

Edit existing articles

Delete articles

Clean and responsive UI with Bootstrap

🛠️ Project Structure
Your project folder should contain:

article-manager/
├── index.php             # Main page to view articles
├── action.php            # Handles create, update, delete actions
├── nav.php               # Navigation bar included in pages
├── db.php                # Database connection (private, not pushed to GitHub)
├── config.php    # Template for db.php with placeholders
├── styles.css            # Custom styling
├── articles.sql          # Database structure and sample data
├── LICENSE               # License file (MIT recommended)
├── .gitignore            # Git ignore file
└── README.md             # This file

⚙️ Setup Instructions
1️⃣ Install XAMPP
Download and install XAMPP.

2️⃣ Start Apache and MySQL
Open XAMPP Control Panel → click Start for both Apache and MySQL.

3️⃣ Import the Database
Open phpMyAdmin.

Create a new database, e.g., articles_db.

Import the articles.sql file from this repository.

4️⃣ Configure Database
Copy config.php to db.php.
Open db.php and replace placeholders with your database credentials:

$host = "localhost";
$user = "your_db_username";
$password = "your_db_password";
$dbname = "articles_db";
5️⃣ Move Project Files
Copy the project folder into your XAMPP htdocs directory:

C:\xampp\htdocs\article-manager
6️⃣ Run the Project
Open your browser and go to:

http://localhost/article-manager/
