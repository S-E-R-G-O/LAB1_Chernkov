<?php

class Department
{
    public array $employee_array = array();
    public string $department_name;
    public int $size = 0;
    public int $total_salary;
    public function __construct($name, $emp_array)
    {
        $this->department_name = $name;
        $this->create_employee_array($emp_array);
    }

    public function total_department_salary() : int
    {
        $total = 0;
        foreach ($this->employee_array as  &$employee){
            $total += $employee->salary;
        }
        $this->total_salary = $total;
        return $total;
    }
    public function printDepartment()
    {
        echo '<p></p><hr>';

        echo '<h3>';
        print_r($this->department_name);
        echo ' (';
        print_r($this->size);
        echo ' employee)';
        echo '</h3>';

        foreach ($this->employee_array as  &$employee) {
            $employee->printEmployee();
        }
        echo '<p><b>Суммарная зарплатьа сотрудников отдела ';
        print_r($this->department_name);
        echo ': ';
        print_r($this->total_department_salary());
        echo '</p></b>';
    }

    private function create_employee_array($arr)
    {

        foreach ($arr as  &$employee) {
            if($employee->correct){
                $this->employee_array[$this->size++] = $employee;
            }
        }
    }

}