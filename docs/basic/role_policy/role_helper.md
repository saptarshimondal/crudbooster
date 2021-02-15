# Role Helper
Especially if you make your own controller or make your own class method. You have to make sure the method and controller are accessed by user that have its privilege.

## Can Browse
This helper can you use if you make a method for browse the data

```php
public function getIndex() {
    if(!module()->canBrowse()) return cb()->redirect(cb()->getAdminPath(),"You don't have a privilege to browse data","warning");
    // Todo: your next code if allowed

}
```

## Can Create
This helper can you use if you make a method for create data

```php
public function getAdd() {
    if(!module()->canCreate()) return cb()->redirect(cb()->getAdminPath(),"You don't have a privilege to create data","warning");
    // Todo: your next code if allowed

}
```

## Can Read
This helper can you use if you make a method for read data

```php
public function getDetail() {
    if(!module()->canRead()) return cb()->redirect(cb()->getAdminPath(),"You don't have a privilege to read data","warning");
    // Todo: your next code if allowed

}
```

## Can Update
This helper can you use if you make a method for update data

```php
public function getEdit($id) {
    if(!module()->canUpdate()) return cb()->redirect(cb()->getAdminPath(),"You don't have a privilege to update data","warning");
    // Todo: your next code if allowed

}
```

## Can Delete
This helper can you use if you make a method for delete data

```php
public function getDelete($id) {
    if(!module()->canDelete()) return cb()->redirect(cb()->getAdminPath(),"You don't have a privilege to delete data","warning");
    // Todo: your next code if allowed

}
```