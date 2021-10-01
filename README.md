Test project
==================================

## Hosts within your environment ##


Service|Hostname|Port number
------|---------|-----------
php-fpm|php-fpm|9000
Postgres|postgres|5432 (default)

# Docker compose cheatsheet #

**Note:** you need to cd first to where your docker-compose.yml file lives.

  * Start containers in the background: `docker-compose up -d`
  * Start containers on the foreground: `docker-compose up`. You will see a stream of logs for every container running.
  * Stop containers: `docker-compose stop`
  * Kill containers: `docker-compose kill`
  * View container logs: `docker-compose logs`
  * Execute command inside of container: `docker-compose exec SERVICE_NAME COMMAND` where `COMMAND` is whatever you want to run. Examples:
        * Shell into the PHP container, `docker-compose exec php-fpm bash`
        * Run symfony console, `docker-compose exec php-fpm bin/console`
        * Open a mysql shell, `docker-compose exec mysql mysql -uroot -pCHOSEN_ROOT_PASSWORD`

# Steps for run this project #
* Start all containers: `docker-compose up -d`
* Enter into container: `docker exec -i -t  test_php-fpm_1  /bin/bash`
* Run this command for get all depends: `composer install`
* Create database : `php bin/console doctrine:database:create`
* Create schema: `php bin/console  doctrine:schema:create`
* See http://localhost:62000

# Map of endpoints for api v1 #

Name|Method|Path
------|---------|-----------
app_create|POST|/api/v1/apps/create
app_find|GET|/api/v1/apps/{id}
app_delete|DELETE|/api/v1/apps/{id}
apps_list|GET|/api/v1/apps/
app_edit|PUT|/api/v1/apps/{id}
client_create|POST|/api/v1/clients/create
client_find|GET|/api/v1/clients/{id}
client_list|GET|/api/v1/clients/
client_delete|DELETE|/api/v1/clients/{id}
client_edit|PUT|/api/v1/clients/{id}
