<?php
require_once("DB.php");

class CompDB extends DBconnection 
{
    //record id of last iserted record
    private $lastInsertID = 0;
    
    public function checkLogin($prUserName, $prPassword)
    {
       // $SQL = "select  from tblUser";
    }
    
    public function submit($prSchoolName, $prClassroom, $prEmail, $prPhone, $prQuestion_id, $prAnsNum)
    {
        //attempt insert into comp table
        $lcCorrect = false;
        
        /*define whether submitted answer is correct or not*/
        $SQL = "select * from tblQuestionAnswer where question_id = $prQuestion_id and answer_id = $prAnsNum;";
        $this->query($SQL);
        $lcRow = $this->getNext();
        
        //define if answer given was correct by checking question record
        $lcCorrect = $lcRow["correct"];
        
        //free resource
        $this->free();
     
        /*insert submission record*/
        $SQL = "insert into tblcompetitionsubmission
            (school_name, class, email, phone, question_id, answer_id, correct) VALUES 
            ('$prSchoolName', '$prClassroom', '$prEmail', '$prPhone', $prQuestion_id, $prAnsNum, $lcCorrect);";
        if ($this->query($SQL))
        {
            //track successful submission id
            $SQL = "SELECT compsub_id FROM tblcompetitionsubmission 
                WHERE ((school_name = '$prSchoolName') AND (class = '$prClassroom') AND (email = '$prEmail'));";
            $this->query($SQL);
            $lcRow = $this->getNext();
            $_SESSION['lastCompID'] = $lcRow['compsub_id'];
        }
        else
        {
            //display error of failed insert
            echo "Error: ".$SQL. "<br";

        }
    }
        
    public function setQuestion()//$prQuestion, $prAnswer1, $prAnswer2, $prAnswer3, $prCorrect)
    {
        //create resource containing one question & related answers
        $lcRow;
        $lcRandQ = mt_rand(1,3);//random number 1-3 = three total q's
        $SQL = "SELECT tblQuestion.question_id, question_text, tblAnswer.answer_id, answer_text, correct
                FROM ((tblQuestionAnswer 
                INNER JOIN tblQuestion ON tblQuestionAnswer.question_id = tblQuestion.question_id)
                INNER JOIN tblAnswer ON tblQuestionAnswer.answer_id = tblAnswer.answer_id)
                WHERE tblQuestionAnswer.question_id = $lcRandQ;";
        $this->query($SQL);
        $lcRow = $this->getNext();
        return $lcRow;
    }
    
    public function getSubmission()
    //get last submitted information
    {
        $lcRow;
        $lcCompSubmitID = $_SESSION['lastCompID'];
        $SQL = "SELECT tblCompetitionSubmission.compsub_id, tblCompetitionSubmission.question_id, tblCompetitionSubmission.Question_id,
                question_text, answer_text, school_name, class, email, phone 
                FROM ((tblCompetitionSubmission 
                INNER JOIN tblQuestion ON tblCompetitionSubmission.question_id = tblQuestion.question_id)
                INNER JOIN tblAnswer ON tblCompetitionSubmission.answer_id = tblAnswer.answer_id)
                WHERE tblCompetitionSubmission.compsub_id = $lcCompSubmitID;";
        $this->query($SQL);
        $lcRow = $this->getNext();
        return $lcRow;
    }
    
}// end of database class

//$aCompDB = new CompDB("web601_assess");
?>