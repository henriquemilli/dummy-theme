#!/bin/bash

SCRIPTPATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"
cd $SCRIPTPATH
source conf

read -p "upload/download?(u/d)    " operation
read -p "path to file?    " file_path

if [ $operation = "u" ]; then
    scp -i $KEY_PATH $file_path $USER@$IP:/home/$USER/

elif [ $operation = "d" ]; then
    scp -i $KEY_PATH $USER@$IP:/home/$USER/$file_path .

fi