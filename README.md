# Inventory Management System (Laravel API)

This is a Laravel-based Inventory Management System that provides APIs for managing products, warehouses, stock movements, and generating inventory reports.

## 📦 Features

- User registration & authentication (API-based)
- Product and warehouse management
- Stock movement tracking (`in` & `out`)
- Inventory report with filters (product/warehouse)
- Jobs for logging stock movements
- API Resources for structured responses

---

##  Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/inventory_management.git
cd inventory_management

### API Endpoints
## Authentication
Register: POST /api/register
{
  "name": "Test User",
  "email": "test@example.com",
  "password": "password"
}

Login: POST /api/login
{
  "email": "test@example.com",
  "password": "password"
}
Logout: POST api/logout

## Stock Movement

Update the stock level dynamically for authenticated users
parameters{
    "product_id": "1",
    "warehouse_id": "10",
    "quantity": "4",
    "type": "in",
    "movement_date": "2025-05-24"
}
POST /api/stock-movements
Authorization: Bearer {token}

## Inventory Report
Report: GET /api/inventory-report?product_id=1&warehouse_id=1

## Requirements
1) PHP 8.2.12
2) Laravel 10.48.29
3) MySQL
4) Composer

