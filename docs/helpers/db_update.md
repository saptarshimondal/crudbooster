# DB Update

Update the database record by using CRUDBooster Helper is more simply

```php
// Default laravel use DB Query Builder
DB::table("users")->where("id", 1)->update(["field"=>"value"]);

// cb()->update("table_name", "primary_key_value", ["field"=>"value"]);
cb()->update("users", 1, ["status"=>"Active"]);

// For example from request
cb()->update("users", request("users_id"), ["status"=>"Active"]);
```