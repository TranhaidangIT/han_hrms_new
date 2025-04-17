<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForeignLanguage;

class ForeignLanguageController extends Controller
{
    public function index()
    {
        $employeeCode = request('employeeCode');
        if ($employeeCode) {
            $foreignLanguages = ForeignLanguage::select([
                'id',
                'foreign_language_name',
                'level',
            ])->where('employee_code', $employeeCode)->paginate();
            return view('admin.foreign_language.index', compact('foreignLanguages', 'employeeCode'));
        }
    }

    public function store(Request $request)
    {
        
        $fields = [
            'employee_code' => 'Mã nhân viên',
            'foreign_language_name' => 'Tên ngoại ngữ',
            'level' => 'Trình độ',
        ];
        $validatedData = $request->validate([
            'employee_code' => 'required|string',
            'foreign_language_name' => 'required|string',
            'level' => 'nullable|string',
        ], [], $fields);
        ForeignLanguage::create($validatedData);
        return redirect()->route('admin.foreign_languages.index', ['employeeCode'=>$validatedData['employee_code']])
            ->with('success', 'Thêm thông tin ngoại ngữ thành công');
    }

    public function edit(string $id)
    {
        $foreignLanguage = ForeignLanguage::findOrFail($id);
        return view('admin.foreign_language.edit', compact('foreignLanguage'));
    }

    public function update(Request $request, string $id)
    {
        $foreignLanguage = ForeignLanguage::findOrFail($id);

        $validatedData = $request->validate([
            'foreign_language_name' => 'required|string',
            'level' => 'nullable|string',
        ]);

        $foreignLanguage->update($validatedData);
        return redirect()
                ->route('admin.foreign_languages.index', ['employeeCode'=>$foreignLanguage->employee_code])
                ->with('success', 'Cập nhật ngoại ngữ thành công');
    }

    public function destroy(string $id)
    {
        $foreignLanguage = ForeignLanguage::findOrFail($id);
        $foreignLanguage->delete();
        return redirect()
                ->route('admin.foreign_languages.index', ['employeeCode'=>$foreignLanguage->employee_code])
                ->with('success', 'Xóa ngoại ngữ thành công');
    }
}
