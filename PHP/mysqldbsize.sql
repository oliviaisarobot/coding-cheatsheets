SELECT sum(round(((data_length + index_length) / 1024 / 1024 / 1024), 2))  as "Size in GB"
FROM information_schema.TABLES
WHERE table_schema = "<database_name>"
