# PHP Blood Bank Registration System

This is a simple PHP registration system for managing users (receivers and hospitals) with the following features:

- User registration and login
- Receiver profile update (blood group)
- Hospital profile update (hospital name)
- Basic dashboard for receivers and hospitals
- View and update blood sample requests

### Files and Directory Structure

- **db_connect.php:** Contains the database connection details.
- **register.php:** Handles user registration and updates user profiles.
- **login.php:** Handles user login and redirects to appropriate dashboards.
- **receiver_dashboard.php:** Dashboard for receivers with blood group updates.
- **hospital_dashboard.php:** Dashboard for hospitals with blood sample requests and profile updates.
- **view_requests.php:** Page for hospitals to view blood sample requests.
- **available_blood_samples.php:** Page displaying available blood samples for everyone.
- **logout.php:** Handles user logout.

### Getting Started

1. **Database Setup:** Create a MySQL database and import the included SQL file (`database.sql`) to set up the required tables.

2. **Database Connection:** Update the `db_connect.php` file with your database credentials.

3. **Web Server:** Deploy the PHP files on a web server that supports PHP (e.g., Apache, Nginx).

4. **Accessing the System:** Visit the appropriate URLs in your browser to access the registration, login, and dashboard pages.

### Additional Notes

- Make sure to implement proper security measures such as input validation, output escaping, and password hashing.
- Customize the styling and layout of the pages based on your design preferences.
- Check the code comments for additional information and customization options.

Feel free to adapt and extend this system based on your specific requirements.
