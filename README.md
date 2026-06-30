# EQ-Lara-365

Copyright (c) 2026 Muhammad Yeasin

Permission is granted to any person obtaining a copy of this software
to use, copy, modify, and distribute the software for personal,
educational, research, and non-commercial purposes only.

Commercial use is strictly prohibited without prior written permission
from the copyright holder.

Commercial use includes, but is not limited to:
- Selling the software
- Selling modified versions
- Offering the software as a SaaS service
- Using the software in a commercial product
- Using the software within a business for profit

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND.
# EQ-Lara-365

EQ-Lara-365 is a full-stack ERP dashboard application built with a Laravel REST API and a React/Vite frontend. It presents operational data for dashboards, employees, customers, sales, inventory, HR, projects, revenue, and users/roles through a clean modular architecture.

The project is organized as two independently runnable applications:

```text
EQ-Lara-365/
|-- Back-End/Lara/      # Laravel 10 REST API
`-- Front-End/React/    # React 19 + Vite dashboard UI
```

## Application Scope

The application behaves like a lightweight enterprise management portal. Current modules include:

| Module | Purpose |
| --- | --- |
| Dashboard | Shows total revenue, sales orders, purchase orders, inventory value, and outstanding amounts. |
| Employees | Lists employee profile, department, salary, skill, and employment details. |
| Customers | Exposes customer sales and order information. |
| Sales Analytics | Shows sales distribution by category for charting. |
| Inventory Summary | Lists inventory categories, item counts, quantity on hand, and value. |
| HR Overview | Tracks employee totals, new joiners, leave count, and open positions. |
| Project Overview | Tracks project status counts by reporting period. |
| Revenue Overview | Provides revenue and expense data for reporting charts. |
| Users & Roles | Lists users and their assigned role labels. |
| Authentication | Supports JWT login, registration, logout, refresh, and current-user lookup. |

## Technology Stack

### Backend

| Tool | Use |
| --- | --- |
| PHP `^8.1` | Runtime language. |
| Laravel `^10.10` | REST API framework, routing, validation, service container, Eloquent ORM. |
| `php-open-source-saver/jwt-auth` | JWT authentication for protected API routes. |
| MySQL/MariaDB | Relational persistence layer. |
| PHPUnit `^10.1` | Unit and feature test runner. |
| Mockery | Test doubles for action and repository tests. |
| Laravel Pint | PHP code style formatter. |

### Frontend

| Tool | Use |
| --- | --- |
| React `^19.2` | UI component framework. |
| Vite `^8.0` | Development server and frontend build tool. |
| Tailwind CSS `^4.3` | Utility styling. |
| PrimeReact `^10.9` | Table and UI widgets. |
| Chart.js `^4.5` | Dashboard and reporting charts. |
| Boxicons | Navigation and UI icons. |
| ESLint | JavaScript linting. |

## Local Setup

### Backend

```bash
cd Back-End/Lara
composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
php artisan serve
```

Default backend URL:

```text
http://127.0.0.1:8000
```

Important environment values:

```env
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
JWT_SECRET=generated_by_php_artisan_jwt_secret
```

The seed data creates demo users, employees, customers, dashboard metrics, reporting periods, and analytics records. Seeded user passwords are set to:

```text
123456
```

### Frontend

```bash
cd Front-End/React
npm install
npm run dev
```

Default frontend URL:

```text
http://127.0.0.1:5173
```

Optional frontend environment value:

```env
VITE_API_BASE_URL=http://127.0.0.1:8000
```

If `VITE_API_BASE_URL` is not set, the frontend uses `http://127.0.0.1:8000`.

## Architecture

The codebase follows a layered architecture that keeps framework, domain, application, and presentation responsibilities separate.

### Backend Architecture

```text
HTTP Request
    |
routes/api.php
    |
App\Http\Controllers\Api
    |
App\Application\...\*Action
    |
App\Domain\...\Repositories\*RepositoryInterface
    |
App\Infrastructure\Persistence\Eloquent\*Repository
    |
App\Models
    |
Database
```

| Layer | Folder | Responsibility |
| --- | --- | --- |
| Routing | `Back-End/Lara/routes/api.php` | Declares public and JWT-protected REST routes. |
| Controller | `app/Http/Controllers/Api` | Handles HTTP validation and delegates business behavior. |
| Application | `app/Application` | Contains use-case classes such as `LoginAction` and `GetAllEmployeesAction`. |
| Domain | `app/Domain` | Defines repository contracts used by application services. |
| Infrastructure | `app/Infrastructure/Persistence/Eloquent` | Implements repository contracts with Eloquent queries. |
| Model | `app/Models` | Represents database tables and casting rules. |
| Provider | `app/Providers/AppServiceProvider.php` | Binds repository interfaces to Eloquent implementations. |

