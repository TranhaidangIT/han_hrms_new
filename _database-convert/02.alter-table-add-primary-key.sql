-- Bổ sung khóa chính tự tăng cho các bảng trong cơ sở dữ liệu
-- Các bảng được bổ sung khóa chính tự tăng bao gồm:
-- 1. after_universities
-- 2. bonuses
-- 3. disciplines
-- 4. foreign_languages
-- 5. salaries
-- 6. salary_details
-- 7. salary_updates
-- 8. scientific_research_topics
-- 9. scientific_works
-- 10. unit_used
-- 11. universities
-- 12. working_processes

-- after_universities
ALTER TABLE after_universities 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng after_universities' FIRST;

-- bonuses
ALTER TABLE bonuses 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng bonuses' FIRST;

-- disciplines
ALTER TABLE disciplines 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng disciplines' FIRST;

-- foreign_languages
ALTER TABLE foreign_languages 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng foreign_languages' FIRST;

-- salaries
ALTER TABLE salaries 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng salaries' FIRST;

-- salary_details
ALTER TABLE salary_details 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng salary_details' FIRST;

-- salary_updates
ALTER TABLE salary_updates 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng salary_updates' FIRST;

-- scientific_research_topics
ALTER TABLE scientific_research_topics 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng scientific_research_topics' FIRST;

-- scientific_works
ALTER TABLE scientific_works 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng scientific_works' FIRST;

-- unit_used
ALTER TABLE unit_used 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng unit_used' FIRST;

-- universities
ALTER TABLE universities 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng universities' FIRST;

-- working_processes
ALTER TABLE working_processes 
ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Khóa chính tự tăng của bảng working_processes' FIRST;