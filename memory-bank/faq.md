# Frequently Asked Questions (FAQ)

This document provides answers to common issues encountered during the development of the PITAHC DEVPIMS project.

---

### Q1: Why is the `php artisan migrate` command failing with a "file not found" error for `vendor/autoload.php`?

**A:** This error occurs when the project's dependencies, which are managed by Composer, have not been installed. The `vendor` directory is created by Composer, and without it, the application cannot load the necessary files.

**Solution:**
Run the following command in the project's root directory to install the dependencies:
```bash
composer install
```

---

### Q2: Why is `composer install` or `composer update` failing with errors about PHP version incompatibility or missing extensions (e.g., `fileinfo`, `zip`, `gd`)?

**A:** This happens for two main reasons:
1.  The `composer.lock` file was created with a different PHP version than the one you are currently using.
2.  The required PHP extensions for the project's dependencies are not enabled in your `php.ini` file.

**Solution:**
1.  **Update Composer Dependencies:** If there's a version mismatch, run `composer update` to get versions of the packages that are compatible with your environment.
2.  **Enable PHP Extensions:** Open your `php.ini` file and uncomment the required extensions by removing the semicolon (`;`) at the beginning of the line. For this project, ensure the following are enabled:
    ```ini
    extension=fileinfo
    extension=zip
    extension=openssl
    extension=mbstring
    extension=curl
    extension=pdo_mysql
    extension=gd
    extension=intl
    extension=exif
    extension=sockets
    ```
    After saving the changes, you may need to restart your web server (e.g., Laragon, XAMPP).

---

### Q3: Why am I seeing "deprecation notice" messages when I run `php artisan` commands?

**A:** These notices appear because the version of Laravel used in this project (v8) was written before certain changes were introduced in newer versions of PHP (8.1+). Your current PHP version is stricter about how code should be written and is warning you that some of the framework's code uses an older style.

**Solution:**
These are **not critical errors** and will not break your application. For development, they can be safely ignored. The long-term solution is to upgrade the Laravel framework to a version that is fully compatible with the latest PHP standards.

---

### Q4: Why can't I access the application in my web browser?

**A:** This usually means the local development server is not running. Laravel has a built-in server that you can use for development.

**Solution:**
Run the following command from the project's root directory to start the server:
```bash
php artisan serve
```
This will make the application available at a local URL, typically `http://127.0.0.1:8000`.