### Backend Design Patterns

| Pattern | Where | Benefit |
| --- | --- | --- |
| Controller-Service Action | Controllers call focused `*Action` classes. | Keeps controllers small and moves use cases into testable classes. |
| Repository Pattern | Domain interfaces and Eloquent implementations. | Decouples application logic from database access details. |
| Dependency Injection | Laravel service container injects actions and repositories. | Makes code easier to test and replace. |
| DTO-like Response Mapping | Action classes map Eloquent models into arrays. | Keeps API responses consistent and explicit. |
| Interface Segregation | Each module owns its own repository interface. | Avoids one oversized persistence contract. |
| JWT Guard Pattern | `auth:api` route group protects private endpoints. | Keeps authentication rules centralized at route level. |

### Frontend Architecture

```text
React Page / Component
    |
Application Service
    |
Infrastructure API Repository
    |
ApiClient
    |
Laravel REST API
    |
Domain Model
```

| Layer | Folder | Responsibility |
| --- | --- | --- |
| Presentation | `src/presentation` | Pages and reusable React components. |
| Application | `src/application` | UI-facing services, formatting, chart/table data shaping, auth orchestration. |
| Domain | `src/domain` | Plain JavaScript models for API data and UI concepts. |
| Infrastructure | `src/infrastructure/api` | REST API repositories and shared HTTP client. |

### Frontend Design Patterns

| Pattern | Where | Benefit |
| --- | --- | --- |
| Repository Pattern | `src/infrastructure/api/*ApiRepository.js` | Isolates REST calls from React components. |
| Service Layer | `src/application/*/*Service.js` | Keeps page components focused on rendering. |
| Domain Model | `src/domain/**/*.js` | Gives API rows predictable behavior and formatting. |
| Session Service | `AuthSessionService` | Centralizes localStorage session persistence and subscription updates. |
| API Client Wrapper | `ApiClient.js` | Handles JSON requests, auth headers, public/private endpoint switching, and loading state. |
| Global Loading State | `LoadingOverlayService` and `GlobalProgressSpinner` | Provides consistent feedback during API calls. |

## REST API Reference

Base URL:

```text
http://127.0.0.1:8000/api
```

Public read endpoints are available under `/api/pub/...`. When the frontend has a JWT session, `ApiClient` automatically retries public-style URLs against their protected equivalent by replacing `/api/pub/` with `/api/`.

### Authentication

| Method | Endpoint | Auth | Description |
| --- | --- | --- | --- |
| `POST` | `/login` | Public | Login with username and password. |
| `POST` | `/register` | Public | Create a user and return a JWT session. |
| `POST` | `/logout` | Bearer token | Invalidate the current JWT token. |
| `POST` | `/refresh` | Bearer token | Refresh the current JWT token. |
| `GET` | `/me` | Bearer token | Return the authenticated user profile. |

#### `POST /api/login`

Request body:

```json
{
  "username": "john-123",
  "password": "123456"
}
```

Success response:

```json
{
  "access_token": "jwt-token",
  "token_type": "Bearer",
  "expires_in": 3600,
  "user": {
    "Id": 1,
    "first_name": "John",
    "last_name": "Baptist",
    "user_name": "john-123",
    "roles": "User"
  }
}
```

#### `POST /api/register`

Request body:

```json
{
  "first_name": "Ada",
  "last_name": "Lovelace",
  "username": "ada-new",
  "password": "123456",
  "roles": "Admin"
}
```

Validation rules:

| Field | Rules |
| --- | --- |
| `first_name` | Required string, max 255. |
| `last_name` | Required string, max 255. |
| `username` | Required string, max 255, unique in `User.user_name`. |
| `password` | Required string, minimum 6 characters. |
| `roles` | Optional string, max 255. Defaults to `User`. |

Success response: same session shape as `/api/login`, returned with HTTP `201`.

#### Auth Header

Protected endpoints require:

```http
Authorization: Bearer <access_token>
Accept: application/json
```

### Public Data Endpoints

