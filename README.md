# WPoets Full Stack Developer Assignment

## Overview

This project is a Full Stack PHP application developed as part of the WPoets Full Stack Developer assessment.

The application provides:

* Category Management (CRUD)
* Slide Management (CRUD)
* Dynamic Tab/Accordion Interface
* Responsive Design
* Synchronized Content and Image Slider
* MySQL Database Integration
* PHP OOP Architecture using PDO

---

## Technologies Used

### Backend

* PHP 8+
* MySQL
* PDO (Prepared Statements)
* Object-Oriented Programming (OOP)

### Frontend

* HTML5
* CSS3
* Bootstrap 5
* jQuery
* Slick Slider

---

## Features

### Admin Panel

#### Categories

* Create Category
* Update Category
* Delete Category
* View Category List

#### Slides

* Create Slide
* Update Slide
* Delete Slide
* Upload Images
* Assign Slides to Categories

### Frontend

#### Desktop View

* Left column contains category tabs
* Center column contains content slider
* Right column contains synchronized image
* Clicking a tab loads its corresponding slider
* Slider navigation updates image automatically

#### Mobile View

* Tabs behave as accordion items
* Active slider appears below selected tab
* Images are displayed as slide backgrounds

---

## Project Structure

slider-project/

├── admin/
│	├──asset ├──js ├── admin-slider.js

│ ├── admin-ajax.php

│ ├── categories.php

│ ├── category-form.php

│ ├── slide-form.php

│ └── slides.php


├── uploads/

│

├── assets/

│ ├── css/
	  ├── slider.css

│ ├── js/
	├── slider.js

│ └── images/

│
├── config.php
├── DB_Connection.php
├── slider.php
├── index.php

└── README.md

---

## Database Setup

### Create Database

```sql
CREATE DATABASE wpoets_assignment;
```

### Import Schema

```sql
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS slides (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    title VARCHAR(255),
    tag VARCHAR(255),
    image VARCHAR(255),
    link VARCHAR(255),
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(category_id)
    REFERENCES categories(id)
);
```

---

## Installation

### Clone Repository

```bash
git clone https://github.com/sushmabiradar93/full-stack-test.git
```

### Configure Database

Update database credentials inside:

```php
config.php
```

Example:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'wpoets_assignment');
define('DB_USERMAME', 'root');
define('DB_PASSWORD', '');
```

### Run Project

Place project inside your local server:

For XAMPP:

```text
htdocs/slider-project/
```

Open:

```text
http://localhost/slider-project
```

---

## Security Considerations

Implemented:

* PDO Prepared Statements
* Output Escaping using htmlspecialchars()
* File Upload Validation

Potential Improvements:

* CSRF Protection
* Authentication System
* Role Based Permissions
* Image Type Validation
* Rate Limiting

---

## Performance Considerations

* Optimized SQL Queries
* Lazy Loaded Slider Images
* Single Slick Initialization
* Reusable CRUD Class
* Efficient DOM Manipulation

---

## Assumptions

* Categories represent tabs.
* Slides belong to a category.
* One category can have multiple slides.
* Images are uploaded locally.

---

## Future Improvements

Given additional time I would:

* Create menu, header, footer and dashboard page
* Add server-side validation and CSRF protection.
* Optimize image loading with lazy loading.
* Add drag-and-drop sorting for tabs and slides.
* Add datatables for backend for easy search and pagination, with responsive design
* preview image in edit slide
* implement sort order
* Add login, register for admin panel
---

## Author

Name: Sushma Biradar

Email: [sushmabiradar93@gmail.com]
