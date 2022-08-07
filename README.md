> Steps:- 

- git clone "repo name" ( download the code )
- composer install (install dependencies)
- create .env file and change database credentials according to your system
- php artisan migrate (install database schema)
- php artisan db:seed ( create fake client & products )


> List of APIs

- get product list (with Pagination)
    GET : /api/product/list?page=1

- get booking list
    GET : /api/booking/list

- create booking
    POST : /api/client/booking
    `param : client_id, product_id`