| Method | Endpoint | Auth | Response |
| --- | --- | --- | --- |
| `GET` | `/pub/get-all-employees` | Public | Employee list. |
| `GET` | `/pub/get-customer-by-sales` | Public | Customer sales list. |
| `GET` | `/pub/get-daily-summery` | Public | Dashboard metric periods. |
| `GET` | `/pub/get-hr-overview` | Public | HR reporting periods. |
| `GET` | `/pub/get-inventory-summery` | Public | Inventory summary rows. |
| `GET` | `/pub/get-project-overview` | Public | Project status periods. |
| `GET` | `/pub/get-revenue-overview` | Public | Revenue and expense periods. |
| `GET` | `/pub/get-all-users-roles` | Public | Users and role labels. |
| `GET` | `/pub/sales-by-category` | Public | Sales category analytics. |

### Protected Data Endpoints

These endpoints return the same payloads as the public endpoints, but require a bearer token.

| Method | Endpoint | Auth |
| --- | --- | --- |
| `GET` | `/get-all-employees` | Bearer token |
| `GET` | `/get-customer-by-sales` | Bearer token |
| `GET` | `/get-daily-summery` | Bearer token |
| `GET` | `/get-hr-overview` | Bearer token |
| `GET` | `/get-inventory-summery` | Bearer token |
| `GET` | `/get-project-overview` | Bearer token |
| `GET` | `/get-revenue-overview` | Bearer token |
| `GET` | `/get-all-users-roles` | Bearer token |
| `GET` | `/sales-by-category` | Bearer token |

### Response Schemas

#### Employee

```json
{
  "Id": 1,
  "first_name": "Gillian",
  "last_name": "Anderson",
  "date_of_birth": "07.01.1985",
  "birth_place": "Frankfurt",
  "salary_per_month": 5000,
  "start_date": "23.03.2015",
  "department": "Software Development",
  "skills": "PHP, Angular, ReactJS, JavaScript, TypeScript",
  "remark": "Working for Accounting Software"
}
```

#### Customer By Sales

```json
{
  "Id": 1,
  "customer_name": "Acme Corporation",
  "sales": 125000.5,
  "orders": 48
}
```

#### Daily Summary

```json
{
  "Id": 1,
  "year": 2026,
  "month": "January",
  "total_revenue": 120000,
  "total_sales_orders": 320,
  "total_purchase_orders": 180,
  "total_inventory_value": 450000,
  "total_outstanding": 25000
}
```

#### HR Overview

```json
{
  "Id": 1,
  "year": 2026,
  "month": "January",
  "total_employees": 120,
  "new_joines": 8,
  "on_leave": 4,
  "open_positions": 6
}
```

#### Inventory Summary

```json
{
  "Id": 1,
  "year": 2026,
  "month": "January",
  "item_categorie": "Raw Materials",
  "items": 42,
  "qty_in_hand": 1800,
  "value": 95000
}
```

#### Project Overview

```json
{
  "Id": 1,
  "year": 2026,
  "month": "January",
  "in_progress": 12,
  "completed": 7,
  "on_hold": 2,
  "not_started": 4
}
```

#### Revenue Overview

```json
{
  "Id": 1,
  "Year": 2026,
  "Month": "January",
  "Revenue": 180000,
  "Expenses": 125000
}
```

#### Sales By Category

```json
{
  "Id": 1,
  "year": 2026,
  "month": "January",
  "category_name": "Software",
  "sales_by_percentage": 35,
  "total_sales_price": 87500
}
```

#### User Role

```json
{
  "Id": 1,
  "first_name": "John",
  "last_name": "Baptist",
  "user_name": "john-123",
  "roles": "User"
}
```

### Example API Calls

Login:

```bash
curl -X POST http://127.0.0.1:8000/api/login \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{"username":"john-123","password":"123456"}'
```

Read public dashboard data:

```bash
curl http://127.0.0.1:8000/api/pub/get-daily-summery \
  -H "Accept: application/json"
```

Read protected employee data:

```bash
curl http://127.0.0.1:8000/api/get-all-employees \
  -H "Accept: application/json" \
  -H "Authorization: Bearer <access_token>"
```

## Database

The backend migrations create tables for:

| Table / Model Area | Description |
| --- | --- |
| `User` | Application users and role labels. |
| Employees | Employee profile and HR data. |
| Customers | Customer sales/order data. |
| Daily Summary | Dashboard KPI history by year/month. |
| Sales | Sales analytics by category. |
| Inventory Summary | Inventory KPI rows by period/category. |
| HR Overview | HR summary rows by period. |
| Project Overview | Project status metrics by period. |
| Revenue Overview | Revenue and expense reporting data. |
| Password reset and failed jobs | Standard Laravel support tables. |

Run migrations and demo data:

