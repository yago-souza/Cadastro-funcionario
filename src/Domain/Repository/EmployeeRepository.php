<?php

namespace Spaal\RH\Domain\Repository;

use Spaal\RH\Domain\Model\Employee;

interface EmployeeRepository
{
    public function allEmployees(): array;
    public function employeesBirthAt(int $birthDate): array;
    public function save(Employee $student): bool;
    public function remove(Employee $student): bool;
}