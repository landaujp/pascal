#!/bin/bash

set -e

host="$1"
shift
user="$1"
shift
password="$1"
shift
cmd="$@"

until mysql -h"$host" -u"$user" -p"$password"; do
  >&2 echo -n "."
  sleep 1
done

>&2 echo "MySQL is up - executing command"
exec $cmd
