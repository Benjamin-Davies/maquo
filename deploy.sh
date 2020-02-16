#!/bin/sh

echo 'Connecting to the server'

SFTP_ARGS="-P 2222 benjamindavies@php.mmc.school.nz"

# Use sshpass if it is installed and we have been given a password
if command -v sshpass >/dev/null \
  && [ -n "$SSHPASS" ]
then
  sshpass -v -e sftp $SFTP_ARGS
# Otherwise just use normal sftp
else
  sftp $SFTP_ARGS
# The following will be sent as commands to sftp
fi <<EOF
cd Web/
ls
cd 201COS/benjamindavies/maquo/
mkdir src
put -r src
put index.html
EOF
