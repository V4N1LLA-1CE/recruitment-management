# B2B Recruiting Management System

## Overview

A comprehensive web application built with CakePHP 5.x for Nathan Jims' B2B recruiting business. This system helps manage contractors, projects, and client organizations with a focus on skill matching and project tracking.

## Demo

https://github.com/user-attachments/assets/fa3fb84d-5d18-4cf5-8fcb-c5625040783f

## Instructions

```bash
# [WINDOWS] - clone repository into XAAMP htdocs
# [MACOS] - clone repository into wherever Apache Httpd Server is installed i.e /opt/homebrew/var/www/<projecthere>
https://git.infotech.monash.edu/fit2104/fit2104-2024-s2/group-assignment/Lab04_Group10/fit2104-assignment-5.git

cd fit2104-assignment-5 && composer install

# Setup MySQL / MariaDB connection in app_local.php
config/app_local.php

# Use database schema file for sample data
config/schema/db.sql

# To demo the website, navigate to http://localhost:8080
# Once website is running, you will be redirected to login screen.
1. Register / Create an account on the website
2. Login with email and password that was registered # NOTE: registration screen is public for demo purposes
```

### Technology Stack

-   Framework: CakePHP 5.x
-   Frontend: Bootstrap 5, Fontawesome 5
-   Database: MySQL/MariaDB
-   Authentication: CakePHP Authentication
