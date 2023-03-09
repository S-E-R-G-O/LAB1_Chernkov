<?php

class Employee
{
    public bool $correct;
    public int $id;
    public string $name;
    public string $salary;
    public string $employmentDate;
    public array $nameErr = array();

    public function __construct($id, $name, $salary, $employmentDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->employmentDate = $employmentDate;

        $this->validate();
    }

    public function printEmployee()
    {
        if(!$this->correct){
            echo '<p>ID: <b>';
            print_r($this->id);
            echo '</b></p>';

            foreach ($this->nameErr as &$err) {
                echo '<p style="color:red">Error: <b>';
                print_r($err[0]);
                echo '</b></p>';
            }
            echo '<hr>';

        } else {
            echo '<hr>';

            echo '<p>ID: <b>';
            print_r($this->id);
            echo '</b></p>';

            echo '<p>Имя сотрудника: <b>';
            print_r($this->name);
            echo '</b></p>';

            echo '<p>Зарплата: <b>';
            print_r($this->salary);
            echo '</b></p>';

            echo '<p>Дата приема на работу: <b>';
            print_r($this->employmentDate);
            echo '</b></p>';

            echo '<p>Стаж работы: <b>';
            print_r($this->workExperience($this->employmentDate));
            echo '</b></p>';

            echo '<hr>';
        }

    }

    public function workExperience($date)
    {
        $date_a = new DateTime($date);
        $date_b = new DateTime();

        return $date_b->diff($date_a)->format("Полных лет: %Y");
    }
    public function validateName($name): bool
    {
        if (!preg_match("/^(([a-zA-Z' -]{1,30})|([а-яА-ЯЁёІіЇїҐґЄє' -]{1,30}))$/u",$name)) {
            return false;
        }
        return true;
    }

    public function validateSalary($salary): bool
    {
        if (!(preg_match("|^[\d]*$|", $salary))) {
            return false;
        }
        return true;
    }
    public function validateDate($date): bool
    {
        //сначала убираем посторонние символы
        $date = preg_replace('/[^0-9\.]/u', '', trim($date));
        //разбиваем дату в массив
        $test_data_ar = explode('.', $date);

        if(@checkdate($test_data_ar[1], $test_data_ar[0], $test_data_ar[2])) {
            return true;
        }
        return false;
    }
    public function validate()
    {
        $count = 0;
        $this->correct = true;
        if (!$this->validateName($this->name)) {
            $err = array("Ошибка в имени сотрудника (" . $this->name . ")");
            $this->nameErr[$count++] = $err;
            $this->correct = false;
        }
        if (!$this->validateSalary($this->salary)) {
            $err = array("Ошибка формата зарплаты (" . $this->salary .")");
            $this->nameErr[$count++] = $err;
            $this->correct = false;
        }
        if (!$this->validateDate($this->employmentDate)) {
            $err = array("Ошибка формата даты приема на работу (" . $this->employmentDate .")");
            $this->nameErr[$count++] = $err;
            $this->correct = false;
        }
    }

    public function getTime()
    {
        if ($this->validate()) {
            return date("m.d.Y H:i:s", time());
        }
    }

}