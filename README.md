# Containerizing PHP,Apache, and MySQL

### Introduction
The project structure is as follows :

```
/crudPhpDocker/
├── php
│   └── src
│   │   ├── class
│   │   │   ├──Addresse.php
│   │   │   └──Contact.php
│   │   ├── config
│   │   │   └──Database.php 
│   │   ├── helpers
│   │   │   └──func.php 
│   │   ├── templates
│   │   │   ├──addressBook
│   │   │   │   ├──create.html.php
│   │   │   │   └──index.html.php
│   │   │   └──layout.html.php
│   │   ├── create.php
│   │   ├── delete.php
│   │   └── index.php
│   └── Dockerfile
├── docker-compose.yml 
├── MYSQL_DATABASE.sql
└── README.md
```
run ```docker-compose up```
Open  local host post in the browser. http://localhost:8000/.
Open http://localhost:8080/ on the browser to access the PHPMyAdmin.
use (MYSQL_ROOT_PASSWORD: MYSQL_ROOT_PASSWORD) as credentials
Use MYSQL_DATABASE.sql to Create your database and tables