<!doctype html>
<html>
<head>
  <title>Drag & Drop Datatables</title>
  <script src="datatable-lib/draw-table/jquery/jquery.min.js?v=v1.2.3"></script>
  <script src="datatable-lib/draw-table/jquery-ui/js/jquery-ui.min.js?v=v1.2.3"></script>
  <link rel="stylesheet" href="datatable-lib/draw-table/tablednd.css" type="text/css"/>
</head>
<body>

<table  class="display nowrap example" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Category Name</th>
      <th>Sub Category Name</th>
      <th>Sub Category Items</th>
      <th>Name</th>
      <th>New Price</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i=1; $i<=100; $i++): ?>
    <tr id="id_<?=$i?>">
      <td><?=$i?></td>
      <td>Menu <?=$i?></td>
      <td>BAHAR - E - SABZ</td>
      <td>BOMBAY ALOO</td>
      <td>Main</td>
      <td align="center">£7.<?=$i?>0</td>
   </tr>
   <?php endfor; ?>

</tbody>
</table>

<style type="text/css">
tr{
  cursor: move;
}
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('.example').DataTable( {
      "scrollX": true,
      "order":false,
      "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
      "pageLength": 25
    });
  });
</script>


<script language = "Javascript">
  $(document).ready(function(){

    $(function() {

      $('table').sortable({
        items: 'tr',
        opacity: 0.6,
        axis: 'y',
        stop: function (event, ui) {
          var data = $(this).sortable('serialize');
          $.ajax({
           data: data,
           type: 'POST',
           url: 'ajax/update_drag_table.php'
         });
        }
      });
    });

  });


</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script src="datatable-lib/draw-table/datatables/assets/lib/js/jquery.dataTables.min.js?v=v1.2.3"></script>
<script src="datatable-lib/draw-table/js/jquery.tablednd.js" type="text/javascript"></script>

</body>
</html>