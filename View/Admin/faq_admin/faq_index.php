<?php  //include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>
<?php  include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  ?>


<?php
require_once( PATH_DATABASE);  
require(PATH_MODEL_FAQS);
require(PATH_MODEL_FAQ_DB);

//delete option
if(isset($_POST['q_id'])){
$q_id = $_POST['q_id'];
FaqDB::deleteQuestion($q_id);
    header("Location: faq_index.php");
}
?>

<?php include PATH_HEADER_ADMIN;    ?>
<!--end top-->

<div id="main">
    <ol class="breadcrumb">
        <li><a href="<?php echo PATH_VIEW_ADMIN; ?>/index.php">Admin Panel</a></li>
        <li class="active">FAQ</li>
    </ol>

    <article>
        <h4>FAQ</h4>
        <a href="faq_insert.php">Add a new Question & Answer</a>
    </article>

    <table class="table table-responsive table-bordered">
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $faq = FaqDB::getFAQs();
        foreach ($faq as $f):
            ?>
            <tr>
                <td><?php echo $f->getQuestion(); ?></td>
                <td><?php echo $f->getAnswer(); ?></td>
                <td>
                    <a class="btn-link" href="faq_update.php?id=<?php echo $f->getID(); ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <form action="faq_index.php" method="post">
                        <input type="hidden" name="q_id" value="<?php echo $f->getID(); ?>"/>
                        <button class="btn-link" type="submit" value="delete"  onclick="return confirm('Are you sure you want to delete this?');">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div><!--End of main-->


<?php include PATH_FOOTER_ADMIN;    ?>
                

