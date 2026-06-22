# Connexa (Full-Stack)
Connexa-Social-Networking-Platform

Connexa is a full-stack web application built using Laravel that focuses on improving communication, collaboration, and workflow management within teams. The system is designed with a structured monolithic architecture using Blade templating and modular backend design, making it maintainable, scalable, and production-ready.

---

## UI Preview

![Connexa Preview](https://raw.githubusercontent.com/MohammadRizqyAkmaluddin/Readme-Assets/main/Connexa/asset1.png)

---

## Key Features

- Internal messaging system for user communication  
- Workspace-based collaboration model  
- Task and activity tracking system  
- Notification system for updates and interactions  
- Authentication and role-based access control  
- Responsive UI built with Bootstrap  

---

## Project Concept

Connexa is designed as an all-in-one collaboration platform that combines communication and task management in a single system. The goal is to reduce fragmentation between tools by centralizing workflows inside one application.

---

## Tech Stack

- **Backend Framework:** Laravel  
- **Frontend:** Blade Templates  
- **UI Framework:** Bootstrap  
- **Database:** MySQL  
- **Architecture:** Monolithic MVC (Laravel)  
- **Deployment:** Ubuntu VPS, Nginx  

---

## System Architecture

Even though built as a monolith, the project follows a structured and modular design approach:

- MVC separation with clean controller responsibility  
- Reusable Blade components and layouts  
- Service-oriented logic separation (where needed)  
- Organized routing structure (feature-based grouping)  
- Scalable database schema design  

---

## Core Modules

- Authentication & Authorization  
- Workspace Management  
- Messaging System  
- Task & Activity Management  
- Notification System  
- User Profile & Settings  

---

## Database Design

Connexa uses a relational database designed for structured collaboration workflows:

- Proper normalization for scalability  
- Relationship handling between users, workspaces, and tasks  
- Optimized queries for messaging and activity feeds  
- Clear separation of transactional and relational data  

---

## Installation

```bash
git clone https://github.com/MohammadRizqyAkmaluddin/Connexa-Social-Networking-Platform.git
cd Connexa-Social-Networking-Platform

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan serve

npm install
npm run dev
