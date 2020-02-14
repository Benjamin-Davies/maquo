#!/bin/sh

echo 'Connecting to the server'

SFTP_ARGS="-P 8022 benjamindavies@php.mmc.school.nz"

if command -v sshpass >/dev/null \
  && [ -n "$SSHPASS" ]
then
  sshpass -e sftp $SFTP_ARGS
else
  sftp $SFTP_ARGS
fi <<EOF
cd Web/
ls
cd 201COS/benjamindavies/maquo/
mkdir src
put -r src
put index.html
EOF
