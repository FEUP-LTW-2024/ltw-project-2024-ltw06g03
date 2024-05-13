#!/bin/bash

# Start PHP server on port 9000
php -S localhost:9000 &

# Wait for the server to start (adjust the sleep time if needed)
sleep 2

# Create the database using sqlite3
sqlite3 database/database.db < database/ProjectDataBase.sql
sqlite3 database/database.db < database/ProjectDataBase_Pop.sql

# Print a message indicating that the initialization is complete
echo "Initialization complete."
