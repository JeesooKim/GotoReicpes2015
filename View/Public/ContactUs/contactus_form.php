<?php  include "c:/xampp/htdocs/suzieq/PHP/GotoReicpes2015/config.php";  ?>

<?php include PATH_HEADER;  ?>  
<!--end top-->

<?php 
require(PATH_DATABASE);
require(PATH_MODEL_LOCATIONS);
require(PATH_MODEL_LOCATION_DB);
?>

    <div id="content">
        <h1>Contact Us</h1>
         <?php
     if(isset($_GET['err'])){
        echo $_GET['err'];
     }
    ?>
        <hr/>
   
        <!--displaying branch location and info-->
        <table class="table table-responsive">
            <?php
            $locations = LocationDB::getLocations();
            foreach ($locations as $row):
                ?>
            <thead>
                <tr>
                    <td><?php echo $row->getBranch(); ?></td>
                </tr>
            </thead>
                <tr>
                    <td><?php echo $row->getStreet(); ?> <?php echo $row->getPostal(); ?></td>
                </tr>
                <tr>
                    <td><?php echo $row->getCity(); ?> <?php echo $row->getProvince(); ?>  <?php echo $row->getCountry(); ?></td>
                </tr>
                <tr>
                    <td>Business Phone: <?php echo $row->getPhone(); ?></td>
                </tr>
                <tr>
                    <td><iframe width="325" height="250" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $row->getStreet(),$row->getPostal(),$row->getCountry();?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $row->getStreet(),$row->getPostal(),$row->getCountry();?>&amp;t=m&amp;z=12&amp;output=embed" w></iframe></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <!--contact form mailer-->
        <form action="send_email_form.php" name="contact_us_form" method="post" >             
    * Required
    <br/><br/>
    
    <table class="table table-responsive"> 
        <tr>
            <td valign="top">
             <label for="name">Name *</label>
            </td>
           <td valign="top">
            <input  type="text" name="name" value="" maxlength="50" size="30" />            
           </td>
        </tr>


        <tr>
            <td valign="top">
             <label for="email">Email *</label>
            </td>
            <td valign="top" width="600px">
                <input  type="text" name="email" value="" maxlength="80" size="30" />               
            </td>            
        </tr>
        
        <tr>
            <td valign="top">
             <label for="subject">Subject *</label>
            </td>

            <td valign="top">
               <input type='text'  name="subject" value="" maxlength="80" size="30" />                
            </td>            
        </tr>


        <tr>
            <td valign="top">
             <label for="comments">Comments *</label>
            </td>

            <td valign="top">
                <textarea  name="comments" maxlength="1000" value="" cols="25" rows="6"></textarea>               
            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align:center">
             <input type="submit" name="send" id="send" value="Submit Comments">   
             
            </td>
        </tr>
    </table> 
</form>
        
<?php include ('../../Shared/footer.php') ?>
