import "./bootstrap";
document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const toggleBtn = document.getElementById("theme-toggle");
    const sunIcon = document.getElementById("sun-icon");
    const moonIcon = document.getElementById("moon-icon");

    let theme = localStorage.getItem("theme") || "light";
    html.setAttribute("data-theme", theme);

    updateUI(theme);

    toggleBtn?.addEventListener("click", () => {
        theme = theme === "light" ? "dark" : "light";
        html.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
        updateUI(theme);
    });

    function updateUI(theme) {
        if (theme === "dark") {
            sunIcon.classList.remove("hidden");
            moonIcon.classList.add("hidden");

            toggleBtn.classList.remove("btn-neutral");
            toggleBtn.classList.add("btn-primary");
        } else {
            sunIcon.classList.add("hidden");
            moonIcon.classList.remove("hidden");

            toggleBtn.classList.remove("btn-primary");
            toggleBtn.classList.add("btn-neutral");
        }
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const toggleBtn = document.getElementById("theme-toggle");
    const lightIcon = document.getElementById("theme-toggle-light-icon");
    const darkIcon = document.getElementById("theme-toggle-dark-icon");

    if (!localStorage.getItem("theme")) {
        const prefersDark = window.matchMedia(
            "(prefers-color-scheme: dark)"
        ).matches;
        localStorage.setItem("theme", prefersDark ? "dark" : "light");
    }

    const theme = localStorage.getItem("theme") || "light";
    html.setAttribute("data-theme", theme);

    if (theme === "dark") {
        lightIcon.classList.add("hidden");
        darkIcon.classList.remove("hidden");
    } else {
        lightIcon.classList.remove("hidden");
        darkIcon.classList.add("hidden");
    }

    toggleBtn.addEventListener("click", () => {
        const current = html.getAttribute("data-theme");
        const newTheme = current === "dark" ? "light" : "dark";

        html.setAttribute("data-theme", newTheme);
        localStorage.setItem("theme", newTheme);

        lightIcon.classList.toggle("hidden");
        darkIcon.classList.toggle("hidden");
    });
});
