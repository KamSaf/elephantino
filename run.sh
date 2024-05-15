#!/usr/bin/bash

if [ "$#" -ne 2 ]; then
    echo "Requires 2 positional arguments: <host_address> <port>"
    exit 1
fi

host_address=$1
port=$2

if [ ${#port} -ne 4 ]; then
    echo "Port must be 4 digits long"
    exit 1
fi

php -S ${host_address}:${port}
