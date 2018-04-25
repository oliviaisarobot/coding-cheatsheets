# About Vue in general

Vue is a Javascript framework that is roughly based on the MVVM (model-view-viewmodel) design pattern. It uses ECMAScript 5, therefore it has a browser requirement of IE8 or above. It relies on a temlate syntax to build applications.

[Official documentation](https://vuejs.org/)

## Installation

As easy as including the library:

`<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>`

But it's important to examine the different builds, as we have to include different versions for development and production, more info [here](https://vuejs.org/v2/guide/installation.html). Generally, it is recommended to install it via npm.

`npm install vue`

It also offers a client (much like Angular), which agrants access to quick and easy build tools.

`npm install --global vue-cli`

## The Vue instance

In our index html file, we create a container for our root Vue instance, a base of our entire component system.

```
<div id="app"></div>
```

The corresponding Javascript might look like:

```
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello world!'
  }
})
```

### Component parts

#### Data

The data part of the Vue instance contains properties to be displayed or manipulated. Whenever it changes, the DOM is re-rendered.

#### Methods

Speaks for itself, contains the methods that are accessible within that component.

#### Hooks

Lifecycle hooks allows you to easily control events of the instance's lifecycle, these hooks include *created*, *mounted*, *updated* and *destroyed*.

#### Computed

Instead of using complex, non-declarative logic in interpolation, we can move the logic to the *computed* component of the Vue instance.

```
var vm = new Vue({
  el: '#example',
  data: {
    message: 'Hello'
  },
  computed: {
    // a computed getter
    reversedMessage: function () {
      // `this` points to the vm instance
      return this.message.split('').reverse().join('')
    }
  }
})
```

The benefit of using computed instead of methods, is that computed properties are cached based on their dependencies, and they will return a result much faster, unless their dependencies change. Same is not true for methods. In cases where we don't want caching to happen, we should always use methods.

As an alternative to watched properties, you can use *computed setters*.

```
computed: {
  fullName: {
    // getter
    get: function () {
      return this.firstName + ' ' + this.lastName
    },
    // setter
    set: function (newValue) {
      var names = newValue.split(' ')
      this.firstName = names[0]
      this.lastName = names[names.length - 1]
    }
  }
}
```

#### Watched

Watchers are most useful when we would like to perform property changes through expensive operations or asynchronous calls. Vuejs.org offers an example via a question form:

```
<!-- Since there is already a rich ecosystem of ajax libraries    -->
<!-- and collections of general-purpose utility methods, Vue core -->
<!-- is able to remain small by not reinventing them. This also   -->
<!-- gives you the freedom to use what you're familiar with. -->
<script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.13.1/lodash.min.js"></script>
<script>
var watchExampleVM = new Vue({
  el: '#watch-example',
  data: {
    question: '',
    answer: 'I cannot give you an answer until you ask a question!'
  },
  watch: {
    // whenever question changes, this function will run
    question: function (newQuestion, oldQuestion) {
      this.answer = 'Waiting for you to stop typing...'
      this.getAnswer()
    }
  },
  methods: {
    // _.debounce is a function provided by lodash to limit how
    // often a particularly expensive operation can be run.
    // In this case, we want to limit how often we access
    // yesno.wtf/api, waiting until the user has completely
    // finished typing before making the ajax request. To learn
    // more about the _.debounce function (and its cousin
    // _.throttle), visit: https://lodash.com/docs#debounce
    getAnswer: _.debounce(
      function () {
        if (this.question.indexOf('?') === -1) {
          this.answer = 'Questions usually contain a question mark. ;-)'
          return
        }
        this.answer = 'Thinking...'
        var vm = this
        axios.get('https://yesno.wtf/api')
          .then(function (response) {
            vm.answer = _.capitalize(response.data.answer)
          })
          .catch(function (error) {
            vm.answer = 'Error! Could not reach the API. ' + error
          })
      },
      // This is the number of milliseconds we wait for the
      // user to stop typing.
      500
    )
  }
})
</script>
```

### Interpolation

We can output our data or our methods with interpolation, which uses the "moustache" syntax (double curly braces).

`{{ message }}`

It can also be used for simple Javascript expressions, but it will only evaluate single line expressions or ternary expressions.

`{{ ok ? 'YES' : 'NO' }}`

### Directives and data binding

The *v-* prefix grants access to a veriety of directives. Directives don't work with the moustache syntax interpolation.

Directives allow us to output html syntax that is parsed as html via *v-html*.

`<p v-html="html"></p>`

#### Arguments in directives

Some of these directives take arguments, and enabled data binding, which allows us to bind data to different attributes of the DOM elements. Interpolation can't be used with directives.

`<a v-bind:href="url">Link</a>`

or

`<a :href="url">Link</a>`

which is a shorthand.

#### Event binding and modifiers

We can also bind events with *v-on*.

`<a v-on:click="event">Link</a>`

or in shorthand form:

`<a @dblclick="event">Link</a>`

Some directives take modifiers, in the case of *v-on* you can call *prevent*, which tells Vue to call event.preventdefault() on the event we are trying to use.

`<a :click.prevent="event">Link</a>`

The available modifiers are the following:

- .stop
- .prevent
- .capture
- .self
- .once
- .passive

##### Key modifiers

Vue provides easy ways to track keypress.

`<input v-on:keyup.13="submit">`

And even aliases for the most commonly used keys:

```
<input v-on:keyup.enter="submit">
<input @keyup.enter="submit">
```

The available key aliases are the following:

- .enter
- .tab
- .delete (captures both “Delete” and “Backspace” keys)
- .esc
- .space
- .up
- .down
- .left
- .right

Or you can define custom aliases:

```
// enable `v-on:keyup.f1`
Vue.config.keyCodes.f1 = 112
```

There are also modifier key aliases:

- .ctrl
- .alt
- .shift
- .meta

`<input @keyup.ctrl.67="copy">`

These will only trigger the event, if another key is pressed *while* holding the modifier key. If pressed and released alone, the modifier key will not trigger the event.

- .exact

In addition, the *.exact* modifier will require the exact combination to be used, to trigger the event.

```
<!-- this will fire even if Alt or Shift is also pressed -->
<button @click.ctrl="onClick">A</button>

<!-- this will only fire when Ctrl and no other keys are pressed -->
<button @click.ctrl.exact="onCtrlClick">A</button>

<!-- this will only fire when no system modifiers are pressed -->
<button @click.exact="onClick">A</button>
```

##### Mouse button modifiers

- .left
- .right
- .middle

#### Conditional rendering

Or use logic in the html DOM through *v-if*, *v-else-if* and *v-else*.

```
<p v-if="seen === 'yes'">You've seen it.</p>
<p v-else-if="seen === 'maybe'">You might have seen it. Who knows?</p>
<p v-else>You haven't seen it.</p>
```

Using *v-show* is similar to toggling display via CSS. Which means it will always be rendered in the DOM, but not always visible, while a conditionally rendered element will only show up for the first time, when the condition becomes true.

`<p v-show="seen">You've seen it.</p>`

#### List rendering

List rendering can be done with *v-for*.

```
<ul id="example-1">
  <li v-for="item in items">
    {{ item.message }}
  </li>
</ul>
```

```
var example1 = new Vue({
  el: '#example-1',
  data: {
    items: [
      { message: 'Foo' },
      { message: 'Bar' }
    ]
  }
})
```

List rendering also supports the usage of *index* or *key*, and has full access to parent scope properties.

```
<ul id="example-2">
  <li v-for="(item, index) in items">
    {{ parentMessage }} - {{ index }} - {{ item.message }}
  </li>
</ul>
```

```
var example2 = new Vue({
  el: '#example-2',
  data: {
    parentMessage: 'Parent',
    items: [
      { message: 'Foo' },
      { message: 'Bar' }
    ]
  }
})
```

```
<div v-for="(value, key) in object">
  {{ key }}: {{ value }}
</div>
```

```
<div v-for="(value, key, index) in object">
  {{ index }}. {{ key }}: {{ value }}
</div>
```

Both *in* and *of* works as a delimiter.

`item in items`

`item of items`

List rendering also works with a range.

```
<div>
  <span v-for="n in 10">{{ n }} </span>
</div>
```

#### Binding classes and styles

```
<div class="static"
     v-bind:class="{ active: isActive, 'text-danger': hasError }">
</div>
```

In the above example, Vue will give the div the *active* class if the isActive variable evaluates to true, and the *text-danger* class if the hasError variable is true. You can also use an non-inline object:

`<div v-bind:class="classObject"></div>`

```
data: {
  classObject: {
    active: true,
    'text-danger': false
  }
}
```

Or pass a computed object to the class binding:

```
data: {
  isActive: true,
  error: null
},
computed: {
  classObject: function () {
    return {
      active: this.isActive && !this.error,
      'text-danger': this.error && this.error.type === 'fatal'
    }
  }
}
```

#### Form input bindings

The *v-model* directive enabled two-way data binding. In-depth explanations and examples: [here](https://vuejs.org/v2/guide/forms.html)

Two-way data-binding loads the changes immediately, except when you are using the *.lazy* modifier.

```
<!-- synced after "change" instead of "input" -->
<input v-model.lazy="msg" >
```

Or you can typecast the input, otherwise it always returns a string:

`<input v-model.number="age" type="number">`

Or trim it automatically from leading and closing whitespaces:

`<input v-model.trim="msg">`

### Array changes

They alter/mutate the original array:

- push()
- pop()
- shift()
- unshift()
- splice()
- sort()
- reverse()

While these return a new array:

- filter()
- concat()
- slice()

Whenever calling these methods on an array, the DOM will re-render. However, directly setting an item or changing the length of an array with regulat Javascript will not force a re-render.

Vue also doesn't detect addition of new properties. Only properties which are initially present in the Vue instance, are reactive.

### Routing

`npm install vue-router --save`

Example routing:

```
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import AddTicket from './components/AddTicket.vue';
Vue.use(VueRouter);

const routes = [
  {
        name: 'add',
        path: '/add',
        component: AddTicket
  }
];
const router = new VueRouter({ mode: 'history', routes: routes });

Vue.config.productionTip = false;

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
```

### Connecting to an API

The most commonly used package for handling endpoints is the *axios* http client which returns promises: [Axios Github](https://github.com/axios/axios).

`npm install --save axios vue-axios`

```
new Vue({
  el: '#app',
  data () {
    return {
      info: null
    }
  },
  mounted () {
    axios
      .get(url)
      .then(response => (this.info = response))
  }
})
```

Handling errors:

```
axios
  .get('https://api.coindesk.com/v1/bpi/currentprice.json')
  .then(response => (this.info = response.data.bpi))
  .catch(error => console.log(error))
```

And storing the state of the request in variables, so we can alter the output based on that:

```
new Vue({
  el: '#app',
  data () {
    return {
      info: null,
      loading: true,
      errored: false
    }
  },
  filters: {
    currencydecimal (value) {
      return value.toFixed(2)
    }
  },
  mounted () {
    axios
      .get('https://api.coindesk.com/v1/bpi/currentprice.json')
      .then(response => {
        this.info = response.data.bpi
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
  }
})
```


