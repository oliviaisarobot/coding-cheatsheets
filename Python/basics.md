# Python basics

## Teminology

- `numbers`
- `strings`
- `#` for comments or multiline with `'''`
- add numbers to strings, separate with comma

`print("Route", 66)`

- `%s` is a wildcard, placeholder in a string

```python
who = "you"

print("I love %s" % who)
```

### Operators

- `-` substraction
- `+` addition
- `*` multiplication
- `/` division
- `//` division, trims floating numbers
- `%` modulus, returns the remainder
- `' '` or `" "` for strings
- `=` define variable
- `\'` escape character
- `\n` new line, r

### Functions

- `print()`
- slicing, variable[ ], variable[:], 0, -1
- len(""), len(variable), string length
- lists, variable = [ , , , ], variable[2] = 92
- funcions variable.append()
- variable[:2] = [] delete items
- variable[:] = [] delete everything from variable

#### If, elif, else

- if variable <,>,=
- elif, what to do in other case
- else, if no previous syntaxes were run, what to do
- for loop, for variable to replace items in the list, for variable in list, for f in foods

#### For loop

for loops continue to run a set number of times

```python
for x in list:
   print(x)
   print(len(x))
```

```python
for x in list[:2]:
   print(x)
   print(len(x))
```

#### Range

```python
for x in range(10):
   print(x)
```

```python
for x in range(5, 12):
   print(x)
```

takes up to 3 numbers as argument:
- starting number
- finishing number
- increment (steps)

#### While loop

while loop will continue to run until the requirement is met (or sometimes forever, but not advised)

```python
while variable < 10:
   print(variable)
   variable += 1
```

```python
variable += 1
variable = variable + 1
```

- `break` stops the loop when that requirement is met

```python
for n in range(101):
   if n is magicNumber:
      print(n, " is the magic number!")
      break
   else:
      print(n)
```

- print every number between 0-100 that are multiples of 4

```python
for n in range(101):
   if n%4 is 0:
      print(n)
```
- `continue` when requirement is met, skip the result and continue the loop

```python
for n in range(101):
   if n%2 is 0:
      continue
   print(n)
```

this will print every number from 0 to 100 that is not an even number

### Defining functions

```python
def variable():
	# here comes the definition
```

```python
def variable(required):
	result = required*2
	return result
```

`new_var = required(value)`

default value to defined function variable

`def variable(required="default")`

scope: variable has to be before the functions for the functions to be able to use it, or inside the function, when inside, only the exact function will have access to it

### Keywords

`def variable(*args)` asterisk allows an undefined number of arguments

unpacking argument packages

```python
person_data = (26, 'female', 'programmer')

table = record(*person_data)
```

### External modules

`import tuna.fish()`

### Manipulating files

```python
fw = open("filename.txt", "w")
fw.write("Random text line"/n)
fw.close()
```

- you can open a file to write it `"w"` or read it `"r"` or both `"rw+"`
- `fw.readline()` takes one arguments, returns the line from a textfile we specified
- `fw.readlines()` returns an array of every line in the textfile

```python
certain_url = "http://..."

def download_something(url):
	response = request.urlopen(url) # connects to the internet and finds the file
	url = response.read() # tells it to read the file
	url_str = str(url)
	lines = url_str.split("\\n")
	dest_url = r"something" # defines the saving destination
	fx = open(dest_url, "w")
	for line in lines:
		fx.write(line + "\n")
	fx.close()

download_something(cerain_url)
```

it's important to close the files after we finished manipulating them
