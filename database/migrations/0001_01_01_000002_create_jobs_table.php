<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Chạy các migrations.
     * Hàm này định nghĩa những thay đổi nào sẽ được thực hiện đối với cơ sở dữ liệu.
     */
    public function up(): void
    {
        // Tạo bảng 'jobs'
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng (bigint unsigned)
            $table->string('queue')->index(); // Tên hàng đợi (queue), có index để tăng tốc truy vấn
            $table->longText('payload'); // Dữ liệu công việc (job)
            $table->unsignedTinyInteger('attempts'); // Số lần thử thực hiện
            $table->unsignedInteger('reserved_at')->nullable(); // Thời điểm được dành để xử lý (có thể null)
            $table->unsignedInteger('available_at'); // Thời điểm sẵn sàng để xử lý
            $table->unsignedInteger('created_at'); // Thời điểm tạo công việc (bạn có thể muốn dùng timestamp() hoặc dateTime())
        });

        // Tạo bảng 'admins'
        Schema::create('admins', function (Blueprint $table) {  // Loại bỏ dấu ngoặc nhọn thừa ở đây
            $table->id();
            $table->string('username')->unique(); // Tên người dùng, là duy nhất
            $table->string('password'); // Mật khẩu
            $table->timestamps(); // Thêm created_at và updated_at (thời điểm tạo và cập nhật)
        });

        // Tạo bảng 'job_batches'
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // ID của batch (chuỗi, là khóa chính)
            $table->string('name'); // Tên của batch
            $table->integer('total_jobs'); // Tổng số công việc trong batch
            $table->integer('pending_jobs'); // Số công việc đang chờ xử lý
            $table->integer('failed_jobs'); // Số công việc thất bại
            $table->longText('failed_job_ids'); // Danh sách ID các công việc thất bại
            $table->mediumText('options')->nullable(); // Các tùy chọn khác (có thể null)
            $table->integer('cancelled_at')->nullable(); // Thời điểm bị hủy (có thể null)
            $table->unsignedInteger('created_at'); // Thời điểm tạo batch (bạn có thể muốn dùng timestamp() hoặc dateTime())
            $table->unsignedInteger('finished_at')->nullable(); // Thời điểm hoàn thành batch (có thể null) (bạn có thể muốn dùng timestamp() hoặc dateTime())
        });

        // Tạo bảng 'failed_jobs'
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique(); // UUID của công việc thất bại, là duy nhất
            $table->text('connection'); // Kết nối (ví dụ: database, redis)
            $table->text('queue'); // Hàng đợi
            $table->longText('payload'); // Dữ liệu công việc
            $table->longText('exception'); // Thông tin lỗi
            $table->timestamp('failed_at')->useCurrent(); // Thời điểm thất bại, mặc định là thời điểm hiện tại
        });

        // Tạo bảng 'employees'
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Tên
            $table->string('last_name'); // Họ
            $table->string('email')->unique(); // Email, là duy nhất
            $table->string('phone')->nullable(); // Số điện thoại (có thể null)
            $table->foreignId('department_id')->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng 'departments', nếu phòng ban bị xóa thì nhân viên cũng bị xóa
            $table->timestamps(); // created_at và updated_at
            // Thêm các cột khác mà bạn cần cho bảng 'employees'
        });
    }

    /**
     * Đảo ngược các migrations.
     * Hàm này định nghĩa những thay đổi nào sẽ được hoàn tác khi rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('admins'); // Đảm bảo thứ tự xóa bảng phù hợp
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('employees'); // Thêm dòng này để rollback bảng employees
    }
};
