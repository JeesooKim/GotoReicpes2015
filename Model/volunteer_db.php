<?php
class VolunteerDB {

    public static function getTotEventCount( $event_date ) { 
        $db = Database::getDB();
        
        $query = "select COUNT(*) from events ";
 
        if( $event_date != "" ){
            $query .= "where date_format(event_start,'%m/%d/%Y') <= '$event_date' and date_format(event_end,'%m/%d/%Y') >= '$event_date'";
        }

        $count = $db->query($query);
        //convert result into array
        $row = $count->fetch();
        $result = $row[0];

        return $result;
    } 

    public static function getPageEventByEventdate($event_date,  $cntPerPage, $pgPage) {

        $offset = ($pgPage - 1) * $cntPerPage; 
        
        $db = Database::getDB();
        $query = "select event_id, event_name, event_start, event_end, event_location, "
                ."event_detail, event_contactName, event_contactEmail from events ";
 
        if( $event_date != "" ){
            $query .= "where date_format(event_start,'%m/%d/%Y') <= '$event_date' and date_format(event_end,'%m/%d/%Y') >= '$event_date'";
        }

        $query .= " LIMIT ".$cntPerPage." OFFSET ".$offset;

        $result = $db->query($query);
        $events = array();
        foreach ($result as $row) {
            $event = new Event(
                                   $row['event_id'],
                                   $row['event_name'],
                                   $row['event_start'],
                                   $row['event_end'],
                                   $row['event_location'],
                                   $row['event_detail'],
                                   $row['event_contactName'],
                                   $row['event_contactEmail']
                    );
            $events[] = $event;
        }
        return $events;
    }

    public static function getTotEventjobCount( $event_id ) { 
        $db = Database::getDB();
        
        $query = "select COUNT(*) from eventjob
                  WHERE event_id = '$event_id' ";

        $count = $db->query($query);
        //convert result into array
        $row = $count->fetch();
        $result = $row[0];

        return $result;
    } 

    public static function getPageEventjobByEventid($event_id, $cntPerPage, $pgPage) {

        $offset = ($pgPage - 1) * $cntPerPage; 
        
        $db = Database::getDB();
        $query = "select event_id,job_id,job_title,job_time,regist_date from eventjob ";
 
        if( $event_id != "" ){
            $query .= "where event_id = '$event_id' ";
        }

        $query .= " LIMIT ".$cntPerPage." OFFSET ".$offset;

        $result = $db->query($query);
        $eventjobs = array();
        foreach ($result as $row) {
            $eventjob = new Eventjob(
                                   $row['event_id'],
                                   $row['job_id'],
                                   $row['job_title'],
                                   $row['job_time'],
                                   $row['regist_date']
                    );
            $eventjobs[] = $eventjob;
        }
        return $eventjobs;
    }
    
    public static function deleteEventjob($event_id, $job_id) {
        $db = Database::getDB();
        $query = "DELETE FROM eventjob
                  WHERE event_id = '$event_id' and job_id = '$job_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addEventjob($eventjob) {
        $db = Database::getDB();

        $event_id = $eventjob->getEventId();
        $job_id = $eventjob->getJobId();
        $job_title = $eventjob->getJobTitle();
        $job_time = $eventjob->getJobTime();
        $regist_date = $eventjob->getRegistDate();


        $query =
            "INSERT INTO eventjob
                 (event_id,job_id,job_title,job_time,regist_date)
             VALUES
                 ('$event_id', '$job_id', '$job_title', '$job_time', '$regist_date' )";

        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function updateEventjob($eventjob) {
        $db = Database::getDB();

        $event_id = $eventjob->getEventId();
        $job_id = $eventjob->getJobId();
        $job_title = $eventjob->getJobTitle();
        $job_time = $eventjob->getJobTime();
        $regist_date = $eventjob->getRegistDate();
        
        $query = "UPDATE eventjob SET "
                . "job_title = '$job_title' ,"
                . "job_time = '$job_time' ,"
                . "regist_date = '$regist_date' "
                . "WHERE event_id = '$event_id'"
                . "AND job_id = '$job_id'";
        
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function getTotVolunteerCount( $event_id, $job_id ) { 
        $db = Database::getDB();
        
        $query = "select COUNT(*) from volunteer
                  WHERE event_id = '$event_id' and job_id = '$job_id'";

        $count = $db->query($query);
        //convert result into array
        $row = $count->fetch();
        $result = $row[0];

        return $result;
    } 

    public static function getPageVolunteerByEventidJobid($event_id, $job_id, $cntPerPage, $pgPage) {

        $offset = ($pgPage - 1) * $cntPerPage; 
        
        $db = Database::getDB();
        $query = "select event_id,job_id,id,name,phone,email,hire_yes_no,regist_date from volunteer ";
 
        if( $event_id != "" ){
            $query .= "where event_id = '$event_id' and job_id = '$job_id'";
        }

        $query .= " LIMIT ".$cntPerPage." OFFSET ".$offset;

        $result = $db->query($query);
        $volunteers = array();
        foreach ($result as $row) {
            $volunteer = new Volunteer(
                                   $row['event_id'],
                                   $row['job_id'],
                                   $row['id'],
                                   $row['name'],
                                   $row['phone'],
                                   $row['email'],
                                   $row['hire_yes_no'],
                                   $row['regist_date']
                    );
            $volunteers[] = $volunteer;
        }
        return $volunteers;
    }
    
    public static function deleteVolunteer($event_id, $job_id, $id) {
        $db = Database::getDB();
        $query = "DELETE FROM volunteer
                  WHERE event_id = '$event_id' and job_id = '$job_id' and id = '$id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addVolunteer($volunteer) {
        $db = Database::getDB();

        $event_id = $volunteer->getEventId();
        $job_id = $volunteer->getJobId();
        $id = $volunteer->getId();
        $name = $volunteer->getName();
        $phone = $volunteer->getPhone();
        $email = $volunteer->getEmail();
        $regist_date = $volunteer->getRegistDate();

        $query =
            "INSERT INTO eventjob
                 (event_id,job_id,id,name,phone,email,regist_date)
             VALUES
                 ('$event_id', '$job_id', '$id', '$name', '$phone','$email', '$regist_date' )";

        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function updateVolunteer($volunteer) {
        $db = Database::getDB();

        $event_id = $volunteer->getEventId();
        $job_id = $volunteer->getJobId();
        $id = $volunteer->getId();
        $name = $volunteer->getName();
        $phone = $volunteer->getPhone();
        $email = $volunteer->getEmail();
        $regist_date = $volunteer->getRegistDate();
        
        $query = "UPDATE volunteer SET "
                . "name = '$name' ,"
                . "phone = '$phone' ,"
                . "email = '$email' ,"
                . "regist_date = '$regist_date' "
                . "WHERE event_id = '$event_id'"
                . "AND job_id = '$job_id'"
                . "AND id = '$id'";
        
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function updateVolunteerHireYN($event_id, $job_id, $id, $hire_yes_no ) {
        $db = Database::getDB();
        
        $query = "UPDATE volunteer SET "
                . "hire_yes_no = '$hire_yes_no' "
                . "WHERE event_id = $event_id "
                . "and job_id = $job_id "
                . "and id = $id ";

        $row_count = $db->exec($query);
        return $row_count;
    }
        
}
?>