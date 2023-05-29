#!/usr/bin/env sh

if [ -z "$1" ]
then
  echo "Команды: \n"
  echo "sh app yii - команды для yii2"
  echo "sh app up [-d] запустить окружение"
  echo "sh app down завершить работу окружения"
  echo "sh app bash режим командной строки внутри окружения"
  echo "sh app composer запуск composer"
  echo "sh app build для сборки докера"
exit
fi

if [ $1 = "yii" ]
then
docker-compose -f  ./docker/docker-compose.yml exec php  php "$@"
fi

if [ $1 = "composer" ]
then
docker-compose -f  ./docker/docker-compose.yml exec php  "$@"
fi

if [ $1 = 'down' ]
then
docker-compose -f  ./docker/docker-compose.yml down
fi

if [ $1 = 'up' ]
then
  docker-compose -f  ./docker/docker-compose.yml up $2
fi

if [ $1 = 'build' ]
then
  docker-compose -f  ./docker/docker-compose.yml build
fi

if [ $1 = 'bash' ]
then
  docker-compose -f  ./docker/docker-compose.yml exec php bash
fi