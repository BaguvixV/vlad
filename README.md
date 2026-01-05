# vlad

## 📝 Description
This is a small, almost-daily pet-project (~1.5 hours per session) created to practice, experiment, and showcase my software development experience.

The project is not intended to be a polished product.
It exists to demonstrate learning, decision-making, and clean engineering rather than feature richness or visual design.

---

## 🎯 Learning-First Philosophy

This project follows a strict rule:

> **Every feature must exist to support learning, not novelty or polish.**

### Hard Scope Lock

#### Allowed features:
- Authentication (register/login)
- CRUD habits
- Daily checkmark
- Weekly and monthly summary

#### Forbidden features:
- Dark mode
- Animations
- Notifications
- Mobile-first polish
- AI suggestions
- Gamification

> If it is not teaching a **core skills**, then it's not necessary.


## 🛠️ Tech Stack
- HTML
- CSS
- PHP (OOP, MVC)
- PDO
- MySQL
- Git

## 🚀 Project Goals
- Practice structured PHP development using MVC
- Work with databases via PDO
- Apply OOP principles in real use cases
- Maintain clean commit history and documentation


## 🏗️ Structure
```
project/
├── public/          - web root
├── src/             - application logic
```

## 🧩 Usage

Clone the repository and use Docker Compose to build and run containers:

```bash
docker-compose build
docker-compose up
```

> Note: To exit, press Ctrl+C or run in detached mode
```bash
docker-compose up -d
```

After running Docker, you should be able to access:
- https://localhost:8881
- https://localhost:8880

## ⏳ Status
🚧 In active development