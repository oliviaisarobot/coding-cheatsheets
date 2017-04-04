# Angular 2

## Installing the client

`npm install -g @angular/cli`

See original repository [HERE](https://github.com/angular/angular-cli)

## Basic commands

`ng new [project]` creating a new angular2 project with directory and everything

`ng serve` once in that directory, this will start up the server

`ng generate component [name]` or `ng g component [name]` creates a new component within a folder, things you can generate:
- component
- service
- pipe

after generating your new component, you normally have to add it to your component directives, right now it automatically adds it to your modules.ts file, and you dont have to worry about it at all, with services and pipes, you have to import them where you intend to use them

## Basic terminology

`decorator` this lets our class access features from outside of our class

`component` this is our class

`interpolation` or `{{ }}` brackets used in the html that allows us to print out component properties

- backticks in the template allow us to use multiline strings

### Two-way data binding

`[(ngModel)]={{property}}` binds the property, it will change everywhere it is used

`(click) = function()` event binding

ngFor, ngIf / STRUCTURAL DIRECTIVES: they give structure to the way Angular displays content in the DOM

`*ngFor='let item of list'` in a list item, take the array, and iterate through the items

`*ngIf='variable'` when the attribute doesn't exist, it removes it from the DOM

### Input decorator, custom propery binding

`<app-root [property]="value></app-root>`

`@Input() [property]` expect some value from another component, neet import Input

### Output decorator, custom event binding

`<app-home (eventname)='function($event)'`

`function(e)` is up the ladder in the approot class

`@Output() name = new EventEmitter();` import Output and EventEmitter

### Routing

in app.module.ts, add:

```
import { RouterModule } from '@angular/router';

@NgModule({
  declarations: [
    // components go here
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    RouterModule.forRoot([
      { path: '', component: YourComponent},
      { path: 'dashboard', component: DashboardComponent,
        children: [
          // children components here
        ]},
      { path: '**', component: PageNotFoundComponent }
    ]),
    entryComponents: [
  ],
  providers: [
    AuthGuard
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
```

under routermodule, define paths and components, components will load within the router outlet

`<router-outlet></router-outlet>`

### Directives

preset css classes

`<p [ngClass]="{'blue': true, 'red': false, 'underline': true}"> </p>`

`<p [ngClass]="classes"><p>`

classes are defined in export
classes = {}
value = true;

`<p *ngIf="value">Only show if true</p>`

```
<ul>
 <li *ngFor="let ninja of ninjas"></li>
</ul>
```

### Pipes

### Services
