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

- `SELECT REPLACE(column_name, pattern, replacement) FROM table_name;`

This example is used to replace parts of strings, pattern can be a specific string (of even multiple characters), replacement is the new string or an empty string.

#### 3.2 Multiple tables

- `PRIMARY KEY` and `FOREIGN KEY`

Used to indicate an unique value of a record, usually an id. A foreign key is another table's primary key inserted in a different table.

##### 3.2.1 Cross join or Cartesian product

- `SELECT * FROM table_name_1.value1, table_name_2.value1 FROM table_name_1, table_name_2;`

All rows of the first table are matched up with all rows of the second table. Rarely used but sometimes handy when you need to render for example, every possible match for two datasets.

##### 3.2.2 Inner join

- `SELECT * FROM table_name_1 JOIN table_name_2 ON table_name_1.value1 = table_name_2.value2;`

Joins two datatables and selects all columns, it will match the data based on the common value we defines in `JOIN table ON value1 = value2`

##### 3.2.3 Outer join

- `SELECT * FROM table_name_1 LEFT JOIN table_name_2 ON table_name_1.value1 = table_name_2.value2;`

Same as inner join, except this will include the NULL values as well, while the previous example only returns a match when both values are NOT NULL.

- `table_name_1.value1 AS name`

When you want to change the header ofa variable (because for example, the same header exists in another table, or you just want it to be displayed differently), you can use AS.

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

### 4. Table/data transformation

We can use subqueries in a query, which will make the initial query the *outer query*, and the subquery the *inner query*. The inner query can be either from a different or the same database.

- `SELECT * FROM table1 WHERE value1 > (SELECT AVG(value2) FROM table1 WHERE value2 = 3);`

In *non-correlated subqueries*, the dubquery can be used independently from the outer query.

In *correlated subqueries*, the inner query cannot be run independently from the outer query. Each row that is being proccessed for the outer query, will also be proccessed for the inner query.

### 5. Set operations

White JOIN merges rows, UNION *merges columns* between two tables. A UNION combines the result of two or more select statements.

- `SELECT * FROM table1 UNION SELECT * FROM table2;`

Each SELECT statement within the UNION must have the same number of columns with similar data types. 

- `SELECT brand FROM table1 UNION SELECT brand FROM table2;`

It will list all the unique rows for brand from table1 and table2.

- `SELECT brand FROM table1 UNION ALL SELECT brand FROM table2;`

The ALL operator will allow duplicated rows to be displayed in the result.

- `SELECT brand FROM table1 INTERSECT SELECT brand FROM table2;`

This will only return the brands from table1 that are also in table2.

- `SELECT brand FROM table1 EXCEPT SELECT brand FROM table2;`

It will show every brand from table1 that are not in table2.
