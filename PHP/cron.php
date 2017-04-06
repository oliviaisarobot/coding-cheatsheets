<?php

// cron jobs have 5 colums: minutes [0-59], hours [0-23], days [1-31], months [1-12], day of the week [0-6] and path

0 0 1 * * home/path/to/command/the_command.sh

// this would run the first day of every month

30 8 * * 6 home/path/to/command/the_command.sh

// this would run at 8.30am every Saturday

// you can use COMMA separated lists for every value of each column, you can use DASH to specify a range and ASTERISKS to specify 'all' or 'every' value
// output redirection is done with >
// redirect to a black hole with >/dev/null (discard everything written in the file)


?>