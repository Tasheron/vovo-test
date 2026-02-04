# Тестовое задание: API каталога товаров

Реализация API для каталога товаров с возможностью фильтрации, сортировки и пагинации.

## Структура проекта

*   **Миграции:** `database/migrations/` (таблицы `products` и `categories`)
*   **Контроллер:** `app/Http/Controllers/Api/ProductController.php` (основная логика, настроен fulltext search)
*   **Модели:** `app/Models/Product.php` и `app/Models/Category.php`
*   **Роуты:** `routes/api.php`
*   **Сидеры:** `database/seeders/` (генерация тестовых данных)