<script>
let limit = 5;
let offset = 0;
let total = 0;

let sort = "id";
let order = "asc";
let mode = new URLSearchParams(window.location.search).get('mode') || 'all';

let $table;

$(document).ready(function () {

  $table = $('#table');

  function actionFormatter(value, row) {
    return `
      <a href="update.php?up_id=${row.id}" class="btn btn-sm btn-primary">Update</a>
      <a href="delete.php?del_id=${row.id}" class="btn btn-sm btn-danger">Delete</a>
    `;
  }

  $table.bootstrapTable({
    columns: [
      { field: "id", title: "ID", sortable: true }, 
      { field: "login_id", title: "User ID", sortable: true },
      { field: "title", title: "Title", sortable: true },
      { field: "description", title: "Description", sortable: true },
      { field: "action", title: "Action", formatter: actionFormatter }
    ],
    data: []
  });

  loadData();
});

function loadData() {
  $.ajax({
    url: "fetch.php",
    method: "GET",
    data: { limit, offset, sort, order, mode },
    success: function (res) {

      if (typeof res === "string") {
        res = JSON.parse(res);
      }

      total = res.total || 0;

      $table.bootstrapTable('load', res.rows);
    },
    error: function(err){
      console.log(err.responseText);
    }
  });
}


$(document).on('click', '.page-num', function (e) {
  e.preventDefault();

  let page = $(this).data("page");
  offset = page * limit;

  $('.page-item').removeClass("active");
  $(this).parent().addClass("active");

  loadData();
});


$('#prevPage').click(function (e) {
  e.preventDefault();

  if (offset >= limit) {
    offset -= limit;
    loadData();
  }
});


$('#nextPage').click(function (e) {
  e.preventDefault();

  if (offset + limit < total) {
    offset += limit;
    loadData();
  }
});

function setMode(type){
  mode = type;
  offset = 0;
  loadData();
}
</script>