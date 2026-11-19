
// 1. Arrow Function
const greet = (name) => {
    return `Hello, ${name}! Welcome to JavaScript.`;
};

// 2. Default Parameters
const calculateTotal = (price, quantity = 1) => {
    return price * quantity;
};

// 3. Rest Operator
const calculateSum = (...numbers) => {
    return numbers.reduce((total, num) => total + num, 0);
};

// 4. Spread Operator
const mergeArrays = (arr1, arr2) => {
    return [...arr1, ...arr2];
};

// 5. Array Map
const squareNumbers = (numbers) => {
    return numbers.map(num => num * num);
};

// 6. Array Filter
const filterEvenNumbers = (numbers) => {
    return numbers.filter(num => num % 2 === 0);
};

// 7. Array Reduce
const calculateAverage = (numbers) => {
    if (numbers.length === 0) return 0;

    const total = numbers.reduce((sum, num) => sum + num, 0);
    return total / numbers.length;
};

// 8. Object Destructuring
const getStudentDetails = (student) => {
    const { name, age, course } = student;

    return `Name: ${name}, Age: ${age}, Course: ${course}`;
};

// 9. Object Creation and Updating
const updateStudent = (student, newCity) => {
    return { ...student, city: newCity };
};

// 10. Higher-Order Function
const applyOperation = (a, b, operation) => {
    return operation(a, b);
};


// ==========================================
// TESTING THE 10 FUNCTIONS
// ==========================================

console.log("1. Greeting:", greet("Iranna"));

console.log("2. Total Price:", calculateTotal(500, 3));

console.log("3. Sum:", calculateSum(10, 20, 30, 40));

console.log("4. Merged Arrays:", mergeArrays([1, 2], [3, 4]));

console.log("5. Squares:", squareNumbers([1, 2, 3, 4]));

console.log("6. Even Numbers:", filterEvenNumbers([1, 2, 3, 4, 5, 6]));

console.log("7. Average:", calculateAverage([10, 20, 30, 40]));

const student = {
    name: "Iranna",
    age: 23,
    course: "MCA"
};

console.log("8. Student Details:", getStudentDetails(student));

console.log("9. Updated Student:", updateStudent(student, "Hubli"));

console.log(
    "10. Multiplication:",
    applyOperation(5, 4, (a, b) => a * b)
);


// ==========================================
// PROMISE EXAMPLE
// ==========================================

const checkPromise = () => {
    return new Promise((resolve, reject) => {
        const success = true;

        if (success) {
            resolve("Promise executed successfully!");
        } else {
            reject("Promise failed!");
        }
    });
};

checkPromise()
    .then(result => console.log(result))
    .catch(error => console.error(error));


// ==========================================
// ASYNC / AWAIT AND FETCH API
// ==========================================

const fetchUsers = async () => {
    try {
        console.log("\nFetching users from API...");

        const response = await fetch(
            "https://jsonplaceholder.typicode.com/users"
        );

        if (!response.ok) {
            throw new Error(`HTTP Error: ${response.status}`);
        }

        const users = await response.json();

        console.log("\nAPI DATA - USER DETAILS");

        users.forEach(user => {
            console.log(
                `ID: ${user.id}, Name: ${user.name}, Email: ${user.email}`
            );
        });

    } catch (error) {
        console.error("Error fetching users:", error.message);
    }
};

// Execute API function
fetchUsers();
