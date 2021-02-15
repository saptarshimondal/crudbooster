# Redirect

When you use CRUDBooster, sometime you need make an alert after redirect. Instead of you create the flash session manually, you can use this helper.

```php
public function postSaveData() {
    // ...

    // First parameter is for URL, second parameter for message, third parameter for alert type (success, warning, info, primary, danger)
    return cb()->redirect(action("AdminUsersController@getIndex"), "The data has been updated!", "success");
}
```