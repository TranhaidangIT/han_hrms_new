@extends('admin.layout.app')
@section('title', 'Sửa thông tin nhân viên')
@section('sidebar-key', 'admin.employee.list')

@section('content')
<x-card>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.employee.update', ['employee' => $employee->employee_code]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <x-input :value="$employee->employee_code" readonly label="Mã nhân viên" name="employee_code" required />
                <x-input :value="$employee->username" label="Tên đăng nhập" name="username" />
                <x-input label="Mật khẩu" name="password" type="password" placeholder="Để trống nếu không thay đổi" />
                <x-input :value="$employee->full_name" label="Họ và tên" name="full_name" required />
                <x-input :value="$employee->birthday" label="Ngày sinh" name="birthday" type="date" required />
                <x-input :value="$employee->hometown" label="Quê quán" name="hometown" required />
                <x-input :value="$employee->phone_number" label="Số điện thoại" name="phone_number" required />
                <x-input :value="$employee->identity_card" label="CMND/CCCD" name="identity_card" />

                <div class="mb-3">
                    <label class="form-label">Giới tính</label>
                    <select class="form-select" name="gender">
                        <option value="1" {{ $employee->gender == 1 ? 'selected' : '' }}>Nam</option>
                        <option value="0" {{ $employee->gender == 0 ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>

                <x-input :value="$employee->ethnic" label="Dân tộc" name="ethnic" />
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Ảnh đại diện</label>
                    @if($employee->image)
                        <div class="mb-2">
                            <img src="{{ asset($employee->image) }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                        </div>
                    @endif
                    <input type="file" class="form-control" name="image" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Phòng ban</label>
                    <select class="form-select" name="department_code" required>
                        @foreach ($departments as $department)
                            <option value="{{ $department->department_code }}" {{ $employee->department_code == $department->department_code ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vị trí</label>
                    <select class="form-select" name="employee_position_code">
                        @foreach ($employeePositions as $position)
                            <option value="{{ $position->employee_position_code }}" {{ $employee->employee_position_code == $position->position_code ? 'selected' : '' }}>
                                {{ $position->position_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Loại hợp đồng</label>
                    <select class="form-select" name="contract_code">
                        @foreach ($contracts as $contract)
                            <option value="{{ $contract->contract_code }}" {{ $employee->contract_code == $contract->contract_code ? 'selected' : '' }}>
                                {{ $contract->contract_type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Chuyên ngành</label>
                    <select class="form-select" name="specialized_code">
                        @foreach ($specializations as $specialization)
                            <option value="{{ $specialization->specialized_code }}" {{ $employee->specialized_code == $specialization->specialized_code ? 'selected' : '' }}>
                                {{ $specialization->specialized_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trình độ học vấn</label>
                    <select class="form-select" name="education_level_code">
                        @foreach ($educationLevels as $level)
                            <option value="{{ $level->education_level_code }}" {{ $employee->education_level_code == $level->education_level_code ? 'selected' : '' }}>
                                {{ $level->education_level_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <select class="form-select" name="status">
                        <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Đang làm việc</option>
                        <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Ngừng làm việc</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-success" value="Cập nhật" />
        </div>
    </form>
</x-card>
@endsection
