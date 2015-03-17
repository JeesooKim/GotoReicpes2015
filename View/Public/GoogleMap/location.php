<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GoToRecipes Locations</title>
    </head>
    <body>
        <?php 
        require ('../../Model/database.php'); 
        require ('../../Model/location_db.php'); 
        require ('../../Model/locations.php'); 
        require ('../../View/Admin/location_admin.php');
        
        $result = locationDB::getLocation();
        ?>

        <iframe width="698" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.nz/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=99+Motions+Road+Auckland&amp;aq=&amp;sll=-40.799894,175.310128&amp;sspn=62.796525,81.650391&amp;ie=UTF8&amp;hq=&amp;hnear=99+Motions+Rd,+Western+Springs,+Auckland+1022&amp;t=m&amp;ll=-36.864103,174.719696&amp;spn=0.024034,0.05991&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
    </body>
</html>
