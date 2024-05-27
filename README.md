# Ecommerce Application

This is a demo online shop

## Table of contents

- [Overview](#overview)



## Overview

### Run Locally

1. Create directory to clone the project
```
mkdir assessment

cd assessment
```

2. Clone the application to the newly created folder
```
git clone https://github.com/codinci/Uzapoint-Assessment/ ${projectName}
```
*change the **projectName** to whichever name you find suitable*

3. Navigate to the cloned repo directory
```
cd ${projectName}
```

4. Install laravel dependencies
```
composer install
```

5. Install npm modules
```
npm install
```

6. Create a copy of .env file
```
cp .env.example .env
```

7. Generate an app encryption key
```
php artisan key:generate
```

8. Create a database in mysql
```
create database ${databaseName}
```

9. In the .env file add the database information to allow laravel toconnect to the database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=${databaseName}
DB_USERNAME=${userName}
DB_PASSWORD=${password}
```
*change the **databaseName**, **userName** and **password** variables to your respective information*

10. Migrate the database
```
php artisan migrate
```

11. Seed the database
```
php artisan db:seed
```

12. Run the application
```
npm run dev

php artisan serve
```

*the application should run on* **127.0.0.1:8100**

