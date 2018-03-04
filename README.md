# Sample version 0.0.1

## Server requirements

* Nginx version ^1
* PHP >=7
* Laravel 5.6

## Step to build code.

Explain step for making code or program.

When I got some of requirements from customer. The first, I will write human language. For example, I'm going to make a program for collecting Thai ID.

 I design the asset of data
```
  $user should have { first_name , last_name , thai_id, birth, mobile, address }

```
When people entered the data to the system.

```
  system should validations
    - first_name required
    - last_name required
    - thai_id required,isNumber,13 digits
    like this
```
When I've done this process. I'm going to write the code then.

## Step to test.
Tools for helping me to test the system.
* Postman : I use to make request to test API and Debug while I'm still developing program
* Phpunit : I usually write testscript along side.

Folder test scripts
```
  /tests/Feature/CollectTest.php this file made for testing collect page.
```
## How do you prevent SQL injection?
Laravel freamwork has ORM "https://laravel.com/docs/5.6/eloquent" help me for preventing SQL injection.
I think right now have a lot of tools like this. Because it's a better way than execute a query by myself.

## Explain about files in project

```
  app -
      - Http
          - Controllers
              - CollectFormController.php (It's controller of collect page)
               - Dashboard
                    - ThaiPeoplesController.php (It's controller of admin page)
      - Models
        - CoreModel.php (It's abstract for all model)
        - People.php (It's ORM of peoples table and have factory for create)
        - PeopleLists.php (It's ORM for query)
        
  resources ('templates')
```

