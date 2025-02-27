<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Advanced Livewire Starter Kit

A modern Laravel application starter kit, featuring [the original Laravel Livewire starter kit](https://github.com/laravel/livewire-starter-kit).

## Demo

Check out the live demo: [![Demo](https://img.shields.io/badge/Demo-View%20Live-blue)](https://advanced-livewire-starter-kit-main-jzkwod.laravel.cloud/)

## Installation

Follow these steps to get your development environment running:

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/advanced-livewire-starter-kit.git
   cd advanced-livewire-starter-kit
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Configure environment variables**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Set up the database**
   - Update database credentials in `.env` file
   ```bash
   php artisan migrate --seed
   ```

6. **Build assets**
   ```bash
   npm run dev
   ```

7. **Serve the application**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

## Default Login Credentials

After seeding the database, you can log in with:
- **Email**: test@example.com
- **Password**: password

## Features

- **Authentication** - Full login/registration system
- **Roles & Permissions** - Role-based access control
- **Livewire Components** - Dynamic UI components
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework