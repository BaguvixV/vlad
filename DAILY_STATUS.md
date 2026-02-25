# 🧱 Daily Engineering Log

> **Purpose:** Track consistency, thinking process, and incremental progress.  
> Sessions: ~1-2h unless stated otherwise.

## 🎯 Why this exists
- Removes guilt on "imperfect" days
- Allows study-only days without feature pressure
- Enforces daily commit (habit consistency)
- Keeps a clean, chronological history
- Captures *why* not just *what*


---

## 📅 26/02/26 - Planned
### COMMIT
```bash
feat: Display only habits with checkboxes on dashboard
```

---


## 📅 23-25/02/26

### COMMIT
```bash
refactor: Support dynamic route parameters & Improve UserController CRUD

- Added dynamic route parameters for users and habits (e.g., /habit/{id})
- Separated dashboard (private) and profile (public) routes
- Skipped stict types for $userId and $habitId to simplify pre-junior routing
- Handling invalid route parameters with 404
- Added htmlspecialchars() outputs for basic XSS prevention
- Adopted REST-style approach for CRUD operations
- Created reditect() function to shorten code dublication
- Fixed method check on habit and user controllers
```

---

## 📅 ~17-22/02/26

### IMPORTANT NOTE
- was ill

---


## 📅 16/02/26

### COMMIT
```bash
refactor: Make code prettier
```
### WHY
- To make it easier to read for later on
### WHAT
- Added extra spaces
### ALTERNATIVES
- To skip this refactoring but later on risk on code bad readability

---


## 📅 09/02/26

- Focus: >2h  
- Worked on main project.  
- Skipped side project tasks intentionally.

---


## 📅 08/02/26

- Focus: >2h  
- Worked on main project.  
- Skipped side project tasks intentionally.

---


### 🧭 Architecture Refactor Phase (Untracked Period)

> Context: Job leaving process

---

### COMMIT
```bash
refactor: Re-evaluate controller structure toward OOP MVC approach
```

### WHY
- Transition from procedural to MVC-based OOP structure
- Make CRUD inside one controller instead of separate on each method their own PHP file
- Improve maintainability and scalability

### WHAT
- Created `Application` and `Request` core files inside `src/Core`
- Moved from multiple procedural action files to one controller with multiple OOP-style actions

### LEARNED
- Deeper understanding of application bootstrap flow
- Better clarity on entry point responsibility

### FUTURE NOTES
- Implement URL parameter parsing
- Continue MVC refinement

### EXTRA
- Renamed `Habit` → `Habits`
- Renamed `User` → `Users`

---


## 📅 23&25/01/26 📅 CHANGED MY MIND IN MID TASK COMPLETION
### COMMIT
```bash
refactor: Rename Habit model file name as Habits & Remove redundand habits and users model setters and getters with properties
```

### WHY
- Because they are not used and needed at least for now --> `date` values are automatically created so as unique `id` values,
`isActive` are set by default on creation and even on edit those values are defined inside sql queries WHERE and SET conditions,
and `completion` are set 0 by default and later will be used similar as `isactive` inside sql queries WHERE and SET conditions, 
ONLY `cateogry`, `title` and `description` are set by setters and get by betters

### WHAT
- Removed getters and setters from Models\Habits and Models\Users
- Didn't removed `isActive` setter and getter on Users model for development testing purposes (dashboard and archive `isActive` value display)

### ALTERNATIVES
- `__get` and `__set` magic methods. Not wanting to deep into abstractions for now just simpler getter and setter for now

### LEARNED

### FUTURE NOTES
- Implement Data Mapper instead of Active Record Object pattern. For now it is too early to create for a simple application
- Switch controller logic to MVC OOP-style instead of procedural style code

---


## 📅 22/01/26

### COMMIT
```bash
feat: List logged-in user created habits on dashboard and archive pages
```

### WHY
To get only user specifyc habits and not ones from other registered users

### WHAT
- Added `user_id` foreign key to `habit` table
- Create `findByUserID(int|null $userID)` and `findArchivedUserId(int|null $userID)` class method in Habit model
- Renamed habit.id table and column to habits.habit_id
- Renamed users.id column to users.user_id

### HOW
- One-to-One Relationship
- ON DELETE and UPDATE CASCADE

### ALTERNATIVES
- One-to-one realtion change with one-to-many

### LEARNED
- Relation meaning in relational database
- That in it is redundand to type `docker compose build` each time I type `docker compose down` when adding some changes in docker-compose.yml file and that `docker compose up` is just enough for example to add latest migrations folder changes into database
- Also if I am using not detached mode then ctrl+c key combination just stops running containers without removing containers and networks (optionally images and volumes as well) as if `docker compose down` do

