# JQuery

- cross-platform, open source JavaScript library, [Git repository is HERE](https://github.com/jquery/jquery)
- it aims to separate scripts from html completely
- handles AJAX, animations, json parseing and many more
- refer to the [DOCUMENTATION](http://learn.jquery.com/) for specifics

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
$('li');

$('li:nth-child(3)'); // you can use some css features to refine the selection

$('li.food'); // you can use tags, classes and ids to refine the selection

$('li, div, p'); // you can also select multiple elements
```

these are all valid selectors

```javascript
$('div').mouseenter();
```

```javascript
$('div').mouseleave();
```

these call functions when the cursor enters or leaves the selected DOM element

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

var $h1 = $('<h1>This is a header</h1>');
```

you can define variables the same way as in javascript, if we store jQuery objects in a variable, its a convention to start the name with a `$` sign, to indicate that the variable contains an object

### Common functions

#### Events

```javascript
$('div').click();

$('div').mouseenter(); // equivalent to hover

$('div').mouseleave();
```

```javascript
$('#helloBtn').click(function(event) {
    alert('Hello.');
});

$('#helloBtn').bind('click', function(event) {
    alert('Hello.');
});
 
$('#helloBtn').on('click', function(event) {
    alert('Hello.');
});
 
$('body').on({
    click: function(event) {
        alert('Hello.');
    }
}, 'button');
 
$('body').on('click', 'button', function(event) {
    alert('Hello.');
});
```

the many ways of event binding

#### Animations and effects

```javascript
$('div').hide();

$('div').show();

$('div').slideUp(600); // perform slide animation in 0.6s

$('div').slideDown(600);

$('div').fadeOut(800);

$('div').fadeIn(800);

$('div').fadeTo('fast', 1); // speed and opacity

$('div').toggle(); // optional parameter is speed: 'slow' or 900

$('div').slideToggle();

$('div').fadeToggle();
```

#### Manipulating DOM elements

```javascript
$('div').addClass('lookAtMe');

$('div').toggleClass('hover');
```

class manipulation

```javascript
$('div').prepend(); // adds a child element to the beginning of the array

$().prependTo('div');

$('div').append(); // adds a child element to end of the array

$().appendTo('div');

$('div').before(); // adds an element before the targeted element

$('div').after(); // and after the targeted element
```

ways of adding new DOM elements to the document

```javascript
$('div').remove(); // deletes a DOM element

$('div').empty(); // deletes all content, including child elements
```

#### Multiple events on the same element

```javascript
$('div').on({
    mouseenter: function() {
        console.log('hovered over a div');
    },
    mouseleave: function() {
        console.log('mouse left a div');
    },
    click: function() {
        console.log('clicked on a div');
    }
});
```
