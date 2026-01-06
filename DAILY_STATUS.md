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


## 📌 Unorganized TODO list:

```bash
> (1) empty TODO placeholder
> (2) empty TODO placeholder
> (3) empty TODO placeholder
```



## 📌 08/01/2026

**Focus ~2-3h:** User login, Dashboard display and Validation architecture

```bash
- 📌 Implement user login flow
- 📌 Extend Requests\FormValidation.php and Requests\Login with login-specifyc validation rules
- 📌 Display authenticated user info on dashboard
- 📌 Implement 403 Forbidden HTTP status handling
```


## 📌 07/01/2026

**Focus ~2-3h:** User registration, Password handling and Validation architecture

```bash
- 📌 Implement user registration flow
- 📌 Create Response model (404, 405, etc.)
- 📌 Generate and store password hash on user creation
- 📌 Extend Requests\FormValidation.php and Requests\Register with register-specifyc validation rules
```



## ✅ 06/01/2026

**Focus ~5h:** refactor: Enchance router, improve folder structure and validation architecture

```bash
- Rename mistaken layouts folder to partials (header, nav, main, footer)
- Rename Veiws to templates and introduce src/Http dir with Controllers and Requests
- Create proper layouts folder with correct examples (main layout)
- Move partials rendering responsibility from page templates into layouts
- Enchance router and separate routes array in separate routes.php file
- Implement 404 Not Found HTTP status handling
- Draft authentication and posts-related forms
- Create universal Validation.php base class
- Create FormValidation.php for shared form validation logic
- Create initial register and login classes with placeholders rules
```



## ✅ 05/01/2026

**Focus ~4h:** Refactor models, fix database connection and display DB data on website

```bash
- Remove database logic from Core\Models; will be handled via container configuration later
- Rename Post model to Habit
- Create User and Habit SQL tables with placeholder data
- Store migration SQL files in src/migrations for automatic Docker setup
- Display users and habits on website
- Add placeholder content to About page and Homepage
- Minor folder structure refactor
```


**Focus ~1h:** Improve documantation & add new daily log markdown

```bash
- Improve main markdown by finally adding project path
- Create new daily log markdown
```



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