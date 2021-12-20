<?php
  $title = $email= $ingredientes = '';
  $erros = array('email'=>'', 'title'=>'', 'ingredientes'=>'');

  if(isset($_POST['submit'])) {
    if(empty($_POST['email'])){
      $erros['email'] = 'Ah email is required <br />';
    } else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erros['email'] = 'Email must be a valid email address';
      }
    }
    if(empty($_POST['email'])){
      $erros['title'] = 'A title is required <br />';
    } else {
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $erros['title'] = 'Title must be letters and spaces only';
      }
    }
    if(empty($_POST['ingredientes'])){
      $erros['ingredientes'] = 'At least one ingredient is required <br />';
    } else {
      $ingredientes = $_POST['ingredientes'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredientes)) {
        $erros['ingredientes'] = 'Ingredients separed';
      }
    }
  }
?>

<!DOCTYPE html>

<?php include('templates/header.php');  ?>
  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="add.php" method="POST">
      <label>Your Email:</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
      <div class="red-text"><?php echo $erros['email']; ?></div>
      <label>Pizza Title:</label>
      <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
      <label>Ingredients (comma separated):</label>
      <input type="text" name="ingredientes" value="<?php echo htmlspecialchars($ingredientes); ?>">
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>

<?php include('templates/footer.php');  ?>