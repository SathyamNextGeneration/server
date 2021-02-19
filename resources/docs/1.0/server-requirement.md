# Server Requirement

---

- [Server](#section-1)

<a name="section-1"></a>

#### Note: This application don't support cpanel and 3rd party on the server panel 
#### Skill Required: This application Need the prier knowledge of laravel basic http://laravel.com/
#### Skill Required: This application Android MVP application and IOS application experience

### its recommended to get in touch with experience developer or skype at drgntnkin
---
Before setting up Thinkin Cab, we need the server to have the following prerequisite software’s or frameworks in your server to build a conceivable environment.

Get <b><a href="https://www.cloudways.com/en/?id=315139">Laravel server</a></b> from this link in no time https://www.cloudways.com/en/?id=315139 and use “ TDRAGON ” to get 10% off on server billing
*min requirement 1 GB digital ocean server min requirement for testing
New to Laravel follow these link
https://laravel.com/ https://www.cloudways.com/blog/install-laravel-on-server/ https://support.cloudways.com/deploy-laravel-on-cloudways/
for digital ocean cloud server of server provider have ubuntu server
1. LAMP Stack:
Note: We don’t recommend Cpanel or shared hosting, run only in the dedicated server or cloud server
The server environment should have a Linux Operating System with Apache Server and MySQL database, PHP server scripting language.
The following are the compatible versions of the LAMP stack
```
a. Linux - Ubuntu - 18.04 or 16.04 (LTS is Preferred) or Equivalent
b. Apache >= 2.4.25
c. MySQL >= 5.7
d. PHP >= 7.2
```
Additional PHP Modules required.
1. OpenSSL PHP Extension
2. PDO PHP Extension
3. Mbstring PHP Extension
4. Tokenizer PHP Extension
5. XML PHP Extension Apache modules
6. Rewrite Module
2. Domain Name:
It is recommended that you get a domain name and an SSL certificate for the same for our application to work with full
functionality.
3. SSL Certificate: (free in Cloudways)
To maintain compatibility of the application across the web app along with live tracking you need to have an SSL certificate
to fetch the user location from the browser.
4. Composer: https://getcomposer.org/
Composer is required to download the dependencies for the application.
     
###INSTALLATION

1. Unzip the code in the server.
2. Set the following permissions
```
    a. chgrp -R www-data storage bootstrap/cache public
    b. chmod -R ug+rwx storage bootstrap/cache public
    c. To the following folders ./bootstrap d. ./storage e. ./public
```
3. Now edit the .env file in app root folder
```
        DB_HOST = localhost (Provide Database host URL here)
        DB_PORT = 3306 (Provide Database port here)
        DB_DATABASE =  (Provide the Database name)
        DB_USERNAME = root (Database username)
        DB_PASSWORD = (Database password)
```
add the Map API in the Application Setting > Config API
4. Run the following commands to complete setup
```
        a. composer install
        b. php artisan key:generate
        c. php artisan migrate --seed
        d. php artisan storage:link
        e. php artisan passport:install
        ```
5. By now the application should be live and ready for testing.
6. You can reach the admin panel from this URL yourdomain.com/admin/login
        a. Default admin credentials are
        ```
        Username: admin@demo.com Password: 123456
        ```
7. You’ll also have demo accounts to access the user and Driver app, which you might like to disable while moving the application to production check the admin panel for all details

<h2>We Recommend Cloudways Servers for get the best out of the app</h2>
<a href="https://www.cloudways.com/en/laravel-hosting.php?id=315139&amp;a_bid=f2023ff7" target="_top"><img src="https://www.cloudways.com/affiliate/accounts/default1/banners/f2023ff7.jpg" alt="Faster Laravel Hosting" title="Faster Laravel Hosting" width="728" height="90" /></a><img style="border:0" src="https://www.cloudways.com/affiliate/scripts/imp.php?id=315139&amp;a_bid=f2023ff7" width="1" height="1" alt="" />