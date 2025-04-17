<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScientificResearchTopic;

class ScientificResearchTopicController extends Controller
{
    public function index()
    {
        $employeeCode = request('employeeCode');
        if ($employeeCode) {
            $scientificResearchTopics = ScientificResearchTopic::select([
                'id',
                'scientific_research_topic_name',
                'year_of_begin',
                'year_of_complete',
                'level_topic',
                'responsibility_in_the_topic'
            ])->where('employee_code', $employeeCode)->paginate();
            return view('admin.scientific_research_topic.index', compact('scientificResearchTopics', 'employeeCode'));
        }
    }

    public function store(Request $request)
    {
        $fields = [
            'employee_code' => 'Mã nhân viên',
            'scientific_research_topic_name' => 'Tên đề tài nghiên cứu',
            'year_of_begin' => 'Năm bắt đầu',
            'year_of_complete' => 'Năm hoàn thành',
            'level_topic' => 'Cấp đề tài',
            'responsibility_in_the_topic' => 'Trách nhiệm trong đề tài'
        ];
        $validatedData = $request->validate([
            'employee_code' => 'required|string',
            'scientific_research_topic_name' => 'required|string',
            'year_of_begin' => 'nullable|string',
            'year_of_complete' => 'nullable|string',
            'level_topic' => 'nullable|string',
            'responsibility_in_the_topic' => 'nullable|string'
        ], [], $fields);
        ScientificResearchTopic::create($validatedData);
        return redirect()->route('admin.scientific_research_topics.index', ['employeeCode'=>$validatedData['employee_code']])
            ->with('success', 'Thêm thông tin đề tài nghiên cứu thành công');
    }

    public function edit(string $id)
    {
        $scientificResearchTopic = ScientificResearchTopic::findOrFail($id);
        return view('admin.scientific_research_topic.edit', compact('scientificResearchTopic'));
    }

    public function update(Request $request, string $id)
    {
        $scientificResearchTopic = ScientificResearchTopic::findOrFail($id);

        $validatedData = $request->validate([
            'scientific_research_topic_name' => 'required|string',
            'year_of_begin' => 'nullable|string',
            'year_of_complete' => 'nullable|string',
            'level_topic' => 'nullable|string',
            'responsibility_in_the_topic' => 'nullable|string'
        ]);

        $scientificResearchTopic->update($validatedData);
        return redirect()
                ->route('admin.scientific_research_topics.index', ['employeeCode'=>$scientificResearchTopic->employee_code])
                ->with('success', 'Cập nhật đề tài nghiên cứu thành công');
    }

    public function destroy(string $id)
    {
        $scientificResearchTopic = ScientificResearchTopic::findOrFail($id);
        $scientificResearchTopic->delete();
        return redirect()
                ->route('admin.scientific_research_topics.index', ['employeeCode'=>$scientificResearchTopic->employee_code])
                ->with('success', 'Xóa đề tài nghiên cứu thành công');
    }
}
