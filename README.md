# MyLaravelProject

## Опис
Це веб-додаток на Laravel для керування курсами, уроками та учнями.

# Міграції 
### ``` php artisan migrate```

# Тестові записи
### ``` php artisan db:seed --class=DatabaseSeeder```

# Встановлення залежностей
### ```composer install```
### ```npm install```
### ```npm run dev```

# Створити .env файл:
### ```cp .env.example .env```
### ```php artisan key:generate```

# Запустити сервер

### ``` php artisan serve ```

# Опис

## Користувачі

## Вчителі
### ```teacher@email.com``` - email ```password``` - password
### Вчителі можуть створювати курси, теми, та уроки. 
### Вчителі можуть оцінювати роботи учнів.
### Вчителі можуть редагувати курси, в тому числі вону можуть додавати учнів до курсу.

## Учні
### ```student@email.com``` - email ```password``` - password
### Учні можуть переглядати курси
### Учні можуть завантажувати роботи 

## Стуктура курсів
### Course -> section(теми)->lessons->grades

### Юзери прив'язуються до курсів через таблицю ```course_user```.
