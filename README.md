# Silex Sandbox

## INSTALLATION INSTRUCTIONS

1. git clone this repository to a directory
2. In a terminal: move into your directory 
3. Download Composer

    `curl -sS https://getcomposer.org/installer | php`

3. And run `php composer.phar install`
4. Rename the `./app/config/parameters.php.dist` to parameters.php and change the configuration settings to your liking
5. Create a virtual host file and point it to the /web directory

6. Composers post install script should have created the following dirs and made them writable for the web server:
    app/storage/cache, app/storage/log, app/storage/uploads

If the last step failed do this manually:
    `sudo chmod 777 app/storage/cache app/storage/log app/storage/uploads`

### On going to production; change the run mode in `/web/index.php` to use the http_cache

