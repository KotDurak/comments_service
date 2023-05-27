#!/usr/bin/env sh



if [ $1 = "yii" ]
then
docker-compose -f  ./docker/yii2-docker-basic/docker-compose.yml exec php  php "$@"
fi

if [ $1 = 'down' ]
then
docker-compose -f  ./docker/yii2-docker-basic/docker-compose.yml down
fi

if [ $1 = 'up' ]
then
  docker-compose -f  ./docker/yii2-docker-basic/docker-compose.yml up $2
fi

if [ $1 = 'bash' ]
then
  docker-compose -f  ./docker/yii2-docker-basic/docker-compose.yml exec php bash
fi