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
- 🚨 Important note


## 📌 Unorganized TODO list:

```bash
> (1) Add SQL typo and duplicate entry error display
> (2) Prevent $_SERVER['PHP_SELF'] exploits
> (3) Create abstraction for validations like Core\Validator and those basic validations set inside Http\Request\AuthFormValidation to prevend code redundancy
> (4) Implement content in 'Create habit' page
> (5) Add SQL table relations
> (5) Create sub-category table for habit and link SQL relation
> (5) empty TODO placeholder
```


### (Focus: Xh Ymin)
```md
📌 feat: Add habit CRUD functionality and Display authenticated user habits on dashboard
```

### 15/01/2026 (Focus: Xh Ymin)
```md
🛠️ feat: Router enchancment
```

### 14/01/2026 (Focus: 2h 4min)
```md
🛠️ feat: Router enchancment
```

### 14/01/2026 (Focus: 1h 10min)
```md
refactor(views): Simplify folder and fike structure & restore Views naming

- Inline main template content into page views
- Renamed templates back to Views
- Created empty habit CRUD view and controller files
```

### 12/01/2026 (Focus: 52min)
```md
12/01 ✅ refactor(auth): Move registration DB logic back to controller and clean up validation responsibilities
```



## ✅ 10/01/2026 - 11/01/2026 (Focus: 9h 20min)

**Focus:** feat: User login and Validation architecture

### 🛠️ Overall Progress:
```md
- 10/01 🛠️ 11/01 ✅ Implement user login flow
- 10/01 ✅ Add logout feature for users who are logged-in
- 10/01 🛠️ 11/01 ✅ Extend Requests\AuthFormValidation.php and Requests\LoginFrom with login-specifyc validation rules
- 11/01 ✅ Add 'Create habit' navigation link visible for users who are logged-in
- 10/01 🚨 Caught myself on thinking about wrong placement for checking functions/methods inside RegisterForm and LoginForm
```

### 🛠️ Daily Breakdown
```md
#### 11/01/26 (Focus: 4h 57min)

- ✅ Implement user login flow
- ✅ Extend Requests\AuthFormValidation.php and Requests\LoginFrom with login-specifyc validation rules
- ✅ Add 'Create habit' navigation link visible for users who are logged-in
```

```md
#### 10/01/26 (Focus: 4h 22min)

- 🛠️ Implement user login flow
- ✅ Add logout feature for users who are logged-in
- 🛠️ Extend Requests\AuthFormValidation.php and Requests\LoginFrom with login-specifyc validation rules
- 🚨 Caught myself on thinking about wrong placement for checking functions/methods inside RegisterForm and LoginForm
```



## 🛠️ 07/01/26 - 09/01/26 (Focus: 12h 9min)

- feat: User registration, input sanitization, form-specific validation, and password security

```md
### 🛠️ Overall Progress:
- 09/01 ✅ Create user dashboard route with default forbidden 403 and redirect after registration
- 09/01 ✅ Display dashboard page for existing user session
- 09/01 ✅ Hide register and login navitaion links when user is registered/logged-in
- 09/01 ✅ Enchance user migrations SQL table
- 09/01 ✅ Convert sanitized age input to strict integer
- 08/01 ✅ Rename Validator model to Sanitizer
- 08/01 🛠️ 09/01 ✅ Implement input sanitization and form-specific validation
- 07/01 🛠️ 08/01 🛠️ 09/01 ✅ Implement full user registration flow
- 07/01 🛠️ 08/01 🛠️ 09/01 ✅ Extend Requests\AuthFormValidation.php and Requests\Register with register-specific validation rules
- 08/01 🛠️ 09/01 ✅ Preserve sanitized $_POST input in $old on validation failure to prevent re-entering valid data
- 07/01 📌 08/01 ✅ Generate and store password hash (after raw password validation) on user creation
- 07/01 ✅ Create Response model for HTTP status codes (400, 401, 403, 404, 405)
```

### 🛠️ Daily Breakdown
```md
#### 09/01/26 (Focus: 7h 23min)

- ✅ Implement input sanitization and form-specific validation
- ✅ Implement full user registration flow
- ✅ Rename FormValidation.php to AuthFormValidation.php
- ✅ Extend Requests\AuthFormValidation.php and Requests\Register with register-specific validation rules
- ✅ Preserve sanitized $_POST input in $old on validation failure to prevent re-entering valid data
- ✅ Convert sanitized age input to strict integer
- ✅ Create user dashboard route with default forbidden 403 and redirect after registration
- ✅ Display dashboard page for existing user session
- ✅ Hide register and login navitaion links when user is registered/logged-in
- ✅ Enchance user migrations SQL table
```

```md
#### 🛠️ 08/01/26 (Focus: 3h 08min)

- ✅ Rename Validator model to Sanitizer
- 🛠️ Implement input sanitization and form-specific validation
- 🛠️ Implement user registration flow
- 🛠️ Extend Requests\FormValidation.php and Requests\Register with register-specific validation rules
- 🛠️ Preserve the sanitized $_POST input in $old on validation failure to prevent re-entering valid data
- ✅ Generate and store password hash (after raw password validation) on user creation
```

```md
#### 🛠️ 07/01/26 (Focus: 1h 38min)

- 🛠️ Implement user registration flow
- 🛠️ Extend Requests\FormValidation.php and Requests\Register with register-specific validation rules
- 📌 Generate and store password hash (after raw password validation) on user creation
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