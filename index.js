$(function () {
    var $table = $('#table')
    var $remove = $('#remove')



  function getIdSelections () {
    return $table.bootstrapTable('getSelections').map(function (row) {
      return row.id
    })

     $remove.click(function () {
      const ids = getIdSelections()

      $table.bootstrapTable('remove', {
        field: 'id',
        values: ids
      })
      $remove.prop('disabled', true)
    })
  }
})

$(document).ready(function () {
    getdata();


    function getdata() {
        $.ajax({
            type: "GET",
            url: "fetch.php",
            dataType: "JSON",
            success: function (response) {
                //console.log(response);
                $.each(response, function (key, value) {
                    $('.studata').append(`
                    <tr>
                        <td>${value['id']}</td>
                        <td>${value['uid']}</td>
                        <td>${value['description']}</td>
                        <td>${value['status']}</td>
                        <td>
                            <a href="update_task.php?id=${value['id']}&action=complete" class="btn btn-success"><i class="bi bi-check-square"></i>Complete</a>
                            <a href="update_task.php?id=${value['id']}&action=pending" class="btn btn-warning">Mark Pending</a>
                            <a href="delete_task.php?id=${value['id']}" class="btn btn-danger"><i class="bi bi-trash2"></i>Delete</a>
                        </td>
                    </tr>

                `);
                });
            }
        });
    }
});


$(document).ready(function () {
    $('#srchbar').keyup(function () {
        var input = $(this).val();
        if (input != "") {
            $.ajax({
                url: "index.php",
                method: "POST",
                data: { input, input },
                success: function (data) {
                    $('#0srchbar').htmml(data);
                }
            })
        } else {
            $('$srchbar').css("display", "none")
        }
    })
})