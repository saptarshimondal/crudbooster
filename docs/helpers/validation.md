# Validation

This validation is extended from laravel validation. But in this helper included the flash message for CRUDBooster.

```php
public function postSaveData() {
    try {
        // In this example we want to validate the name input to be required
        cb()->validation(["name" => "required"]);

        // Or if you only validate the require, you can ignore the required string
        cb()->validation(["name","email"]);

    } catch (CBValidationException $e) {
        // Call redirect back and send the error message
        return cb()->redirectBack($e->getMessage());
    }
}
```

Because we use `CBValidationException` as catch class. You need to import `CBValidationException` class at above of class. 

```php
use crocodicstudio\crudbooster\exceptions\CBValidationException;
```