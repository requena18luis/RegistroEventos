$(document).ready(function() {
   
    // Función para editar evento
    $('.editarEvent').on("click", function() {
        var id = $(this).attr("data-id");
        var title = $("td#title" + id).html();
        var description = $("td#description" + id).html();
        var start_date = $("td#start_date" + id).html();
        var end_date = $("td#end_date" + id).html();
        var html = `
            <label for="title">Título:</label><br>
            <input type="text" id="title" name="title" value="${title}" required><br><br>

            <label for="description">Descripción:</label><br>
            <textarea id="description" name="description" rows="4" required>${description}</textarea><br><br>

            <label for="start_date">Fecha de Inicio:</label><br>
            <input type="datetime-local" id="start_date" name="start_date" value="${start_date}" required><br><br>

            <label for="end_date">Fecha de Fin:</label><br>
            <input type="datetime-local" id="end_date" name="end_date" value="${end_date}" required><br><br>

            <button class="btn btn-primary" onclick="editarF(${id})">EDITAR</button>
        `;
        Swal.fire({
            title: "EDITAR EVENTO",
            html: html,
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false
        });
    });

    $('.agregarEvent').on("click",function(){
        var html = `
        <label for="title">Título:</label><br>
        <input type="text" id="title" name="title" value="" required><br><br>

        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <label for="start_date">Fecha de Inicio:</label><br>
        <input type="datetime-local" id="start_date" name="start_date" required><br><br>

        <label for="end_date">Fecha de Fin:</label><br>
        <input type="datetime-local" id="end_date" name="end_date" required><br><br>
        <button class="btn btn-success" onclick="agregarF()">AGREGAR</button>
        `;
        Swal.fire({
            title: "AGREGAR EVENTO",
            html: html,
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false
        });
    });
    $('#eventTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            
        }
    });
});
function editarF(id){
    $.ajax({
        url:'events/edit/'+id,type:'post',data:{
            "title":$("input#title").val()
            ,"description":$("textarea#description").val()
            ,"start_date":$("input#start_date").val()
            ,"end_date":$("input#end_date").val()
        }
    }).done(function(re){
        window.location.reload();
    })
}
function agregarF(){
    $.ajax({
        url:'events/create',type:'post',data:{
            "title":$("input#title").val()
            ,"description":$("textarea#description").val()
            ,"start_date":$("input#start_date").val()
            ,"end_date":$("input#end_date").val()
        }
    }).done(function(re){
        window.location.reload();
    })
}
