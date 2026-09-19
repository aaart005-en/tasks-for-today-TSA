# Tasks for Today Management System

A small internal CodeIgniter 4 web application for tracking daily to-do items. Built for **IT0049 – Web System Technologies, Technical Summative Assessment 1**.

## Features

- **Welcome page (`/`)** — shows only tasks scheduled for today
- **Task List (`/tasks`)** — shows every task, ordered by date
- **Profile (`/profile`)** — displays the demo user's information
- **About (`/about`)** — identifies the developer of the system

## Tech Stack

- PHP 8.2+
- CodeIgniter 4
- MySQL / MariaDB

## Database Schema

Two tables: `tasks` and `users`. Full schema and seed data are in [`tasks_for_today.sql`](./tasks_for_today.sql).

```sql
CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);
```

## Setup & Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/aaart005-en/tasks-for-today-TSA.git
   cd tasks-for-today-TSA
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   - Copy `env` to `.env` if it doesn't already exist
   - Update the database section to match your local MySQL setup:
     ```
     database.default.hostname = localhost
     database.default.database = tasks_for_today
     database.default.username = root
     database.default.password =
     database.default.DBDriver = MySQLi
     database.default.port = 3306
     ```

4. **Create the database and import data**
   - Create a database named `tasks_for_today` in MySQL/phpMyAdmin
   - Import `tasks_for_today.sql` into it

5. **Run the development server**
   ```bash
   php spark serve
   ```
   The app will be available at `http://localhost:8080`

## Routes

| Route      | Page                        |
|------------|------------------------------|
| `/`        | Today's tasks (Welcome page) |
| `/tasks`   | Full task list               |
| `/profile` | Demo user profile            |
| `/about`   | About / developer info       |

## Live Demo

- **Hosted link:** http://abulencia-tasksfortoday.gamer.free/tasks-for-today-TSA/tasks-for-today-TSA/public/index.php/
- **GitHub repository:** https://github.com/aaart005-en/tasks-for-today-TSA

## Developer

Artainian Abulencia
