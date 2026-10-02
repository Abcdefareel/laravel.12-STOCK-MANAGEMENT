import "./bootstrap";

const themeButtons = document.querySelectorAll("[data-theme-choice]");

function setTheme(theme) {
    document.documentElement.dataset.theme = theme;
    localStorage.setItem("stokrapi-theme", theme);

    themeButtons.forEach((button) => {
        const active = button.dataset.themeChoice === theme;
        button.classList.toggle("is-active", active);
        button.setAttribute("aria-pressed", String(active));
    });
}

setTheme(document.documentElement.dataset.theme || "light");

themeButtons.forEach((button) => {
    button.addEventListener("click", () =>
        setTheme(button.dataset.themeChoice),
    );
});
