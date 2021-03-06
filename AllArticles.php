<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
    $website_title = 'OSakhno/Articles';
    require 'blocks/head.php';
  ?>
</head>
<body class="body_color">

  <?php require 'blocks/header.php'; ?>


  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3 mt-5 ">
        <?php
        require 'mysql_connect.php';
        $sql='SELECT * FROM `articles` ORDER BY `date` DESC';
        $query=$pdo->query($sql);
        while ($row=$query->fetch(PDO::FETCH_OBJ)){
          echo "<h2>$row->title</h2><br>
                <p>$row->intro</p>
                <p><b>Author: </b> <span > $row->author</span></p>
                <a href='/news.php?id=$row->id' title='$row->title'> <button class='btn btn-warning mb-50'>Read more</button>
                </a>";
        }
        ?>
      </div>

     <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>



<script>
$('#mess_send').click(function () {
  var name = $('#username').val();
  var email = $('#email').val();
  var mess = $('#mess').val();
  
$('#exit_btn').click(function () {
  $.ajax({
    url: 'ajax/exit.php',
    type: 'POST',
    cache: false,
    data: {},
    dataType: 'html',
    success: function(data) {
      document.location.reload(true);
    }
  });
});
</script>


</body>
</html>
