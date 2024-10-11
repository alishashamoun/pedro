# Pedro

Pedro is a powerful, easy-to-use Laravel-based web application designed to streamline your business operations. With features such as user authentication, role-based access control, and a parent-child user hierarchy, Pedro ensures efficient data management and visibility across different user levels.

## Features

- **User Authentication**: Secure login and registration for a seamless user experience.
- **Role-Based Access Control**: Customizable roles with specific permissions for fine-grained control.
- **Parent-Child User Hierarchy**: Empower parent users to manage and view data for their child users.
- **Data Management**: Quickly handle and retrieve user-specific data for informed decision-making.

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/DcSyedFaraz/pedro.git
   ```
Navigate to the project directory:


```
cd pedro
```
2. Install dependencies:
```
composer install
npm install
```

3. Set up the environment file:


```
cp .env.example .env
```
4. Configure the .env file with your database and other necessary settings.

Generate the application key:


```
php artisan key:generate
```
5. Run the migrations:


```
php artisan migrate
```
## Usage
Start the local development server:


```php artisan serve```
Access the application at http://localhost:8000.

## Contributing
Feel free to fork this repository and contribute by submitting pull requests. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is open-source and available under the MIT License.

## Contact
For more information, visit the GitHub repository.
