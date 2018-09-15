# The PHP helpers function that extract from Laravel

[![Build Status](https://travis-ci.org/phannaly/laravel-helpers.svg?branch=master)](https://travis-ci.org/phannaly/laravel-helpers)  [![StyleCI](https://github.styleci.io/repos/148669698/shield?branch=master)](https://github.styleci.io/repos/148669698)

This project is independently you don't need to install anything(composer) unless you want to contribute.

Most of the code and logic extract from Laravel code base.

## Setup

You don't need to install by composer if your project doesn't have it.

Just import it manually in `src` folder.

But If you want to install by composer, please follow command below

    composer require phannaly/laravel-helpers

This library will load automatically after you install it.
Done!, you are good to go.

<a name="available-methods"></a>
## Available Methods

### Arrays & Objects

* [array_add](#method-array-add)
* [array_collapse](#method-array-collapse)
* [array_divide](#method-array-divide)
* [array_dot](#method-array-dot)
* [array_except](#method-array-except)
* [array_first](#method-array-first)
* [array_flatten](#method-array-flatten)
* [array_forget](#method-array-forget)
* [array_get](#method-array-get)
* [array_has](#method-array-has)
* [array_last](#method-array-last)
* [array_only](#method-array-only)
* [array_pluck](#method-array-pluck)
* [array_prepend](#method-array-prepend)
* [array_pull](#method-array-pull)
* [array_random](#method-array-random)
* [array_set](#method-array-set)
* [array_sort](#method-array-sort)
* [array_where](#method-array-where)
* [array_wrap](#method-array-wrap)
* [data_fill](#method-data-fill)
* [data_get](#method-data-get)
* [data_set](#method-data-set)
* [head](#method-head)
* [last](#method-last)

### Strings

* [camel_case](#method-camel-case)
* [ends_with](#method-ends-with)
* [kebab_case](#method-kebab-case)
* [preg_replace_array](#method-preg-replace-array)
* [snake_case](#method-snake-case)
* [starts_with](#method-starts-with)
* [str_after](#method-str-after)
* [str_before](#method-str-before)
* [str_contains](#method-str-contains)
* [str_finish](#method-str-finish)
* [str_is](#method-str-is)
* [str_limit](#method-str-limit)
* [str_random](#method-str-random)
* [str_replace_array](#method-str-replace-array)
* [str_replace_first](#method-str-replace-first)
* [str_replace_last](#method-str-replace-last)
* [str_slug](#method-str-slug)
* [str_start](#method-str-start)
* [studly_case](#method-studly-case)
* [title_case](#method-title-case)

<a name="arrays"></a>
## Arrays & Objects

<a name="method-array-add"></a>
#### `array_add()` 

The `array_add` function adds a given key / value pair to an array if the given key doesn't already exist in the array:

```php
$array = array_add(['name' => 'Desk'], 'price', 100);

// ['name' => 'Desk', 'price' => 100]
```

<a name="method-array-collapse"></a>
#### `array_collapse()` 

The `array_collapse` function collapses an array of arrays into a single array:

```php
$array = array_collapse([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);

// [1, 2, 3, 4, 5, 6, 7, 8, 9]
```

<a name="method-array-divide"></a>
#### `array_divide()` 

The `array_divide` function returns two arrays, one containing the keys, and the other containing the values of the given array:
```php
[$keys, $values] = array_divide(['name' => 'Desk']);

// $keys: ['name']

// $values: ['Desk']
```

<a name="method-array-dot"></a>
#### `array_dot()` 

The `array_dot` function flattens a multi-dimensional array into a single level array that uses "dot" notation to indicate depth:
```php
$array = ['products' => ['desk' => ['price' => 100]]];

$flattened = array_dot($array);

// ['products.desk.price' => 100]
```

<a name="method-array-except"></a>
#### `array_except()` 

The `array_except` function removes the given key / value pairs from an array:

```php
$array = ['name' => 'Desk', 'price' => 100];

$filtered = array_except($array, ['price']);

// ['name' => 'Desk']
```

<a name="method-array-first"></a>
#### `array_first()` 

The `array_first` function returns the first element of an array passing a given truth test:

```php
$array = [100, 200, 300];

$first = array_first($array, function ($value, $key) {
    return $value >= 150;
});

// 200
```

A default value may also be passed as the third parameter to the method. This value will be returned if no value passes the truth test:
```php
$first = array_first($array, $callback, $default);
```

<a name="method-array-flatten"></a>
#### `array_flatten()` 

The `array_flatten` function flattens a multi-dimensional array into a single level array:

```php
$array = ['name' => 'Joe', 'languages' => ['PHP', 'Ruby']];

$flattened = array_flatten($array);

// ['Joe', 'PHP', 'Ruby']
```

<a name="method-array-forget"></a>
#### `array_forget()` 

The `array_forget` function removes a given key / value pair from a deeply nested array using "dot" notation:

```php
$array = ['products' => ['desk' => ['price' => 100]]];

array_forget($array, 'products.desk');

// ['products' => []]
```

<a name="method-array-get"></a>
#### `array_get()` 

The `array_get` function retrieves a value from a deeply nested array using "dot" notation:

```php
$array = ['products' => ['desk' => ['price' => 100]]];

$price = array_get($array, 'products.desk.price');

// 100
```

The `array_get` function also accepts a default value, which will be returned if the specific key is not found:

```php
$discount = array_get($array, 'products.desk.discount', 0);

// 0
```

<a name="method-array-has"></a>
#### `array_has()` 

The `array_has` function checks whether a given item or items exists in an array using "dot" notation:

```php
$array = ['product' => ['name' => 'Desk', 'price' => 100]];

$contains = array_has($array, 'product.name');

// true

$contains = array_has($array, ['product.price', 'product.discount']);

// false
```

<a name="method-array-last"></a>
#### `array_last()` 

The `array_last` function returns the last element of an array passing a given truth test:

```php
$array = [100, 200, 300, 110];

$last = array_last($array, function ($value, $key) {
    return $value >= 150;
});

// 300
```

A default value may be passed as the third argument to the method. This value will be returned if no value passes the truth test:

```php
$last = array_last($array, $callback, $default);
```

<a name="method-array-only"></a>
#### `array_only()` 

The `array_only` function returns only the specified key / value pairs from the given array:

```php
$array = ['name' => 'Desk', 'price' => 100, 'orders' => 10];

$slice = array_only($array, ['name', 'price']);

// ['name' => 'Desk', 'price' => 100]
```

<a name="method-array-pluck"></a>
#### `array_pluck()` 

The `array_pluck` function retrieves all of the values for a given key from an array:

```php
$array = [
    ['developer' => ['id' => 1, 'name' => 'Taylor']],
    ['developer' => ['id' => 2, 'name' => 'Abigail']],
];

$names = array_pluck($array, 'developer.name');

// ['Taylor', 'Abigail']
```

You may also specify how you wish the resulting list to be keyed:

```php
$names = array_pluck($array, 'developer.name', 'developer.id');

// [1 => 'Taylor', 2 => 'Abigail']
```

<a name="method-array-prepend"></a>
#### `array_prepend()` 

The `array_prepend` function will push an item onto the beginning of an array:

```php
$array = ['one', 'two', 'three', 'four'];

$array = array_prepend($array, 'zero');

// ['zero', 'one', 'two', 'three', 'four']
```

If needed, you may specify the key that should be used for the value:

```php
$array = ['price' => 100];

$array = array_prepend($array, 'Desk', 'name');

// ['name' => 'Desk', 'price' => 100]
```

<a name="method-array-pull"></a>
#### `array_pull()` 

The `array_pull` function returns and removes a key / value pair from an array:

```php
$array = ['name' => 'Desk', 'price' => 100];

$name = array_pull($array, 'name');

// $name: Desk

// $array: ['price' => 100]
```
A default value may be passed as the third argument to the method. This value will be returned if the key doesn't exist:

```php
$value = array_pull($array, $key, $default);
```

<a name="method-array-random"></a>
#### `array_random()` 

The `array_random` function returns a random value from an array:

```php
$array = [1, 2, 3, 4, 5];

$random = array_random($array);

// 4 - (retrieved randomly)
```

You may also specify the number of items to return as an optional second argument. Note that providing this argument will return an array, even if only one item is desired:

```php
$items = array_random($array, 2);

// [2, 5] - (retrieved randomly)
```

<a name="method-array-set"></a>
#### `array_set()` 

The `array_set` function sets a value within a deeply nested array using "dot" notation:

```php
$array = ['products' => ['desk' => ['price' => 100]]];

array_set($array, 'products.desk.price', 200);

// ['products' => ['desk' => ['price' => 200]]]
```
<a name="method-array-sort"></a>
#### `array_sort()` 

The array_sort function sorts an array by its values:

```php
$array = ['Desk', 'Table', 'Chair'];

$sorted = array_sort($array);

// ['Chair', 'Desk', 'Table']
```

You may also sort the array by the results of the given Closure:

```php
$array = [
    ['name' => 'Desk'],
    ['name' => 'Table'],
    ['name' => 'Chair'],
];

$sorted = array_values(array_sort($array, function ($value) {
    return $value['name'];
}));

/*
    [
        ['name' => 'Chair'],
        ['name' => 'Desk'],
        ['name' => 'Table'],
    ]
*/
```


<a name="method-array-where"></a>
#### `array_where()` 

The `array_where` function filters an array using the given Closure:

```php
$array = [100, '200', 300, '400', 500];

$filtered = array_where($array, function ($value, $key) {
    return is_string($value);
});

// [1 => '200', 3 => '400']
```

<a name="method-array-wrap"></a>
#### `array_wrap()` 

The `array_wrap` function wraps the given value in an array. If the given value is already an array it will not be changed:

```php
$string = 'Laravel';

$array = array_wrap($string);

// ['Laravel']
```

If the given value is null, an empty array will be returned:

```php
$nothing = null;

$array = array_wrap($nothing);

// []
```

<a name="method-data-fill"></a>
#### `data_fill()` 

The `data_fill` function sets a missing value within a nested array or object using "dot" notation:

```php
$data = ['products' => ['desk' => ['price' => 100]]];

data_fill($data, 'products.desk.price', 200);

// ['products' => ['desk' => ['price' => 100]]]

data_fill($data, 'products.desk.discount', 10);

// ['products' => ['desk' => ['price' => 100, 'discount' => 10]]]
```

This function also accepts asterisks as wildcards and will fill the target accordingly:

```php
$data = [
    'products' => [
        ['name' => 'Desk 1', 'price' => 100],
        ['name' => 'Desk 2'],
    ],
];

data_fill($data, 'products.*.price', 200);

/*
    [
        'products' => [
            ['name' => 'Desk 1', 'price' => 100],
            ['name' => 'Desk 2', 'price' => 200],
        ],
    ]
*/
```

<a name="method-data-get"></a>
#### `data_get()` 

The `data_get` function retrieves a value from a nested array or object using "dot" notation:

```php
$data = ['products' => ['desk' => ['price' => 100]]];

$price = data_get($data, 'products.desk.price');

// 100
```

The `data_get` function also accepts a default value, which will be returned if the specified key is not found:
```php
$discount = data_get($data, 'products.desk.discount', 0);

// 0
```

<a name="method-data-set"></a>
#### `data_set()` 

The `data_set` function sets a value within a nested array or object using "dot" notation:

```php
$data = ['products' => ['desk' => ['price' => 100]]];

data_set($data, 'products.desk.price', 200);

// ['products' => ['desk' => ['price' => 200]]]
```

This function also accepts wildcards and will set values on the target accordingly:

```php
$data = [
    'products' => [
        ['name' => 'Desk 1', 'price' => 100],
        ['name' => 'Desk 2', 'price' => 150],
    ],
];

data_set($data, 'products.*.price', 200);

/*
    [
        'products' => [
            ['name' => 'Desk 1', 'price' => 200],
            ['name' => 'Desk 2', 'price' => 200],
        ],
    ]
*/
```

By default, any existing values are overwritten. If you wish to only set a value if it doesn't exist, you may pass `false` as the third argument:

```php
$data = ['products' => ['desk' => ['price' => 100]]];

data_set($data, 'products.desk.price', 200, false);

// ['products' => ['desk' => ['price' => 100]]]
```

<a name="method-head"></a>
#### `head()` 

The `head` function returns the first element in the given array:

```php
$array = [100, 200, 300];

$first = head($array);

// 100
```

<a name="method-last"></a>
#### `last()` 

The `last` function returns the last element in the given array:

```php
$array = [100, 200, 300];

$last = last($array);

// 300
```

<a name="strings"></a>
## Strings

<a name="method-camel-case"></a>
#### `camel_case()` 

The `camel_case` function converts the given string to `camelCase`:

```php
$converted = camel_case('foo_bar');

// fooBar
```

<a name="method-ends-with"></a>
#### `ends_with()` 

The `ends_with` function determines if the given string ends with the given value:

```php
$result = ends_with('This is my name', 'name');

// true
```

<a name="method-kebab-case"></a>
#### `kebab_case()` 

The `kebab_case` function converts the given string to `kebab-case`:

```php
$converted = kebab_case('fooBar');

// foo-bar
```

<a name="method-preg-replace-array"></a>
#### `preg_replace_array()` 

The `preg_replace_array` function replaces a given pattern in the string sequentially using an array:

```php
$string = 'The event will take place between :start and :end';

$replaced = preg_replace_array('/:[a-z_]+/', ['8:30', '9:00'], $string);

// The event will take place between 8:30 and 9:00
```

<a name="method-snake-case"></a>
#### `snake_case()` 

The `snake_case` function converts the given string to `snake_case`:

```php
$converted = snake_case('fooBar');

// foo_bar
```

<a name="method-starts-with"></a>
#### `starts_with()` 

The `starts_with` function determines if the given string begins with the given value:

```php
$result = starts_with('This is my name', 'This');

// true
```

<a name="method-str-after"></a>
#### `str_after()` 

The `str_after` function returns everything after the given value in a string:

```php
$slice = str_after('This is my name', 'This is');

// ' my name'
```

<a name="method-str-before"></a>
#### `str_before()` 

The `str_before` function returns everything before the given value in a string:

```php
$slice = str_before('This is my name', 'my name');

// 'This is '
```

<a name="method-str-contains"></a>
#### `str_contains()` 

The `str_contains` function determines if the given string contains the given value (case sensitive):

```php
$contains = str_contains('This is my name', 'my');

// true
```

You may also pass an array of values to determine if the given string contains any of the values:

```php
$contains = str_contains('This is my name', ['my', 'foo']);

// true
```

<a name="method-str-finish"></a>
#### `str_finish()` 

The `str_finish` function adds a single instance of the given value to a string if it does not already end with the value:

```php
$adjusted = str_finish('this/string', '/');

// this/string/

$adjusted = str_finish('this/string/', '/');

// this/string/
```

<a name="method-str-is"></a>
#### `str_is()` 

The `str_is` function determines if a given string matches a given pattern. Asterisks may be used to indicate wildcards:

```php
$matches = str_is('foo*', 'foobar');

// true

$matches = str_is('baz*', 'foobar');

// false
```

<a name="method-str-limit"></a>
#### `str_limit()` 

The `str_limit` function truncates the given string at the specified length:

```php
$truncated = str_limit('The quick brown fox jumps over the lazy dog', 20);

// The quick brown fox...
```

You may also pass a third argument to change the string that will be appended to the end:

```php
$truncated = str_limit('The quick brown fox jumps over the lazy dog', 20, ' (...)');

// The quick brown fox (...)
```

<a name="method-str-random"></a>
#### `str_random()` 

The `str_random` function generates a random string of the specified length. This function uses PHP's `random_bytes` function:

```php
$random = str_random(40);
```

<a name="method-str-replace-array"></a>
#### `str_replace_array()` 

The `str_replace_array` function replaces a given value in the string sequentially using an array:

```php
$string = 'The event will take place between ? and ?';

$replaced = str_replace_array('?', ['8:30', '9:00'], $string);

// The event will take place between 8:30 and 9:00
```

<a name="method-str-replace-first"></a>
#### `str_replace_first()` 

The `str_replace_first` function replaces the first occurrence of a given value in a string:

```php
$replaced = str_replace_first('the', 'a', 'the quick brown fox jumps over the lazy dog');

// a quick brown fox jumps over the lazy dog
```

<a name="method-str-replace-last"></a>
#### `str_replace_last()` 

The `str_replace_last` function replaces the last occurrence of a given value in a string:

```php
$replaced = str_replace_last('the', 'a', 'the quick brown fox jumps over the lazy dog');

// the quick brown fox jumps over a lazy dog
```

<a name="method-str-slug"></a>
#### `str_slug()` 

The `str_slug` function generates a URL friendly "slug" from the given string:

```php
$slug = str_slug('Laravel 5 Framework', '-');

// laravel-5-framework
```

<a name="method-str-start"></a>
#### `str_start()` 

The `str_start` function adds a single instance of the given value to a string if it does not already start with the value:

```php
$adjusted = str_start('this/string', '/');

// /this/string

$adjusted = str_start('/this/string', '/');

// /this/string
```

<a name="method-studly-case"></a>
#### `studly_case()` 

The `studly_case` function converts the given string to `StudlyCase`:

```php
$converted = studly_case('foo_bar');

// FooBar
```

<a name="method-title-case"></a>
#### `title_case()` 

The `title_case` function converts the given string to `Title Case`:

```php
$converted = title_case('a nice title uses the correct case');

// A Nice Title Uses The Correct Case
```    

## Contributing

Feel free to contribute through PR.

See [CODE OF CONDUCT](https://github.com/phannaly/laravel-helpers/blob/master/CODE_OF_CONDUCT.md) for details.

## License

This package operates under the MIT License (MIT). See the [LICENSE](https://github.com/phannaly/laravel-helpers/blob/master/LICENSE.md) file for details.