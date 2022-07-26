const botones = document.querySelectorAll('.btnEliminar');

botones.forEach(boton => {
    boton.addEventListener("click", function(){
        const idUsuario = this.dataset.id;

        document.getElementById('idUsuarioEliminar').value = idUsuario;
    });
});