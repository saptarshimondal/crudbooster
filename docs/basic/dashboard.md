# Dashboard
Make sure you have a dashboard controller, create it first by using "make controller" artisan as laravel do : 
```bash
php artisan make:controller DashboardController
```

Then add `getIndex()` method.
```php
class DashboardController extends Controller {
    public function getIndex() {
        $data = [];
        $data['page_title'] = "Dashboard";
        return view("dashboard", $data);
    }
}
```

Create the view `/resources/views/dashboard.blade.php`:
```blade
@extends('crudbooster::themes.adminlte.layout.layout')
@section('content')


@endsection
``` 

Last, you have to set the dashboard controller at **Developer Area > Appearance > Dashboard Controller**