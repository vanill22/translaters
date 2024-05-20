# Проект CRM для учета занятости переводчиков

## Описание

Этот проект предназначен для учета занятости переводчиков в CRM системе. Проект реализован на Yii 2 Advanced и использует Docker для удобного развертывания. На стороне клиента используется Vue.js для отображения данных о занятости переводчиков.

## Установка и настройка

### Шаг 1: Клонирование репозитория

```bash
git clone https://github.com/vanill22/translaters.git
```
### Шаг 2: Настройка Docker

```bash
docker-compose up -d --build
```
### Шаг 3: Настройка Dev окружения

```bash
docker exec -it yii_php bash
cd yii-project
0
```

### Шаг 3: Настройка миграций
```bash
в common/config/main-local.php 

            'dsn' => 'mysql:host=yii_mysql;dbname=yii',
            'username' => 'yii',
            'password' => 'yii', 
```

### Шаг 4: Приминение миграций
```bash
docker exec -it yii_php bash
cd yii_project
php yii migrate
```