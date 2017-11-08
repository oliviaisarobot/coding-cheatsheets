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



