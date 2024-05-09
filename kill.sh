#!/bin/bash

# Find the PID of the PHP server process
pid=$(lsof -t -i:9000)

# Check if the PID exists
if [ -n "$pid" ]; then
    # Terminate the PHP server process
    kill $pid
    echo "PHP server on port 9000 has been stopped."
else
    echo "PHP server on port 9000 is not running."
fi
