# Phase 3 – Development Documentation

## Development Environment
1. Install XAMPP.
2. Start Apache and MySQL.
3. Copy the project folder into htdocs.
4. Create the MySQL database.
5. Import database.sql.
6. Open the project through localhost.

## Main Pages
- index.php – home/login entry
- register.php – customer registration
- login.php – authentication
- dashboard.php – role-based dashboard
- book_courier.php – courier booking
- track.php – tracking
- logout.php – logout

## Backend
PHP handles authentication, courier booking, database operations and status updates.

## Database
MySQL stores users, courier records and status history.

## Security Basics
- Passwords are stored using password_hash().
- Database queries use PDO prepared statements.
- User input is validated before insertion.
- Sessions are used for login state.
