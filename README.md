# KerjaIn-Web

KerjaIn-Web is a web-based platform designed to help users discover job opportunities and connect with relevant openings in a more efficient and structured way.

## Overview

This project was created to provide a digital solution for job searching and recruitment processes. The platform aims to simplify the way users explore opportunities, review job information, and manage related activities through a single application.

## Tech Stack

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-F2F2F2?style=for-the-badge&logo=laravel&logoColor=FF2D20)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

## Features

- Job listing and search interface
- User-friendly navigation
- Responsive layout for desktop and mobile devices
- Clean and maintainable application structure
- Easy extension for future feature development
- Simple deployment-ready architecture

## Project Structure

```bash
KerjaIn-Web/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── composer.json
├── package.json
├── README.md
├── .env.example
├── .gitignore
└── artisan
```

## Getting Started

### Prerequisites

Before running this project, make sure you have the following installed:

- PHP 8.1 or later
- Composer
- MySQL
- Node.js and npm
- Git

### Installation

1. Clone the repository

```bash
git clone https://github.com/77ferdian/KerjaIn-Web.git
cd KerjaIn-Web
```

2. Install PHP dependencies

```bash
composer install
```

3. Install frontend dependencies

```bash
npm install
```

4. Configure environment variables

```bash
cp .env.example .env
```

Update the database and application configuration in the `.env` file according to your local environment.

5. Generate the application key

```bash
php artisan key:generate
```

6. Run the database migrations

```bash
php artisan migrate
```

7. Start the application

```bash
php artisan serve
```

The application will be available at:

```bash
http://localhost:8000
```

## Usage

After the application is running, users can access the platform and explore job opportunities through a structured, clean, and user-friendly interface.

## Configuration

Configuration values such as database credentials, app URL, and local environment settings should be managed in the `.env` file before running the project in development or production.

## Contributing

Contributions are welcome. To contribute:

1. Fork the repository
2. Create a new feature branch
3. Commit your changes
4. Push your branch
5. Open a pull request

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Contact

For questions, collaboration, or further information, please contact the project maintainer through the GitHub profile.
