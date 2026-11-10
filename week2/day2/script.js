
// Select the menu button and navigation links
const menuToggle = document.getElementById("menu-toggle");
const navLinks = document.getElementById("nav-links");

// Mobile navigation toggle
menuToggle.addEventListener("click", function () {

    // Add or remove the active class
    navLinks.classList.toggle("active");

    // Update accessibility state
    const isExpanded = navLinks.classList.contains("active");

    menuToggle.setAttribute("aria-expanded", isExpanded);

    // Change menu icon
    menuToggle.textContent = isExpanded ? "✕" : "☰";

});

// Close menu when a navigation link is clicked
const navItems = document.querySelectorAll(".nav-links a");

navItems.forEach(function (item) {

    item.addEventListener("click", function () {

        navLinks.classList.remove("active");

        menuToggle.setAttribute("aria-expanded", "false");

        menuToggle.textContent = "☰";

    });

});
