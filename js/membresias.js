const botones = document.querySelectorAll('.btnEliminar');

botones.forEach(boton => {
    boton.addEventListener("click", function(){
        const idMembresia = this.dataset.id;

        document.getElementById('idMembresiaEliminar').value = idMembresia;
    });
});