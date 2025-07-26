🧾 Outreach App — Sprint 1 Documentation
🔐 Authentication Module (MVP)
A lightweight, modular PHP application built with SQLite. All features are organized under the `Sprints/` directory, with each sprint as a subfolder. Sprint 1 focuses on secure user authentication, role management, and foundational structure for scalable outreach features.

📁 Sprint 1 Folder Structure (under Sprints/)

Sprints/
└── sprint-1-authentication/
    ├── assets/
    │   └── style.css
    │       - Central stylesheet for all Sprint 1 pages.
    │       - Provides responsive, unified look and feel.
    ├── inc/
    │   ├── db.php
    │   │   - Establishes and manages the SQLite database connection using PDO.
    │   ├── logout.php
    │   │   - Handles user logout by destroying the session and redirecting to homepage.
    │   ├── init-db.php
    │   │   - Script to initialize the database and create the `users` table if it does not exist.
    │   └── database.sqlite
    │       - The actual SQLite database file storing all user data.
    ├── views/
    │   ├── signup.php
    │   │   - User registration form and handler.
    │   │   - Accepts email/password, hashes password, stores user in DB.
    │   ├── login.php
    │   │   - User login form and handler.
    │   │   - Verifies credentials, starts session, redirects on success.
    │   ├── users.php
    │       - Displays a table of all registered users (admin view).
    │       - Shows user ID, email, and admin status (never passwords).
    └── sprint1readme.md
        - This documentation file, describing Sprint 1 and its structure.
🧠 Database Schema (users Table)
Created via init-db.php — stores basic authentication and role data.

Column	Type	Purpose
id	INTEGER	Primary key
email	TEXT	Unique user login
password_hash	TEXT	Secure hashed password
is_admin	INTEGER	Role flag: 0 for user, 1 for admin
reset_token	TEXT	Reserved for future password reset flow
plan_type	TEXT	Currently defaulted to 'free'
✅ Sprint 1 Features
1. Homepage (index.php)
Dynamic session logic: shows Login/Signup when logged out, Logout when logged in

Displays conditional message if logged-in user is admin

2. Signup System (signup.php)
Accepts email and password input

Password securely hashed via password_hash()

Stores into SQLite using prepared statements

Confirmation message + redirect link to login

3. Login System (login.php)
Verifies credentials using password_verify()

On success:

Starts session

Sets user_id, is_admin flags

Redirects to homepage

On failure: clean error message shown

4. Logout (logout.php)
Destroys session

Redirects to homepage

5. Admin Role Flag
is_admin stored in DB + tracked via $_SESSION

Currently manual promotion via DB Browser

Allows conditional rendering of admin-only content (like users.php)

6. User List View (users.php)
Lists all registered users (ID, Email, Admin status)

Accessible via browser — styled and readable

Passwords are intentionally hidden for security

7. Styling (style.css)
Responsive form layout

Styled buttons, inputs, error messages

Unified look across all views

🔒 Security Notes
Implemented in Sprint 1:

✅ Password hashing using password_hash()

✅ Prepared SQL statements (prevents injection)

✅ No raw password display

✅ Role flags stored securely

✅ Session control protects logged-in routes

🧪 Running Locally (XAMPP or PHP Server)
1. Place the entire `outreach-app` folder (with all subfolders) inside: `C:/xampp/htdocs/`
2. Start Apache from the XAMPP control panel.
3. Initialize the database by visiting:
   - [http://localhost/outreach-app/Sprints/sprint-1-authentication/inc/init-db.php](http://localhost/outreach-app/Sprints/sprint-1-authentication/inc/init-db.php)
4. Access the app homepage:
   - [http://localhost/outreach-app/index.php](http://localhost/outreach-app/index.php)
5. Use the Signup → Login → Logout flow to test authentication:
   - Signup: [http://localhost/outreach-app/Sprints/sprint-1-authentication/views/signup.php](http://localhost/outreach-app/Sprints/sprint-1-authentication/views/signup.php)
   - Login: [http://localhost/outreach-app/Sprints/sprint-1-authentication/views/login.php](http://localhost/outreach-app/Sprints/sprint-1-authentication/views/login.php)
   - Logout: [http://localhost/outreach-app/Sprints/sprint-1-authentication/inc/logout.php](http://localhost/outreach-app/Sprints/sprint-1-authentication/inc/logout.php)
6. View all users (admin view):
   - [http://localhost/outreach-app/Sprints/sprint-1-authentication/views/users.php](http://localhost/outreach-app/Sprints/sprint-1-authentication/views/users.php)
📦 Deployment Plan
Sprint 1 is ready to be pushed to GitHub with documentation. Best deployment platforms:

✅ Render.com (PHP-ready, free tier)

✅ Bluehost (shared hosting)

✅ 000webhost (lightweight projects)

Error handling will be added in Sprint 2 along with lead upload and inbox view.

📍 Status Summary
Feature	Status
Signup/Login	✅ Completed
Password Hashing	✅ Completed
Admin Role Support	✅ Completed
Logout Flow	✅ Completed
SQLite DB Setup	✅ Completed
User List View	✅ Completed
CSS Styling	✅ Completed