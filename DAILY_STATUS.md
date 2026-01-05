# 🧱 Daily Status Log

> **Purpose:** Track learning consistency and incremental progress.
> Sessions are ~1-2h unless noted otherwise.

### Why this exists
- Removes guilt on "imperfect" days
- Lets study-only days without feature pressure
- Gives reason to commit every day (habit consistency)
- Keeps a clean, chronological history
- Allows commiting progress notes alongside code


---

### For Context
- 📌 Planned (not started)
- 🛠️ Working on (learning / partial progress)
- ✅ Completed (shipped / commited)
- ❌ Missed (intentionally skipped)



## 📌 06/01/2026

**Focus:** Auth forms & validation architecture  
**Time:** ~2-3h

```bash
- 📌 Draft basic user authentication and posts forms
- 📌 Create universal Validation.php
- 📌 Create FormValidation.php form validation inside Controllers/forms
```



## 🛠️ 05/01/2026

**Focus:** Database & placeholder content
**Time:** ~1.5h

```bash
- 📌 Create User and Post SQL tables with Lorem Ipsum placeholder values
- 📌 Fill about page and homepage with Lorem Ipsum placeholder content
```


**Focus:** Improve documantation & add new daily log markdown
**Time:** ~1h

```bash
- Improve main markdown by finally adding project path
- Create new daily log markdown
```

git commit -m "docs: Improve documantation & add new daily log markdown

- Improve main markdown by finally adding project path
- Create new daily log markdown"

## ✅ 04/01/2026

**Focus:** Docker & core architecture  

```bash
git commit -m "feat: Add PHP 8.4 Docker support and initial OOP models

- Add secondary Dockerfile for PHP 8.4
- Configure docker-compose profiles for stable PHP 8.3 and new 8.4 versions
- Enable PHP 8.4 property hooks
- Add base Model with DB injection
- Create initial User and Posts models"
```



## ✅ 29/12/2025

```bash
git commit -m "feat(core): Add autoloader, config, and PDO database connection

> Implement autoloader
> Add Config class for environment-based configuration (.env)
> Create Database class with PDO connection handling
> Inject database connection into controllers"
```



## ✅ 28/12/2025

```bash
git commit -m "doc: Improve documentation"
```

```bash
git commit -m "feat: Initial project setup, improve view rendering, and type hints

> Switched from XAMPP to Docker
> Created right folder/file premission and ownership for /var/www/
> Initialized project inside /var/www/ instead of /opt/lampp/htdocs/
> Changed ./public ./src premission to chmod -R 755
> Set up docker-compose.yml and Dockerfile
> Set up basic MVC structure
> Added renderView() function with property type hints and detailed comments
> Enabled robust routing for main and subpages"
```