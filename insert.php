<?php include 'connect.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>forthes - PDO Tutorial</title>
</head>

<body>
    <div class="container">
       <button><a href="index.php">Back</a></button>
       <form action="insert.php" method="POST">
           <input type="text" name="sample_title">
           <button name="send">Insert</button>
       </form>

       <?php
       if(isset($_POST['send'])) {
           $insert = $db->prepare("INSERT into sample SET
           sample_title=:sample_title
           ");
           $control = $insert->execute(array(
               'sample_title' => $_POST['sample_title']
           ));
           if($control) {
               Header("Location:index.php?yes");
           } else {
               Header("Location:index.php?no");
           }
       }
       ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
