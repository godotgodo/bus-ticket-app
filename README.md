# Bus Ticket Booking Application
This project is a bus ticket reservation application. Users can search for bus routes, make ticket reservations, check payments, send mails, create PNR and create QR code through this application.
## Getting Started
These steps explain what is needed to run the application on a local machine.
### Requirements
-   PHP 7.3 or newer
-   Composer
-   MySQL database
-   CodeIgniter 4 requirements
### Installation
1.  Clone the project from this repository:
`git clone https://github.com/username/bus-ticket-booking.git` 
2.  Navigate to the project directory:
`cd bus-ticket-booking` 
3.  Install dependencies:
Copy code
`composer install` 
4.  Create the `.env` file and add database configuration to it:
`cp env .env` 
5.  Edit the database settings in the `.env` file:
`database.default.hostname = localhost
database.default.database = database_name
database.default.username = username
database.default.password = password
database.default.DBDriver = MySQLi` 
6.  Run the migrations to create the database tables:
`php spark migrate` 
7.  Start the development server:
`php spark serve` 
8.  Open `http://localhost:8080` in your browser to view the application.
## Usage
The application allows users to search for bus routes, view available schedules, and make ticket reservations.
