# Sample version 0.0.1

## Server requirements

* Nginx version ^1
* PHP >=7
* Laravel 5.6

## Step to build code.

Explain step for making code or programe

1. when i got some of requirements from customer. The first i will write human language. for the sample.i gonna make program for collected thai id.

 I design the asset of data
```
  $user should have { first_name , last_name , thai_id, birth, mobile, address }

```
when people enter the data to system

```
  system should validations
    - first_name required
    - last_name required
    - thai_id required,isNumber,13 digits
    like this
```
ok when i make this success. i gonna write the code.

## Step to testing.
Tools for helping me for testing system
* Postman  i use to make request to test api, debug while i still develop program
* Phpunit i usually write testscript along side.

Folder test scripts
```
  /tests
```
## How do you prevent SQL injection?
Laravel freamwork has ORM "https://laravel.com/docs/5.6/eloquent" help me for prevent SQL injection?
i think right now have a lot of tools like this.because it's good way than execute a query by myself.

