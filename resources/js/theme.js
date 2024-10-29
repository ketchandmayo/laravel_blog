document.addEventListener('DOMContentLoaded', function () {
    const themeToggleButton = document.getElementById('theme-toggle');
    const html = $('html');

    themeToggleButton.addEventListener('click', function () {
        if (html.attr('data-bs-theme') === 'light') {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }

        $('#theme-icon').toggleClass('fa-sun fa-moon');
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-bs-theme', savedTheme);
    });
});
