# QcareN Demo

QcareN Demo is a comprehensive company portal web application built with PHP (CodeIgniter), designed for businesses in Qatar to manage their operations, staff, services, analytics, and customer interactions efficiently.

---

## Full Features

### 1. Company Management
- Register and manage multiple companies.
- Edit company profiles, logos, and gallery images.
- Assign cities to companies.

### 2. Staff Management
- Add, edit, and remove staff members.
- Assign staff to companies.
- View staff profiles and details.

### 3. Service Management
- Create and manage services offered by companies.
- Assign services to staff (staff-service mapping).
- View all services and their associations.

### 4. Staff-Service Mapping
- Map services to individual staff members.
- View and manage which staff provide which services.
- Analytics on services mapped to staff per company.

### 5. Gallery Management
- Upload and manage multimedia (images, photos) for each company.
- Display gallery on company profile.

### 6. Inquiry Management
- Receive and manage customer inquiries.
- View inquiry details and respond.
- Inquiry viewer for analytics and tracking.

### 7. Analytics Dashboard
- Key Performance Indicators (KPIs): total companies, staff, services, cities, services mapped to staff.
- Visual analytics and graphs (stub for future enhancements).
- Activity logs for company actions.

### 8. SEO Meta Management
- Manage SEO meta tags for company profiles.
- Improve search engine visibility.

### 9. Activity Log
- Track and view company activities and changes.
- Audit trail for administrative actions.

### 10. Authentication & Security
- Company user login/logout.
- Secure session management.
- Highlighted logout button for easy access.

### 11. Responsive UI
- Mobile-friendly design using Bootstrap 5.
- Sidebar navigation for quick access to modules.
- Fixed header with branding and logout.

---

## Project Modules & Functionalities

### Company Module
- List all companies.
- View detailed company profiles.
- Edit company information.
- Assign city and logo.
- Manage company gallery.

### Staff Module
- List staff members per company.
- Add/edit/delete staff.
- View staff profiles.
- Assign staff to services.

### Service Module
- List all services.
- Add/edit/delete services.
- Assign services to staff.
- View service mapping analytics.

### Staff-Service Mapping Module
- Map services to staff.
- View mapping table per company.
- Analytics on service assignments.

### Gallery Module
- Upload images for company gallery.
- View and manage gallery items.

### Inquiry Module
- Receive customer inquiries.
- List and view inquiries.
- Inquiry viewer for analytics.

### Analytics Module
- Dashboard with KPIs.
- Visual representation of company data.
- Track total companies, staff, services, cities, and service mappings.

### SEO Meta Module
- Manage SEO meta tags for company profiles.

### Activity Log Module
- View logs of company activities.
- Track changes and actions.

### Authentication Module
- Secure login/logout for company users.
- Session management.

---

## Installation

1. **Clone the repository**
   ```
   git clone https://github.com/yourusername/QcareN-demo.git
   ```

2. **Set up your environment**
   - Install [WAMP](https://www.wampserver.com/) or use any compatible LAMP/XAMPP stack.
   - Place the project folder in your web server directory (e.g., `c:\wamp64\www\QcareN-demo`).

3. **Configure the database**
   - Create a MySQL database (e.g., `qcare_demo`).
   - Import the provided SQL schema and seed data.
   - Update `app\Config\Database.php` with your DB credentials.

4. **Install dependencies**
   - If using Composer:
     ```
     composer install
     ```

5. **Run migrations and seeders**
   ```
   php artisan migrate
   php artisan db:seed --class=CitiesTableSeeder
   ```

6. **Access the application**
   - Open `http://localhost/QcareN-demo` in your browser.

---

## Folder Structure

- `app/Controllers/Company/` — Company-related controllers
- `app/Models/` — Data models
- `app/Views/` — Blade templates and layouts
- `database/seeders/` — Seeder files for initial data
- `public/assets/` — Static assets (images, CSS, JS)

---

## Dependencies

- PHP 8+
- CodeIgniter 4
- Bootstrap 5
- Bootstrap Icons

---

## License

This project is for demo purposes. Please contact the author for production use.

---