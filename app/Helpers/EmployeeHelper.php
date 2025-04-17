
<?php

if (!function_exists('get_employee_name')) {
    /**
     * Lấy tên nhân viên dựa trên mã nhân viên.
     *
     * @param string $employeeCode Mã nhân viên.
     * @return string|null Tên nhân viên hoặc null nếu không tìm thấy.
     */
    function get_employee_name($employeeCode)
    {
        $employee = \App\Models\Employee::where('employee_code', $employeeCode)->first();
        return $employee ? $employee->full_name : null;
    }
}