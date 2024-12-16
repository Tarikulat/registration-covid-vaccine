<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About My Project

# COVID Vaccine Registration System

This is a Laravel-based COVID Vaccine Registration System designed to streamline vaccine registration and scheduling. The project adheres to the following specifications:

## Features

### 1. **User Registration**
- Users can register for a single dose of the vaccine.
- Vaccine center selection is required during registration.

### 2. **Vaccine Center Management**
- Each vaccine center has a configurable daily capacity for handling registrations.

### 3. **Email Notifications**
- Automated email notifications are sent to users at 9 PM before their scheduled vaccination date.

### 4. **Status Search**
- Users can search for their vaccination status by entering their NID (National ID) without authentication.
- The following statuses are displayed:
  - **Not Registered**: Includes a link to the registration page.
  - **Not Scheduled**: Indicates the user is registered but not yet scheduled.
  - **Scheduled**: Displays the scheduled vaccination date.
  - **Vaccinated**: Shown if the vaccination date has passed.

## Installation

1. **Clone the repository:**
   ```bash
   git clone: https://github.com/Tarikulat/registration-covid-vaccine.git
   cd registration-covid-vaccine
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Set up the environment file:**
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update database and mail configurations in the `.env` file.

4. **Run migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

6. **Build front-end assets (if applicable):**
   ```bash
   npm run dev
   ```

7. **Start the development server:**
   ```bash
   php artisan serve
   ```

## Usage

### Register for Vaccination
- Navigate to `/register` to sign up for vaccination and select a vaccine center.

### Search Vaccination Status
- Navigate to `/search` and enter the NID to check the vaccination status.

## Project Structure

- **Models:**
  - `User`: Handles user data.
  - `VaccineCenter`: Manages vaccine center details.
  - `Vaccination`: Tracks user vaccination details.

- **Controllers:**
  - `RegistrationController`: Manages user registration.
  - `StatusController`: Handles vaccination status search.
  - `NotificationController`: Sends email notifications.

- **Mail:**
  - `VaccinationNotification`: Sends scheduled email notifications.

## Scheduler

The email notifications are sent using Laravel's task scheduler. Ensure the scheduler is running:
```bash
php artisan schedule:work
```

## Testing

To run tests for the application:
```bash
php artisan test
```

## License

This project is open-source and available under the [MIT License](LICENSE).

## Contact

For questions or issues, feel free to reach out:
- **Developer:** Md Tarikul Islam 
- **Email:** tarikulat124@gmail.com


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
