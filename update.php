<?php include 'connect.php';
$getid = $db->prepare("SELECT * from sample where sample_id=:id");
$getid->execute(array(
    'id' => $_GET['sample_id']
));
$getdata = $getid->fetch(PDO::FETCH_ASSOC);
?>
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
        <form action="update.php" method="POST">
            <input type="text" name="sample_title" value="<?php echo $getdata['sample_title'] ?>">
            <input name="sample_id" type="hidden" value="<?php echo $getdata['sample_id'] ?>">
            <button name="update">Update</button>
        </form>
        <?php
        if (isset($_POST['update'])) {
            $sample_id = $_POST['sample_id'];
            $save = $db->prepare("UPDATE sample SET
    sample_title=:sample_title
     where sample_id={$_POST['sample_id']}
    ");
            $update = $save->execute(array(
                'sample_title' => $_POST['sample_title']
            ));
            if($update) {
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
