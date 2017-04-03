## SQL Basics

Stands for Structured Query Language.

### Syntax

SQL uses *statements* as valid commands. Statements consist of:
- *clause*: written in capital letters, define the type of task we would like to perform on the database
- *table name*: the datatable we want to perform the task on
- *parameters*: such as the column name within the datatable, the data types or values

`CREATE TABLE table_name (column_1 data_type, column_2 data_type, column_3 data_type);`

### Operators

`SELECT column_1 FROM table_name WHERE condition;`

The query will execute successfully, if the *condition* of the statement is true. The condition is a logical expression that may use one or more of the following operators.

#### Arithmetic operators:
- `+` addition
- `-` subtraction
- `*` multiplication
- `/` division
- `&` modulus, returns the remainder

#### Comparison operators:
- `=` equal
- `>` greater than
- `<` less than
- `>=` greater than or equal
- `<=` lesser than or equal
- `<>` or `!=` not equal to
- `!<` not less than
- `!>` not greater than

#### Logical operators
- `ALL` compares with all values of a set (accepts another condition)
- `AND` concatenates multiples conditions, all of them have to be true, to evaluate to true
- `ANY` compares with any value of a set (accepts another condition)
- `BETWEEN` returns the value between a minimum and a maximum `SELECT * FROM customers WHERE age BETWEEN 21 AND 29;`
- `EXISTS` checks if the row that matches the condition exists or not (accepts another condition)
- `IN` compares value to a predefined set `SELECT * FROM customers WHERE age IN ( 23, 25, 28, 29 );`
- `LIKE` pattern matching with wildcard operators such as `_` any individual character or `%` any number of any idividual character, not case sensitive
- `NOT` reverses the meaning of other logical operators eg. `NOT IN` or `NOT BETWEEN`
- `OR` concatenates multiple conditions, if any of them is true, it will evaluate to true
- `IS NULL` or `IS NOT NULL` looks for a NULL or NOT NULL value
- `UNIQUE` searches for no duplicatation

### Clauses

`CREATE TABLE table_name (column_1 data_type, column_2 data_type, column_3 data_type);`

Creates a new table with the column headers, restricts the columns to the specified data type. More on data types later.

`SELECT * FROM table_name;`

Select is used to fetch data from a database. The asterisk `*` is a wildcard character that lets you select every column in a datatable.

`SELECT DISTINCT column_name FROM table_name;`

Special case of select clause, it will list each unique value of the specified column.

`SELECT * FROM table_name ORDER BY column_1 DESC`

You can sort the output in descending or ascending order, by a specified column.

`INSERT INTO table_name (column_1, column_2, column_3) VALUES (value_1, value_2, value_3);`

Insert adds a new row to the datatable.

`UPDATE table_name SET column_1 = value_1 WHERE column_2 = value_2;`

Modifies a data row that matches the condition.

`DELETE`

`ALTER TABLE table_name ADD COLUMN new_column data_type;`

Modifies an existing datatable.

### Data types

`INTEGER` or `INT`

`
