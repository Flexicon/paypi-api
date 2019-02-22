# PayPI - dummy payments api

Running the app
---

```
$ cd .docker
$ cp .env.dist .env
$ cp docker-compose.dist.yml docker-compose.yml
$ docker-compose up -d
```

Then install the dependencies and setup the DB:

```
$ docker exec -it paypi-api_php_1 bash
$ composer install
$ bin/console doctrine:database:create
$ bin/console doctrine:migrations:migrate
```

If everything went okay, then the app should be listening on `http://localhost:8080`

Endpoints 
---

```
GET /api/ping
GET /api/methods
GET /api/transactions   (optional query params: page, limit, order, filter)
GET/api/users/{id}
```