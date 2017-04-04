# Python basics

## Teminology

- `numbers`
- `strings`
- `#` for comments or multiline with `'''`
- add numbers to strings, separate with comma

`print("Route", 66)`

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

```
for x in list:
   print(x)
   print(len(x))
```

```
for x in list[:2]:
   print(x)
   print(len(x))
```

#### Range

```
for x in range(10):
   print(x)
```

```
for x in range(5, 12):
   print(x)
```

takes up to 3 numbers as argument:
- starting number
- finishing number
- increment (steps)

#### While loop

while loop will continue to run until the requirement is met (or sometimes forever, but not advised)

```
while variable < 10:
   print(variable)
   variable += 1
```

```
variable += 1
variable = variable + 1
```

- `break` stops the loop when that requirement is met

```
for n in range(101):
   if n is magicNumber:
      print(n, " is the magic number!")
      break
   else:
      print(n)
```

- print every number between 0-100 that are multiples of 4

```
for n in range(101):
   if n%4 is 0:
      print(n)
```
- `continue` when requirement is met, skip the result and continue the loop

```
for n in range(101):
   if n%2 is 0:
      continue
   print(n)
```

this will print every number from 0 to 100 that is not an even number
