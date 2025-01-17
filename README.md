# L'amorce Management Web Application

[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2Fa5c038e0-b9a5-43a4-b23b-a7e3a8a5644c%3Flabel%3D1&style=plastic)](https://forge.laravel.com/servers/851254/sites/2588882)

This repository contains the source code for a **web application** designed to streamline the internal management of the non-profit, [l'amorce](https://lamorce.be/). The application aims to centralize and automate key processes, ensuring transparency, accuracy, and efficiency in managing funds, donations, and other operational tasks.

---

## 📋 **Table of Contents**
- [Context](#context)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [Contributing](#contributing)

---

## 🌍 **Context**

The foundation is entirely run by volunteers and lacks salaried staff. Over time, the internal management has relied on a variety of tools and workflows familiar to individual volunteers, leading to a fragmented and labor-intensive system.

This application addresses the following issues:
- Centralizing tools to simplify internal operations.
- Reducing manual effort through automation.
- Ensuring tasks are easy to understand and delegate.

---

## ✨ **Features**

### **Fund Management**
- Manage virtual funds, including:
    - General fund
    - Operational fund
    - Specific funds for collectives/associations
- Support fund creation, closure, and inter-fund transfers.

### **Donation Tracking**
- Import and process bank statements (CSV format) to track donations.
- Avoid duplicate transactions during CSV imports.
- Enable manual donation entries for offline contributions.

### **Anonymity & Privacy**
- Anonymize donor information to ensure confidentiality.
- Process CSV data in-memory without saving sensitive details.

### **Automation Strategies**
- Auto-classify donations using:
    - Recognized bank account numbers.
    - Frequent banking references (e.g., project-specific tags).
- Manual review for ambiguous or unrecognized transactions.

### **Randomized Selection for Decision Committees**
- Automate random selection of donors or collectives for specific tasks, adhering to predefined eligibility criteria.

### **Data Transparency**
- Track and log all modifications to ensure transparency and prevent errors.

---

## 🛠 **Technologies Used**
- **Backend:** Laravel, PHP
- **Frontend:** Blade, Tailwind CSS, Alpine.js, Livewire
- **Database:** MySQL
- **Others:** Git, GitHub, Composer

---

## 🚀 **Installation**

### Prerequisites
- PHP 7.2+
- Composer
- NPM or Yarn

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Cadranel-Kael/lamorce.git
   ```
2. Navigate to the project directory:
   ```bash
   cd lamorce
   ```
3. Install dependencies:
   ```bash
    composer install
    npm install
   ```
4. Set up environment variables:
    - Copy `.env.example` to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Configure database and other settings in `.env`.
5. Run migrations to set up the database:
   ```bash
   php artisan migrate
   ```
6. Seed the database with sample data (optional):
   ```bash
   php artisan db:seed
   ```
7.Start the development server:
   ```bash
   npm run dev
   ```

---

## 📖 **Usage**

1. Log in with administrator credentials to manage funds, transactions, and users.
2. Import CSV files for bank statements and verify transactions.
3. Access fund summaries, donor records, and expense details in the dashboard.

---

## 🗂 **Database Schema**

### Example Tables
- `users`: Stores volunteer and admin information.
- `funds`: Tracks virtual fund details and balances.
- `transactions`: Logs incoming/outgoing payments.
- `donations`: Tracks anonymized donation records.
- `mandates`: Tracks committee member assignments.

---

## 🤝 **Contributing**

Contributions are welcome! Please follow these steps:
1. Fork the repository.
2. Create a feature branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add new feature"
   ```
4. Push to your fork:
   ```bash
   git push origin feature-name
   ```
5. Create a pull request.

---

## 🧑‍💻 **Contact**

For questions, suggestions, or support, please contact:
- **Kael Cadranel**
- GitHub: [Cadranel-Kael](https://github.com/Cadranel-Kael)
- Website: [kael.digital](https://kael.digital/)

---  

