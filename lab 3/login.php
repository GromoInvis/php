<?php
// Отримання даних з форми
$surname = $_POST['surname'];
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];

// Створення нового об'єкта користувача
$user = new User($surname, $name, $age, $email);

// Збереження даних в об'єкт
$user->saveData();

// Виведення даних користувача
$userInfo = $user->showData();

echo $userInfo;

class User
{
    private $surname;
    private $name;
    private $age;
    private $email;

    public function __construct($surname, $name, $age, $email)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    public function saveData($filename = 'data.txt')
    {
        // Збереження даних в файл
        $data = "Прізвище: $this->surname\nIм'я: $this->name\nВiк: $this->age\nE-mail: $this->email\n\n";
        file_put_contents($filename, $data, FILE_APPEND);
    }

    public function showData($filename = 'data.txt')
    {
        // Формування HTML-тексту з даними користувача
        // ...
        $data = file_get_contents($filename);

        // Перевірка наявності даних
        if (empty($data)) {
            return "Немає даних для відображення";
        }

        // Формування HTML-тексту з даними користувача
        $userInfo = "<h2>Дані користувачів</h2>";
        $userInfo .= nl2br($data);

        return $userInfo;
    }
}

echo " <br> <a href='index.html'>Назад</a> ";
