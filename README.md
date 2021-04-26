## About Application EmployeeList

There is an app where a user can manage his Employee List. Users is able to Create, Update, Delete list of Employees and Companies. Companies and Employees have  few description fields (name, email etc.).



### General requirements for application environment:
- php 7.4
- laravel 8.12
- mysql 5.7

## Project Installing

- clone project from repository  https://github.com/Ryttis/employeelist.git
- composer install
- npm install
- .env.example change into .env
- DB_PASSWORD=root
- php artisan migrate:fresh --seed
- php artisan storage:link
- php artisan key:generate
- php artisan serve

## Project launching & credencials

- launch project on localhost:8000
- during database seeding fake user will be created:
#### email -> admin@admin.com
#### username -> admin
#### password -> password

### Main project features and functionalities
- Laravel authentication is enabled
- User register is disabled
- For reseting password and sending notifications it is obligatory to register  https://mailtrap.io/ account and enter details into .env
- Project contains following views: employees list, companies list.
- Users is able to see the paginated list of employees and companies.
- Users is able to create,update and delete records from employys and companies lists.
- Fake data added in favore of https://github.com/fzaninotto/Faker.
- Project supports multilanguage mode ( English & Lithuanian) aditional languages can be added with minimal efforts.
- Images are stored in public/sorage/images catalog.
- List of Employees and companies can be accessed only by authenticated user.
- After successful registering of new company record, notification simulation  is send to entered email all sent emails are collected in mailtrap.io inbox.



