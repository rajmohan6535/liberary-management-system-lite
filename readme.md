## About Liberary Management System Lite

This project is made with of laravel 5.8 and you can manage a lend system for the library

- Register as member
- Lend Book
- Return before the due date with the minimal lend cost
- If you lost the book you should pay the full amount
- After due date fine per day will be applicable, 50% lend cost will be the fine


## Start Project

- clone the project to your localhost folder
- **open the command line and run below commands from the project folder**
- ``` composer install ```

**Set up your .env** 
- ``` php artisan key:generate```
- ``` php artisan migrate --seed```

**If you are on linux OS run below code**
- ``` chmod -R 777 /storage /bootstrap/cache``` 
- **To run the project** ```php artisan serve``` 
##url

Admin url will be http://localhost:{port}/admin