# PHP Cheatsheet

## Table of content
1. [General information](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#general-information)
2. [PHP syntax](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#php-syntax)
3. [String functions](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#string-functions)
4. [Array functions](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#array-functions)
5. [Custom functions](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#custom-functions)
6. [Objects](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#objects)
7. [Inheritance](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#inheritance)
8. [Associative array](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#associative-array)
9. [Multidimensional array](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#multidimensional-array)
10. [Include and require](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#include-and-require)
11. [Time and date formatting](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#time-and-date-formatting)
12. [Random numbers](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#random-numbers)
13. [Rounding numbers](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#rounding-numbers)
14. [SQL](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/basics.md#sql)

## General information

- php is an object-oriented programming language
- php is a scripting language
- standard indentation for php is 4 spaces
- this information is based on PHP 5.6 and PHP 7 standards and taken from various tutorials, and compared to the [offical PHP manual](http://php.net/manual/en/)

### PHP syntax

`''` only lets you use variables with concat `.`

`""` you can use variables within double quotation marks

```
+=
-=
%=
++
--
.=
==
=== type check
!=
&&
||
```

`.`
concat

```php
for ($i = 0; $i < 5; $i++) {}
```

```php
foreach($array as $item) { print $item }
```

```php
if (condition) {
  // execute some command if true
}
elseif (condition) {
  // execute some command if true
}
else {
  // execute some command if everything before is false
};
```

```php
while () {};
```

```PHP
do {
} while ();
```
this executes the code before checking if the condition for the while loop is true or false

```PHP
switch (VARIABLE) {
    case VALUE1:
        // execute some command
        break;
    case VALUE2:
        // execute some command
        break;
};
```
cleaner way of if else statementsk

```php
die();
```
any further scripts will be stopped, you can include an error message

```php
exit();
```

```php
preg_match('/is/', $string);
```
*expression matching*, pattern checking within strings, evaluated to boolean

```PHP
function has_space($string) {
    if (preg_match('/ /'), $string) {
        return true;
    }
    else {
        return false;
    }
}

if (has_space('Thisdoesnthaveaspace')) {
    echo 'has at least one space.';
}
else {
    echo 'Has no spaces.';  
}
```

```php
echo $var;
```

```php
print $var;
```
essentially the same as echo, more characters and slower, also works like a function print();

```php
return
```
doesn't display the value, just readies it

### String functions

```php
strlen(string);
```
length

```php
trim(string);
```
trims spaces from the beginning and end of a string

```php
str_word_count(string, 0);
```
0 returns a number, 1 returns an array of key-value pairs, third argument can be the indicator of a full stop (symbol)

```php
str_shuffle(string);
```
mixes up the characters of the string

```php
strrev(string);
```
reverses a string

```php
strtoupper(string);
```
uppercase

```php
strtolower(string);
```
lowercase

```php
substr(0, 1);
```
returns a slice of a string between two indexes

```php
similar_text(string1, string2, result);
```
calculates the percentage of similarity between two strings, returns a floating number

```php
htmlentities(addslashes(string));
```
adds slashes to certain strings to escape characters, so the value is not executed as code

```php
stripslashes(string);
```
strips slashes, so the value might be executed as code

```php
$string = "one two three four five";
$array = explode(' ', $string);
```
returns an array of a string that was split into pieces, takes 2 arguments, first is the divider between the split parts (whitespace, comma etc.), second is the string you want to perform *explode* on

```php
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user; // foo
echo $pass; // *
```
you can also immediately turn the split parts into values of different variables with the *list()* function

### Array functions

```php
$array = array("a", "b", "c");
```

```php
$array[1];
```

```php
$array[0] = "x";
```

```php
count($array);
```

prints out the length of the array

```php
print_r($array);
```

this prints out all items of the array, including their keys

```php
array_push($arrayname, item);
```

```php
sort($arrayname);
```

```php
rsort($arrayname);
```
reverse sort

```php
join(", ", $arrayname);
```
joins sorted (or any) array items into a string

```php
shuffle($arrayname);
```
randomizes the order of the items in an array

### Custom functions

```php
function addition($param1, $param2) {
  if ( !is_numeric($param1) || !is_numeric($param2) ) {
    return("Both parameters have to be numbers to perform addition.");
  } else {
    return $param1 + $param2;
  }
}
echo addition(3,2); // output: 5
```

```php
name();
```

### Objects

```PHP
class Name {
  public $variable;
  private function __construct($variable) {
    $this->variable = $variable;
  }
}
```

```php
$thing = new Name(variable);
```

```php
is_a($obj, class);
```
boolean, object is an instance of a certain class

```php
property_exists($obj, propertystring);
```
boolean, property exists on an object

```php
method_exists($obj, methodstring);
```
boolean, method exists on an object

### Inheritance

```php
class Something{}
```

```php
class Another extends Something{}
```
class inherits from the class it extends

-prefix: *final*: indicates that a certain variable or function cannot be overridden by children or subclasses

-prefix: *const*: creates constant variables that can be accessed from outside the scope, without initiating and object

```PHP
class Immortal extends Person {
  const alive = true;
}

if (Immortal::alive) {
  echo "I live forever!";
}
```

`::`
scope resolution operator

-prefix *static*: allows access to vars and functions without initiating
}

### Associative array

```PHP
$array = array(2012, 'BMW', 'blue');
$assocArray = array('year' => 2012,
		'brand' => 'BMW',
		'color' => 'blue');

echo $assocArray['year'] // returns 2012
```
allows you to change the key of each value in the array, can no longer access values by key number

### Multidimensional array

```PHP
$food = array(
    'Healthy' =>
        array ('Tomato', 'Spinach', 'Garlic'),
    'Unhealthy' =>
        array('Chocolate', 'Candy', 'Ice cream'));

echo $food[Healthy][0]; // returns Tomato

foreach($food as $element => $inner_array) {
    print $element;
    foreach($inner_array as $item) {
        print $item;
    }
}; // prints each item (Tomato) of each inner array (Healthy)
```
nested arrays, works like jsons

### Include and require

```php
include('header.inc.php');
```
works the same as
```php
include 'header.inc.php';
```

the file it is included in has access to the included files' variables

```php
require('header.inc.php');
```
works the same as
```php
require 'header.inc.php';
```

it kills the rest of the page and no further scripts are executed if it runs into an error

```php
include_once('header.inc.php');
```
works the same as
```php
include_once 'header.inc.php';
```

```php
require_once('header.inc.php');
```
works the same as
```php
require_once 'header.inc.php';
```

these limit the amount of times something can be loaded into the web page, if it has already been required, it won't load again

### Time and date formatting

```php
echo time();
```
or
```php
date('U');
```

this returns the *unix epoch* or *POSIX*, a large integer which represents the amount of seconds passed since 1st January 1970, usually useful for keeping track of how much time has passed between two timestamps

```php
$time = time();
$actual_time = date('H:i:s', $time);

echo 'Current time: ' .$actual_time;
```

the *date* function helps us format the current time, the first argument is the pattern, the second is the time we logged
running the date function alone with just formatting, it will return the current time

```php
date('Y/M/d/S');
```

```php
date(H:i:s);
```

date formatting options:
- `Y` stands for year (4 digits), lowecase returns last 2 digits
- `m` stands for month (1-12), capital returns month as short text (Jan-Dec)
- `F` returns the month as full text (January)
- `d` stands for day (1-31), capital returns day as short text (Mon-Sun)
- `l` lowercase L stands for day of the week, full text (Sunday-Saturday)
- `S` English official suffix for the day (st, nd, rd, th)
- `z` day of the year (0-365)
- `L` stands for leap year, 1 for is, 0 for isn't

time formatting options:
- `a` or `A` stand for *am* or *pm*, uppercase A for uppercase letters
- `g` 12-hour format without leading zeros, or `G` 24-hour format without leading zeros
- `h` 12-hour format with leading zeros, or `H` 24-hour format with leading zeros
- `i` stands for minutes with leading zeros
- `s` stands for seconds with leading zeros

```php
strtotime('+1 week');
```

```php
strtotime('now');
```

```php
strtotime('+1 day 2 hours 42 seconds');
```

```php
strtotime('last Monday');
```

```php
strtotime('next Friday');
```

### Random numbers

```php
rand();
```
random whole number

```php
rand(0, 10);
```
 random whole number between min and max value (inclusive)
 
```php
getrandmax();
```
 returns the highest random number the generator uses
 
```php
 <?php
 if (isset($_POST['roll']) {
     $rand = rand(1, 6);
     echo 'You rolled '.$rand;
 }
 ?>
 
 <form action="thisfile.php" method="POST">
     <input type="submit" name="roll" value="Roll the dice">
 </form>
 ```

 ### Rounding numbers

```php
round(num);
```
rounds down a floating number

```php
round(num, 3);
```
rounds down a floating number to 3 decimals

### Superglobal variables

A variable being superglobal means that they are available in all scopes throughout the script. The basic superglobals are the following:

```php
$GLOBALS
$_SERVER
$_GET
$_POST
$_FILES
$_COOKIE
$_SESSION
$_REQUEST
$_ENV
```

The `$_GLOBALS[]` is used to store global variables in an array. Those variables can have their own values assigned elsewhere. The assigned values will be accessible through the `$_GLOBALS['varname']` anywhere in the code. Within the array, you don't need to use the `$` indicator.

```php
$_GLOBALS['myname'];
$myname = 'olivia';
```

The `$_SERVER` superglobal

```php
$_SERVER[];
```

### SQL

```php
$conn = mysql_connect($servername, $username, $password) or die('Could not connect');
```

```php
$result = mysql_query($connection, $query);
```

```php
$query = 'SELECT something FROM datatable';
```

* extensive SQL syntax explanation and examples [HERE](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/SQL/basics.md)
* PHP SQL query example [HERE](https://github.com/oliviaisarobot/coding-cheatsheets/blob/master/PHP/queryexample.php)

### Built-in webserver

More info [HERE](http://php.net/manual/en/features.commandline.webserver.php)
