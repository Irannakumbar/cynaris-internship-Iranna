
const taskInput = document.querySelector("#taskInput");
const addBtn = document.querySelector("#addBtn");
const taskList = document.querySelector("#taskList");

// Restore saved tasks
let tasks = JSON.parse(localStorage.getItem("tasks")) || [];

// Save tasks in localStorage
function saveTasks() {
    localStorage.setItem("tasks", JSON.stringify(tasks));
}

// Display tasks
function displayTasks() {
    taskList.innerHTML = "";

    tasks.forEach((task, index) => {
        const li = document.createElement("li");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.checked = task.completed;

        const span = document.createElement("span");
        span.textContent = task.text;

        if (task.completed) {
            span.classList.add("completed");
        }

        const deleteBtn = document.createElement("button");
        deleteBtn.textContent = "Delete";
        deleteBtn.classList.add("delete-btn");

        li.appendChild(checkbox);
        li.appendChild(span);
        li.appendChild(deleteBtn);

        taskList.appendChild(li);
    });
}

// Add task
function addTask() {
    const text = taskInput.value.trim();

    if (text === "") {
        alert("Please enter a task!");
        return;
    }

    tasks.push({
        text: text,
        completed: false
    });

    taskInput.value = "";
    saveTasks();
    displayTasks();
}

addBtn.addEventListener("click", addTask);

// Event delegation
taskList.addEventListener("click", function(event) {
    const li = event.target.closest("li");

    if (!li) return;

    const index = Array.from(taskList.children).indexOf(li);

    if (event.target.type === "checkbox") {
        tasks[index].completed = event.target.checked;
    }

    if (event.target.classList.contains("delete-btn")) {
        tasks.splice(index, 1);
    }

    saveTasks();
    displayTasks();
});

// Load saved tasks
displayTasks();
