Для запуска окружения, выполнения команлд можно исползовать bash скрипт 
sh app в корне приложения

Команды:

sh app yii - команды для yii2
sh app up [-d] запустить окружение
sh app down завершить работу окружения
sh app bash режим командной строки внутри окружения
sh app composer запуск composer

Скопировать содержимое файлв .env.example в .env
cd src/
cp .env.example .env

Для заполнения бд тестовыми данными 
php yii init 

Для парсинга яндекса 
php yii yandex