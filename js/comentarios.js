const comentarios = document.querySelectorAll('.comentario');
let index = 0;

function mostrarComentarios() {
    // Esconde todos os comentários
    comentarios.forEach(comentario => {
        comentario.style.display = 'none';
    });

    // Mostra o comentário atual
    comentarios[index].style.display = 'flex';

    // Atualiza o índice para o próximo comentário
    index = (index + 1) % comentarios.length; // Volta ao primeiro após o último

    // Define o intervalo de 5 segundos
    setTimeout(mostrarComentarios, 5000);
}

// Inicia a função ao carregar a página
window.onload = mostrarComentarios;
