
-- 1. Create the database and tables

CREATE DATABASE UniversityDB;
USE UniversityDB;

CREATE TABLE Departments (
    department_id INT PRIMARY KEY,
    department_name VARCHAR(100)
);

CREATE TABLE Chairmen (
    chairman_id INT PRIMARY KEY,
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES Departments(department_id)
);

CREATE TABLE Teachers (
    teacher_id INT PRIMARY KEY,
    teacher_name VARCHAR(100),
    teacher_type ENUM('visiting', 'part_time', 'full_time'),
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES Departments(department_id)
);

CREATE TABLE Courses (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(100),
    course_fee DECIMAL(10, 2)
);

CREATE TABLE Students (
    university_id INT PRIMARY KEY,
    name VARCHAR(100),
    phone_number VARCHAR(15),
    city VARCHAR(50),
    street VARCHAR(100),
    zip VARCHAR(10)
);

CREATE TABLE StudentCourses (
    university_id INT,
    course_id INT,
    semester VARCHAR(10),
    PRIMARY KEY (university_id, course_id),
    FOREIGN KEY (university_id) REFERENCES Students(university_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

CREATE TABLE CourseTeachers (
    course_id INT,
    teacher_id INT,
    PRIMARY KEY (course_id, teacher_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id),
    FOREIGN KEY (teacher_id) REFERENCES Teachers(teacher_id)
);

-- 2. Insert data into all tables

INSERT INTO Departments (department_id, department_name) VALUES
(1, 'Computer Science'),
(2, 'Mathematics'),
(3, 'Physics');

INSERT INTO Chairmen (chairman_id, department_id) VALUES
(1, 1),
(2, 2),
(3, 3);

INSERT INTO Teachers (teacher_id, teacher_name, teacher_type, department_id) VALUES
(1, 'John Doe', 'full_time', 1),
(2, 'Jane Smith', 'part_time', 2),
(3, 'Albert Einstein', 'visiting', 3);

INSERT INTO Courses (course_id, course_name, course_fee) VALUES
(1, 'Data Structures', 2500),
(2, 'Calculus', 1800),
(3, 'Quantum Mechanics', 3000);

INSERT INTO Students (university_id, name, phone_number, city, street, zip) VALUES
(1, 'Mohamed Ali', '1234567890', 'Cairo', 'Ahrir Street', '11511'),
(2, 'Ahmed Hassan', '0987654321', 'Giza', 'Pyramids Street', '12511'),
(3, 'Medhat Farouk', '1122334455', 'Alexandria', 'Corniche', '21500');

INSERT INTO StudentCourses (university_id, course_id, semester) VALUES
(1, 1, 'Fall 2024'),
(1, 2, 'Spring 2024'),
(2, 1, 'Fall 2024'),
(3, 3, 'Spring 2024');

INSERT INTO CourseTeachers (course_id, teacher_id) VALUES
(1, 1),
(2, 2),
(3, 3);

-- 3. Select course name and course teacher name where course fee more than 2000
SELECT c.course_name, t.teacher_name
FROM Courses c
JOIN CourseTeachers ct ON c.course_id = ct.course_id
JOIN Teachers t ON ct.teacher_id = t.teacher_id
WHERE c.course_fee > 2000;

-- 4. Count the number of students that enroll in a specific course
SELECT c.course_name, COUNT(sc.university_id) AS student_count
FROM Courses c
JOIN StudentCourses sc ON c.course_id = sc.course_id
WHERE c.course_id = 1 -- Specific course, e.g., course_id = 1
GROUP BY c.course_name;

-- 5. Select students where their names contain 'med'
SELECT * FROM Students
WHERE name LIKE '%med%';

-- 6. Update courses fee, increase the fee by 5% when fees are less than 1500
UPDATE Courses
SET course_fee = course_fee * 1.05
WHERE course_fee < 1500;

-- 7. Delete chairman of id=3
DELETE FROM Chairmen
WHERE chairman_id = 3;
