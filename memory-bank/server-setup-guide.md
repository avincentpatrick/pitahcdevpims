# Server Setup Guide for Laravel Development

This guide provides the necessary steps to set up a fresh development server for a Laravel project, ensuring all required dependencies and configurations are in place to avoid common issues.

## 1. Install Development Environment

### Laragon

Laragon provides a portable, isolated, and fast development environment. It includes PHP, MySQL (MariaDB), Apache, and more.

1.  **Download Laragon:** Get the latest version from the [official website](https://laragon.org/download/).
2.  **Install Laragon:** Follow the installation wizard. It is recommended to install it in the root of your drive (e.g., `C:\laragon`).

### Git

Git is a version control system for tracking changes in your code.

1.  **Download Git:** Get the installer from the [official website](https://git-scm.com/downloads).
2.  **Install Git:** Follow the installation wizard, accepting the default options.

### HeidiSQL

HeidiSQL is a lightweight and powerful database management tool. It is included with Laragon, so no separate installation is needed if you are using Laragon.

## 2. Configure PHP

Laragon makes it easy to manage PHP versions and extensions.

1.  **Enable PHP Extensions:**
    -   Right-click on the Laragon icon in the system tray.
    -   Navigate to `PHP > Extensions`.
    -   Ensure the following extensions are checked:
        -   `fileinfo`
        -   `zip`
        -   `openssl`
        -   `mbstring`
        -   `curl`
        -   `pdo_mysql`
        -   `gd`
        -   `intl`
        -   `exif`
        -   `sockets`

## 3. Install Composer

Composer is a dependency manager for PHP.

1.  **Download Composer:** Get the installer from the [official website](https://getcomposer.org).
2.  **Install Composer:** Run the installer and point it to the PHP executable within your Laragon installation (e.g., `C:\laragon\bin\php\php-8.x.x-Win32-vs16-x64\php.exe`).

## 4. Project Setup

Once your environment is configured, follow these steps to set up your Laravel project:

1.  **Clone the project repository:**
    ```bash
    git clone <repository-url>
    ```

2.  **Navigate to the project directory:**
    ```bash
    cd <project-directory>
    ```

3.  **Install dependencies:**
    ```bash
    composer install
    ```

4.  **Create the `.env` file:**
    ```bash
    cp .env.example .env
    ```

5.  **Generate the application key:**
    ```bash
    php artisan key:generate
    ```

6.  **Configure your database connection** in the `.env` file.

7.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```

By following these steps, you can ensure a smooth setup process for your Laravel projects.
