# Vanilla PHP SPA

This is a single-page app in vanilla PHP with:

- SQLite3 database
- User registration via name, team, email
- Email-based login links
- Admin approval of new users
- Session-based admin login
- Email logging when DEBUG=true

## Setup Instructions

1. **Install dependencies**:
   ```bash
   composer install
   ```

2. **Create `.env` file**:
   Copy the example below and update values as needed.

3. **Make sure the directory is writable**:
   ```bash
   chmod 777 .
   ```

4. **Start your PHP server**:
   ```bash
   php -S localhost:8080
   ```

5. **Use the app**:
   - `/` — registration/login form
   - `/admin_login.php` — admin login
   - `/admin.php` — approve users
   - `/logout.php` — logout admin

## Environment Variables (.env)

See `.env.example` for reference.
