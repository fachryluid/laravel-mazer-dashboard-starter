# Laravel Mazer Dashboard Starter

A Laravel-based dashboard starter using the [Mazer](https://github.com/zuramai/mazer) theme, featuring built-in role management for Manager, Admin, and Basic User roles. This starter is customizable and flexible, providing a solid foundation for your Laravel applications.

## Features

- **Mazer Dashboard UI**: Clean and modern dashboard interface.
- **Role Management**: Pre-configured roles (Manager, Admin, Basic User).
- **Customizable Settings**: Easily modify and extend settings to fit your application's needs.
- **User Authentication**: Basic authentication system with role-based access control.
- **Laravel Framework**: Built on Laravel, offering the full power of the framework's features.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/fachryluid/laravel-mazer-dashboard-starter.git
   cd your-repository
   ```
   
2. **Install dependencies**:
   ```bash
   composer install
   ```
   
3. **Setup environment variables**:
   ```bash
   cp .env.example .env
   ```
   
4. **Generate application key**:
   ```bash
   php artisan key:generate
   ```
   
5. **Create storage symlink**:
   ```bash
   php artisan storage:link
   ```
   
6. **Run migrations**:
   ```bash
   php artisan migrate
   ```
   
7. **Run seeders**:
   ```bash
   php artisan db:seed
   ```
   
8. **Run the development server**:
   ```bash
   php artisan serve
   ```

## Default Credentials

After running the seeders, you can log in with the following default credentials:

- **Admin**:
  - Username: admin
  - Password: admin

- **Manager**:
  - Username: manager
  - Password: manager

You can modify these credentials later in the database, seeder or via the dashboard.

## Screenshots

### Login
![login](https://github.com/user-attachments/assets/36d67367-7166-466a-87e3-673d6e74b388)

### Dashboard
![dashboard](https://github.com/user-attachments/assets/44838604-59a8-4fa5-91c1-01ff66809f07)

### User Master
![user-master](https://github.com/user-attachments/assets/c943c4a9-654b-4ad9-a9a6-8855389201d9)

### Profile
![profile](https://github.com/user-attachments/assets/ae97721d-677b-4b98-9de7-935140700790)

### Security
![security](https://github.com/user-attachments/assets/afdac39d-914b-4039-ad87-dab865a278b5)

### Setting
![setting](https://github.com/user-attachments/assets/5de2ec74-39da-4f47-a2f0-758c2c2b592c)

### Admin Master
![admin-master](https://github.com/user-attachments/assets/dc06b671-18d4-4942-a79a-c3ebdfac7617)

### User Report
![user-report](https://github.com/user-attachments/assets/b49f0286-043d-4695-a7e6-99b16e518436)

### User Report Preview
![user-report-preview](https://github.com/user-attachments/assets/d7d90262-b9ca-4945-a855-9bf38fd95f74)

## License

This project is licensed under the [MIT License](LICENSE).

You are free to use, modify, and distribute the code under the terms of the MIT License. However, the software is provided "as is", without any warranties or guarantees. For more detailed information, please read the [LICENSE](LICENSE) file.
