# Mini Project — Client Management

A simple Laravel CRUD application for managing clients using the repository pattern.

## Requirements

- PHP 8.2+
- Composer
- MySQL
- Node.js & npm

## Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd mini-project
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Set up the database**

   Update `.env` with your MySQL credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mini_project
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

   Create the database:
   ```bash
   mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS mini_project;"
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Start the application**
   ```bash
   composer run dev
   ```

8. **Access the application**
   - Home: http://127.0.0.1:8000
   - Client Management: http://127.0.0.1:8000/clients

## Features

- List all clients
- Add new client (with validation)
- Delete client
- Filter clients by status (active/inactive)
- Duplicate email validation

## Project Structure

- `app/Http/Controllers/ClientController.php` — Handles client CRUD operations
- `app/Repositories/ClientRepository.php` — Database operations using repository pattern
- `app/Models/Client.php` — Client Eloquent model
- `resources/views/clients/index.blade.php` — Client management UI
- `routes/web.php` — Web routes
