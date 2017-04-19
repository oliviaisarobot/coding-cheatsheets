# JQuery

- cross-platform, open source JavaScript library, [Git repository is HERE](https://github.com/jquery/jquery)
- it aims to separate scripts from html completely
- handles AJAX, animations, json parseing and many more

## Basic syntax

you link it to your html pages the same way as JavaScript files

```html
<script type="text/javascript" src="jquery.js"></script>
```

### Selecting DOM elements

the `$` simply indicated, that a jQuery code block is coming up

```javascript
$(document).ready(function(){
  // something happens here
});
```

the `$( )` lets you select a DOM element, in this case, the entire document, while `ready( )` is a built in function, it will run the script as soon as the document/page has finished loading

```javascript
$('div').mouseenter();
```

```javascript
$('div').mouseleave();
```

these call functions when the cursor enters or leaves the selected DOM element

```javascript
$('li');

$('li:nth-child(3)'); // you can use some css features to refine the selection

$('li.food'); // you can use tags, classes and ids to refine the selection

$('li, div, p'); // you can also select multiple elements
```

these are all valid selectors

```javascript
$(document).ready(function() {
    $('div').click(function() {
        $(this).fadeOut('slow');
    });
});
```

when there are multiple elements selected, such as all divs, the event handler will only apply the effect on the currently clicked/mouseover etc. one if we use the keyword *this*

### Variables

```javascript
var something = 7;

var $another = $('.thisdiv');
```

you can define variables the same way as in javascript, if we store jQuery objects in a variable, its a convention to start the name with a `$` sign, to indicate that the variable contains an object

