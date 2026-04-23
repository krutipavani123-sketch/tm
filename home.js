$(document).ready(function () {

    $('#table').bootstrapTable({
        url: 'fetch.php',

        pagination: true,
        sidePagination: 'server',
        

        pageSize: 5,
        pageList: [3, 5, 10, 25],

        search: true,

        sortName: 'id',
        sortOrder: 'asc'
    });

    // LOAD COUNTS
    $('#table').on('load-success.bs.table', function (e, data) {
        $('#totalTasks').html("Total: " + data.total);
        $('#pendingTasks').html("Pending: " + data.counts.pending);
        $('#completeTasks').html("Complete: " + data.counts.complete);
    });

    
    $(document).on('click', '.complete', function () {
        let id = $(this).data('id');

        $.get('update_task.php', { id: id, action: 'complete' }, function () {
            $('#table').bootstrapTable('refresh');
        });
    });

 
    $(document).on('click', '.pending', function () {
        let id = $(this).data('id');

        $.get('update_task.php', { id: id, action: 'pending' }, function () {
            $('#table').bootstrapTable('refresh');
        });
    });

  
    $(document).on('click', '.delete', function () {
        let id = $(this).data('id');

        if (confirm("Delete?")) {
            $.get('delete_task.php', { id: id }, function () {
                $('#table').bootstrapTable('refresh');
            });
        }
    });

});