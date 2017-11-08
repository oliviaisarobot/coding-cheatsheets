# Ruby basics

## 1. General information

- in Ruby, everything is an object

### 1.1. Ruby syntax

```ruby
  = define
  << concat
```

### 1.2. Logical expression

loops, if, switch

## 2. Defining classes

the `@name` is a global variable within the class

```ruby
class Fruit
  def initialize(name)
    @name = name
  end
end
```

this creates getter and setter method for retrieving name, the methods work on the instance

```ruby
def name
  @name
end

def name=(name)
  @name = name
 end
```

makes getters and setters more easily accessable through one line, first line gives access to both, the reader to the getter only, and the writer to the setter only

```ruby
attr_accessor :name
attr_reader :name
attr_writer :name
```

creating an instance of the Fruit class:

```ruby
alma = Fruit.new 'alma'
```

there are static methods that are only accessible through the class

```ruby
def self.create(fruits)
  result = []
  fruits.each_key do |key|
    result.push Fruit.new(key.to_s, fruits[key])
  end
  result
end
```

this will output an associated array of the objects created

```ruby
fruits = {
  apple: 'sour',
  pear: 'sweet
}

my_fruits = Fruite.create(fruits)
puts my_fruits.inspect
 ```

### 2.1. Interpolation

```ruby
#{}
```

this transforms the values into strings, only works with double quotation marks

```ruby
def intro
  "This is a #{sweetness} #{name}"
end
```

### 2.2. Passing hashes to a method

```ruby
def into(like, options={})
  str = ''
  str << "#{options[:person]} says:" if options[:person]
  str << "This is a #{sweetness} #{name}. #{like}"
  str
end
```

```ruby
fruits = {
  apple: 'sour',
  pear: 'sweet
}

alma = Fruit.new 'alma', 'sour'
alma.intro "I don't like it", person: 'Peter' do |str|
  puts #something
end
```

### 2.3. Inheritance

```ruby
class Plant
# class methods
end
```

```ruby
class Fruit < Plant

end
```

the Fruit class here inherits every method and variable from the Plant

### 2.4. Public and private methods

public and private are switches, everything beneath will fall under the rule. in the example, 
method_3 can only be called from within the class

```ruby
class Fruit
  def method_1
    # somehing
  end
  
  def method_2
    # something
   end
   
private

  def method_3
    # something
   end
end
```

protected methods are accessible from subclasses

### 2.5. Method aliases

the intro method can also be called under the name info, alias also keeps the old methods accessible even if the method is later redefined

```ruby
alias info intro
```

### 2.6. Modules

modules define namespaces and double as mixins, you can include them in your classes, or keep certain classes in the same namespace

```ruby
module Backwards
  def backwards
  
  end
end

class Fruit
  include Backwards
  
  # now i can call the Backwards module's methods!
end
```

this reserves the namespaces and creates a separate Fruit class

```ruby
module Moon
  class Fruit
  
  end
end
```

## Catching errors

```ruby
begin
  # some method
rescue
  puts "Error occured"
end
```

```ruby
begin
  #some method
rescue StandardError => e
  puts "Error: #{e}"
end
```

## Metaprogramming

there are multiple ways to write code that "writes itself", one way is catching methods that are not yet written, the software will instead throw and error and warn you about the missing method:

```ruby
def method_missing(:method, *args)
  puts "You have called a missing method: #{method}"
end
```

another way is redefining classes if it doesn't exactly do what you want, but you want to leave the original intact and just override certain things in it

```ruby
Fruit.class_eval do
  private
   
  def worm
    "This is redefined to worm"
  end
end
```
