<?php include('../../../view/shared/header.php'); ?>

<?php 
//just to see errors display
ini_set('display_errors', 'on');
error_reporting(E_All);
?>

<div id="main">
    <h1 class="top">Error</h1>
    <p><?php echo $error; ?></p>
</div>
<?php include('../../../view/shared/footer.php'); ?>