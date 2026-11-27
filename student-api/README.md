# Student Management System

A full-stack Student Management System built using Laravel, PHP, SQLite, HTML, CSS and JavaScript. It allows authenticated users to manage student records through a REST API and a simple web interface.

## Features

- User registration and login
- Token-based API authentication using Laravel Sanctum
- Add new students
- View student records
- Update student details
- Delete student records
- RESTful API endpoints
- Responsive frontend interface
- SQLite database
- PHPUnit feature testing

## Tech Stack

- **Backend:** PHP, Laravel
- **Frontend:** HTML, CSS, JavaScript
- **Database:** SQLite
- **Authentication:** Laravel Sanctum
- **API Testing:** Postman
- **Automated Testing:** PHPUnit
- **Version Control:** Git and GitHub

## Project Structure

```text
student-api/
├── app/
├── database/
├── routes/
├── tests/
├── public/
│   └── frontend/
│       ├── index.html
│       └── script.js
├── frontend/
│   ├── index.html
│   └── script.js
├── .env.example
└── README.md
```

## Installation and Setup

1. Clone the repository:

```bash
git clone https://github.com/Irannakumbar/cynaris-internship-Iranna.git
```

2. Open the project:

```bash
cd cynaris-internship-Iranna/student-api
```

3. Install dependencies:

```bash
composer install
```

4. Configure your environment:

```bash
copy .env.example .env
php artisan key:generate
```

5. Configure SQLite in your `.env` file and ensure the database file exists.

6. Run migrations:

```bash
php artisan migrate
```

7. Start the Laravel server:

```bash
php artisan serve
```

8. Open the frontend:

```text
http://127.0.0.1:8000/frontend/index.html
```

## API Endpoints

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/register` | Register a user |
| POST | `/api/login` | Login |
| POST | `/api/logout` | Logout |
| GET | `/api/students` | Get all students |
| POST | `/api/students` | Add a student |
| GET | `/api/students/{id}` | Get a student |
| PUT | `/api/students/{id}` | Update a student |
| DELETE | `/api/students/{id}` | Delete a student |

Student endpoints require authentication.

## Testing

Run the automated tests:

```bash
php artisan test
```

**Current test result:** 7 tests passed, 8 assertions.

## Screenshots

Add screenshots of the following:

- Student Management frontend
- Student list
- Add student operation
- Update student operation
- Delete student operation
- Successful PHPUnit test results

## Live Demo

Not deployed yet.

## Developer

**Iranna Kumbar**

GitHub: https://github.com/Irannakumbar

## License

This project was developed as part of an internship capstone project.