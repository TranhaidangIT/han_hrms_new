<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScientificWork;

class ScientificWorkController extends Controller
{
    public function index()
    {
        $employeeCode = request('employeeCode');
        if ($employeeCode) {
            $scientificWorks = ScientificWork::select([
                'id',
                'scientific_works_name',
                'year',
                'magazine_name'
            ])->where('employee_code', $employeeCode)->paginate();
            return view('admin.scientific_work.index', compact('scientificWorks', 'employeeCode'));
        }
    }

    public function store(Request $request)
    {
        $fields = [
            'employee_code' => 'Mã nhân viên',
            'scientific_works_name' => 'Tên công trình khoa học',
            'year' => 'Năm',
            'magazine_name' => 'Tên tạp chí'
        ];
        $validatedData = $request->validate([
            'employee_code' => 'required|string',
            'scientific_works_name' => 'required|string',
            'year' => 'nullable|string',
            'magazine_name' => 'nullable|string'
        ], [], $fields);
        ScientificWork::create($validatedData);
        return redirect()->route('admin.scientific_works.index', ['employeeCode'=>$validatedData['employee_code']])
            ->with('success', 'Thêm thông tin công trình khoa học thành công');
    }

    public function edit(string $id)
    {
        $scientificWork = ScientificWork::findOrFail($id);
        return view('admin.scientific_work.edit', compact('scientificWork'));
    }

    public function update(Request $request, string $id)
    {
        $scientificWork = ScientificWork::findOrFail($id);

        $validatedData = $request->validate([
            'scientific_works_name' => 'required|string',
            'year' => 'nullable|string',
            'magazine_name' => 'nullable|string'
        ]);

        $scientificWork->update($validatedData);
        return redirect()
                ->route('admin.scientific_works.index', ['employeeCode'=>$scientificWork->employee_code])
                ->with('success', 'Cập nhật công trình khoa học thành công');
    }

    public function destroy(string $id)
    {
        $scientificWork = ScientificWork::findOrFail($id);
        $scientificWork->delete();
        return redirect()
                ->route('admin.scientific_works.index', ['employeeCode'=>$scientificWork->employee_code])
                ->with('success', 'Xóa công trình khoa học thành công');
    }
}
