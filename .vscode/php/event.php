<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event</title>
</head>

<body>
  <script>
    window.print();
  </script>
  <h2>Your Event</h2>
  <p>ou want to add an event called <strong><?= $_POST['event']; ?></strong> which will take place on:</p>
  <?php
  echo '<pre>';
  var_dump($_FILES['doc']);
  echo '</pre>';
  die;
  if (isset($_POST['day']) and is_array($_POST['day'])) {
    foreach ($_POST['day'] as $d) {
      echo $d . '<br>';
    }
  } else {
    echo 'Ga ada apa apa';
  }
  ?>
</body>

</html>