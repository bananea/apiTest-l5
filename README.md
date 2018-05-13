# apiTest-l5
1. Mini project is done with Laravel 5,php 7 and mysql. Please edit \.env file 
server could be started with: php artisan serve --port=8888
2. restaurant sql dump is in apiTest-l5/config/sql_dumps/restaurants.sql
3. Test file is in \tests\Feature\SearchControllerTest.php and can be runned as php vendor/phpunit/phpunit/phpunit
4. Some sample url:
http://localhost:8888//search/filter?open=0&name=Ont&sort=bestMatch
for the specific api version: 
http://localhost:8888//api/v5.12.300/search/filter?name=the
