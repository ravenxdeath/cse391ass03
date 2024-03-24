# Car Repair Management System Database Schema

This database schema is designed to manage a car repair management system, including clients, mechanics, appointments, cars, and administrators.

## Tables

### Client/User:
- ClientID (Primary Key)
- Name
- Username

- PasswordHash
- Phone
- Email (if applicable)

### Mechanic:
- MechanicID (Primary Key)
- Username
- Name
- PasswordHash
- Specialization (e.g., Senior Mechanic, Junior Mechanic)
- Daily Car Capacity (will be set by admin)
- AverageRating
- TotalRatings

### Appointment:
- AppointmentID (Primary Key)
- ClientID (Foreign Key referencing Client table)
- MechanicID (Foreign Key referencing Mechanic table)
- Appointment Date
- Appointment Time
- Appointment Type (e.g., Regular, Priority)
- Status (e.g., Scheduled, Completed, Canceled)
- Service Requested: Details about the service requested by the client.
- Parts Needed: If any parts need to be ordered for the appointment.
- Notes: Additional notes or instructions from either the client or the mechanic.

### Car:
- CarID (Primary Key)
- ClientID (Foreign Key referencing Client table)
- Car Color
- Car License Number
- Car Engine Number
- Car Model
- Year of Manufacture
- Additional Details (e.g., Make, Model, Mileage)
- Maintenance History: Track past maintenance and repairs performed on the car.

### Admin:
- AdminID (Primary Key)
- Name
- Username
- PasswordHash
- Email
- Phone

## Ratings and Reviews
### Ratings:
- RatingID (Primary Key)
- MechanicID (Foreign Key referencing Mechanic table)
- ClientID (Foreign Key referencing Client table)
- Rating
- Review
- Date


## log in informantion 

### admin-
admin admin
root root

### client-
raven raven

### mechanics-
pinkman pinkman
heisenberg heisenberg 
