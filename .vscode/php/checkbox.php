<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkbox</title>
</head>

<body>
  <h1>Array in forms with PHP</h1>
  <br>
  <form action="event.php" method="post" enctype="multipart/form-data">
    <label for="event">What Event</label>
    <input type="text" name="event" id="event">
    <br>
    <label for="day">What Event</label>
    <input type="checkbox" name="day[]" id="day" value="Senin">Senin
    <input type="checkbox" name="day[]" id="day" value="Selasa">Selasa
    <input type="checkbox" name="day[]" id="day" value="Rabu">Rabu
    <input type="checkbox" name="day[]" id="day" value="Kamis">Kamis
    <input type="checkbox" name="day[]" id="day" value="Jum'at">Jum'at
    <input type="checkbox" name="day[]" id="day" value="Sabtu">Sabtu
    <input type="checkbox" name="day[]" id="day" value="Minggu">Minggu
    <br>
    <input type="file" name="doc[]" id="doc" multiple>
    <br>
    <button type="submit">Add</button>
  </form>
</body>

</html>