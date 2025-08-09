# Laravel User CRUD Application

A simple Laravel application with user authentication and CRUD operations for managing users.

## Features

- **User Authentication**: Login/logout functionality using Laravel Breeze
- **User CRUD Operations**: Create, Read, Update, Delete users
- **Dashboard**: Overview with user statistics and recent users
- **Responsive Design**: Bootstrap-styled interface
- **SQLite Database**: Simple file-based database for easy setup

## Installation

1. **Clone the repository** (if applicable) or navigate to the project directory
2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Configure environment**:
   - Copy `.env.example` to `.env` (already done)
   - The database is configured to use SQLite by default

4. **Run migrations and seeders**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Start the development server**:
   ```bash
   php artisan serve
   ```

6. **Access the application**:
   - Open your browser and go to `http://localhost:8000`
   - Register a new account or use the seeded users

## Default Users

The application comes with 5 sample users (password: `password`):
- john@example.com
- jane@example.com
- bob@example.com
- alice@example.com
- charlie@example.com

## Routes

### Authentication Routes
- `/login` - Login page
- `/register` - Registration page
- `/logout` - Logout (POST)

### User Management Routes (Protected)
- `GET /users` - List all users
- `GET /users/create` - Create user form
- `POST /users` - Store new user
- `GET /users/{id}` - Show user details
- `GET /users/{id}/edit` - Edit user form
- `PUT /users/{id}` - Update user
- `DELETE /users/{id}` - Delete user

### Dashboard
- `/dashboard` - Main dashboard with statistics

## Features Overview

### Dashboard
- Welcome message with user name
- Total user count
- Quick action links
- Recent users table
- Account information

### User Management
- **List Users**: Paginated table with all users
- **Create User**: Form with validation (name, email, password)
- **View User**: Detailed user information
- **Edit User**: Update user details (optional password change)
- **Delete User**: Confirmation dialog before deletion

### Authentication
- Secure login/logout
- Password hashing
- Session management
- Protected routes

## Database Schema

### Users Table
- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `email_verified_at` - Email verification timestamp
- `password` - Hashed password
- `remember_token` - Remember me token
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

## Technologies Used

- **Laravel 10** - PHP framework
- **Laravel Breeze** - Authentication scaffolding
- **SQLite** - Database
- **Bootstrap** - CSS framework (via Tailwind CSS)
- **Blade** - Template engine

## File Structure

```
app/
├── Http/Controllers/
│   ├── UserController.php    # User CRUD operations
│   └── ProfileController.php # User profile management
├── Models/
│   └── User.php             # User model
resources/
├── views/
│   ├── users/
│   │   ├── index.blade.php  # User list
│   │   ├── create.blade.php # Create user form
│   │   ├── edit.blade.php   # Edit user form
│   │   └── show.blade.php   # User details
│   ├── layouts/
│   │   └── navigation.blade.php # Navigation menu
│   └── dashboard.blade.php  # Dashboard
routes/
└── web.php                  # Web routes
database/
├── seeders/
│   ├── DatabaseSeeder.php   # Main seeder
│   └── UserSeeder.php       # Sample users
└── database.sqlite          # SQLite database file
```

## Usage

1. **Login**: Use any of the seeded users or register a new account
2. **Navigate**: Use the navigation menu to access different sections
3. **Manage Users**: 
   - Click "Users" in the navigation to see all users
   - Use "Add New User" to create users
   - Click "View", "Edit", or "Delete" buttons for each user
4. **Dashboard**: View statistics and quick actions

## Security Features

- Password hashing using Laravel's built-in hashing
- CSRF protection on all forms
- Input validation and sanitization
- Authentication middleware on protected routes
- SQL injection protection through Eloquent ORM

## Customization

- **Add more fields**: Modify the User model and migration
- **Change styling**: Update Blade templates and CSS
- **Add roles**: Implement role-based access control
- **Email verification**: Enable email verification in User model
- **API endpoints**: Create API routes for mobile apps

## Troubleshooting

- **Database issues**: Run `php artisan migrate:fresh --seed`
- **Permission issues**: Ensure storage and bootstrap/cache directories are writable
- **Server not starting**: Check if port 8000 is available or use `php artisan serve --port=8080`

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
