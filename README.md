# mime-type

Simple library to provide common interface for encoding / decoding MIME types.

```php
<?php

function getMime($mime_type)
{
    switch ($mime_type) {
        case 'application/json':
            return new \Vertilia\MimeType\ApplicationJson();
        case 'application/x-www-form-urlencoded':
            return new \Vertilia\MimeType\ApplicationXWwwFormUrlencoded();
        default:
            throw new UnexpectedValueException('Unknown mime type');
    }
}

print_r(getMime('application/json')->decode('{"a":[1,2,3]}', JSON_OBJECT_AS_ARRAY));
print_r(getMime('application/x-www-form-urlencoded')->decode('a[]=1&a[]=2&a[]=3'));
```

Both calls from the above snippet first return the object corresponding to provided MIME type,
and then they decode the content of that MIME type with the same resulting array.

Both calls display the same result:
```
Array
(
    [a] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
        )
)
```
