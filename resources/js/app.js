import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    // Icons & Toggle Button
    const toggleBtn = document.getElementById("theme-toggle");
    const lightIcon = document.getElementById("theme-toggle-light-icon");
    const darkIcon = document.getElementById("theme-toggle-dark-icon");
    const html = document.documentElement;

    // Helper to apply theme
    function applyTheme(isDark) {
        if (isDark) {
            html.classList.add("dark");
            html.setAttribute("data-theme", "halloween");
            if (lightIcon) lightIcon.classList.remove("hidden");
            if (darkIcon) darkIcon.classList.add("hidden");
            localStorage.setItem("color-theme", "dark");
        } else {
            html.classList.remove("dark");
            html.setAttribute("data-theme", "light");
            if (lightIcon) lightIcon.classList.add("hidden");
            if (darkIcon) darkIcon.classList.remove("hidden");
            localStorage.setItem("color-theme", "light");
        }
    }

    // Initial Check
    const storedTheme = localStorage.getItem("color-theme");
    const systemDark = window.matchMedia(
        "(prefers-color-scheme: dark)"
    ).matches;

    if (storedTheme === "dark" || (!storedTheme && systemDark)) {
        applyTheme(true);
    } else {
        applyTheme(false);
    }

    // Event Listener for Theme Toggle
    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            const isDark = html.classList.contains("dark");
            applyTheme(!isDark);
        });
    }

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const sidebar = document.getElementById("sidebar");
    const mobileOverlay = document.getElementById("mobile-overlay");

    if (mobileMenuBtn && sidebar && mobileOverlay) {
        mobileMenuBtn.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
            mobileOverlay.classList.toggle("hidden");
        });

        mobileOverlay.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
            mobileOverlay.classList.add("hidden");
        });
    }
});
