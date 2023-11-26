// public/js/menu.js

document.addEventListener('DOMContentLoaded', function () {
    var menuIcon = document.getElementById('menuIcon');
    var menuOptions = document.getElementById('menuOptions');

    menuIcon.addEventListener('click', function () {
        menuOptions.style.display = (menuOptions.style.display === 'block') ? 'none' : 'block';
    });

    // Fechar o menu ao clicar fora dele
    document.addEventListener('click', function (event) {
        if (!menuIcon.contains(event.target) && !menuOptions.contains(event.target)) {
            menuOptions.style.display = 'none';
        }
    });
});