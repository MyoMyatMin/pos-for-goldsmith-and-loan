# POS for Goldsmith and Loan

## Overview
A comprehensive Point of Sale (POS) system specifically designed for goldsmith and loan businesses. This application efficiently manages sales, mortgages, buybacks, and other financial transactions with detailed record-keeping capabilities. Built with Laravel, this system provides an intuitive interface for tracking customer data, sales details, and financial records.

## Features

### Core Modules
- **Sales Management**
  - Record sales transactions with detailed customer information
  - Track sales by weight, quality, and amount
  - Manage partial payments and debts
  - Generate sales vouchers

- **Mortgage System**
  - Record mortgage transactions with customer details
  - Track mortgage items, weights, and amounts
  - Calculate and apply interest rates
  - Process redemption of mortgaged items

- **Buyback Management**
  - Record buyback transactions
  - Track item details, weights, and quality
  - Maintain comprehensive buyback records

- **Financial Tracking**
  - Daily profits reporting
  - Gold price management
  - Debt tracking and collection
  - Charge amount calculations

### Additional Features
- **User Management**
  - Role-based access control (admin and regular users)
  - User activity tracking
  - Secure authentication

- **Reporting**
  - Transaction history by user
  - Financial summaries
  - Debt status reports

- **Search & Filter**
  - Filter records by date range
  - Search by customer name and other parameters
  - Advanced sorting and filtering options

- **Utilities**
  - Gold weight calculator
  - Plain voucher generation
  - Today's gold price management

## Technology Stack

### Backend
- **Framework**: Laravel 9.x
- **PHP**: 8.0.2+
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel's built-in authentication

### Frontend
- **UI Framework**: Bootstrap
- **JavaScript**: Axios, Lodash
- **Build Tool**: Vite

## Installation

### Prerequisites
- PHP >= 8.0.2
- Composer
- Node.js and NPM
- MySQL or PostgreSQL

### Setup Instructions

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/pos-for-goldsmith-and-loan.git
   cd pos-for-goldsmith-and-loan
   ```
2. Install PHP dependencies
   ```bash
   composer install
   ```
3. Install JavaScript dependencies
   ```bash
   npm install
   ```
4. Create a copy of your `.env` file
   ```bash
   cp .env.example .env
   ```
5. Generate a new application key
   ```bash
   php artisan key:generate
   ```
6. Configure your database in the `.env` file
7. Run database migrations
   ```bash
   php artisan migrate
   ```
8. Start the development server
   ```bash
   php artisan serve
   ```
9. Compile assets
   ```bash
   npm run dev
   ```
10. Start the development server
    ```bash
    php artisan serve
    ```
## Usage
1. Access the application at http://localhost:8000
2. Login with admin credentials
3. Navigate through the dashboard to access different modules
4. Use the search functionality to find specific records
5. Generate reports as needed