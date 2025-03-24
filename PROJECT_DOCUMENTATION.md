# Residentz - Society Management System Documentation

## Project Overview
Residentz is a comprehensive web-based society management system that helps residential communities manage their day-to-day operations digitally. The system includes features for maintenance management, complaints handling, polling, and community communication.

## Technical Stack
- Frontend: HTML5, CSS3, JavaScript
- Backend: PHP
- Database: MySQL
- Server: WAMP/XAMPP

## File Structure and Functionality

### 1. Frontend Files

#### `index.html`
- Main entry point of the application
- Contains dashboard interface
- Handles user authentication state
- Features:
  - Dynamic navigation
  - Society information display
  - Maintenance payment section
  - Complaints management
  - Polling system
- Uses localStorage for demo data persistence

#### `LoginAndSignUp.html`
- Handles user authentication
- Features:
  - Login form
  - Registration form
  - Password recovery
- Demo credentials:
  - Email: demo@example.com
  - Password: 1234567
- Form validation for database constraints

#### `services.html`
- Displays available services
- Features:
  - Society registration
  - Maintenance management
  - Community engagement
  - Voting system
  - Complaint management
- Includes upcoming features section

#### `contact.html`
- Contact information and form
- Features:
  - Location map integration
  - Contact form
  - Social media links
- Google Maps embedding

#### `about.html`
- Company information
- Mission statement
- Social media integration

### 2. Styling (`css/styles.css`)
- Responsive design using media queries
- Color scheme:
  - Primary: #4003f8 (Blue)
  - Secondary: #00b7ff (Light Blue)
- Features:
  - Mobile-first approach
  - Flexbox/Grid layouts
  - Smooth transitions
  - Custom scrollbar
  - Form styling
  - Card designs

### 3. JavaScript Files

#### `js/nav.js`
- Handles navigation functionality
- Features:
  - Mobile menu toggle
  - Authentication state
  - Navigation updates
- Session management

#### `js/demo-data.js`
- Contains demo data
- Simulates backend functionality
- Sample data for:
  - Users
  - Societies
  - Complaints
  - Polls

### 4. Backend Files

#### Authentication (`auth` folder)

##### `auth.php`
- Core authentication class
- Features:
  - User registration
  - Login verification
  - Session management
  - Password handling

##### `login.php`
- Handles login requests
- Validates credentials
- Returns user data
- Sets session

##### `register.php`
- Handles user registration
- Input validation
- Database insertion
- Error handling

#### API Endpoints (`api` folder)

##### `user_data.php`
- Fetches user information
- Society details
- Maintenance dues
- Authentication verification

##### `polls.php`
- Manages polling system
- Features:
  - Active polls retrieval
  - Vote counting
  - Poll status management
- Real-time updates

##### `register_society.php`
- Society registration handling
- Data validation
- Database operations

##### `contact.php`
- Contact form processing
- Email notifications
- Form validation

### 5. Database (`database` folder)

#### `residentz.sql`
- Database schema
- Tables:
  - `admin`: Administrator information
  - `user`: User accounts
  - `event`: Society events
  - `maintenance`: Payment records
  - `polls`: Voting system
  - `poll_options`: Poll choices
  - `poll_votes`: Voting records

### 6. Configuration

#### `config/database.php`
- Database connection
- Constants definition
- Error handling
- PDO implementation

### Key Features Implementation

#### 1. Authentication System
- Session-based authentication
- Password hashing
- Form validation
- Remember me functionality

#### 2. Polling System
- Real-time vote counting
- One vote per user
- Vote persistence
- Result visualization

#### 3. Complaints Management
- Status tracking
- Category organization
- Resolution system
- History maintenance

#### 4. Maintenance Management
- Payment tracking
- Due date monitoring
- Payment history
- Receipt generation

### Security Features
- SQL injection prevention
- XSS protection
- CSRF protection
- Input validation
- Session security

### Mobile Responsiveness
- Breakpoints:
  - Mobile: < 768px
  - Tablet: 768px - 1024px
  - Desktop: > 1024px
- Adaptive navigation
- Flexible layouts
- Touch-friendly interfaces

### Data Persistence
- Local storage for demo mode
- MySQL for production
- Session management
- Cache handling

### Error Handling
- Form validation
- Database errors
- Network issues
- User feedback

### Future Enhancements
1. Visitor Management System
2. Society Asset Booking
3. Emergency Services Integration
4. Mobile App Development
5. Payment Gateway Integration

### Testing
- Browser compatibility
- Mobile responsiveness
- Form validation
- Error scenarios
- Security testing

### Deployment
1. Server Requirements:
   - PHP 7.4+
   - MySQL 5.7+
   - Apache/Nginx
2. Installation Steps
3. Configuration
4. Maintenance

This documentation provides a comprehensive overview of the Residentz project, its components, and functionality. For the viva, focus on understanding:
- System architecture
- Feature implementation
- Security measures
- Database design
- User experience
- Technical decisions