-- filepath: e:/HRMSystem/target.sql

-- Tạo cơ sở dữ liệu
CREATE DATABASE han_hrms;
USE han_hrms;

-- Tạo bảng
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính của bảng quản trị viên',
    username VARCHAR(30) COMMENT 'Tên đăng nhập của quản trị viên',
    password VARCHAR(200) COMMENT 'Mật khẩu của quản trị viên'
);

CREATE TABLE contracts (
    contract_code VARCHAR(30) PRIMARY KEY COMMENT 'Mã hợp đồng duy nhất',
    contract_type VARCHAR(50) COMMENT 'Loại hợp đồng',
    start_date DATE COMMENT 'Ngày bắt đầu hợp đồng',
    end_date DATE COMMENT 'Ngày kết thúc hợp đồng',
    note TEXT COMMENT 'Ghi chú thêm về hợp đồng'
);

CREATE TABLE departments (
    department_code VARCHAR(30) PRIMARY KEY COMMENT 'Mã phòng ban duy nhất',
    department_name VARCHAR(50) NOT NULL COMMENT 'Tên phòng ban',
    address VARCHAR(50) COMMENT 'Địa chỉ phòng ban',
    department_phone_number VARCHAR(11) COMMENT 'Số điện thoại phòng ban'
);

CREATE TABLE education_levels (
    education_level_code VARCHAR(30) PRIMARY KEY COMMENT 'Mã trình độ học vấn duy nhất',
    education_level_name TEXT NOT NULL COMMENT 'Tên trình độ học vấn',
    tier_coefficient FLOAT COMMENT 'Hệ số bậc trình độ học vấn'
);

CREATE TABLE specialized (
    specialized_code VARCHAR(30) PRIMARY KEY COMMENT 'Mã chuyên ngành duy nhất',
    specialized_name VARCHAR(50) COMMENT 'Tên chuyên ngành'
);

CREATE TABLE employee_positions (
    employee_position_code VARCHAR(30) PRIMARY KEY COMMENT 'Mã chức vụ nhân viên duy nhất',
    position_name VARCHAR(50) NOT NULL COMMENT 'Tên chức vụ',
    hspc FLOAT COMMENT 'Hệ số phụ cấp chức vụ'
);

CREATE TABLE employees (
    employee_code VARCHAR(30) PRIMARY KEY COMMENT 'Mã nhân viên duy nhất',
    username VARCHAR(30) COMMENT 'Tên đăng nhập của nhân viên',
    password VARCHAR(200) COMMENT 'Mật khẩu của nhân viên',
    full_name VARCHAR(50) COMMENT 'Họ và tên nhân viên',
    birthday DATE COMMENT 'Ngày sinh của nhân viên',
    hometown VARCHAR(100) COMMENT 'Quê quán của nhân viên',
    image VARCHAR(500) COMMENT 'Đường dẫn ảnh của nhân viên',
    gender INT COMMENT 'Giới tính của nhân viên (1 là nam, 0 là nữ)',
    ethnic VARCHAR(10) COMMENT 'Dân tộc của nhân viên',
    phone_number VARCHAR(11) COMMENT 'Số điện thoại của nhân viên',
    employee_position_code VARCHAR(30) COMMENT 'Mã chức vụ của nhân viên',
    status BOOLEAN NOT NULL COMMENT 'Trạng thái của nhân viên (1 là đang làm việc, 0 là nghỉ việc)',
    department_code VARCHAR(30) COMMENT 'Mã phòng ban của nhân viên',
    contract_code VARCHAR(30) COMMENT 'Mã hợp đồng của nhân viên',
    specialized_code VARCHAR(30) COMMENT 'Mã chuyên ngành của nhân viên',
    education_level_code VARCHAR(30) COMMENT 'Mã trình độ học vấn của nhân viên',
    identity_card VARCHAR(50) COMMENT 'Số chứng minh nhân dân của nhân viên'
);

