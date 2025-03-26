# Halcon Order Tracking

## Description
**Halcon** is a web application designed to optimize the order management of a building materials distributor. It allows customers to check the status of their orders and employees to manage the life cycle of each order efficiently.

## Main Functionalities
### For Customers:
- Consult the status of an order by entering your customer number and invoice number.
- View photo evidence when the order has been delivered.

### For Employees (Administrative Dashboard):
- Register new orders and assign them an invoice number.
- Manage the status flow of orders:
  - **Ordered** → **In Process** → **En Route** → **Delivered**.
- Upload and view photos as evidence of delivery.
- Search orders by invoice number, customer, date or status.
- Modify or delete (logically) orders.
- Restore deleted orders.

## New Features and Implementations:

### 1. **Database Setup:**
- **Migrations:** 
  - Created and ran migrations to define the necessary database structure for users, roles, orders, and order statuses.
  - The tables created include:
    - `users`: Store employee details.
    - `roles`: Define user roles based on departments (Sales, Purchasing, Warehouse, Route).
    - `order_statuses`: Define the possible statuses an order can have.
    - `orders`: Store information about customer orders.
  
### 2. **Models:**
- Created models that map to the database tables to handle the business logic for the entities. These models include:
  - `User`: Represents an employee in the system, with relationships to roles.
  - `Role`: Represents a role/department assigned to each employee.
  - `Order`: Represents an order with a relation to its status and photo evidence.
  - `OrderStatus`: Defines the status that an order can have during its lifecycle (Ordered, In Process, En Route, Delivered).
  
### 3. **Factories and Seeders:**
- **Factories:** 
  - Created model factories to generate fake data for testing. These include:
    - `UserFactory`: Generate fake users for different roles (Sales, Purchasing, Warehouse, Route).
    - `OrderFactory`: Generate fake orders with randomized statuses and related data.

- **Seeders:** 
  - Created seeders to populate the database with initial data. These seeders include:
    - `RoleSeeder`: Populate the `roles` table with predefined roles.
    - `OrderStatusSeeder`: Populate the `order_statuses` table with default order statuses (Ordered, In Process, En Route, Delivered).

### 4. **Views and Routes:**
- **Views:** 
  - Developed views for both customers and employees with Laravel Blade templates:
    - **For Customers:**
      - A page to check the order status by entering the customer number and invoice number.
      - If the order is "Delivered," a photo evidence of the delivery is shown.
      - If the order is "In Process," the name and date of the current process are displayed.
    
    - **For Employees:**
      - **Panel de Control**: Links to manage users, orders, and order statuses.
      - **Users Management:**
        - List of users (active/inactive).
        - Option to create a new user, assign roles, and manage user departments.
        - Option to edit or deactivate users.
      - **Orders Management:**
        - List of all orders from the latest to the oldest.
        - Create new orders and assign invoice numbers.
        - Change the order status (Ordered → In Process → En Route → Delivered).
        - Upload delivery photos for orders in "En Route" or "Delivered" status.
        - View details of an individual order.
        - Delete orders logically (mark as inactive).
        - Restore logically deleted orders.
