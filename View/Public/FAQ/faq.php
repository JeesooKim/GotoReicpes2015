<?php include "C:/wamp/www/GotorecipesGITHUB/GotoReicpes2015/config.php";  

require_once( PATH_DATABASE);
require_once( PATH_MODEL_FAQS );
require_once( PATH_MODEL_FAQ_DB );
?>

<?php include PATH_HEADER;  ?>  
<!--end top-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
  
  <div id="main">
  <h1>FAQ</h1>
  <h3>
      Want to know more about the food you and your family eat? Visit this section often. It's our library of useful and often asked questions that help you use our website.
  </h3>
  <div id="accordion">
        <?php
        $faq = FaqDB::getFAQs();
        foreach ($faq as $f):
        ?>
  <h3><?php echo $f-> getQuestion(); ?></h3>
    <div>
      <p>
        <?php echo $f->getAnswer(); ?>
      </p>
    </div>
    <?php endforeach; ?>
  </div>
  </div>



<?php include (PATH_FOOTER); ?>
