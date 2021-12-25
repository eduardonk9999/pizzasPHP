<?php
  // connect to database


  $conn = mysqli_connect('172.19.0.1', 'userpizzas', 'pizzas', 'pizzas'); 

  if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
  }

  // escreve na tabela
  $sql = 'SELECT title, ingredientes, id FROM pizzas ORDER BY created_at';

  //faça consulta e pegue o resultado
  $result = mysqli_query($conn, $sql);

  // Busacar resultados, e retorna como uma array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  // close connection
  mysqli_close($conn);

  print_r($pizzas);


?>
<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>
  <?php include('templates/footer.php'); ?>

</body>
</html>