<?php
require('../../../Model/database.php');
require('../../../Model/faqs.php');
require('../../../Model/faq_db.php');


if(isset($_GET['id'])) {
    $q_id = $_GET['id'];
} else {
    $q_id = $_POST['q_id'];
}
$faq = FaqDB::getFAQ($q_id);
$q_id = $faq->getID();
$faq_question = $faq->getQuestion();
$faq_answer = $faq->getAnswer();

if (isset($_POST['faq_update'])) {
    $q_id = $_POST['faq_id'];
    $faq_question = $_POST['question'];
    $faq_answer = $_POST['answer'];

    // Validate the entered data
    if ($q_id != '' || $faq_question != '' || $faq_answer != '') {
        $faq = new Faq($faq_question, $faq_answer);

        FaqDB::updateQuestion($faq, $q_id);

        header("Location: faq_index.php");
    }else{
        echo "Missing fields.";
        exit(); 
   }
}
?>

<!--Update form-->

<?php include '../../Shared/_Layout/header-admin.php';    ?>
<!--end top-->
<div id="main">
    <h1>Update: <?php echo $faq_question; ?></h1>

   
    <form action="faq_update.php" method="POST">
        <input type="hidden" name="faq_id" value="<?php echo $q_id; ?>" />
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" value="<?php echo $faq_question; ?>" class="form-control" name="question">
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <input type="text" value="<?php echo $faq_answer; ?>" class="form-control" name="answer">
        </div>
        
        
        <button type="submit" class="btn btn-primary" name="faq_update">Update</button>
        <a class="btn btn-default" href="faq_index.php">Back to list</a>
    </form>
</div>
<!--End of update form-->
<?php include '../../Shared/_Layout/footer-admin.php';  ?> 