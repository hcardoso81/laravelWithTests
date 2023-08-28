<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Creating a new project

-   laravel new laravelWithTests
-   composer require laravel/ui (dashboard)
-   php artisan ui bootstrap --auth
-   npm install && npm run dev

## Creating first test

-   https://www.youtube.com/watch?v=pkB4WV2M-ek&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=2

<p> Test: I can see the "documentation" word in the home page</p>

## Creating test Products Table empty

-   https://www.youtube.com/watch?v=eV2m0TmjaZw&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=3
<p>test_can_see_the_products_page</p>
-   php artisan make:model Product -c -m

## Creating test Products Table non empty

-   https://www.youtube.com/watch?v=SYr5Wxsk0wE&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=4
<p>Connect a dataBase sqlite for testing</p>

## Creating test create a new product

-   https://www.youtube.com/watch?v=3VSKZkDwyGE&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=5

## Creating test edit a product by id

-   https://www.youtube.com/watch?v=Kjb-l411gKQ&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=6

## Creating test delete a product by id

-   https://www.youtube.com/watch?v=8vSs7kn865E&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=7

-   create a factory : php artisan make:factory ProductFactory

## Creating test validations product

-   https://www.youtube.com/watch?v=7j0vqvV2vFI&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=8

-   create a formRequest: php artisan make:request StoreProductRequest, php artisan make:request UpdateProductRequest
-   create test validation php artisan make:test Validations/ProductValidationTest

## Creating test login user

-   https://www.youtube.com/watch?v=Pq3UBo0EaNE&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=9

-   create a test: php artisan make:test Auth/LoginTest

## Creating test roles user

-   https://www.youtube.com/watch?v=NqIAK6xpMEM&list=PLDYiB4l8VPZa-2tNcgPZYpPuHo-zZBxHY&index=10

-   update migration users: add boolean field is_admin, default false
-   update model User, put new field in $fillable
-   create a new Middleware: php artisan make:middleware IsAdmin

## Livewire installation. Creation first component

-   https://www.youtube.com/watch?v=eP0u3THTK5I&list=PLDYiB4l8VPZabgVKHTCBwWvZXQWPZg6-S&index=2

-   composer require livewire/livewire
-   clean view welcome
-   create first component php artisan make:livewire FirstComponent

## Livewire component: Public Properties y Data Binding

-   https://www.youtube.com/watch?v=uibRvXgnJzg&list=PLDYiB4l8VPZabgVKHTCBwWvZXQWPZg6-S&index=3
-   php artisan make:livewire PublicPropertiesComponent1

## Laravel Livewire Desde Cero: Eventos, SweetAlert, Modal

https://www.youtube.com/watch?v=itfbL16IxEM&list=PLDYiB4l8VPZabgVKHTCBwWvZXQWPZg6-S&index=9
