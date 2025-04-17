@extends('admin.layout.app')
@section('title', 'Công trình khoa học của nhân viên ' . get_employee_name($employeeCode))

{{-- menu focus vào trang danh sách nhân viên --}}
@section('sidebar-key', 'admin.employee.list')

@section('content')
    <x-card class="col-12">
        <x-employee-tab :employeeCode="$employeeCode" activeTab="scientific_works">
            <x-open-modal target="#mCongTrinhCreate" />

            <x-table :headers="['ID', 'Tên công trình khoa học', 'Năm', 'Tên tạp chí']" :data="$scientificWorks" key="id">
                <x-slot:action>
                    <x-open-modal url="{{ route('admin.scientific_works.edit', ['scientific_work' => ':id']) }}"
                        text="Sửa" icon="ri-edit-line" target="#mCongTrinhEdit" class="btn btn-warning btn-sm" />
                    <x-del-button url="{{ route('admin.scientific_works.destroy', ['scientific_work' => ':id']) }}"
                        class="btn-danger btn-sm" />
                </x-slot>
            </x-table>
            {{ $scientificWorks->links() }}
        </x-employee-tab>
    </x-card>
@endsection

@section('modal')
    <x-modal id="mCongTrinhCreate" title="Thêm công trình khoa học">
        <form action="{{ route('admin.scientific_works.store') }}" method="POST">
            @csrf
            <input type="hidden" name="employee_code" value="{{ $employeeCode }}">
            <x-input-modal label="Tên công trình khoa học" name="scientific_works_name" required />
            <x-input-modal label="Năm" name="year" required />
            <x-input-modal label="Tên tạp chí" name="magazine_name" />

            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Thêm mới" />
            </div>
        </form>
    </x-modal>

    <x-modal id="mCongTrinhEdit" title="Sửa thông tin công trình khoa học">
        {{-- Nội dung form sửa thông tin công trình khoa học sẽ được load vào đây (từ file edit.blade.php) --}}
    </x-modal>
@endsection