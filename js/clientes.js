const botones = document.querySelectorAll('.btnEliminar');

botones.forEach(boton => {
    boton.addEventListener("click", function(){
        const idCliente = this.dataset.id;

        document.getElementById('idClienteEliminar').value = idCliente;
    });
});

const botonesEditar = document.querySelectorAll('.btnEditar');

botonesEditar.forEach(boton => {
    boton.addEventListener("click", function(){
        const idCliente = this.dataset.id;
        
        httpRequest("http://localhost/curso/gimnasio/clientes/getDatosCliente/" + idCliente, function(){
            console.log(JSON.parse(this.responseText)); 
            var cliente = JSON.parse(this.responseText);
            document.getElementById('idClienteEdit').value = cliente.id_cliente;
            document.getElementById('inputEditarNombre').value = cliente.nombre_cliente;
            document.getElementById('inputEditarApellido').value = cliente.apellidos;
            document.getElementById('inputEditarPeso').value = cliente.peso;
            document.getElementById('inputEditarAltura').value = cliente.altura;
            document.getElementById('inputEditarCelular').value = cliente.celular;
            document.getElementById('inputEditarEdad').value = cliente.edad;
        });
    });
    
});

function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}