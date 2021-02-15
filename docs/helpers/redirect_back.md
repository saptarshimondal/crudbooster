# Redirect Back

If you want to redirect user to last page. You can use this redirect back helper.

```php
public function postSaveData() {
    // ...
            
    // First parameter for message, Second parameter for alert type (success, warning, info, primary, danger)
    return cb()->redirectBack("The data has been updated!", "success");
}
```