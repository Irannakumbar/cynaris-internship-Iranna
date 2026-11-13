
const form = document.getElementById("transaction-form");

const descriptionInput = document.getElementById("description");
const amountInput = document.getElementById("amount");
const typeInput = document.getElementById("type");
const categoryInput = document.getElementById("category");
const dateInput = document.getElementById("date");

const balanceElement = document.getElementById("balance");
const incomeElement = document.getElementById("income");
const expenseElement = document.getElementById("expense");

const transactionList = document.getElementById("transaction-list");
const searchInput = document.getElementById("search");
const filterInput = document.getElementById("filter");

const chartElement = document.getElementById("expense-chart");
const chartTotal = document.getElementById("chart-total");

let transactions = [];

try {
    transactions = JSON.parse(
        localStorage.getItem("spendwise_transactions")
    ) || [];

    if (!Array.isArray(transactions)) {
        transactions = [];
    }
} catch {
    transactions = [];
}

// Currency formatter
function formatCurrency(amount) {
    return new Intl.NumberFormat("en-IN", {
        style: "currency",
        currency: "INR",
        maximumFractionDigits: 2
    }).format(amount);
}

// Set today's date
const today = new Date();
const localDate = [
    today.getFullYear(),
    String(today.getMonth() + 1).padStart(2, "0"),
    String(today.getDate()).padStart(2, "0")
].join("-");

dateInput.value = localDate;
dateInput.max = localDate;

document.getElementById("today-date").textContent =
    today.toLocaleDateString("en-IN", {
        day: "numeric",
        month: "short",
        year: "numeric"
    });

// Save data
function saveData() {
    localStorage.setItem(
        "spendwise_transactions",
        JSON.stringify(transactions)
    );
}

// Add transaction
form.addEventListener("submit", function(event) {
    event.preventDefault();

    const description = descriptionInput.value.trim();
    const amount = Number(amountInput.value);
    const type = typeInput.value;
    const category = categoryInput.value;
    const date = dateInput.value;

    if (
        !description ||
        !Number.isFinite(amount) ||
        amount <= 0 ||
        amount > 1000000000000 ||
        !date ||
        date > localDate
    ) {
        alert("Please enter valid transaction details.");
        return;
    }

    const transaction = {
        id: crypto.randomUUID(),
        description,
        amount,
        type,
        category,
        date
    };

    transactions.push(transaction);

    saveData();
    updateDashboard();

    form.reset();
    dateInput.value = localDate;
});

// Update dashboard
function updateDashboard() {

    const totalIncome = transactions
        .filter(item => item.type === "income")
        .reduce((sum, item) => sum + item.amount, 0);

    const totalExpense = transactions
        .filter(item => item.type === "expense")
        .reduce((sum, item) => sum + item.amount, 0);

    const balance = totalIncome - totalExpense;

    balanceElement.textContent = formatCurrency(balance);
    incomeElement.textContent = formatCurrency(totalIncome);
    expenseElement.textContent = formatCurrency(totalExpense);

    displayTransactions();
    updateAnalytics();
}

// Display transactions
function displayTransactions() {

    const searchText = searchInput.value.toLowerCase().trim();
    const selectedFilter = filterInput.value;

    const filteredTransactions = transactions
        .filter(item => {
            const matchesSearch =
                item.description.toLowerCase().includes(searchText) ||
                item.category.toLowerCase().includes(searchText);

            const matchesFilter =
                selectedFilter === "all" ||
                item.type === selectedFilter;

            return matchesSearch && matchesFilter;
        })
        .sort((a, b) => b.date.localeCompare(a.date));

    transactionList.innerHTML = "";

    if (filteredTransactions.length === 0) {
        transactionList.innerHTML = `
            <tr>
                <td colspan="5" class="no-data">
                    No transactions found.
                </td>
            </tr>
        `;
        return;
    }

    filteredTransactions.forEach(item => {

        const row = document.createElement("tr");

        const descriptionCell = document.createElement("td");
        descriptionCell.textContent = item.description;

        const categoryCell = document.createElement("td");
        const badge = document.createElement("span");
        badge.className = "category-badge";
        badge.textContent = item.category;
        categoryCell.appendChild(badge);

        const dateCell = document.createElement("td");
        dateCell.textContent = new Date(
            item.date + "T00:00:00"
        ).toLocaleDateString("en-IN");

        const amountCell = document.createElement("td");
        amountCell.className =
            item.type === "income"
                ? "amount-income"
                : "amount-expense";

        amountCell.textContent =
            (item.type === "income" ? "+" : "-") +
            formatCurrency(item.amount);

        const actionCell = document.createElement("td");
        const deleteButton = document.createElement("button");

        deleteButton.textContent = "Delete";
        deleteButton.className = "delete-btn";

        deleteButton.addEventListener("click", () => {
            deleteTransaction(item.id);
        });

        actionCell.appendChild(deleteButton);

        row.append(
            descriptionCell,
            categoryCell,
            dateCell,
            amountCell,
            actionCell
        );

        transactionList.appendChild(row);
    });
}

// Delete transaction
function deleteTransaction(id) {

    if (!confirm("Are you sure you want to delete this transaction?")) {
        return;
    }

    transactions = transactions.filter(
        item => item.id !== id
    );

    saveData();
    updateDashboard();
}

// Category-wise expense analytics
function updateAnalytics() {

    const categoryTotals = {};

    transactions
        .filter(item => item.type === "expense")
        .forEach(item => {
            categoryTotals[item.category] =
                (categoryTotals[item.category] || 0) + item.amount;
        });

    const total = Object.values(categoryTotals)
        .reduce((sum, amount) => sum + amount, 0);

    chartTotal.textContent = formatCurrency(total);
    chartElement.innerHTML = "";

    const categories = Object.entries(categoryTotals)
        .sort((a, b) => b[1] - a[1]);

    if (categories.length === 0) {
        chartElement.innerHTML =
            '<p class="empty-chart">Add expenses to see analytics.</p>';

        return;
    }

    categories.forEach(([category, amount]) => {

        const percentage = (amount / total) * 100;

        const row = document.createElement("div");
        row.className = "chart-row";

        const name = document.createElement("span");
        name.textContent = category;

        const track = document.createElement("div");
        track.className = "bar-track";

        const fill = document.createElement("div");
        fill.className = "bar-fill";
        fill.style.width = `${percentage}%`;

        track.appendChild(fill);

        const value = document.createElement("span");
        value.className = "chart-value";
        value.textContent = `${percentage.toFixed(1)}%`;

        row.append(name, track, value);
        chartElement.appendChild(row);
    });
}

// Search
searchInput.addEventListener("input", displayTransactions);

// Filter
filterInput.addEventListener("change", displayTransactions);

// Export transactions to CSV
document.getElementById("export-btn").addEventListener("click", function() {

    if (transactions.length === 0) {
        alert("No transactions available to export.");
        return;
    }

    const headers = [
        "Description",
        "Amount",
        "Type",
        "Category",
        "Date"
    ];

    const rows = transactions.map(item => [
        item.description,
        item.amount,
        item.type,
        item.category,
        item.date
    ]);

    const csv = [headers, ...rows]
        .map(row =>
            row.map(value =>
                `"${String(value).replace(/"/g, '""')}"`
            ).join(",")
        )
        .join("\r\n");

    const blob = new Blob(
        ["\uFEFF" + csv],
        { type: "text/csv;charset=utf-8;" }
    );

    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");

    link.href = url;
    link.download = "spendwise-transactions.csv";
    link.click();

    URL.revokeObjectURL(url);
});

// Initial load
updateDashboard();
