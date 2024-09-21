# Networx Eduhub 1.0

## Table of Contents
- [Project Description](#project-description)
- [Version](#version)
- [Scalability](#scalability)
- [Feasibility](#feasibility)
- [Technology Stack](#technology-stack)
- [Security Features](#security-features)
- [Main Features of the System](#main-features-of-the-system)
- [Database Schema](#database-schema)
- [Verification Flow](#verification-flow)
- [Future Enhancements](#future-enhancements)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Contact](#contact)
- [License](#license)

## Project Description

Networx Eduhub is an innovative educational platform designed to facilitate the management and generation of certificates for various learning and training programs. This application enhances the educational experience by providing streamlined processes for certificate issuance, user role management, and comprehensive logging features. With a user-friendly interface and robust backend support, Networx Eduhub caters to both administrators and users.

## Version

### Version 1.0

This initial version includes core functionalities such as:
- Certificate generation based on customizable templates.
- Verification of Learner Information before certificate generation.
- Enrollment management.
- Uploading and managing certificate templates.
- Previewing certificates before finalization.
- Multi-Factor Authentication (MFA) for admin security using Microsoft Authenticator.

## Scalability

Networx Eduhub is built with scalability in mind to accommodate growing user demands:
- **Modular Architecture:** The application is designed in a modular fashion, making it easier to expand features and functionalities.
- **Cloud Storage Solutions:** Utilizing cloud storage for templates and certificates ensures efficient management of large datasets.
- **Load Balancing:** Future implementation of load balancing will support increased user traffic.

## Feasibility

The feasibility of Networx Eduhub is underscored by:
- **Market Demand:** Increasing need for digital certification in educational and corporate sectors.
- **Technical Resources:** Leveraging existing frameworks and technologies for efficient development and deployment.
- **Cost Efficiency:** Automation of certificate generation reduces the time and resources spent on manual documentation.

## Technology Stack

### Backend
- **Framework:** Laravel
- **Database:** MySQL
- **Server:** Apache/Nginx

### Frontend
- **JavaScript Framework:** Vue.js (for Single Page Application functionalities)
- **CSS Framework:** Tailwind CSS

### Mobile Stack
- **Mobile Framework:** React Native (for potential future mobile app development)
- **State Management:** Redux (for managing application state)

## Security Features

### Multi-Factor Authentication
- **Admin Authentication:** Multi-factor authentication using Microsoft Authenticator enhances security for administrators, ensuring only authorized users can access sensitive areas of the system.

## Main Features of the System
- **Learner Information Verification:** Before certificate generation, the system verifies learner enrollment and details.
- **Certificate Management:** Users can generate and manage certificates based on various templates.
- **Role Management:** Admins can assign roles and permissions to users, controlling access to different features.
- **Logging System:** Comprehensive logging of user actions to maintain accountability and track changes made within the system.
- **Template Uploading:** Admins can upload and manage certificate templates easily.
- **User-Friendly Interface:** Designed for intuitive navigation and ease of use.

## Database Schema

### Learner Information Form
- **Primary Key:** `id` (auto-incrementing integer)
- **Foreign Key:** `course_id` (references `id` in the `Courses` table)
- **Fields:**
  - `id` (int, primary key)
  - `name` (string)
  - `surname` (string)
  - `id_number` (string, unique)
  - `course_id` (int, foreign key)
  - `enrollment_date` (date)

## Verification Flow

1. **Enrollment Check:** Verify that the learner is enrolled in the selected course using `course_id`.
2. **Information Validation:** Validate learner details before proceeding to certificate generation.
3. **Certificate Generation:** Once verified, proceed with generating the certificate based on the learner's information and selected template.

## Future Enhancements
- Implementation of an API for third-party integrations.
- Development of a mobile application for on-the-go certificate management.
- Advanced analytics for tracking certificate issuance and user engagement.

---

## Getting Started

### Prerequisites
- PHP >= 7.3
- Composer
- MySQL
- Node.js and npm (for frontend dependencies)

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Thando12345/Networx-Eduhub

 **Navigate to the Project Directory:**
```bash
     cd Networx-Eduhub

### Install Backend Dependencies

composer install

### Install Frontend Dependencies

npm install


###Configure Environment

cp .env.example .env

###Generate the Application Key

php artisan key:generate

###Run Migrations and Seed the Database

php artisan migrate --seed

###Start the Server

php artisan serve

Contact

For any inquiries or support, please reach out to:

Email: support@networx-eduhub.com
Phone: +27 67 262 9614

 License

This project is licensed under the MIT License. See the LICENSE file for more information. 




