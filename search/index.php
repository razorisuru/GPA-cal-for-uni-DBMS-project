<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<?php
include('connection.php')
?>
<div class="container mt-4">

  <div class="mb-3">
    <input type="text" name="index" id="getName" class="form-control form-control-lg" placeholder="Enter Index" required>
    <div class="invalid-feedback">Index is required!</div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Index</th>
        <th>Name</th>
        <th>GPA</th>
      </tr>
    </thead>
    <tbody id="showdata">

    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#getName').on("keyup", function() {
      var getName = $(this).val();
      $.ajax({
        method: 'POST',
        url: 'searchajax.php',
        data: {
          name: getName
        },
        success: function(response) {
          $("#showdata").html(response);
        }
      });
    });
  });
</script>