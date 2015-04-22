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

<?php include '../../Shared/header-admin.php';    ?>
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

    <!-- The following is for Recipes -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css">  
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>  
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>
    <!-- Recipes data tables CDN --> 
    
    <script>
        $(document).ready( function () { 
            $('#recipeTB').DataTable();}
                );
            </script>
    
    
    <!--div id="content">
        <!-- display a table of products -->
        <table id="recipeTB" class="display">   
        <!-- table id="recipe_insert_table"    width="900" -->
            <thead bgcolor="#a8cb81" >                
                <tr style="font-variant:small-caps;font-style:normal;color:black;font-size:18px;">
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
                

