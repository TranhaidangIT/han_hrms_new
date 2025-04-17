@extends('admin.layout.app')
@section('title', 'Thông tin ngoại ngữ của nhân viên ' . get_employee_name($employeeCode))

{{-- menu focus vào trang danh sách nhân viên --}}
@section('sidebar-key', 'admin.employee.list')

@section('content')
    <x-card class="col-12">
        <x-employee-tab :employeeCode="$employeeCode" activeTab="foreign_languages">
            <x-open-modal target="#mNgoaiNguCreate" />

            <x-table :headers="['ID', 'Tên ngoại ngữ', 'Trình độ']" :data="$foreignLanguages" key="id">
                <x-slot:action>
                    <x-open-modal url="{{ route('admin.foreign_languages.edit', ['foreign_language' => ':id']) }}"
                        text="Sửa" icon="ri-edit-line" target="#mNgoaiNguEdit" class="btn btn-warning btn-sm" />
                    <x-del-button url="{{ route('admin.foreign_languages.destroy', ['foreign_language' => ':id']) }}"
                        class="btn-danger btn-sm" />
                </x-slot>
            </x-table>
            {{ $foreignLanguages->links() }}
        </x-employee-tab>
    </x-card>
@endsection

@section('modal')
    <x-modal id="mNgoaiNguCreate" title="Thêm ngoại ngữ">
        <form action="{{ route('admin.foreign_languages.store') }}" method="POST">
            @csrf
            <input type="hidden" name="employee_code" value="{{ $employeeCode }}">
            <x-input-modal label="Tên ngoại ngữ" name="foreign_language_name" required />
            <x-input-modal label="Trình độ" name="level" />

            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Thêm mới" />
            </div>
        </form>
    </x-modal>

    <x-modal id="mNgoaiNguEdit" title="Sửa thông tin ngoại ngữ">
        {{-- Nội dung form sửa thông tin ngoại ngữ sẽ được load vào đây (từ file edit.blade.php) --}}
    </x-modal>
@endsection