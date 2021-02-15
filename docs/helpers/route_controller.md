# Route Controller

Do you remember with old laravel helper `Route::controller(...)` ? yes, CRUDBooster has bring it back to you. This helper is useful for making automatic routing for all methods, on the desired controller. 

?> **Notice** - This route controller only works on method that has "get" and "post" prefix. 

```php
// The routing pattern for this bellow method is /detail-data with only accept GET method request
public function getDetailData() {
    //...
}

// The routing pattern for this bellow method is /save-data with only accept POST method request
public function postSaveData() {
    //...
}
```

```php
// File Routes/web.php
cb()->routeController("users","AdminUsersController");
```