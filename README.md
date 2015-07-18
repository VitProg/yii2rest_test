Simple Yii 2 REST application
=============================

###INSTALLATION

**Install via Composer**

If you do not have [Composer](http://getcomposer.org/), you may install it by following the
[instructions at getcomposer.org](https://getcomposer.org/doc/00-intro.md).

You can then install the application using the following commands:

```
composer global require "fxp/composer-asset-plugin:~1.0.0"
composer create-project --prefer-dist -s dev "VitProg/yii2rest_test" .
```

###DEMO
http://yii2rest.jquarter.ru/

###GETTING STARTED

- Create a new database and adjust the `components['db']` configuration in `config/db.php` accordingly.
- Apply migrations with console command ``php yii migrate``. This will create tables needed for the application to work.
- Set document roots of your Web server `/path/to/yii-application/web/`

###URL RULE

API available:

```php
POST /user/login 
    params: username, password
    *users (login, password):
        demo1 demo
        demo2 demo
        
GET /models
GET /models/ID
POST /models
PUT /models/ID
DELETE /models/ID

GET /my/cars
GET /my/cars/ID
POST /my/cars
PUT /my/cars/ID
DELETE /my/cars/ID
```