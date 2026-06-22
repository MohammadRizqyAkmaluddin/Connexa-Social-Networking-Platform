# Connexa – Smart Communication & Collaboration Platform

Connexa is a modern full-stack web application designed to streamline communication, collaboration, and workflow management within teams and organizations. Built with a scalable architecture and clean UI/UX, Connexa aims to centralize messaging, task coordination, and productivity tools in one platform.

---

## 📸 Preview

![Connexa Preview](https://raw.githubusercontent.com/MohammadRizqyAkmaluddin/Readme-Assets/main/Connexa/asset1.png)

---

## 🚀 Key Features

- 💬 Real-time messaging system for team communication  
- 🧑‍🤝‍🧑 Workspace-based collaboration structure  
- 📌 Task & activity management for productivity tracking  
- 🔔 Notification system for updates and mentions  
- 🔐 Secure authentication and user management  
- 📱 Fully responsive UI (mobile-first design)  

---

## 🧠 Project Concept

Connexa was built with the idea of combining communication + collaboration into a single unified platform. Instead of switching between chat apps, task managers, and notification tools, users can manage everything in one place.

---

## 🛠 Tech Stack

**Frontend**
- Nuxt.js
- Tailwind CSS
- Pinia (State Management)

**Backend**
- Laravel
- MySQL
- RESTful API Architecture

**Deployment**
- Ubuntu VPS
- Nginx
- PM2 / Supervisor (if applicable)

---

## ⚙️ System Architecture

- Modular backend design using Laravel service pattern  
- REST API communication between frontend & backend  
- Scalable database structure for multi-workspace system  
- Component-based frontend architecture (Nuxt.js)  

---

## 📂 Core Modules

- Authentication & Authorization  
- Workspace Management  
- Messaging System  
- Task Management  
- Notification Engine  
- User Profile System  

---

## 🧩 Database Design

Connexa uses a relational database structure to manage users, workspaces, messages, and tasks efficiently.

- Normalized schema for scalability  
- Many-to-many relationships for workspace members  
- Optimized indexing for message & task queries  

---

## ⚙️ Installation

```bash
git clone https://github.com/MohammadRizqyAkmaluddin/Connexa-Social-Networking-Platform.git
cd Connexa-Social-Networking-Platform

# frontend setup
npm install
npm run dev

# backend setup
composer install
php artisan migrate:fresh --seed
php artisan serve
