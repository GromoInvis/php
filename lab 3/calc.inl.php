<?php

class Calc
{

    public $num1; // Перша змінна
    public $num2; // Друга змінна
    public $cal; // Операція

    public function __construct($num1Inserted, $num2Inserted, $calInserted)
    //  визначає клас Calc з трьома властивостями: $num1, $num2 і $cal. Клас також містить метод calcMethod(), 
    //  який виконує обчислення залежно від значення $cal. Конструктор класу приймає три аргументи $num1Inserted, 
    //  $num2Inserted і $calInserted і встановлює значення відповідних властивостей.
    {
        $this->num1 = $num1Inserted;
        $this->num2 = $num2Inserted;
        $this->cal = $calInserted;
    }


    public function calcMethod()
    {
        switch ($this->cal) {
            case 'add':
                $result = $this->num1 + $this->num2; // Додавання
                break;
            case 'sub':
                $result = $this->num1 - $this->num2; // Віднімання
                break;
            case 'mul':
                $result = $this->num1 * $this->num2; // Множення
                break;
            case 'podil':
                $result = $this->num1 / $this->num2; // Ділення
                break;
            case 'podilwithout':
                $result = $this->num1 % $this->num2; // Ділення без остачі
                break;
            case 'corin':
                $result = sqrt($this->num1); // Корінь
                break;
            case 'stepin':
                $result = $this->num1 ** $this->num2; // Число 1 в степені числа 2
                break;

            default:
                $result = "Error"; // Error
                break;
        }
        return $result;
    }
}
