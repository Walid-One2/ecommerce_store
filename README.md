# Laravel E-commerce Shop 🛒

Hi, this repo is a build Simple Ecommerce with laravel, this app ordering without login customer can check order with unique code. This app has only one user is admin to manage thier products customer can't register and login. Specialy for UI for client i use Atomic Design Structure.

---

## ✨ Features

- **Guest Shopping**: Browse, cart, and checkout without registration
- **Order Tracking**: Track orders using unique codes (no login required)
- **Admin Dashboard**: Product, category, and order management
- **AI Integration**: Generate descriptions (Gemini API) and images (HuggingFace API)
- **Atomic Design UI**: Clean, scalable component structure

---

## 🛠️ Tech Stack

- **Backend**: Laravel 9, PHP 8.0.2+
- **Database**: MySQL
- **Frontend**: Blade Templates, Laravel Mix

---

## 🚀 Quick Start

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Setup Database
Edit `.env` with your database credentials:
```env
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run migrations:
```bash
php artisan migrate
php artisan db:seed  # Optional: sample data
```

### 4. Build Assets & Run
```bash
npm run dev
php artisan storage:link
php artisan serve
```

**Access**: http://localhost:8000

---

## 🌐 Key Routes

**Customer**:
- `/` - Home
- `/products` - Browse products
- `/checkout` - Checkout
- `/check-order` - Track order

**Admin** (auth required):
- `/admin/products` - Manage products
- `/admin/orders` - Manage orders
- `/admin/category` - Manage categories

---

## 🔑 AI Features (Optional)

Add to `.env`:
```env
GEMINI_KEY=your_key
HUGGINGFACE_API_KEY=your_key
```

---

## 📝 Notes

- Single admin system (customers shop as guests)
- Order tracking via unique codes instead of accounts
- Atomic Design structure in `resources/views/`

---

## 🆘 Common Issues

```bash
# Class not found
composer dump-autoload

# Permission errors
chmod -R 775 storage bootstrap/cache

# Images not showing
php artisan storage:link

# Clear cache
php artisan optimize:clear
```

---

