
INSERT INTO contracts (contract_code, contract_type, start_date, end_date, note) VALUES 
('0001', 'Nhân viên chính thức', '2020-12-20', '2024-12-20', 'abc'),
('0002', 'Thử việc', '2020-12-20', '2024-12-20', 'abcd');

INSERT INTO departments (department_code, department_name, address, department_phone_number) VALUES 
('cntt', 'Công nghệ thông tin', 'Lầu 1 nhà H', '0826625621'),
('daotao', 'Đào tạo', 'Lầu 2 nhà A', '029348472'),
('ketoan', 'Kế toán', 'Lầu 3 nhà D', '089372732'),
('xaydung', 'Xây dựng', 'phòng A1.1 nhà A', '0832983422');

INSERT INTO education_levels (education_level_code, education_level_name, tier_coefficient) VALUES 
('gs', 'Giáo sư', 6.2),
('ks', 'Kỹ sư', 2.34),
('pgs', 'Phó giáo sư', 4.4),
('ths', 'Thạc sỹ', 2.67),
('ts', 'Tiến sỹ', 3);

INSERT INTO employee_positions (employee_position_code, position_name, hspc) VALUES 
('nv', 'Nhân viên', 0),
('pp', 'Phó phòng, Phó khoa', 0.35),
('tbm', 'Trưởng bộ môn', 0.25),
('tp', 'Trưởng phòng, Trưởng khoa', 0.45);


INSERT INTO specialized (specialized_code, specialized_name) VALUES 
('ck', 'Cơ khí'),
('cntt', 'Công nghệ thông tin'),
('cth', 'Chính trị học'),
('dientu', 'Điện tử'),
('hoahoc', 'Hóa học'),
('kt', 'Kế toán'),
('nl', 'Nhiệt lạnh'),
('sinhhoc', 'Sinh học'),
('toan', 'Toán');

INSERT INTO unit_used (unit_used_name, school_name, address, phone_number, email, salary_increase_period) VALUES 
('Đơn vị xxxxxxxxxxxx', 'Trường xxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxx', 'xxxxxxx', 'xxxxx@gmail.COM', '2 năm');

INSERT INTO employees (employee_code, username, password, full_name, birthday, hometown, image, gender, ethnic, phone_number, employee_position_code, status, department_code, contract_code, specialized_code, education_level_code, identity_card) VALUES 
('1', 'thientran', '123456', 'Trần Văn Thiện', '1970-06-20', 'Cà Mau', 'C:/Users/ADMIN/Downloads/anh-meo-2.jpg', 1, 'Kinh', '0123456789', 'tp', 1, 'cntt', '0001', 'cntt', 'ths', '123456789'),
('2', 'chithanh', '123456789', 'Nguyễn Chí Thành', '2002-02-02', 'Cà Mau', 'C:/Users/ADMIN/Downloads/8.jpg', 0, 'Kinh', '123456789', 'tp', 1, 'ketoan', '0001', 'cntt', 'ths', '123456789');

INSERT INTO salaries (employee_code, minimum_salary, salary_coefficient, social_insurance, health_insurance, unemployment_insurance, allowance, income_tax) VALUES 
('1', 0, 0, 0, 0, 0, 0, 0),
('2', 5000000, 4, 0, 0, 0, 0, 0);

INSERT INTO salary_details (employee_code, basic_salary, social_insurance, health_insurance, unemployment_insurance, allowance, income_tax, bonus_money, discipline_money, pay_day, total_salary) VALUES 
('1', 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-07', 0),
('2', 5000000, 0, 0, 0, 0, 0, 0, 0, '2024-07-07', 0);

INSERT INTO salary_updates (employee_code, current_salary, salary_after_update, salary_coefficient, social_insurance, health_insurance, unemployment_insurance, allowance, income_tax, update_day) VALUES 
('1', 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-07'),
('2', 5000000, 5000000, 4, 0, 0, 0, 0, 0, '2024-07-07');