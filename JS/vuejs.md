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

### Interpolation

We can output our data or our methods with interpolation, which uses the "moustache" syntax (double curly braces).

`{{ message }}`

### Data binding

Data binding allows us to bind data to different attributes of the DOM elements for example, that don't work with regular interpolation.

`<a v-bind:href="url">Link</a>`

or

`<a :href="url">Link</a>`

which is a shorthand. We can also bind events with *v-on*.

`<a v-on:click="event">Link</a>`

or in shorthand form:

`<a @dblclick="event">Link</a>`

Data binding also allows us to output html syntax that is parsed as html via *v-html*.

`<p v-html="html"></p>`

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


