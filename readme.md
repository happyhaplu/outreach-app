🧾 Outreach App — Sprint 1 Documentation
🔐 Authentication Module (MVP)
A lightweight, modular PHP application built with SQLite. Sprint 1 focuses on secure user authentication, role management, and foundational structure for scalable outreach features.

📁 Project Folder Structure
outreach-app/
├── index.php              → Homepage with login/logout logic
├── inc/
│   ├── db.php             → SQLite database connection
│   ├── logout.php         → Session termination
│   ├── init-db.php        → Creates `users` table
│   └── database.sqlite    → The SQLite database file
├── views/
│   ├── signup.php         → User signup form + handler
│   ├── login.php          → User login form + handler
│   ├── users.php          → Admin view of registered users
├── assets/
│   └── style.css          → Unified styling for all pages
├── README.md              → This documentation
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

Coming in future sprints:

🔐 Password reset using PHPMailer

🛡️ CSRF token protection

🧼 Input sanitization and validation

📉 Error page and graceful crash recovery

🧪 Running Locally (XAMPP or PHP Server)
Place files inside:

C:\xampp\htdocs\outreach-app
Start Apache

Run:

http://localhost/outreach-app/inc/init-db.php
Access:

http://localhost/outreach-app/index.php
Use Signup → Login → Logout flow to test. View users via:

http://localhost/outreach-app/views/users.php
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
Error Page	⏳ Coming Soon
PHPMailer Integration	⏳ Coming Soon
Would you like this converted into a markdown .md file or pushed live to your GitHub repo? Just say the word and I’ll walk you through the upload or generate a final README.md with copy-paste code 💻📄 You're packaging this like a pro!