const dataSection = document.getElementById('data-section');

// Дані для підключення до бази даних
const dbConfig = {
    host: 'localhost',
    user: 'username',
    password: 'password',
    database: 'бібліотека' // Змініть на "бібліотека"
};

// Створення з'єднання з базою даних
const connection = new mysqli(dbConfig.host, dbConfig.user, dbConfig.password, dbConfig.database);

// Перевірка з'єднання
if (connection.connect_error) {
    console.error('Помилка підключення до бази даних:', connection.connect_error);
    return;
}

// Запит до бази даних
const sql = 'SELECT * FROM table_name'; // Змініть "table_name" на назву вашої таблиці
const result = connection.query(sql);

// Обробка результату запиту
if (result.length > 0) {
    for (const row of result) {
        // Створення динамічного контенту
        const element = document.createElement('div');
        element.innerHTML = `
            <h2>${row['column_name1']}</h2>
            <p>${row['column_name2']}</p>
            <p>${row['column_name3']}</p>
        `;
        dataSection.appendChild(element);
    }
} else {
    dataSection.innerHTML = '<p>В базі даних немає даних.</p>';
}

// Закриття з'єднання з базою даних
connection.close();