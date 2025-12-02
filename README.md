# Restaurants Information System

## Project Description

This project is a web-based restaurant reservation and management system built using the Laravel framework. It allows users to browse restaurants, view menus, make reservations, and manage their own accounts. Administrators can manage restaurants, tables, menus, reservations, and user data.

The system is based on MVC architecture and was developed as part of a university coursework project.

---

## Technologies Used

- Laravel (PHP Framework)
- PHP
- MySQL
- Blade Templates
- Bootstrap
- Chart.js
- Eloquent ORM

---

## Features

### User Features
- User registration and login
- Profile editing
- Viewing restaurants and menus
- Making reservations by selecting restaurant, date, time, guest count, and table
- Viewing, modifying, and cancelling personal reservations

### Administrator Features
- Manage restaurants (add, edit, delete)
- Manage tables and seating arrangements
- Manage menus (dishes, descriptions, prices)
- View and manage all reservations
- View users and their reservation history

### System Features
- Secure password hashing (bcrypt)
- Input validation using FormRequest classes
- Middleware route protection
- Real-time table availability validation
- Structured data handling with Eloquent ORM

---

## File Structure

```
restaurants_information_system/
├── app/
│   ├── Models/
│   ├── Http/Controllers/
│   └── Http/Requests/
├── resources/
│   ├── views/
│   └── layouts/
├── public/
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   └── web.php
├── composer.json
└── README.md
```

---

## How to Run the Project

### 1. Install Dependencies

```
composer install
npm install
npm run build
```

### 2. Configure Environment

```
cp .env.example .env
php artisan key:generate
```

Update database credentials inside `.env`.

### 3. Run Migrations

```
php artisan migrate
```

Optional:

```
php artisan db:seed
```

### 4. Start Server

```
php artisan serve
```

Application will be available at:

http://localhost:8000

---

## Database Overview

Main tables used in the system:

- users
- restaurants
- menus
- restaurant_menu (pivot)
- tables
- reservations

The database design supports clear relational structure between users, restaurants, tables, menus, and reservations.

---

## Security

- Password hashing with bcrypt
- CSRF protection
- Form validation
- Middleware access control

---

## Conclusion

The Restaurants Information System provides a complete solution for restaurant management and customer reservation workflow. It includes administrative control, secure authentication, and scalable MVC structure. Future improvements could include real-time table availability, expanded analytics, stronger authentication methods, and enhanced user experience.

