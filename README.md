# API FFLCH

## Overview

The FFLCH API is a Laravel-based application designed to provide access to comprehensive college data.

## Requirements

- PHP 7.4 or higher
- Composer for dependency management
- MySQL or any other compatible database

## Deployment instructions

**1.** First, ensure you have a FFLCH ETL database loaded using the application available at [github.com/fflch/etl](https://github.com/fflch/etl). The API data will come from there.

**2.** Next, have all project dependencies installed:

```sh
composer install
```

**3.** Make a copy of *.env.example* and configure your *.env*, providing the necessary database information for both the loaded ETL database [see step 1] and the empty database intended for the API usage.

```sh
cp .env.example .env
```

**4.** In order to set up the API database schema, run migrations:

```sh
php artisan migrate
```

**5.** Make a copy of *admin_creator.php.example* and provide required information if you wish to create an admin account (this is essential for generating API tokens and creating accounts with corresponding privileges).

```sh
cp admin_creator.php.example admin_creator.php
```

After configuring admin info, you can create its account by running:
```sh
php admin_creator.php
```

**6.** Set up your app with a secure key for deployment:

```sh
php artisan key:generate
```

**7.** Finally, to start the Laravel server, run:

```sh
php artisan serve
```

## API Endpoints

At the moment, FFLCH API provides the following endpoints:

#### **Public access**

- `GET /public/defesas`: Retrieve a list of all FFLCH theses/dissertations defenses (public info only).
- `GET /public/ics`: Retrieve a list of all FFLCH undergrad research (public info only).
- `GET /public/posdocs`: Retrieve a list of all FFLCH postdoc students (public info only).
- `GET /public/pcs`: Retrieve a list of all FFLCH collaborating reseachers (public info only).
- `GET /public/vinculos/docentes`: Retrieve a list of all FFLCH professors (public info only).
- `GET /public/vinculos/estagiarios`: Retrieve a list of all FFLCH interns (public info only).
- `GET /public/vinculos/funcionarios`: Retrieve a list of all FFLCH staff (public info only).

#### **Restricted access**

- `GET /private/defesas`: Retrieve a list (with restricted info) of all FFLCH theses/dissertations defenses.
- `GET /private/ics`: Retrieve a list (with restricted info) of all FFLCH undergrad research.
- `GET /private/posdocs`: Retrieve a list (with restricted info) of all FFLCH postdoc students.
- `GET /private/pcs`: Retrieve a list (with restricted info) of all FFLCH collaborating reseachers.
- `GET /private/vinculos/docentes`: Retrieve a list (with restricted info) of all FFLCH professors.
- `GET /private/vinculos/estagiarios`: Retrieve a list (with restricted info) of all FFLCH interns.
- `GET /private/vinculos/funcionarios`: Retrieve a list (with restricted info) of all FFLCH staff.

## Pagination and filters

### Pagination

By default, the API returns 100 records per page. If you want to adjust this, you can use the `limit` parameter. Additionally, to navigate to different pages of results, you can specify the desired page using the `page` parameter.

- **Example**:
```
GET /public/ics?limit=200&page=2
```

This will fetch records starting from the 201st record up to the 400th record.

### Filters

Moreover, each API endpoint offers some filters that you can use to refine queries and access specific data with ease. Each one will be detailed in the documentation.

- **Example**:
```
GET /public/posdocs?ano_inicio=gt2015
```

This will fetch postdocs records whose start date is later than 2015 (>= 2016).


## Authentication

In order to access `/private/*` API endpoints, one must receive an invitation created by someone with corresponding privileges via `/convidar` and then register using that invitation at `/cadastrar` to obtain an API key. Once registered, one may authenticate their requests by including the key in the request headers:

```
Authorization: Bearer API_KEY
```
New API tokens can be retrieved by registered users at `/token`. **Generating a new token, however, will void all other tokens from user.**