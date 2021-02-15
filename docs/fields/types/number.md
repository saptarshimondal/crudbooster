# Field: Number
This type of field is to make an input number

```php
public function cbInit() {
    // ...

    // Using age column
    $this->addNumber("Age","age");

    // Limit the minimum number
    $this->addNumber("Age","age")->min(16);

    // Limit the maximum number
    $this->addNumber("Age","age")->max(40);

    // Add step attribute
    $this->addNumber("Discount","disc")->step(1.5);

}
```