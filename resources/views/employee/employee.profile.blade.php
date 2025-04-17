@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cập nhật thông tin cá nhân</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employee.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="full_name">Họ và tên:</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                class="form-control"
                value="{{ old('full_name', $employee->full_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email', $employee->email) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="phone_number">Số điện thoại:</label>
            <input
                type="text"
                id="phone_number"
                name="phone_number"
                class="form-control"
                value="{{ old('phone_number', $employee->phone_number) }}"
            >
        </div>

        <div class="form-group">
            <label for="birthday">Ngày sinh:</label>
            <input
                type="date"
                id="birthday"
                name="birthday"
                class="form-control"
                value="{{ old('birthday', optional($employee->birthday)->format('Y-m-d')) }}"
            >
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
