document.addEventListener('DOMContentLoaded', function () {
    var avatar = document.getElementById('avatar');
    var alterarFoto = document.getElementById('alterarFoto');
    var sairAvatar = document.getElementById('sairAvatar');

    // Adiciona a classe "ocultarAlterarFoto" inicialmente
    alterarFoto.classList.add('ocultarAlterarFoto');
    sairAvatar.classList.add('ocultarAlterarFoto');

    avatar.addEventListener('click', function () {
        // Alterna entre as classes "mostrarAlterarFoto" e "ocultarAlterarFoto"
        alterarFoto.classList.toggle('mostrarAlterarFoto');
        alterarFoto.classList.toggle('ocultarAlterarFoto');
        sairAvatar.classList.toggle('mostrarAlterarFoto');
        sairAvatar.classList.toggle('ocultarAlterarFoto');
    });

    // Fechar ao clicar fora da foto
    document.addEventListener('click', function (event) {
        if (!avatar.contains(event.target) && !alterarFoto.contains(event.target)) {
            alterarFoto.classList.remove('mostrarAlterarFoto');
            alterarFoto.classList.add('ocultarAlterarFoto');
            sairAvatar.classList.remove('mostrarAlterarFoto');
            sairAvatar.classList.add('ocultarAlterarFoto');
        }
    });
});
