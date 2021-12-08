<?php include 'connect.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <?php
  // SELECT While Loop
$select = $db->prepare("SELECT * from sample");
$select->execute();
while ($get = $select->fetch(PDO::FETCH_ASSOC)) {
$get['sample_title'] . "<br>";
}
// SELECT LIMIT
    $select = $db->prepare("SELECT * from sample LIMIT 3");
    $select->execute();
      while($data = $select->fetch(PDO::FETCH_ASSOC)) { Table Codes Here! }

  // $id to in select
$id = 3;
$select = $db->prepare("SELECT * from sample where sample_id = $id");
$select->execute();
while ($get = $select->fetch(PDO::FETCH_ASSOC)) {
    $get['sample_title'] . "<br>";
}

// fetchall with foreach
$data = $db->query("SELECT * FROM sample")->fetchAll();
foreach ($data as $row) {
    $row['sample_title'] . "<br />\n";
}

  <body>
    <div class="container">
    <button><a href="insert.php">Add New Data</a></button>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $data['sample_id']; ?></th>
      <td><?php echo $data['sample_title']; ?></td>
      <td> <a href="delete.php?sample_id=<?php echo $data['sample_id']; ?>&delete=ok"> <button>Delete</button></a></td>
      <td><button>Edit</button></td>
    </tr>

   
  </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
