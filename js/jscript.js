$(document).ready(function() {
   listar();

});

function listar() {
    $.ajax({
        type: "POST",
        url: "../Controlador/listarController.php",
        data: {},
        dataType: "json",
        success: function (res) {
            var lis="";
            $.each(res, function (i, mascota) { 
                 lis += "<tr>";
                 lis += "<th scope='row'>"+mascota.id+"</th>";
                 lis += "<td>"+mascota.nombre+"</td>";
                 lis += "<td>"+mascota.raza+"</td>";
                 lis += "<td><button type='button' class='btn btn-outline-warning boton' data-id='"+mascota.id+"'  data-nombre='"+mascota.nombre+"'  data-raza='"+mascota.raza+"' data-bs-toggle='modal' data-bs-target='#myModal'>Actualizar</button></td>";
                 lis += "<td><button class='btn btn-outline-danger eliminar' data-id='"+mascota.id+"' >Eliminar</button></td>";
                 lis += "</tr>";
            });

           $("#tabla_mascota").append(lis);

        }
    });
}

$(document).on("click", ".boton", function() {
    $('#myModal').on('hidden.bs.modal', function () {
        $("#nombre").val("");
        $("#raza").val("");
    });
    
    var id = $(this).data("id");
    var nombre = $(this).data("nombre");
    var raza = $(this).data("raza");
    
//    mostar datos en el modal
    $('#myModal').modal('show');
    $("#id").val(id);
    $("#nombre").val(nombre);
    $("#raza").val(raza);
    

});

$(document).on("click", ".eliminar", function () {
    var eliminar = $(this).data("id");

    $.ajax({
        url: "../Controlador/appController.php",
        type: "POST",
        data: { id: eliminar }, 
        success: function () {
            location.reload();
        }
    });
});



   
$(".actualizar").click(function() {
        var formData = $("#formulario").serialize();
        $.ajax({
            url: "../Controlador/actualizarController.php",
            type: "POST",
            data: formData,
        })
        location.reload();
    });


$(".guardar").click(function() {
        $("#formulario input[name='id']").prop("disabled", true);
        var formData = $("#formulario").serialize();
        $.ajax({
            url: "../Controlador/appController.php",
            type: "POST",
            data: formData,
        })
        location.reload();
    });
  


const exampleModal = document.getElementById('myModal')
if (exampleModal) {
  exampleModal.addEventListener('show.bs.modal', event => {
  })
}
