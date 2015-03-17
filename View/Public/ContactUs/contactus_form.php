<?php include '../../Shared/header.php' ; ?>


<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Contact Us</title>
      <link rel="stylesheet" type="text/css" href="main.css"/> 
</head>
<body>-->
    <div id="content">
        <h1>Contact Us</h1>
         <?php
     if(isset($_GET['err'])){
        echo $_GET['err'];
     }
    ?>
        <hr/>
   
        
        <form action="send_email_form.php" name="contact_us_form" method="post" >             
    * Required
    <br/><br/>
    
    <table width="500px"> 
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

    </body>
    </html>
