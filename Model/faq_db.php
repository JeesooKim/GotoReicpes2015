<?php
class FaqDB {
    public static function getFAQs() {
        $db = Database::getDB();
        $query = 'SELECT * FROM faq';
        $result = $db->query($query);
        $faqs = array();
        foreach ($result as $row) {
            $faq = new Faq(
                                   $row['question'],
                                   $row['answer']);
            $faq->setId($row['q_id']);
            $faqs[] = $faq;
        }
        return $faqs;
    }

    public static function getFAQ($q_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM faq
                  WHERE q_id = '$q_id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        $faq = new Faq(
                                   $row['question'],
                                   $row['answer']);
        $faq->setID($row['q_id']);
        return $faq;
    }

    public static function deleteQuestion($q_id) {
        $db = Database::getDB();
        $query = "DELETE FROM faq
                  WHERE q_id = '$q_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addQuestion($faq) {
        $db = Database::getDB();

       
        $question = $faq->getQuestion();
        $answer = $faq->getAnswer();

        $query =
            "INSERT INTO faq
                 (question, answer)
             VALUES
                 ('$question', '$answer')";

        $statement = $db->prepare($query);
        $statement -> bindParam(':question',$question, PDO::PARAM_STR, 255 );
        $statement -> bindParam(':answer', $answer,PDO::PARAM_STR, 255 );
                                                            
        $statement->execute(); 
    }

    
    public static function updateQuestion($faq, $q_id)
    {
        $db = Database::getDB();
        $question = $faq->getQuestion();
        $answer = $faq->getAnswer();

        $query = "UPDATE faq SET question = '$question',
                                              answer = '$answer' WHERE q_id = '$q_id' ";
        $statement = $db->prepare($query);
        $statement -> bindParam(':question',$question, PDO::PARAM_STR, 255 );
        $statement -> bindParam(':answer', $answer,PDO::PARAM_STR, 255 );
                                                            
        $statement->execute(); 

    }
}
?>