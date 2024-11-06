# Simple Payroll System

Welcome to the **Simple Payroll System** repository! This project is developed as part of the **Information Systems** course and provides a web-based solution for managing employee payroll and daily attendance. Built using **PHP**, **JavaScript**, **jQuery**, **CSS**, **HTML**, and **MySQL**, this system allows you to manage employee records, track attendance, calculate payroll, and generate reports.

## Project Overview

This system includes several key modules for employee management, attendance tracking, payroll calculation, and reporting. Below is an overview of the core modules:

### Modules

1. **Daily Attendance**
   - Employees can clock in and out by entering their employee ID, capturing their time in and time out.
   - The system also allows searching for attendance records based on employee ID and date.
   - This module is essential for tracking employee work hours and ensuring accurate payroll calculation.

2. **Add New Payroll Record**
   - Add new payroll records for employees.
   - Payroll records include salary calculations based on hours worked, deductions, and earnings.
   - This module ensures that each employee’s earnings are properly calculated and stored.

3. **Manage Employee Basic Info**
   - Manage the essential details of each employee, such as name, employee ID, job title, and contact information.
   - This helps maintain an up-to-date database of employees for payroll and attendance tracking purposes.

4. **Manage Employee Earnings and Deductions**
   - Configure and update employee earnings (such as basic salary, overtime, etc.) and deductions (such as tax, insurance, etc.).
   - This module allows adjustments and updates to employee pay details, ensuring accurate payroll processing.

5. **View Reports**
   - Generate detailed reports on employee attendance, salary, and payroll.
   - Generate employee-wise reports, including attendance summaries and salary breakdowns.

## Technologies Used

- **PHP**: Server-side scripting language to handle backend logic and process payroll calculations.
- **MySQL**: Database management system to store employee information, attendance records, and payroll data.
- **JavaScript & jQuery**: Used for dynamic interactions, such as real-time searching of employee data and updating records without page reload.
- **HTML & CSS**: For structuring and styling the front-end user interface.
- **Bootstrap**: Front-end framework for creating a responsive and modern layout.

## Getting Started

To run this project locally, follow the steps below:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/simple_payroll_system.git
   ```

2. **Set up the database**:
   - Import the provided SQL file to create the necessary database and tables for the application.
   - Update the database connection settings in the `config.php` file with your MySQL credentials.

3. **Install dependencies**:
   - Ensure you have a local web server (e.g., XAMPP, WAMP, or LAMP) to run PHP and MySQL.
   - Confirm that jQuery and Bootstrap are correctly linked in the project.

4. **Navigate to the project folder**:
   ```bash
   cd simple_payroll_system
   ```

5. **Access the project**:
   - Open the project in your browser using the local server URL (e.g., `http://localhost/simple_payroll_system`).

6. **Log in**:
   - Use the default admin credentials (or set up new user accounts) to access the system.

## Features

- **Attendance Tracking**: Easily record and manage employee attendance by logging time in and out.
- **Payroll Management**: Add and update payroll records with automatic calculations based on attendance and earnings.
- **Employee Info Management**: Maintain employee details such as personal information and salary components.
- **Earnings and Deductions**: Configure and adjust earnings and deductions for accurate payroll processing.
- **Reports**: Generate attendance, salary, and employee reports, and export them to PDF for documentation.

## Contributing

We welcome contributions! If you'd like to improve or extend the project, feel free to fork the repository, make changes, and submit a pull request.

### Steps for contributing:
1. Fork the repository.
2. Create a new branch and make your changes.
3. Submit a pull request with a description of your changes.

---

This **Simple Payroll System** serves as a comprehensive solution for managing employee payroll and daily attendance. It is a practical tool for businesses that need a streamlined way to track employee hours, manage payroll, and generate reports. With features like attendance logging, payroll management, and employee record keeping, this system simplifies payroll tasks and ensures accurate compensation for all employees.
