# Lifecycle Architecture
CRUDBooster stands above of Laravel Framework. Whatever that you can't develop with CRUDBooster, you still can make anything code with Laravel Framework in the project.

## Controller
CRUDBooster doesn't need regular class method like Create, Read, Update, Delete to create a CRUD operation. It only need cbInit() method to call anything crud module.

For Example : 
```php
public function cbInit() {
    $this->setTable("table_name");
    $this->setPermalink("permalink");
    $this->addText("Title");
    $this->addText("Description");
}
```

## View
CRUDBooster will create a CRUD view automatically.

## Hook
To modify the process of table index query, pre save, post save, pre delete, post delete. You can use the hook feature.