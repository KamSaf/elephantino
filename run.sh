#!/usr/bin/bash

host_address="localhost"
port="8000"

if ! [ -z "$1" ]; then
    host_address="$1"
fi

if ! [ -z "$2" ]; then
    port="$2"
fi


if [ ${#port} -ne 4 ]; then
    echo "Port must be 4 digits long"
    exit 1
fi

php -S ${host_address}:${port}
