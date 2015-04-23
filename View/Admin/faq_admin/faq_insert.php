<?php
require('../../../Model/database.php');
require('../../../Model/faqs.php');
require('../../../Model/faq_db.php');

if(isset($_POST['faq_insert'])){
    $faq_question = $_POST['question'];
    $faq_answer = $_POST['answer'];
    

    if($faq_question != ' ' || $faq_answer != ' '){
        $faq = new Faq($faq_question, $faq_answer);
        FaqDB::addQuestion($faq);
        header("Location: faq_index.php");
    }
    else{
        echo  'Missing data fields.';
        exit();
    }
}
?>

<?php include '../../Shared/_Layout/header-admin.php';    ?>
<!--end top-->


    <?php include '../../Shared/_Layout/side-menu.php';    ?>
<!--end top-->

<div class="container">
<ol class="breadcrumb">
        <li><a href="../index.php">Admin Panel</a></li>
        <li><a href="../faq_admin/faq_index.php">FAQ</a></li>
        <li class="active">Add new question & answer</li>
    </ol>

    <h1>Insert a branch</h1>

    <form action="faq_insert.php" method="post">
        <div class="form-group">
            <label for="question">Question</label>
            <textarea class="form-control" name="question"></textarea>
        </div>

        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea class="form-control" name="answer"></textarea>
        </div>


        <button type="submit" class="btn btn-primary" name="faq_insert">Submit</button>
        <a class="btn btn-default" href="faq_index.php">Back to list</a>
    </form>
</div><!-- /main -->
<?php include '../../Shared/_Layout/footer-admin.php';  ?> 