comment out the following when working locally so can access site at [localhost](http://destinationsonadash.localhost/)

```php
# RewriteCond %{SERVER_PORT} 80
# RewriteRule ^(.*)$ https://www.destinationsonadash.com/$1 [R=301,L]

# RewriteCond %{HTTP_HOST} ^destinationsonadash.com [nocase]
# RewriteRule ^(.*) https://www.destinationsonadash.com/$1 [last,redirect=301]

```