```bash
cd Back-End/Lara
php artisan migrate --seed
```

Reset and rebuild local data:

```bash
php artisan migrate:fresh --seed
```

## Testing

The backend uses PHPUnit with two test suites configured in `Back-End/Lara/phpunit.xml`:

| Suite | Path | Purpose |
| --- | --- | --- |
| Unit | `tests/Unit` | Tests action classes, authentication use cases, repository-facing behavior, and controller units. |
| Feature | `tests/Feature` | Tests HTTP API behavior, route responses, validation, and authenticated/public endpoint access. |

Run all backend tests:

```bash
cd Back-End/Lara
php artisan test
```

Run only unit tests:

```bash
php artisan test --testsuite=Unit
```

Run only feature tests:

```bash
php artisan test --testsuite=Feature
```

Run a specific test file:

```bash
php artisan test tests/Feature/AuthApiTest.php
```

### Current Test Coverage Areas

Unit tests cover:

| Area | Example files |
| --- | --- |
| Authentication use cases | `LoginActionTest.php`, `RegisterActionTest.php`, `MeActionTest.php` |
| Dashboard/application actions | `GetDailySummeryActionTest.php`, `GetRevenueOverviewActionTest.php` |
| ERP read models | `GetAllEmployeesActionTest.php`, `GetInventorySummeryActionTest.php`, `GetProjectOverviewActionTest.php` |
| Analytics use cases | `GetSalesByCategoryActionTest.php`, `GetCustomersBySalesActionTest.php`, `GetHrOverviewActionTest.php` |
| Users and roles | `GetAllUsersRolesActionTest.php` |

Feature tests cover:

| Area | Example files |
| --- | --- |
| Auth API | `AuthApiTest.php` |
| Employee API | `EmployeeApiTest.php`, `PublicEmployeeApiTest.php` |
| Dashboard API | `DailySummeryApiTest.php`, `PublicDashboardApiTest.php` |
| Analytics API | `SalesByCategoryApiTest.php`, `RevenueOverviewApiTest.php` |
| ERP module APIs | `CustomerApiTest.php`, `InventorySummeryApiTest.php`, `ProjectOverviewApiTest.php`, `HrOverviewApiTest.php`, `UsersRolesApiTest.php` |

The PHPUnit environment sets testing-friendly defaults such as `APP_ENV=testing`, array cache/session drivers, synchronous queues, and reduced bcrypt rounds.

## Development Commands

### Backend

```bash
cd Back-End/Lara
composer install
php artisan serve
php artisan migrate --seed
php artisan test
./vendor/bin/pint
```

### Frontend

```bash
cd Front-End/React
npm install
npm run dev
npm run build
npm run lint
npm run preview
```

## Code Organization Guide

### Adding a New Backend Module

1. Create a migration and Eloquent model.
2. Add a domain repository interface in `app/Domain/<Module>/Repositories`.
3. Add an Eloquent implementation in `app/Infrastructure/Persistence/Eloquent`.
4. Bind the interface to the implementation in `AppServiceProvider`.
5. Add an application action in `app/Application/<Module>`.
6. Add an API controller method in `app/Http/Controllers/Api`.
7. Register public/protected routes in `routes/api.php`.
8. Add unit tests for the action and feature tests for the API route.

### Adding a New Frontend Module

1. Create a domain model in `src/domain/<module>`.
2. Create an API repository in `src/infrastructure/api`.
3. Create an application service in `src/application/<module>`.
4. Create presentation components in `src/presentation/components/<module>`.
5. Add or update a page in `src/presentation/pages`.
6. Add navigation through `src/domain/navigation/menuEntries.js` and related menu components.

## Security Notes

- JWT tokens are stored by the frontend session service in `localStorage`.
- Protected API routes are grouped under Laravel `auth:api` middleware.
- Public reporting endpoints are intentionally exposed under `/api/pub/...`.
- Registration validates unique usernames against the `User.user_name` column.
- Passwords are hashed with Laravel's hashing service.
- CORS is configured in `Back-End/Lara/config/cors.php`.

## License

Copyright (c) 2026 Muhammad Yeasin

Permission is granted to any person obtaining a copy of this software to use, copy, modify, and distribute the software for personal, educational, research, and non-commercial purposes only.

Commercial use is strictly prohibited without prior written permission from the copyright holder.

Commercial use includes, but is not limited to:

- Selling the software
- Selling modified versions
- Offering the software as a SaaS service
- Using the software in a commercial product
- Using the software within a business for profit

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND.
