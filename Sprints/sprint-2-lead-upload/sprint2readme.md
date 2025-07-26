# Outreach App — Sprint 2 Documentation

📥 Lead Upload & Inbox Module

Sprint 2 adds lead management features to the Outreach App. Users can upload leads via CSV, tag them, and view/filter their leads in an inbox. The upload process is robust, supporting any column order and extra columns, as long as the headers include "email", "name", and "company".

## Folder Structure (under Sprints/)

Sprints/
└── sprint-2-lead-upload/
    ├── assets/
    │   └── style.css           # Styling for Sprint 2 pages
    ├── controllers/
    │   └── upload-controller.php # Handles CSV upload, validation, and DB insert
    ├── db/
    │   └── leads-db.php        # Creates the leads table if needed
    ├── uploads/                # (Optional) For storing uploaded files
    └── views/
        ├── upload-leads.php    # Upload form (requires login)
        └── my-leads.php        # Inbox for viewing/filtering leads

## Database Schema (leads Table)
Created via db/leads-db.php. Stores uploaded leads for each user.

| Column   | Type    | Purpose                        |
|----------|---------|--------------------------------|
| id       | INTEGER | Primary key                    |
| email    | TEXT    | Lead's email address           |
| name     | TEXT    | Lead's name                    |
| company  | TEXT    | Lead's company                 |
| tag      | TEXT    | User-supplied tag for grouping |
| user_id  | INTEGER | Foreign key to users table     |


## Features

1. **Upload Leads (upload-leads.php)**
   - Requires login.
   - Accepts CSV file and a tag.
   - CSV can have columns in any order; only "email", "name", and "company" are used.
   - Extra columns are ignored.
   - Validates email and required fields.
   - On success, redirects to My Leads with a success message.

2. **View, Edit, Delete, and Archive Leads (my-leads.php, edit-lead.php)**
   - Requires login.
   - Shows only the logged-in user's leads.
   - Filter by tag and search by name/company.
   - Select one or more leads to delete or archive (bulk actions).
   - Edit any lead's details (name, email, company, tag) via the Edit link.
   - Archived leads are hidden from the main inbox.
   - Displays a message if no leads are found or after upload/action.

3. **Security & Validation**
   - All user input is sanitized.
   - Only valid leads are inserted (no duplicates for same user).
   - Prepared SQL statements prevent SQL injection.

## Usage

- Run `db/leads-db.php` once to create the leads table if not already present.
- Use the dashboard to access upload and inbox features after login.
- For CSV upload, ensure headers include "email", "name", and "company" (case-insensitive, partial match allowed).
- Use the checkboxes and action buttons in My Leads to delete or archive leads.
- Use the Edit link to update lead details.

---

Sprint 2 extends the Outreach App with robust, user-friendly lead management. For questions or improvements, see the main README or contact the maintainer.
