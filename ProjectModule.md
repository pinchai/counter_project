# ស្តេចបោក
## Technology
````
1. MVC Pattern (Laravel)
2. Version Control (Github)
3. Task Management (Trello)
4. Test (Unit Test, UAT)
5. Deploy (Buy domain + hosting)
-------------------
Front: (HTML + CSS + Raw JS) + Bootstrap + Vue.js + Axios
Back : PHP(Laravel) + Mysql + SMS(OTP) + TelegramBot + API
````

## Hardware and Software
````
Web application
- google chrome v10
- windows 10+, Mac, Linux

Programming
- Laravel(PHP) version 11
- Mysql
- HTML+CSS+JS
- Bootstrap
- VueJS (SPA)
- API
- Phpstom
- UI, https://adminlte.io/themes/v3/index.html

Deployment
- Online (10/months)
- Offline

- CPU: i3++
- Ram: 8GB++
- SSD: 256GB
- Screen: 13"+
===========================
````

## DFD
```
Branch ✅
- id*
- name*
- logo
- location*
- phone*
- alt_phone
- email
```

````
User ✅
- id*
- branch_id*
- name*
- password*
````

````
Category ✅
- id*
- name*
````

````
Service
- id*
- name*
- cost*
- price*
- category_id*
- discount*
````

````
Customer
- id*
- name
- phone*
- alt_phone
- point (0-100)
- current_location
````

````
Supplier
- id*
- name
- phone*
- alt_phone
- current_location
````

````
Delivery
- id*
- name*
- phone*
- alt_phone
- current_location*
````

````
Invoice
- id*
- created_at*
- customer_id*
- user_id*
- grand_total*
- delivery_id
- pick_up_date_time*
- status(on_hold, processing, completed)
````

````
Invoice Item
- id*
- invoice_id*
- service_id*
- qty*
- cost*
- price*
- sub_total
````

````
Purchase
- id*
- created_at*
- supplier_id*
- grand_total*
- paid*
````

````
Purchase Item
- id*
- purchase_id*
- product_id*
- qty*
- cost*
- sub_total*
````

````
## Tracking (Web portal)
````

### Generate a migration along with model and controller:
````
php artisan make:model Product -crm
````
