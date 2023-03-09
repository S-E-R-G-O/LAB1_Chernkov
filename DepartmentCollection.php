<?php

class DepartmentCollection
{
    public array $department_array = array();
    public string $company_name;
    public function __construct($name, $dep_array)
    {
        $this->company_name = $name;
        $this->department_array = $dep_array;
    }

    public function min_company_salary()
    {
        $min = 2147483647;
        $max = -1;

        foreach ($this->department_array as &$department) {
            if ($department->total_salary <= $min) {
                $min = $department->total_salary;
            }
        }

        foreach ($this->department_array as &$department) {
            if ($department->total_salary == $min) {
                if($max < $department->size)
                {
                    $max = $department->size;
                }
            }
        }
        foreach ($this->department_array as &$department) {
            if ($department->total_salary == $min && $department->size == $max) {
                echo '<div style="color:red">';
                echo '<<hr><h3>Департамент с минимальной суммарной зарплатой</h3>';
                echo '<p><b>';
                print_r($department->department_name);
                echo '</b></p>';
                echo '<p>Суммарная з.п.: <b>';
                print_r($department->total_salary);
                echo '</b></p>';
                echo '<p>Количество сотрудников.: <b>';
                print_r($department->size);
                echo '</b></p><hr>';
                echo '</div>';
            }
        }
    }

    public function max_company_salary()
    {
        $max_emp = -1;
        $max = -1;

        foreach ($this->department_array as &$department) {
            if ($department->total_salary >= $max) {
                $max = $department->total_salary;
            }
        }

        foreach ($this->department_array as &$department) {
            if ($department->total_salary == $max) {
                if($max_emp < $department->size)
                {
                    $max_emp = $department->size;
                }
            }
        }
        foreach ($this->department_array as &$department) {
            if ($department->total_salary == $max && $department->size == $max_emp) {
                echo '<div style="color:forestgreen">';
                echo '<hr><h3>Департамент с максимальной суммарной зарплатой</h3>';
                echo '<p><b>';
                print_r($department->department_name);
                echo '</b></p>';
                echo '<p>Суммарная з.п.: <b>';
                print_r($department->total_salary);
                echo '</b></p>';
                echo '<p>Количество сотрудников.: <b>';
                print_r($department->size);
                echo '</b></p><hr></p>';
                echo '</div>';
            }
        }
    }
}