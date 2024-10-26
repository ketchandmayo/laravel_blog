# Installation

To install the project, run the following commands:

1. Install PHP dependencies:
    ```bash
    composer install
    ```

2. Install JavaScript dependencies:

    ```bash
    npm install
    ```

3. Start the development environment:

    ```bash
    ./vendor/bin/sail up
    ```
4. Start Vite
    ```bash
    npm run dev
    ```
   or
    ```bash
    npm run build
    ```
   for prod enviroment

# Laravel Docker Sail: Resolving Permission Issues and Database Connection Errors

This document provides instructions for resolving common permission issues and database connection errors in Laravel running with Docker and Sail.

## Permission Issues

Sometimes, permission issues can arise when accessing the `storage` and `bootstrap/cache` directories in Laravel while using Docker. Follow these steps to resolve the problem:

1. Launch a bash session as the root user for the container:

    ```bash
    ./vendor/bin/sail exec -u root laravel.test bash
    ```

2. Change the ownership of the `storage` and `bootstrap/cache` directories to the `sail` user:

    ```bash
    chown -R sail:sail /var/www/html/storage
    chown -R sail:sail /var/www/html/bootstrap/cache
    ```

3. Update the directory permissions for `storage` and `bootstrap/cache` to allow write access:

    ```bash
    chmod -R 775 /var/www/html/storage
    chmod -R 775 /var/www/html/bootstrap/cache
    ```

4. Verify the current permissions for these directories:

    ```bash
    ls -la /var/www/html/storage
    ls -la /var/www/html/bootstrap/cache
    ```

## Database Connection Error

If you encounter the following database connection error:
```
SQLSTATE[HY000] [2002] Connection refused
```

This error is usually caused by an incorrect `DB_HOST` value in the `.env` file. Follow these steps to fix it:

1. Inspect the Docker network to find the IP address used for the network bridge:

    ```bash
    docker network inspect bridge
    ```

2. Find the line with the `Gateway` parameter, which will look something like this:

    ```
    "Gateway": "172.17.0.1"
    ```

3. Copy the Gateway value and replace the `DB_HOST` value in your `.env` file with it, so the database connection will look like this:
    
    ```env
    DB_HOST=172.17.0.1
    ```

4. After completing these steps, restart your containers and check if the database connection issue has been resolved.
