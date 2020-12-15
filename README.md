1. Clone project - git clone https://github.com/AnnijaSve/Mini_bank_system-laravel.git
2. Install all required dependencies with command - 'composer install' and 'npm install'
3. Create a new database
4. Configure your .env file
5. Migrate all the tables to Your database with command 'php artisan migrate'
6. In 'users' table make new user - fill these sections 'name', 'email', 'password'
7. In 'accounts' table create new account fill these sections -'user_id', 'number', 'balance', 'cuurency'
8. To test money transfers You have to make 2 accounts at least
9. As there is two-factor authentication when login, You have to set up test email, You can do this with https://mailtrap.io/
In this case, set up in Your .env file 'Mail' section :
10. You can start testing with - php artisan serv

