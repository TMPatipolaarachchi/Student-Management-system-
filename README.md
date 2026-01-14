
# 🎓 Student Management System

**Laravel & MySQL Web Application**
![Uploading Screenshot (124).png…]()

<img width="1920" height="1080" alt="Screenshot (125)" src="https://github.com/user-attachments/assets/89c808cd-4d7f-4565-8410-a58a211ff914" />

<img width="1920" height="1080" alt="Screenshot (126)" src="https://github.com/user-attachments/assets/1f76a8ff-1f95-4a47-b40b-bd60ab238489" />

## 📌 Project Description
The **Student Management System** is a Laravel-based web application designed to manage student records efficiently within an educational environment.
The system follows the **MVC (Model–View–Controller)** architecture and provides full **CRUD functionality** for student data management.

This project is developed using **Laravel, MySQL, Blade templates, and Tailwind CSS**, ensuring clean code structure, scalability, and maintainability.

---

## 🚀 Key Features

* Student Registration & Record Management
* Create, View, Update & Delete (CRUD) Operations
* Parent Information Management
* Student Status Tracking
* Server-side validation using Laravel Requests
* Flash messages for user feedback
* Responsive UI with Blade & Tailwind CSS

---

## 🧠 Core Functionalities (CRUD)

The system implements complete CRUD operations via `StudentController`:

| Operation | Method              | Description                       |
| --------- | ------------------- | --------------------------------- |
| Create    | `store()`           | Add new student records           |
| Read      | `index()`, `show()` | View student list and details     |
| Update    | `update()`          | Edit existing student information |
| Delete    | `destroy()`         | Remove student records            |

---

## 🛠️ Technologies Used

* **Backend:** Laravel (PHP)
* **Frontend:** Blade, Tailwind CSS, Alpine.js
* **Database:** MySQL
* **Build Tool:** Vite
* **Version Control:** Git & GitHub

---

## 📂 Project Structure

```
app/
 └── Http/
     └── Controllers/
         └── StudentController.php

resources/
 └── views/
     ├── student/
     ├── teacher/
     ├── layouts/

routes/
 └── web.php

database/
 └── migrations/
```

---

## ⚙️ Installation & Configuration

### 1️⃣ Clone Repository

```bash
git clone https://github.com/TMpatipolaarachchi/Student-Management-system-.git
cd Student-Management-system-
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install
```

### 3️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Configure MySQL database in `.env`:

```env
DB_DATABASE=student_management
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Run Migrations

```bash
php artisan migrate
```

### 5️⃣ Start Development Server

```bash
php artisan serve
npm run dev
```

Visit:

```
http://127.0.0.1:8000
```

---

## 📌 Controller Example

```php
public function update(Request $request, Student $student)
{
    $student->update([
        'student_id' => $request->student_id,
        'grade' => $request->grade,
        'class' => $request->class,
        'parent_name' => $request->parent_name,
        'parent_phone' => $request->parent_phone,
        'parent_email' => $request->parent_email,
        'status' => $request->status,
        'notes' => $request->notes,
    ]);

    return redirect()->route('teacher.students.index')
        ->with('success', 'Student updated successfully!');
}
```

---

## 🔮 Future Enhancements

* Authentication & Role-based Access Control
* Attendance Management
* Course & Subject Modules
* Report Generation (PDF / Excel)
* REST API Support

---


