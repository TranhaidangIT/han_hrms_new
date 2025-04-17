@extends('layout.app')

@section('content')
    <div class="container">
        <h2 class="text-2xl font-semibold mb-6">Dashboard Nhân viên</h2>
        <p>Chào mừng, {{ Auth::guard('employee')->user()->full_name }}!</p>
    </div>
@endsection
