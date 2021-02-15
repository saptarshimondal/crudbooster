# Field: Date
This type of field is to make an input date

```php
public function cbInit() {
    // ...

    // Using birthday column
    $this->addDate("Birthday","birthday");

    // Change date default format Y-m-d to d/m/Y
    $this->addDate("Birthday","birthday")->format("d/m/Y");

}
```
For more date format you can [check here](https://www.php.net/manual/en/function.date.php). 