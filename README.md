# SinodTech CRM & Sales Management Assignment

A Laravel 11 based Sales & Customer Relationship Management (CRM) application developed as part of the SinodTech Technical Assessment.

The project demonstrates Sales & Inventory Management, Customer Relationship Management (CRM), Employee Assignment, KPI Tracking, Email Queue, Invoice Email and Secure REST API implementation.

---

# Technology Stack

- PHP 8.3+
- Laravel 11
- MySQL
- Blade
- Bootstrap 5
- jQuery
- Laravel Queue (Database Driver)
- Laravel Sanctum
- SMTP (Mailtrap)

---

# Completed Features

## 1. Sales & Inventory Management

- Product Catalog
- Multi Branch Inventory
- Record Sales
- Automatic Inventory Deduction
- Prevent Negative Stock
- Invoice Number Generation
- Sale Details Page
- HTML Invoice Email

---

## 2. Customer Relationship Management (CRM)

### Customer Purchase History

- Purchase Records
- Purchase Frequency
- Last Purchase Date
- Total Purchase Amount

### Lost Customer Detection

Customers who have not purchased within the configurable period (default 90 days) are automatically identified as Lost Customers.

---

### Customer Re-engagement

- Promotional Email
- Queue Based Email Sending
- SMTP Integration (Mailtrap)

---

### Employee Assignment

- Assign Lost Customers to Employees
- One Customer → One Employee
- Employee retains ownership permanently

---

### KPI Tracking

Employee KPI automatically increases when:

- A Lost Customer purchases again
- A Never Purchased customer purchases for the first time

Employee KPI does **NOT** increase for already active customers.

---

## 3. Email Invoice

After every successful sale:

- HTML Invoice is generated
- Invoice is sent automatically using Queue

---

## 4. Secure REST API

Implemented using Laravel Sanctum.

### Endpoint

```
POST /api/token
```

Returns

```
Bearer Token
```

Authenticated Endpoint

```
GET /api/products
```

Response

```
SKU
Product Name
Price
Available Stock
```

---

# Business Flow

```
Branch

↓

Inventory

↓

Customer

↓

Sale

↓

Inventory Deduction

↓

Purchase History

↓

Lost Customer Detection

↓

Employee Assignment

↓

Customer Purchases Again

↓

Employee KPI Increased

↓

Invoice Email Sent
```

---

# Installation

Clone Repository

```bash
git clone https://github.com/Rajiur-Rahman-Raj/sinodtech-assignment.git
```

```bash
cd sinodtech-assignment
```

Install Dependencies

```bash
composer install
```

```bash
npm install
```

Copy Environment File

```bash
cp .env.example .env
```

Generate Application Key

```bash
php artisan key:generate
```

---

# Environment Configuration

Configure your database inside the `.env` file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sinodtech
DB_USERNAME=root
DB_PASSWORD=
```

Configure Mailtrap SMTP

```
MAIL_MAILER=smtp
MAIL_HOST=your-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="SinodTech"
```

Queue Driver

```
QUEUE_CONNECTION=database
```

---

# Database Setup

Run Migrations

```bash
php artisan migrate
```

Run Seeders

```bash
php artisan db:seed
```

Or

```bash
php artisan migrate:fresh --seed
```

---

# Admin Login Credential

Email:
admin@gmail.com

Password:
12345678

# Run Queue Worker

Required for

- Promotion Email
- Invoice Email

```bash
php artisan queue:work
```

---

# Start Development Server

Backend

```bash
php artisan serve
```

Frontend

```bash
npm run dev
```

---

# Seeded Data

The application includes realistic sample data for:
- Admin
- Branches
- Products
- Inventory
- Customers
- Employees
- Sales
- Sale Items
- CustomerAssignment
- InventoryAdjustmentSeeder

The project is ready for testing immediately after running the seeders.

---

# REST API

## Generate Token

```
POST

/api/token
```

Body

```json
{
    "email":"admin@example.com",
    "password":"password"
}
```

---

Use Returned Token

```
Authorization

Bearer YOUR_TOKEN
```

---

Get Products

```
GET

/api/products
```

Returns

```json
[
    {
        "sku":"LAP-1001",
        "product_name":"Dell Inspiron 15",
        "price":"65000.00",
        "available_stock":20
    }
]
```

---

# Project Structure

```
Branch
│
├── Product
│
├── Inventory
│
├── Customer
│
├── Employee
│
├── Sales
│
├── Purchase History
│
├── Lost Customer Detection
│
├── Employee Assignment
│
├── KPI Tracking
│
├── Promotion Email
│
├── Invoice Email
│
└── REST API
```

---

# Queue Features

- Promotion Email Queue
- Invoice Email Queue

---

# Authentication

- Session Authentication (Admin Panel)
- Laravel Sanctum (REST API)

---

# Notes

- Inventory is maintained per branch.
- Stock is deducted automatically after every sale.
- Negative stock is prevented.
- Lost customer period is configurable.
- Employee KPI is calculated automatically based on customer re-engagement.
- Email sending is processed asynchronously using Laravel Queue.

---

# Author

**Rajiur Rahman**

Software Engineer

Laravel Developer
