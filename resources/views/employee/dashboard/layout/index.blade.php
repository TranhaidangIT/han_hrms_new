@extends('layout.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Dashboard Nhân viên</h2>
            <p class="text-gray-700">Chào mừng, <strong>{{ $employee->full_name }}</strong>!</p>


            <div class="mt-4">
                <p><strong>Mã nhân viên:</strong> {{ $employee->employee_code }}</p>
                <p><strong>Phòng ban:</strong> {{ $employee->department_code }}</p>
                <p><strong>Số điện thoại:</strong> {{ $employee->phone_number }}</p>
            </div>
        </div>
    </div>
@endsection
