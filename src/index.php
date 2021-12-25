<?php
  include('config/db_conect.php');

  // escreve na tabela
  $sql = 'SELECT title, ingredientes, id FROM pizzas ORDER BY created_at';

  //faça consulta e pegue o resultado
  $result = mysqli_query($conn, $sql);

  // Busacar resultados, e retorna como uma array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);

  // close connection
  mysqli_close($conn);

  


?>
<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
      <div class="row">
        <?php foreach($pizzas as $pizza): ?>
          <div class="col s6 md3">
            <div class="card z-depth center">
              <div class="card-content center">
                <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                <ul>
                  <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                    <li><?php echo htmlspecialchars($ing) ;?></li>
                  <?php endforeach; ?>  
                </ul>
              </div>
              <div class="card-action right-align">
                <a href="#" class="brand-text">more info</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>  
      </div>
    </div>

  <?php include('templates/footer.php'); ?>

</body>
</html>