# Laravel Inventory Management System

## Project Overview
The Laravel Inventory Management System is a web-based application designed to efficiently manage product inventory, categories, and student records. This system provides a comprehensive solution for tracking products, managing categories, and maintaining student information in an educational context.

## Objectives
- Create a user-friendly inventory management system
- Implement CRUD operations for products, categories, and student records
- Maintain accurate product stock levels and category organization
- Provide a streamlined interface for student registration and management
- Ensure data integrity and validation throughout the system

## Features
### Product Management
- Create, view, edit, and delete products
- Track product information (name, description, price, quantity, SKU)
- Assign products to categories
- Monitor stock levels

### Category Management
- Organize products into categories
- Add, edit, and delete categories
- Associate products with specific categories
- Category description and metadata management

### Student Registration
- Register new students with detailed information
- Track student records (ID, name, email, contact info)
- Manage student enrollment
- Update and maintain student profiles

## Installation Instructions
1. Clone the repository:
```bash
git clone https://github.com/shinji322/InventorySystem.git
cd Inventory_System
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install NPM dependencies:
```bash
npm install
```

4. Set up environment file:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure database in `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run migrations and seeders:
```bash
php artisan migrate
php artisan db:seed
```

7. Start the development server:
```bash
php artisan serve
npm run dev
```

## Usage
1. Access the system through your web browser at `http://localhost:8000`
2. Navigate through the main modules:
   - Products: Manage inventory items
   - Categories: Organize products
   - Students: Handle student registration

### Example Code Structures

#### Product Model
```php
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'sku',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
```

#### Category Model
```php
class Category extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
```

#### Student Model
```php
class Student extends Model
{
    protected $fillable = [
        'studentNumber',
        'lname',
        'fname',
        'mi',
        'email',
        'contactNumber'
    ];
}
```

#### Example Controller (ProductController)
```php
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|string|max:50|unique:products,sku',
            'category_id' => 'required|exists:categories,id'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }
}
```

## Contributors
- Daryl Dave Llarenas (Developer)
