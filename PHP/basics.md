# PHP Cheatsheet

## General information

- php is an object-oriented programming language
- php is a scripting language
- standard indentation for php is 4 spaces

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

`for ($i = 0; i < 5; i++) {}`

`foreach($array as $item) { print $item }`

```
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

`while () {};`
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

`die();`
any further scripts will be stopped, you can include an error message

`exit();`

`preg_match('/is/', $string);`
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

`echo`

`print`
essentially the same as echo, more characters and slower, also works like a function print();

`return`
doesn't display the value, just readies it

### STRING FUNCTIONS

`strlen(string);`
length

`trim(string);`
trims spaces from the beginning and end of a string

`str_word_count(string, 0);`
0 returns a number, 1 returns an array of key-value pairs, third argument can be the indicator of a full stop (symbol)

`string_shuffled(string);`
mixes up the characters of the string

`strrev(string);`
reverses a string

`strtoupper(string);`
uppercase

`strtolower(string);`
lowercase

`substr(0, 1);`
returns a slice of a string between two indexes

`similar_text(string1, string2, result);`
calculates the percentage of similarity between two strings, returns a floating number

`htmlentities(addslashes(string))`
adds slashes to certain strings to escape characters, so the value is not executed as code

`stripslashes(string)`
strips slashes, so the value might be executed as code

### ARRAY FUNCTIONS

`$array = array("a", "b", "c");`

`$array[1];`

`$array[0] = "x";`

`print_r($array)`

this prints out all items of the array, including their keys

`array_push($arrayname, item);`

`count($arrayname);`

`sort($arrayname);`

`rsort($arrayname);`
reverse sort

`join(", ", $arrayname);`
joins sorted (or any) array items into a string

### OTHER FUNCTIONS

`rand();`
random whole number

`rand(0, 10);`
 random whole number between min and max value

`round(num);`
rounds down a floating number

`round(num, 3);`
rounds down a floating number to 3 decimals

### CUSTOM FUNCTIONS

`function name(params) {};`
`name();`

### OBJECTS

```PHP
class Name {
  public $variable;
  private function __construct($variable) {
    $this->variable = $variable;
  }
}
```

`$thing = new Name(variable);`

`is_a($obj, class);`
boolean, object is an instance of a certain class

`property_exists($obj, propertystring);`
boolean, property exists on an object

`method_exists($obj, methodstring);`
boolean, method exists on an object

### INHERITANCE

`class Something{}`
`class Another extends Something{}`
  class inherits from the class it extends

-prefix: *final*: indicates that a certain variable or function cannot be overridden by children or subclasses

-prefix: *const*: creates constant variables that can be accessed from outside the scope, without initiating and object

```PHP
class Immortal extends Person {
  const alive = true;
}

if (Immortal::alive) {
  echo "I live forever!"
```

`::`
scope resolution operator

-prefix *static*: allows access to vars and functions without initiating
}

### ASSOCIATIVE ARRAY

```PHP
$array = array(2012, 'BMW', 'blue');
$assocArray = array('year' => 2012,
		'brand' => 'BMW',
		'color' => 'blue');

echo $assocArray['year'] // returns 2012
```
allows you to change the key of each value in the array, can no longer access values by key number

### MULTIDIMENSIONAL ARRAY

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

### INCLUDE AND REQUIRE

`include('header.inc.php');`
works the same as
`include 'header.inc.php';`

the file it is included in has access to the included files' variables

`require('header.inc.php');`
works the same as
`require 'header.inc.php';`

it kills the rest of the page and no further scripts are executed if it runs into an error

`include_once('header.inc.php');`
works the same as
`include_once 'header.inc.php';`

`require_once('header.inc.php');`
works the same as
`require_once 'header.inc.php';`

these limit the amount of times something can be loaded into the web page, if it has already been required, it won't load again

### SQL

`$conn = mysql_connect($servername, $username, $password) or die('Could not connect');`

`$result = mysql_query($connection, $query);`

`$query = 'SELECT something FROM datatable';`
