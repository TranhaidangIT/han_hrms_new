<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Employee;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        /** @var Employee $employee */ // ← thêm PHPDoc ngay trước khi lấy user
        $employee = Auth::guard('employee')->user();

        $validated = $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => [
                'required',
                'email',
                Rule::unique('employees', 'email')
                    ->ignore($employee->employee_code, 'employee_code'),
            ],
            'phone_number' => 'nullable|string|max:20',
            'birthday'     => 'nullable|date',
        ]);

        $employee->update($validated);

        return redirect()
            ->route('employee.profile.edit')
            ->with('success', 'Cập nhật thông tin thành công!');
    }
}
