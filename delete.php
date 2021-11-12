<?php include 'connect.php';
if($_GET['delete']=='ok') {
    $delete = $db->prepare("DELETE from sample where sample_id=:id");
    $controller = $delete->execute(array(
'id' => $_GET['sample_id']
    ));
    if($controller) {
        header("Location:index.php?deleted");
    } else {
        header("Location:index.php?somethingwrong");
    }
}
?>