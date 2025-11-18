Laravel Inventory Management System
Project Overview
The Laravel Inventory Management System is a web-based application designed to efficiently manage product inventory, categories, and student records. This system provides a comprehensive solution for tracking products, managing categories, and maintaining student information in an educational context.

Objectives
Create a user-friendly inventory management system
Implement CRUD operations for products, categories, and student records
Maintain accurate product stock levels and category organization
Provide a streamlined interface for student registration and management
Ensure data integrity and validation throughout the system
Features
Product Management
Create, view, edit, and delete products
Track product information (name, description, price, quantity, SKU)
Assign products to categories
Monitor stock levels
Category Management
Organize products into categories
Add, edit, and delete categories
Associate products with specific categories
Category description and metadata management
Student Registration
Register new students with detailed information
Track student records (ID, name, email, contact info)
Manage student enrollment
Update and maintain student profiles
Installation Instructions
Clone the repository:

bash

Copy code
git clone https://github.com/shinji322/InventorySystem.git
cd Inventory_System
Install PHP dependencies:

bash

Copy code
composer install
Install NPM dependencies:

bash

Copy code
npm install
Set up environment file:

bash

Copy code
cp .env.example .env
php artisan key:generate
Configure database in .env file:

env

Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
Run migrations and seeders:

bash

Copy code
php artisan migrate
php artisan db:seed
Start the development server:

bash

Copy code
php artisan serve
npm run dev
Usage
Access the system through your web browser at http://localhost:8000
Navigate through the main modules:
Products: Manage inventory items
Categories: Organize products
Students: Handle student registration
Example Code Structures
Product Model
php
22 lines
Copy code
Download code
Click to expand
<?php
...
Category Model
php
18 lines
Copy code
Download code
Click to expand
<?php
...
Student Model
php
17 lines
Copy code
Download code
Click to expand
<?php
...
Example Controller (ProductController)
php
30 lines
Copy code
Download code
Click to expand
<?php
...
Contributors
Daryl Dave Llarenas (Developer)
License
This project is licensed under the MIT License - see the LICENSE file for details.
