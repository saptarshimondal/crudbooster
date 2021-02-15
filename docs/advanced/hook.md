# Hook

If you want to inject user's post data or modify index query.

```php
public function cbInit() {
    // ...

    // To inject user's post data on before insert action
    $this->hookBeforeInsert(function($data) {
        // Todo: code here
        $data['status'] = "Active";

        // Don't forget to return back
        return $data;
    });

    // To make an additional action after insert action
    $this->hookAfterInsert(function($last_insert_id) {
        // Todo: code here

    });

    // To inject user's post data on before update action
    $this->hookBeforeUpdate(function($data, $id) {
        // Todo: code here
        $data['status'] = "Active";

        // Don't forget to return back
        return $data;
    });

    // To make an additional action after update action
    $this->hookAfterUpdate(function($id) {
        // Todo: code here

    });

    // To modify default index query
    $this->hookIndexQuery(function($query) {
        // Todo: code query here

        // You can make query like laravel db builder
        $query->where("column", "value");

        // Don't forget to return back
        return $query;
    });

    // To modify default search query.
    // This method is different with hookIndexQuery. This method only called when "q" parameter is included on URL.
    $this->hookSearchQuery(function($query, $keyword) {
        // Todo: code query here

        $query->where("column", "like", "%".$keyword."%");

        // Don't forget to return back
        return $query;
    });

}
```