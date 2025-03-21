  Job Board API with Advanced Filtering

# Job Board API with Advanced Filtering

This is a job board API built with Laravel 12 that allows users to create, update, view, and delete job listings with advanced filtering capabilities, including filtering by job attributes like **years\_experience** and related entities like **languages**, **locations**, and **categories**.

## Features

*   **CRUD Operations**: Create, Read, Update, and Delete job listings.
*   **Advanced Filtering**: Filter job listings based on job type, languages, locations, and custom attributes.
*   **Relationships**: Supports many-to-many relationships between jobs, languages, locations, and categories.

## Requirements

*   PHP >= 8.1
*   Composer
*   MySQL or any other compatible database

## Installation

Follow the steps below to set up and run the project on your local machine.

### 1\. Clone the Repository

Clone this repository to your local machine:

```
git clone https://github.com/your-username/job-board-api.git
cd job-board-api
```

### 2\. Install Dependencies

Install the required PHP dependencies using Composer:

```
composer install
```

### 3\. Configure the Environment File

Copy the `.env.example` file to create your `.env` file:

```
cp .env.example .env
```

Update the `.env` file with your database credentials and other environment-specific configurations:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4\. Generate the Application Key

Run the following command to generate the application key:

```
php artisan key:generate
```

### 5\. Run Migrations and Seeders

To create the necessary database tables and seed the database with sample data, run the following command:

```
php artisan migrate:fresh --seed
```

This will:

*   **Drop all existing tables** (if any).
*   **Run all migrations** to create the necessary database tables.
*   **Run the seeders** to populate the database with some sample data.

### 6\. Start the Development Server

Start the Laravel development server:

```
php artisan serve
```

By default, the server will be running at [http://127.0.0.1:8000](http://127.0.0.1:8000).

### 7\. API Endpoints

Here are the available API endpoints for managing jobs:

#### GET /api/jobs

Fetch a list of jobs. You can also filter the results using the `filter` query parameter.

```
GET http://127.0.0.1:8000/api/jobs?filter=(job_type=full-time AND (languages HAS_ANY (PHP,JavaScript))) AND (locations IS_ANY (New York,Remote)) AND attribute:years_experience>=3
```

#### GET /api/jobs/{job\_id}

Fetch a specific job by ID.

```
GET http://127.0.0.1:8000/api/jobs/1
```

#### POST /api/jobs

Create a new job listing.

```
POST http://127.0.0.1:8000/api/jobs
```

Request body (JSON):

```
{
  "title": "PHP Developer",
  "description": "Develop PHP applications for web projects.",
  "company_name": "Tech Company",
  "salary_min": 60000,
  "salary_max": 100000,
  "is_remote": true,
  "job_type": "full-time",
  "status": "published",
  "published_at": "2025-03-21T00:00:00"
}
```

#### PUT /api/jobs/{job\_id}

Update a job listing by ID.

```
PUT http://127.0.0.1:8000/api/jobs/1
```

Request body (JSON):

```
{
  "title": "Senior PHP Developer",
  "description": "Lead the PHP development team and manage key web projects.",
  "company_name": "Tech Company",
  "salary_min": 70000,
  "salary_max": 120000,
  "is_remote": true,
  "job_type": "full-time",
  "status": "published",
  "published_at": "2025-03-21T00:00:00"
}
```

#### DELETE /api/jobs/{job\_id}

Delete a job listing by ID.

```
DELETE http://127.0.0.1:8000/api/jobs/1
```
