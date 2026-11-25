# Student API – Laravel Deployment Guide

## Project Overview
A RESTful Student Management API developed using Laravel and Laravel Sanctum.

## Technologies Used
- PHP
- Laravel
- SQLite
- Laravel Sanctum
- REST API
- Postman

## API Features
- User Registration
- User Login and Authentication
- User Logout
- Create Student
- View All Students
- View Single Student
- Update Student
- Delete Student

## Production Configuration

Update the `.env` file:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

Keep the APP_KEY and database credentials secure.

## Deployment Commands

```bash
composer install --no-dev --optimize-autoloader
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## File Permissions
- Directories: 755
- Files: 644
- storage: Writable by the web server
- bootstrap/cache: Writable by the web server

## Database
The application uses SQLite. Ensure the hosting server supports SQLite and has the required PHP extensions enabled.

## Deployment Verification
- Verify API routes.
- Test registration and login.
- Verify Sanctum authentication.
- Test Student CRUD operations.
- Verify the application using its live URL.

## Security
- Never upload `.env` to GitHub.
- Disable APP_DEBUG in production.
- Keep application keys and credentials private.
- Configure HTTPS.

## Hosting Status
Deployment instructions prepared. Live hosting configuration and URL verification are pending.