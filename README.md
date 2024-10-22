# Issues fixes
## Permission issues

`./vendor/bin/sail exec -u root laravel.test bash`
<br>`chown -R sail:sail /var/www/html/storage`
<br>`chown -R sail:sail /var/www/html/bootstrap/cache`

<br>`chmod -R 775 /var/www/html/storage`
<br>`chmod -R 775 /var/www/html/bootstrap/cache`

<br>`ls -la /var/www/html/storage`
<br>`ls -la /var/www/html/bootstrap/cache`

## SQLSTATE[HY000] [2002] Connection refused

`docker network inspect bridge`
<br>Copy "**_Gateway_**" ip address and replace with **_DB_HOST_** value in **_.env_** file
