# Ruby

## 1. Basics

- in Ruby, everything is an object

## 1.1. Defining classes

the `@name` is a global variable within the class

```ruby
class Fruit
  def initialize(name)
    @name = name
  end
end
```

this creates getter and setter method for retrieving name

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

#### 1.1.1. Interpolation

```ruby
#{}
```

this transforms the values into strings, only works with double quotation marks

```ruby
def intro
  "This is a #{sweetness} #{name}"
end
```

#### 1.1.2. Passing hashes to a method

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

### 1.2. Inheritance

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
