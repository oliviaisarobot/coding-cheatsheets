# Cron

Cron lets you execute commands at a specified time, on Unix-like operating systems. Cron is a daemon, it has to be started once, and will lay dormant until it is required. It is also used to execute schedules commands on linux servers.

`sudo crontab -e`

lets you access and edit the crontab

## Crontab

crontab lines or *cronjobs*  have 5 time and date fields: minutes [0-59], hours [0-23], days [1-31], months [1-12], day of the week [0-6] and path

`01 04 1 1 1 home/path/to/command/the_command.sh`

this one run on the 1st of January, and every Monday in January

`0 0 1 * * home/path/to/command/the_command.sh`

this would run the first day of every month. As asterisk `*` is a wildcard, it means that the column can take up any value

`30 8 * * 6 home/path/to/command/the_command.sh`

this would run at 8:40am every Saturday

* you can use COMMA separated lists for every value of each column, you can use DASH to specify a range and ASTERISKS to specify 'all' or 'every' value
* output redirection is done with `>`
* redirect to a black hole with `>/dev/null` (discard everything written in the file)

[More help here](https://help.ubuntu.com/community/CronHowto)
