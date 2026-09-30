# Phase 2 – Requirements Analysis & System Design

## Functional Requirements
### Customer
- Register and login
- Book a courier
- Generate tracking number
- View courier history
- Track courier status

### Admin
- Login
- View customers
- View all courier bookings
- Update courier status
- Manage delivery staff
- View dashboard statistics

### Delivery Staff
- Login
- View assigned deliveries
- Update delivery status

## Non-Functional Requirements
- Easy to use
- Responsive basic UI
- Data consistency
- Authentication for protected pages
- Fast database operations
- Maintainable code structure

## Main Entities
- users
- couriers
- status_history

## Basic Data Flow
Customer → Login → Book Courier → Tracking Number → Courier Processing → Status Updates → Delivery

## Database Design
### users
id, name, email, password, phone, address, role

### couriers
id, tracking_number, sender_name, sender_phone, sender_address, receiver_name, receiver_phone, receiver_address, parcel_type, weight, amount, status, assigned_staff, created_at

### status_history
id, courier_id, status, remarks, updated_by, updated_at
