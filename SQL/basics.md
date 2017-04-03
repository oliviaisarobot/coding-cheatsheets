## SQL Basics

Stands for Structured Query Language.

### 1. Syntax

SQL uses *statements* as valid commands. Statements consist of:
- *clause*: written in capital letters, define the type of task we would like to perform on the database
- *table name*: the datatable we want to perform the task on
- *parameters*: such as the column name within the datatable, the data types or values
- *semicolon*: each valid command ends with a semicolon

`CREATE TABLE table_name (column_1 data_type, column_2 data_type, column_3 data_type);`

### 2. Operators

`SELECT column_1 FROM table_name WHERE condition;`

The query will execute successfully, if the *condition* of the statement is true. The condition is a logical expression that may use one or more of the following operators.

#### 2.1 Arithmetic operators:
- `+` addition
- `-` subtraction
- `*` multiplication
- `/` division
- `&` modulus, returns the remainder

#### 2.2 Comparative operators:
- `=` equal
- `>` greater than
- `<` less than
- `>=` greater than or equal
- `<=` lesser than or equal
- `<>` or `!=` not equal to
- `!<` not less than
- `!>` not greater than

#### 2.3 Logical operators
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

### 3. Clauses

#### 3.1 Selection

- `SELECT * FROM table_name;`

Select is used to fetch data from a database. The asterisk `*` is a wildcard character that lets you select every column in a datatable.

- `SELECT DISTINCT column_name FROM table_name;`

Special case of select clause, it will list each unique value of the specified column.

- `SELECT * FROM table_name ORDER BY column_1 DESC;`

You can sort the output in descending or ascending order, by a specified column.

- `SELECT * FROM table_name ORDER BY column_1 ASC LIMIT 5;`

The *limit* operator will restrict the output to the number of results specified in the condition.

- `SELECT COUNT(*) FROM table_name WHERE condition;`

Counts all records (rows) in a datatable that match the condition. If there is no condition specified, it will return the count of all rows where the value is NOT NULL.

- `SELECT column_1, COUNT(*) FROM table_name WHERE condition GROUP BY column_1;`

Group by will allow you to group the results by the selected column and count the matching rows. Don't forget the comma after the column name!

- `SELECT column_2, SUM(column_1) FROM table_name GROUP BY column_2;`

The *SUM* function will allow you to add all the integer values of a column.

- `SELECT MAX(column_1) FROM table_name;`

Returns the maximum `MAX` or minimum `MIN` or average `AVG` value of the specified column. Since SUM and AVG don't necessarily return a whole number, you can round it down with a function `ROUND(AVG(column_1), 2);`

- `SELECT column_1, column_2, MAX(column_3) FROM table_name
GROUP BY column_2;`

This example returns the highest value of column_1 for each unique value of column_2, eg. select the best selling music album of each genre.

#### 3.2 Multiple tables

- `PRIMARY KEY` and `FOREIGN KEY`

Used to indicate an unique value of a record, usually an id. A foreign key is another table's primary key inserted in a different table.

#### 3.3 Other clauses

- `CREATE TABLE table_name (column_1 data_type PRIMARY KEY, column_2 data_type, column_3 data_type);`

Creates a new table with the column headers, restricts the columns to the specified data type. More on data types later. `PRIMARY KEY` defines a column. Has to be unique to every record, usually some kind of an ID. Auto incrementation is often used. `AUTO_INCREMENT` defines a column. Whenever a new record is entered into the data table, the value of this column will be auto incremented without having to specify a new next value for it.

- `INSERT INTO table_name (column_1, column_2, column_3) VALUES (value_1, value_2, value_3);`

Insert adds a new row to the datatable.

- `UPDATE table_name SET column_1 = value_1 WHERE column_2 = value_2;`

Modifies a data row that matches the condition.

- `DELETE FROM table_name WHERE column_1 = value_1;`

Deletes record (row) from a table where the condition is true.

- `ALTER TABLE table_name ADD COLUMN new_column data_type;`

Modifies an existing datatable.

### 4. Data types

- `INTEGER` or `INT`
