# Tasks for Today Management System

A CodeIgniter 4 web application for managing daily tasks, with login, validated forms, full CRUD, and soft deletion.

**Course:** IT0049 - Web System Technologies (TSA2)

## Features

- Public pages (no login needed): Welcome (today's tasks), Task List, Profile, About
- Login and logout using a hashed password (`password_hash()` / `password_verify()`) and a session
- Logged-in users only: create, edit, and delete tasks
- New Task form (`/tasks/new`) with validation: title and date are required
- Edit/update page for existing tasks
- Soft delete: deleting a task sets `is_archived = 1` instead of removing the row, and archived tasks are hidden from the Welcome and Task List pages
- `AuthFilter` redirects logged-out visitors to the login page

## Requirements

- PHP 8.2 or higher (with `intl` and `mbstring` enabled)
- MySQL or MariaDB (XAMPP works)
- Composer

## Setup

1. Clone the repository and open the project folder:
```
   git clone <repository-url>
   cd <project-folder>
```
2. Install dependencies:
```
   composer install
```
3. Create the database `tasks_for_today` in phpMyAdmin, then import `tasks_for_today.sql` into it. The file already includes the `users.password` and `tasks.is_archived` columns.
4. Create a `.env` file in the project root with:
```
   CI_ENVIRONMENT = development

   database.default.hostname = localhost
   database.default.database = tasks_for_today
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
```
5. Start the app:
```
   php spark serve
```
6. Open `http://localhost:8080`.

## Demo Login

| Username | Password |
| --- | --- |
| `demo_user` | `password123` |

## Routes

| Route | Access |
| --- | --- |
| `/` , `/tasks`, `/profile`, `/about` | Public |
| `/login`, `/logout` | Public |
| `/tasks/new`, `/tasks/create` | Login required |
| `/tasks/edit/{id}`, `/tasks/update/{id}` | Login required |
| `/tasks/delete/{id}` (soft delete) | Login required |

## Hosted Version

https://YOUR-SITE-LINK-HERE