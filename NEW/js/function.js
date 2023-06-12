$(document).ready(function () {
    $("#botonCrear").click(function () {
        $("#formulario")[0].reset();
        $(".modal-title").text("Crear Usuario");
        $("#action").val("Crear");
        $("#operacion").val("Crear");
        $("#imagen_subida").html("");

    });

    var dataTable = $('#datos_usuario').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "php/obtener_registros.php",
            type: "POST"
        },
        "columnsDefs": [
            {
                "targets": [0, 3, 4],
                "orderable": false,
            },
        ]


    });




    $(document).on('click', '.editar', function () {
        var id_usuario = $(this).attr("id");
        $.ajax({
            url: "php/obtener_registro.php",
            method: "POST",
            data: { id_usuario: id_usuario },
            dataType: "json",
            success: function (data) {
                $('#modalUsuario').modal('show');

                $('#ci').val(data.ci);
                $('#nombre').val(data.nombre);
                $('#apellidos').val(data.apellidos);
                $('#telefono').val(data.telefono);
                $('#direccion').val(data.direccion);
                $('#email').val(data.email);
                $('#marca').val(data.marca);
                $('#modelo').val(data.modelo);
                $('#serials').val(data.serials);
                $('#tipo_servicio').val(data.tipo_servicio);
                $('#detalles').val(data.detalles);
                $('#observaciones').val(data.observaciones);
                $('.modal-title').text("Editar Usuario");
                $('#id_usuario').val(id_usuario);
                $('#imagen_subida').html(data.imagen_usuario);
                $('#action').val("Editar");
                $('#operacion').val("Editar");

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        })
    });


    $(document).on('click', '.borrar', function () {
            var id_usuario = $(this).attr("id");
        if (confirm("Esta seguro de borrar este registro" + id_usuario)) {
            $.ajax({
                url: "php/borrar.php",
                method: "POST",
                data: { id_usuario: id_usuario },
                success: function (data) {
                    alert(data);
                    dataTable.ajax.reload();
                }
            });
        } else {
            return false;
        }
    });






});