CREATE TABLE after_universities (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    specialized_master VARCHAR(50) COMMENT 'Chuyên ngành thạc sĩ',
    training_place_master VARCHAR(50) COMMENT 'Nơi đào tạo thạc sĩ',
    degree_year_master VARCHAR(10) COMMENT 'Năm nhận bằng thạc sĩ',
    specialized_doctorate VARCHAR(50) COMMENT 'Chuyên ngành tiến sĩ',
    training_place_doctorate VARCHAR(50) COMMENT 'Nơi đào tạo tiến sĩ',
    degree_year_doctorate VARCHAR(10) COMMENT 'Năm nhận bằng tiến sĩ'
);

CREATE TABLE bonuses (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    bonus_date DATE COMMENT 'Ngày thưởng',
    reason TEXT COMMENT 'Lý do thưởng',
    bonus_money FLOAT COMMENT 'Số tiền thưởng'
);

CREATE TABLE disciplines (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    discipline_date DATE COMMENT 'Ngày kỷ luật',
    reason TEXT COMMENT 'Lý do kỷ luật',
    discipline_money FLOAT COMMENT 'Số tiền phạt kỷ luật'
);

CREATE TABLE education_level_updates (
    update_code INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính của cập nhật trình độ học vấn',
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    update_day DATE NOT NULL COMMENT 'Ngày cập nhật',
    previous_education_level_code VARCHAR(30) NOT NULL COMMENT 'Mã trình độ học vấn trước đó',
    education_level_update_code VARCHAR(30) NOT NULL COMMENT 'Mã trình độ học vấn sau cập nhật'
);

CREATE TABLE employee_rotations (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính của luân chuyển nhân viên',
    rotation_date DATE NOT NULL COMMENT 'Ngày luân chuyển',
    rotation_reason TEXT COMMENT 'Lý do luân chuyển',
    department_rotation VARCHAR(30) COMMENT 'Mã phòng ban chuyển đi',
    incoming_department VARCHAR(30) COMMENT 'Mã phòng ban chuyển đến'
);

CREATE TABLE foreign_languages (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    foreign_language_name VARCHAR(50) COMMENT 'Tên ngoại ngữ',
    level VARCHAR(30) COMMENT 'Trình độ ngoại ngữ'
);

CREATE TABLE quit_jobs (
    employee_code VARCHAR(30) PRIMARY KEY COMMENT 'Mã nhân viên làm khóa ngoại',
    reason TEXT COMMENT 'Lý do nghỉ việc',
    quit_job_date DATE NOT NULL COMMENT 'Ngày nghỉ việc'
);

CREATE TABLE salaries (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    minimum_salary FLOAT COMMENT 'Lương tối thiểu của nhân viên',
    salary_coefficient FLOAT COMMENT 'Hệ số lương của nhân viên',
    social_insurance FLOAT COMMENT 'Bảo hiểm xã hội',
    health_insurance FLOAT COMMENT 'Bảo hiểm y tế',
    unemployment_insurance FLOAT COMMENT 'Bảo hiểm thất nghiệp',
    allowance FLOAT COMMENT 'Phụ cấp của nhân viên',
    income_tax FLOAT COMMENT 'Thuế thu nhập của nhân viên'
);

CREATE TABLE salary_details (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    basic_salary FLOAT COMMENT 'Lương cơ bản của nhân viên',
    social_insurance FLOAT COMMENT 'Bảo hiểm xã hội',
    health_insurance FLOAT COMMENT 'Bảo hiểm y tế',
    unemployment_insurance FLOAT COMMENT 'Bảo hiểm thất nghiệp',
    allowance FLOAT COMMENT 'Phụ cấp của nhân viên',
    income_tax FLOAT COMMENT 'Thuế thu nhập của nhân viên',
    bonus_money FLOAT COMMENT 'Tiền thưởng của nhân viên',
    discipline_money FLOAT COMMENT 'Tiền phạt kỷ luật của nhân viên',
    pay_day DATE COMMENT 'Ngày trả lương',
    total_salary FLOAT COMMENT 'Tổng lương của nhân viên'
);

