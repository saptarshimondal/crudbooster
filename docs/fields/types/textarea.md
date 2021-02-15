# Field: Text Area
This type of field is to make an input text area

```php
public function cbInit() {
    // ...

    // Using the "first_name" column
    $this->addTextArea("First Name","first_name");

    // Limit characters on index table
    $this->addTextArea("First Name","first_name")->strLimit(20);

    // Limit maximum characters on input
    $this->addTextArea("First Name","first_name")->maxLength(20);

    // Limit minimum characters on input
    $this->addTextArea("First Name","first_name")->minLength(5);

}
```
?> **Tips** - You may combine all those chain options. 