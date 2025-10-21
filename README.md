# MotoService 🏍️

MotoService is a modern web application built with **Laravel**, designed to manage products and categories for a motorcycle service shop.  
The project demonstrates practical skills in full-stack web development, database integration, and UI styling using Laravel’s Blade templating system and Tailwind CSS.

## 🚀 Features

- User authentication (registration and login)
- Category management
- Product management with category relationships
- Image upload and display functionality
- Responsive UI built with Tailwind CSS
- Simple and intuitive admin dashboard

## 🛠️ Technologies Used

- [Laravel](https://laravel.com/) (PHP Framework)  
- Tailwind CSS  
- SQLite Database  
- Blade Templates  
- Vite

## ⚡ Getting Started Locally

Follow the steps below to set up and run the project on your local machine.

### 1. Clone the repository
```bash
git clone https://github.com/Erhanttt/MotoService.git
cd MotoService

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan serve

Then visit http://localhost:8000 in your browser