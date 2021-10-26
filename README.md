# php-vk-bot-example
 
## Настройка бота
____

### Токен доступа сообщества
 Для его получения вам необходимо перейти в настройки сообщества в пункт "Settings->API usage", затем нажать кнопку "Create token" и указать нужные права для токена. После получения токена скопируйте его и поместите в указанное место в файле [config.php](https://github.com/lacartez/php-vk-bot-example/blob/main/config.php).
____

### Подтверждение
 После получения токена вам следует перейти во вкладку "Callback API" и скопировать значение в строке "String to be returned", затем соответственно вставить в указанное место в файле [config.php](https://github.com/lacartez/php-vk-bot-example/blob/main/config.php).
____

### Создание секретного ключа
 После сохранения ключа подтверждения во вкладке "Callback API" найдите пункт "Secret key", туда вам следует ввести придуманный вами ключ и нажать кнопку "Save".
После его сохранения скопируйте его и вставьте в указанное место в файле [config.php](https://github.com/lacartez/php-vk-bot-example/blob/main/config.php).
____

## Сохранение настроек и подключение бота к группе
____

После всех перечисленных выше инструкций сохраните файл "config.php" и закройте, больше он нам не понадобится. 
Затем залейте файлы index.php и config.php на любой выбранный вами хостинг.
После того, как вы залили файлы бота на хостинг укажите url, на котором расположен бот в пункте "URL" и укажите версию 5.131 в пункте "API version",  затем нажмите кнопку "Confirm".
____

Если всё прошло успешно вы увидите надпись "Server URL saved successfully". Теперь вы можете перейти во вкладку "Event types" и поставить галочку напротив пункта "Message received".
____

# Поздравляю! Вы успешно настроили и подключили бота к группе.
____
Теперь вы можете перейти в сообщения с сообществом и отправить команду "/hi" и получить ответ:

![image](https://user-images.githubusercontent.com/63790986/138851819-c02363b6-7327-43e5-9a74-a11db409ff8d.png)


