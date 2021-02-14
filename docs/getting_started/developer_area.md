# Developer Area
Manage super admin tools like Module Generator, Role Management, User Management, etc we called Developer Area.

## Create Developer Access

To get the access you need to run the following command: 
```bash
php artisan crudbooster:developer
```

You will get the developer area credential and url access like example bellow:
```
::Developer Credential::
URL: http://localhost/crudbooster/public/developer/E7aoZdkBibDKETHB/login
Username: acwyu
Password: hDSntA5uCTTKHauE
```

## What Should I Do?
!> 
**Login** with developer area credential above. In this developer area, you need to create module (Using Module Generator), create roles, and create user. Because this area only for super admin manage the "super master data". After you have create user, you can logout and login with standard login path (not developer login path).