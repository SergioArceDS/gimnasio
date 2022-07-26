const botones = document.querySelectorAll('.btnEliminar');

botones.forEach(boton => {
    boton.addEventListener("click", function(){
        const idProducto = this.dataset.id;

        document.getElementById('idProductoEliminar').value = idProducto;
    });
});


const botonesEditar = document.querySelectorAll('.btnEditar');

botonesEditar.forEach(boton => {
    boton.addEventListener("click", function(){
        const idProducto = this.dataset.id;
        
        httpRequest("http://localhost/curso/gimnasio/productos/getDatosProducto/" + idProducto, function(){
            console.log(JSON.parse(this.responseText)); 
            var producto = JSON.parse(this.responseText);
            document.getElementById('idProductoEdit').value = producto.id_producto;
            document.getElementById('inputEditarNombre').value = producto.nombre;
            document.getElementById('inputEditarCantidad').value = producto.cantidad_disponible;
            document.getElementById('inputEditarCosto').value = producto.costo;
            document.getElementById('inputEditarDescripcion').value = producto.descripcion;

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