### FUTURE NOTES
- Probably will improve finding methods by making it static and also making it a bit more universal for preventing find type method redundancy

---


## 📅 21/01/26 (Focus: 3h 16min)
```md
feat: Complete habit CRUD with validation, soft-delete, restore, and archived view

- Sanitized and validated habit creation and editing functionalities
- Moved Views\partials code into Views\pages to make easier to read code for now
- Created navigation link named archieved with archieved habits and ability to restore or force-delete habits
- Changed Habit SQL column name status to completion
- Created Core\Validator with regex varaibles and error method
```


## 📅 17/01/26 (Focus: 1h 15min)
```md
wip/feat: Add habit creation with validation and improve Habit model type safety
```


## 📅️ 15/01/2026
```md
wip/feat: Enhance router and extend habit CRUD with soft/force delete, restore and show
```


## 📅 14/01/2026 (Focus: 2h 4min)
```md
wip/feat: Router enchancement
```


## 📅 14/01/2026 (Focus: 1h 10min)
```md
refactor(views): Simplify folder and fike structure & restore Views naming

- Inline main template content into page views
- Renamed templates back to Views
- Created empty habit CRUD view and controller files
```


## 📅 12/01/2026 (Focus: 52min)
```md
12/01 ✅ refactor(auth): Move registration DB logic back to controller and clean up validation responsibilities
```



## 📅 10/01/2026 - 11/01/2026 (Focus: 9h 20min)

**Focus:** feat: User login and Validation architecture

### 🛠️ Overall Progress:
```md
- 10/01 🛠️ 11/01 ✅ Implement user login flow
- 10/01 ✅ Add logout feature for users who are logged-in
- 10/01 🛠️ 11/01 ✅ Extend Requests\AuthFormValidation.php and Requests\LoginFrom with login-specifyc validation rules
- 11/01 ✅ Add 'Create habit' navigation link visible for users who are logged-in
- 10/01 🚨 Caught myself on thinking about wrong placement for checking functions/methods inside RegisterForm and LoginForm
```

## 📅 11/01/26 (Focus: 4h 57min)
```md
- ✅ Implement user login flow
- ✅ Extend Requests\AuthFormValidation.php and Requests\LoginFrom with login-specifyc validation rules
- ✅ Add 'Create habit' navigation link visible for users who are logged-in
```


## 📅 10/01/26 (Focus: 4h 22min)
```md
- 🛠️ Implement user login flow
- ✅ Add logout feature for users who are logged-in
- 🛠️ Extend Requests\AuthFormValidation.php and Requests\LoginFrom with login-specifyc validation rules
- 🚨 Caught myself on thinking about wrong placement for checking functions/methods inside RegisterForm and LoginForm
```



## 📅️ 07/01/26 - 09/01/26 (Focus: 12h 9min)

- feat: User registration, input sanitization, form-specific validation, and password security

### 🛠️ Overall Progress:
```md
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

## 📅 09/01/26 (Focus: 7h 23min)
```md
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

## 📅️ 08/01/26 (Focus: 3h 08min)
```md
- ✅ Rename Validator model to Sanitizer
- 🛠️ Implement input sanitization and form-specific validation
- 🛠️ Implement user registration flow
- 🛠️ Extend Requests\FormValidation.php and Requests\Register with register-specific validation rules
- 🛠️ Preserve the sanitized $_POST input in $old on validation failure to prevent re-entering valid data
- ✅ Generate and store password hash (after raw password validation) on user creation
```

## 📅️ 07/01/26 (Focus: 1h 38min)
```md
- 🛠️ Implement user registration flow
- 🛠️ Extend Requests\FormValidation.php and Requests\Register with register-specific validation rules
- 📌 Generate and store password hash (after raw password validation) on user creation
```



## 📅 06/01/2026

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



## 📅 05/01/2026

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



## 📅 04/01/2026

**Focus:** Docker & core architecture  

```bash
git commit -m "feat: Add PHP 8.4 Docker support and initial OOP models

- Add secondary Dockerfile for PHP 8.4
- Configure docker-compose profiles for stable PHP 8.3 and new 8.4 versions
- Enable PHP 8.4 property hooks
- Add base Model with DB injection
- Create initial User and Posts models"
```



## 📅 29/12/2025

```bash
git commit -m "feat(core): Add autoloader, config, and PDO database connection

> Implement autoloader
> Add Config class for environment-based configuration (.env)
> Create Database class with PDO connection handling
> Inject database connection into controllers"
```



## 📅 28/12/2025

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