@extends('admin.layout.app')
@section('title', 'Đề tài nghiên cứu khoa học của nhân viên ' . get_employee_name($employeeCode))

{{-- menu focus vào trang danh sách nhân viên --}}
@section('sidebar-key', 'admin.employee.list')

@section('content')
    <x-card class="col-12">
        <x-employee-tab :employeeCode="$employeeCode" activeTab="scientific_research_topics">
            <x-open-modal target="#mDeTaiCreate" />

            <x-table :headers="['ID', 'Tên đề tài', 'Năm bắt đầu', 'Năm kết thúc', 'Cấp đề tài', 'Vai trò']" :data="$scientificResearchTopics" key="id">
                <x-slot:action>
                    <x-open-modal url="{{ route('admin.scientific_research_topics.edit', ['scientific_research_topic' => ':id']) }}"
                        text="Sửa" icon="ri-edit-line" target="#mDeTaiEdit" class="btn btn-warning btn-sm" />
                    <x-del-button url="{{ route('admin.scientific_research_topics.destroy', ['scientific_research_topic' => ':id']) }}"
                        class="btn-danger btn-sm" />
                </x-slot>
            </x-table>
            {{ $scientificResearchTopics->links() }}
        </x-employee-tab>
    </x-card>
@endsection

@section('modal')
    <x-modal id="mDeTaiCreate" title="Thêm đề tài nghiên cứu khoa học">
        <form action="{{ route('admin.scientific_research_topics.store') }}" method="POST">
            @csrf
            <input type="hidden" name="employee_code" value="{{ $employeeCode }}">
            <x-input-modal label="Tên đề tài" name="scientific_research_topic_name" required />
            <x-input-modal label="Năm bắt đầu" name="year_of_begin" required />
            <x-input-modal label="Năm kết thúc" name="year_of_complete" />
            <x-input-modal label="Cấp đề tài" name="level_topic" />
            <x-input-modal label="Vai trò trong đề tài" name="responsibility_in_the_topic" />

            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Thêm mới" />
            </div>
        </form>
    </x-modal>

    <x-modal id="mDeTaiEdit" title="Sửa thông tin đề tài nghiên cứu khoa học">
        {{-- Nội dung form sửa thông tin đề tài sẽ được load vào đây (từ file edit.blade.php) --}}
    </x-modal>
@endsection