const students = [
    { name: "Iranna", marks: 85, course: "MCA" },
    { name: "Aditya", marks: 65, course: "MCA" },
    { name: "Sharth", marks: 90, course: "MCA" },
    { name: "Rahul", marks: 45, course: "MCA" }
];

// 2. Array destructuring
const [firstStudent, secondStudent] = students;
console.log("First Student:", firstStudent.name);
// 3. Object destructuring
const { name, marks, course } = firstStudent;
console.log(`${name} scored ${marks} in ${course}`);
// 4. Arrow function
const displayMessage = () => {
    console.log("Student Management System");
};
displayMessage();
// 5. Filter - Get passed students
const passedStudents = students.filter(
    student => student.marks >= 50
);
// 6. Map - Get student names
const studentNames = students.map(
    student => student.name
);
console.log("Student Names:", studentNames);
// 7. Reduce - Calculate total marks
const totalMarks = students.reduce(
    (total, student) => total + student.marks,
    0
);
console.log("Total Marks:", totalMarks);
// 8. Interactive component
const studentList = document.getElementById("studentList");
const totalMarksElement = document.getElementById("totalMarks");
const displayStudents = (data) => {
    studentList.innerHTML = "";
    data.forEach(({ name, marks }) => {
        const li = document.createElement("li");
        li.textContent = `${name} - ${marks} marks`;
        studentList.appendChild(li);
    });
};
// Display all students
document.getElementById("showAll").addEventListener("click", () => {
    displayStudents(students);
});
// Display passed students
document.getElementById("showPassed").addEventListener("click", () => {
    displayStudents(passedStudents);
});
// Display total marks
totalMarksElement.textContent = totalMarks;
// Initial display
displayStudents(students);