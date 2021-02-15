# DB Find

Get the single record now more simple and less memory. This helper will not request to Database Server for twice if we make a same request at the same runtime.

```php
// Get the single record without declare the primary key
$data1 = cb()->find("users", 1);

// The second request bellow will not request to database server anymore.
$data2 = cb()->find("users", 1);

// Get the single record with multiple condition
$data = cb()->find("users",["status"=>"Active","roles_id"=>3]);
```

The output of this helper is same with Laravel DB Query Builder