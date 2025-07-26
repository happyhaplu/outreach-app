# Outreach App — Project Overview

Welcome to the Outreach App! This is a modular PHP application for outreach management, built in sprints. The project is organized for clarity and scalability, with each sprint in its own folder under `Sprints/`.

## Navigation & Sprints

- **Sprint 1: Authentication Module**
  - [Sprint 1 Documentation](./Sprints/sprint-1-authentication/sprint1readme.md)
  - Features: User authentication, admin role, user list, secure session management
- **Sprint 2: Lead Upload & Inbox**
  - [Sprint 2 Documentation](./Sprints/sprint-2-lead-upload/sprint2readme.md)
  - Features: CSV lead upload, tag/grouping, robust column mapping, inbox view, filtering/search, bulk delete/archive, edit leads

Refer to each sprint's documentation for technical details and setup instructions.

A modular PHP application for outreach management, built in sprints. The project is organized for clarity and scalability, with each sprint in its own folder. This document covers the full project structure and current implementation status.

---

## Project Structure

```
outreach-app/
├── index.php                        # Homepage, login/logout logic
└── Sprints/
    ├── sprint-1-authentication/     # Sprint 1: Authentication module (MVP)
    │   ├── assets/
    │   │   └── style.css            # Unified styling
    │   ├── inc/
    │   │   ├── db.php               # SQLite DB connection
    │   │   ├── logout.php           # Session termination
    │   │   ├── init-db.php          # DB/table creation
    │   │   └── database.sqlite      # SQLite DB file
    │   ├── views/
    │   │   ├── login.php            # Login form/handler
    │   │   ├── signup.php           # Signup form/handler
    │   │   └── users.php            # Admin user list
    │   └── sprint1readme.md         # Sprint 1 documentation
    └── sprint-2-lead-upload/        # Sprint 2: Lead upload & inbox
        ├── assets/                  # Styling for Sprint 2
        ├── controllers/             # upload-controller.php (CSV upload logic)
        ├── db/                      # leads-db.php (leads table creation)
        ├── uploads/                 # (optional, for storing files)
        └── views/                   # upload-leads.php, my-leads.php
```

---

## Sprint 1: Authentication Module (MVP)

- **Features:**
  - User signup/login/logout
  - Passwords hashed with `password_hash()`
  - Admin role support (manual DB promotion)
  - User list view (admin only)
  - Secure session management
  - Prepared SQL statements (prevents injection)
  - Responsive, unified CSS styling
- **Database:**
  - SQLite, single `users` table: `id`, `email`, `password_hash`, `is_admin`, `reset_token`, `plan_type`
- **Security:**
  - No raw password display
  - Role flags stored securely
  - Session control for protected routes
- **How to run:**
  - Place in `C:/xampp/htdocs/outreach-app`
  - Start Apache, run `/inc/init-db.php` once
  - Use `/index.php` for main flow, `/views/users.php` for user list

---

## Sprint 2: Lead Upload & Inbox

- **Features:**
  - Upload leads via CSV (any column order, extra columns ignored)
  - Tag/group leads on upload
  - Inbox view for uploaded leads (filter by tag, search by name/company)
  - Only valid leads inserted (email, name, company required)
  - Secure, user-specific data (each user sees only their leads)
  - Bulk delete/archive leads, edit any lead
  - Success/error messages after upload or actions
  - See [Sprint 2 Documentation](./Sprints/sprint-2-lead-upload/sprint2readme.md) for full details

---

## Contribution Guide

- Read `Sprints/sprint-1-authentication/sprint1readme.md` for Sprint 1 details
- Sprint 2 is ready for new features — follow the folder structure
- Use prepared statements, session checks, and document new features in `docs/`

---

## Status Summary

| Feature                | Status         |
|------------------------|---------------|
| Signup/Login           | ✅ Completed   |
| Password Hashing       | ✅ Completed   |
| Admin Role Support     | ✅ Completed   |
| Logout Flow            | ✅ Completed   |
| SQLite DB Setup        | ✅ Completed   |
| Lead Upload (CSV)      | ✅ Completed   |
| Lead Inbox/Filtering   | ✅ Completed   |
| User List View         | ✅ Completed   |
| CSS Styling            | ✅ Completed   |
| Error Page             | ⏳ Coming Soon |
| PHPMailer Integration  | ⏳ Coming Soon |
| Lead Upload            | ⏳ Coming Soon |

---

For any questions, see the sprint-specific documentation or contact the project maintainer.
