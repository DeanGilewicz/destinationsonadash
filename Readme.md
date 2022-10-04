comment out the following when working locally so can access site at [localhost](http://destinationsonadash.localhost/)

```php
# RewriteCond %{SERVER_PORT} 80
# RewriteRule ^(.*)$ https://www.destinationsonadash.com/$1 [R=301,L]

# RewriteCond %{HTTP_HOST} ^destinationsonadash.com [nocase]
# RewriteRule ^(.*) https://www.destinationsonadash.com/$1 [last,redirect=301]

```

After commenting out the redirect, run locally

1. gulp initial
2. gulp

Download MAMP
Sequel Pro
start server (with apache)

visit localhost
