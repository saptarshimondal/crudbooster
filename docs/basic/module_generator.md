# Module Generator
To create a CRUD module, you can use a GUI and Artisan command. This bellow is artisan command 
```bash
php artisan crudbooster:make --module=table_name
```

Replace `table_name` with your own table

You can also create all tables, set `--module=ALL` parameter like bellow
```bash
php artisan crudbooster:make --module=ALL
```
This command will create a new controller.