<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Manager</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Eventos</h1>

        <table class="table" id="eventTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Fin</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td id="title<?php echo $event['id']; ?>"><?php echo $event['title']; ?></td>
                        <td id="description<?php echo $event['id']; ?>"><?php echo $event['description']; ?></td>
                        <td id="start_date<?php echo $event['id']; ?>"><?php echo $event['start_date']; ?></td>
                        <td id="end_date<?php echo $event['id']; ?>"><?php echo $event['end_date']; ?></td>
                        <td>
                            <a class="btn btn-primary editarEvent" data-id="<?php echo $event['id']; ?>">Editar</a>
                            <a href="<?php echo base_url('events/delete/'.$event['id']); ?>" class="btn btn-danger deleteEvent" data-event-id="<?php echo $event['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-success agregarEvent">Agregar Nuevo Evento</a>
    </div>
</body>
</html>
