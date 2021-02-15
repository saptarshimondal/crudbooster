# Hide Action Button

Sometime you need to hide the action button (Detail, or Edit, or Delete) on grid data table with specific condition.

```php
public function cbInit() {
    // ...

    // Hide delete button with a condition
    $this->hideDeleteButtonWhen(function($row) {
        return $row->status == "PAID";
    });

    // Hide edit button with a condition
    $this->hideEditButtonWhen(function($row) {
        return $row->status == "ACTIVE";
    });

    // Hide detail button with a condition
    $this->hideDetailButtonWhen(function($row) {
        return $row->status == "INACTIVE";
    });
}
```

The method above should return `TRUE` if you want to hide the button and vice versa.