предположим что данный модуль используется для магазина, 
у которого есть основная валюта например рубли относительно этой валюты
мы получаем курсы валют на текущую дату от банка в виде списка
```json
[
    {"currency" : "USD", "rate": 69.1327},
    {"currency" : "EUR", "rate": 78.2031}
]
```

данный модуль должен использоваться в любом месте приложения,
таким образом, постоянное обращение к внешнему источнику данных грозит
крахом всей системы если этот источник не ответит или будет ощутимая
задержка.

чтобы "не ходить" постоянно в базу данных предполагается использовать кеш

Чтобы исключить возможность обращения к внешнему ресурсу в основном потоке
вынесем эту логику в отдельный объект и будем использовать планировщик

Composer scripts
---

запуск тестов
```composer test```

запуск проверки код стайла
```composer cs```

запуск автоисправлений в кодстайле
```composer fix```

запуск статического анализатора phpstan
```composer phpstan```
