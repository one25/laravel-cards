<h3>Installation.</h3>
<br>type <b>git clone https://github.com/one25/laravel-cards.git</b> 
<br>type <b>cd laravel-cards</b>
<br>type <b>composer install</b>
<br>type <b>composer update</b>
<br>type <b>php artisan key:generate</b> to regenerate secure key
<br>
<br>if you use <b>MySQL</b> in <b>.env</b> file :
<br>    set DB_CONNECTION
<br>    set DB_DATABASE
<br>    set DB_USERNAME
<br>    set DB_PASSWORD
<br>
(if you use <b>sqlite</b>: type <b>touch database/database.sqlite</b> to create the file)
<br>type <b>php artisan config:cache</b>   
<br>type <b>php artisan migrate --seed</b> to create and populate tables
<br>
<br>type <b>sudo chmod -R 777 storage</b>
<br>type <b>sudo chmod -R 777 bootstrap/cache</b>
<br>
<br>To start the application in the browser <b>laravel-cards/</b>