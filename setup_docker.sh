#!/usr/bin/env bash

if [ -d "./docker" ]
then
	if [ "$(ls -A docker)" ]; then
     echo "Docker is already cloned!"
	else
    git clone https://github.com/spryker/docker-sdk.git ./docker
	fi
else
  mkdir docker
  git clone https://github.com/spryker/docker-sdk.git ./docker
fi

docker/sdk down
docker/sdk clean
docker/sdk bootstrap deploy.dev.yml -x
docker/sdk up
