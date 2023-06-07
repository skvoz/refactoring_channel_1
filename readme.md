HOWTO
===

Description
===
Some approach, and best practice example.

Install 
===
- www/example.env to .env 
- rename sample.env to .env (set php74)
- docker-compose up -d
- docker-compose exec webserver
- default lumen setup(generate app_key, permisson to folders, etc., composer install)
- chmod -R 777 tmp
- supervisord
- php artisan migrate

URL 
===
GET / - list urls 

GET /sitemap-generator - create xml file, set it to tmp dir

GET /test - create hello world page

GET /w-trade-api-to-opencart2 - 
    > read data from stub service , random fName, lName . From time to time lets generate exception.
    > write this data in fields field1, field2, field3, field4 ( one record )
    > if sms happen rollback data

GET /notifications - list correct handled jobs

TESTS
===
- need add db `test`
- need add redis node `1`