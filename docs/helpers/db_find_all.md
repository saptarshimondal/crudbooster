# DB Find All

Get the many record now more simple and less memory. This helper will not request to Database Server for twice if we make a same request at the same runtime.

```php
// Get data with multiple condition by using array
$data = cb()->find("users",["status"=>"Active","roles_id"=>1]);

// Get data with multiple condition by using closure
$data = cb()->find("users", function($query) {
    $query->where("status","Active");
    $query->where("roles_id", 1);
    return $query;
});
```

The output of this helper is same with Laravel DB Query Builder