CREATE TABLE salary_updates (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    current_salary FLOAT COMMENT 'Lương hiện tại của nhân viên',
    salary_after_update FLOAT COMMENT 'Lương sau khi cập nhật',
    salary_coefficient FLOAT COMMENT 'Hệ số lương sau khi cập nhật',
    social_insurance FLOAT COMMENT 'Bảo hiểm xã hội sau khi cập nhật',
    health_insurance FLOAT COMMENT 'Bảo hiểm y tế sau khi cập nhật',
    unemployment_insurance FLOAT COMMENT 'Bảo hiểm thất nghiệp sau khi cập nhật',
    allowance FLOAT COMMENT 'Phụ cấp sau khi cập nhật',
    income_tax FLOAT COMMENT 'Thuế thu nhập sau khi cập nhật',
    update_day DATE COMMENT 'Ngày cập nhật lương'
);

CREATE TABLE scientific_research_topics (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    scientific_research_topic_name VARCHAR(200) COMMENT 'Tên đề tài nghiên cứu khoa học',
    year_of_begin VARCHAR(10) COMMENT 'Năm bắt đầu nghiên cứu',
    year_of_complete VARCHAR(10) COMMENT 'Năm hoàn thành nghiên cứu',
    level_topic VARCHAR(50) COMMENT 'Cấp độ của đề tài nghiên cứu',
    responsibility_in_the_topic VARCHAR(100) COMMENT 'Trách nhiệm trong đề tài nghiên cứu'
);

CREATE TABLE scientific_works (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    scientific_works_name VARCHAR(200) COMMENT 'Tên công trình khoa học',
    year VARCHAR(10) COMMENT 'Năm thực hiện công trình khoa học',
    magazine_name VARCHAR(200) COMMENT 'Tên tạp chí công bố công trình khoa học'
);

CREATE TABLE unit_used (
    unit_used_name VARCHAR(200) COMMENT 'Tên đơn vị sử dụng',
    school_name VARCHAR(200) COMMENT 'Tên trường',
    address VARCHAR(200) COMMENT 'Địa chỉ đơn vị',
    phone_number VARCHAR(20) COMMENT 'Số điện thoại đơn vị',
    email VARCHAR(200) COMMENT 'Email của đơn vị',
    salary_increase_period VARCHAR(10) COMMENT 'Thời gian tăng lương'
);

CREATE TABLE universities (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    university_name VARCHAR(50) COMMENT 'Tên trường đại học',
    training_country VARCHAR(50) COMMENT 'Quốc gia đào tạo',
    graduate_year VARCHAR(10) COMMENT 'Năm tốt nghiệp'
);

CREATE TABLE working_processes (
    employee_code VARCHAR(30) NOT NULL COMMENT 'Mã nhân viên làm khóa ngoại',
    work_place VARCHAR(100) COMMENT 'Nơi làm việc',
    work_undertake VARCHAR(200) COMMENT 'Công việc đảm nhận',
    time VARCHAR(20) COMMENT 'Thời gian làm việc'
);

-- Thêm khóa ngoại
ALTER TABLE employees ADD FOREIGN KEY (contract_code) REFERENCES contracts(contract_code) ON DELETE CASCADE;
ALTER TABLE employees ADD FOREIGN KEY (department_code) REFERENCES departments(department_code) ON DELETE CASCADE;
ALTER TABLE employees ADD FOREIGN KEY (education_level_code) REFERENCES education_levels(education_level_code);
ALTER TABLE employees ADD FOREIGN KEY (employee_position_code) REFERENCES employee_positions(employee_position_code);
ALTER TABLE employees ADD FOREIGN KEY (specialized_code) REFERENCES specialized(specialized_code);

ALTER TABLE after_universities ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE bonuses ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE disciplines ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE education_level_updates ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE employee_rotations ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE foreign_languages ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE quit_jobs ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code);
ALTER TABLE salaries ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE salary_details ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE salary_updates ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE scientific_research_topics ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE scientific_works ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE universities ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
ALTER TABLE working_processes ADD FOREIGN KEY (employee_code) REFERENCES employees(employee_code) ON DELETE CASCADE;
