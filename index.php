<?php include './View/Shared/header.php';  ?>  
<?php    
    include './View/Public/Imageslider/imageslider.php';    
    ?>
<!--end imageslider feature-->

        <div id="content-recipes">
            <div class="col-md-4">
                <div class="box">
                    <a href="View/Public/Toprecipes/toprecipes.php"><img src="Content/uploads/images/button_1.jpg" alt="Top Recipes" /></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <a href="View/Public/Searching/searching.php"><img src="Content/uploads/images/button_2.jpg" alt="Search Recipes" /></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <a href="View/Public/Events/events.php"><img src="Content/uploads/images/button_3.jpg" alt="Events" /></a>
                </div>
            </div>
            
            <div>
                <div class="row">
                    <h1 class="caps-h1">
                        <strong>If you have a recipe you’d like to share, we’d love to hear from you!</strong>
                    </h1>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="row">
                    <p class="SpecialFont">We love food and we love cooking. If you have a recipe you’d like to share, we’d love to hear from you!<br /><br />
                Looking for something delicious and rewarding? You've come to the right place. Explore the recipes here, search for something specific or filter by category.
                <br /><br />    We want people to enjoy their savoury love affair with cheese to its absolute fullest. We simply want to give people the joy of food recipes, without any compromise.</p>
                </div>
                </div>
            <div class="col-md-4"> 
                <!--Image from: ca.daiyafoods.com/recipes -->
                <img id="plate" src="./Content/uploads/images/top-mac_cheese-2-640.png" alt="Plate" />
            </div>
            
                <div class="youtube-row">
                    <?php //implementation by Johnson Ta
                     include 'Youtube/youtube-feed.php'; ?>
                </div>

        

        </div> <!--/end #content-recipes-->

<?php include './View/Shared/footer.php'; ?>
