# Placeholder

To make a placeholder on Text, Text Area, Date, Date & Time, and Number

```php
public function cbInit() {
    // ...

    $this->addText("First Name","first_name")->placeholder("Enter the first name");

    $this->addTextArea("Description","description")->placeholder("Enter the description here");

}
```