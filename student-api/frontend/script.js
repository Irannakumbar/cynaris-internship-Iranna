const API_URL = "http://127.0.0.1:8000/api/students";

// GET API - Load Students
async function getStudents(token = null) {
    if (!token) {
        token = prompt("Enter your Bearer Token:");
    }

    if (!token) {
        alert("Bearer token is required!");
        return;
    }

    try {
        const response = await fetch(API_URL, {
            method: "GET",
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${token}`
            }
        });

        const students = await response.json();

        if (!response.ok) {
            throw new Error(students.message || "Failed to fetch students");
        }

        const studentList = document.getElementById("studentList");
        studentList.innerHTML = "";

        const studentArray = Array.isArray(students)
            ? students
            : (students.data || []);

        if (studentArray.length === 0) {
            studentList.innerHTML = "<p>No students found.</p>";
            return;
        }

        studentArray.forEach(student => {
            studentList.innerHTML += `
                <div>
                    <h3>${student.name}</h3>
                    <p>ID: ${student.id}</p>
                    <p>Email: ${student.email}</p>
                    <p>Course: ${student.course}</p>
                </div>
                <hr>
            `;
        });

    } catch (error) {
        alert(error.message);
        console.error("GET API Error:", error);
    }
}


// POST API - Add New Student
async function addStudent() {
    const token = prompt("Enter your Bearer Token:");

    if (!token) {
        alert("Bearer token is required!");
        return;
    }

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const course = document.getElementById("course").value.trim();

    if (!name || !email || !course) {
        alert("Please fill all fields!");
        return;
    }

    try {
        const response = await fetch(API_URL, {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": `Bearer ${token}`
            },
            body: JSON.stringify({ name, email, course })
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.message || "Failed to add student");
        }

        alert("Student added successfully!");

        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("course").value = "";

        await getStudents(token);

    } catch (error) {
        alert(error.message);
        console.error("POST API Error:", error);
    }
}


// PUT API - Update Student
async function updateStudent() {
    const token = prompt("Enter your Bearer Token:");

    if (!token) {
        alert("Bearer token is required!");
        return;
    }

    const id = document.getElementById("updateId").value.trim();
    const name = document.getElementById("updateName").value.trim();
    const email = document.getElementById("updateEmail").value.trim();
    const course = document.getElementById("updateCourse").value.trim();

    if (!id || !name || !email || !course) {
        alert("Please fill all fields!");
        return;
    }

    try {
        const response = await fetch(`${API_URL}/${id}`, {
            method: "PUT",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "Authorization": `Bearer ${token}`
            },
            body: JSON.stringify({ name, email, course })
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.message || "Failed to update student");
        }

        alert("Student updated successfully!");

        document.getElementById("updateId").value = "";
        document.getElementById("updateName").value = "";
        document.getElementById("updateEmail").value = "";
        document.getElementById("updateCourse").value = "";

        await getStudents(token);

    } catch (error) {
        alert(error.message);
        console.error("PUT API Error:", error);
    }
}

async function deleteStudent() {
    const token = prompt("Enter your Bearer Token:");

    if (!token) {
        alert("Bearer token is required!");
        return;
    }

    const id = document.getElementById("deleteId").value.trim();

    if (!id) {
        alert("Please enter Student ID!");
        return;
    }

    if (!confirm(`Are you sure you want to delete student ID ${id}?`)) {
        return;
    }

    try {
        const response = await fetch(`${API_URL}/${id}`, {
            method: "DELETE",
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${token}`
            }
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(
                result.message || "Failed to delete student"
            );
        }

        alert("Student deleted successfully!");

        document.getElementById("deleteId").value = "";

        await getStudents(token);

    } catch (error) {
        alert(error.message);
        console.error("DELETE API Error:", error);
    }
}
// Load students when page opens
document.addEventListener("DOMContentLoaded", () => {
    getStudents();
});