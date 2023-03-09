<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
echo '<h1>Lab 1</h1>';

//Создаем несколько работников для тестирования валидации
$employee_1 = new Employee(1, 'Иван', '12500', '20.10.2013');
$employee_2 = new Employee(2, 'R2B2', '1000000', '20.10.2000');
$employee_3 = new Employee(3, 'Олег1', '1000ооо', '20.102.2000');
$employee_4 = new Employee(4, 'Матвей', '11304', '20.01.2022');
$employee_5 = new Employee(5, 'Sasha', '22020', '10.12.2012');

//Вывод работников в браузер, ошибка с описанием в случае некорректных данных
$employee_1->printEmployee();
$employee_2->printEmployee();
$employee_3->printEmployee();
$employee_4->printEmployee();
$employee_5->printEmployee();

//Создаем департамен и отправляем в него ранее созданных сотрудников
//!!В департамент будут добавлены сотрудники с корректными данными
$department_1 = new Department("Маркетинга",
    array($employee_1, $employee_2, $employee_3, $employee_4, $employee_5));
$department_1->printDepartment();
//Создаем Департамент 2
$department_2 = new Department("Разработки", array(
    new Employee(6, 'Анна', '15000', '10.11.2016'),
    new Employee(7, 'Иван', '15000', '04.10.2013'),
    new Employee(8, 'Игорь', '15000', '10.10.2013'),
    new Employee(9, 'Лев', '15000', '22.10.2013'),
    new Employee(10, 'Зоя', '15000', '20.10.2013'),
    new Employee(11, 'Инна', '15000', '20.10.2013'),
    )
);
$department_2->printDepartment();
//Создаем Департамент 3 с той же суммарной зарплатой, но с меньшим колличеством сотрудников
$department_3 = new Department("Директора", array(
        new Employee(6, 'Егор', '30000', '10.11.2016'),
        new Employee(8, 'Игорь', '30000', '10.10.2013'),
        new Employee(9, 'Вера', '30000', '22.10.2013'),
    )
);
$department_3->printDepartment();
//Создаем Департамент 4 с той же суммарной зарплатой,и с тем же количеством сотрудников, что в 1
$department_4 = new Department("Маркетинг Дубль", array(
        new Employee(10, 'Анна', '12500', '10.11.2016'),
        new Employee(11, 'Варвара', '11304', '10.10.2013'),
        new Employee(12, 'Борис', '22020', '22.10.2013'),
    )
);
$department_4->printDepartment();

$company = new DepartmentCollection("DELETE", array($department_1, $department_2, $department_3, $department_4));

$company->min_company_salary();
$company->max_company_salary();
