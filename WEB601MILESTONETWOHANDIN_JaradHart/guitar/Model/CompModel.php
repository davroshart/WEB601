<?php  
    //uses _ Require_Once()
    require_once("DB/CompDB.php");

    class CompModel
    {
        private $myController;
        private $aCompDB;    
        
        //question details
        public $Question = "";
        public $Question_id = "";
        public $Answer1 = "";
        public $Answer1_id = "";
        public $Answer2 = "";
        public $Answer2_id = "";
        public $Answer3 = "";
        public $Answer3_id = "";
        public $Correct = 0;
        
        //submission details
        
        public $SubUser = "temp";
        public $SubQuestion = "";
        public $SubAnswer = "";
        public $SubClass = "";
        public $SubSchool = "";        
        public $SubEmail = "";
        public $SubPhone = "";
        
        function __construct($prMyController)
        {
            $this->myController = $prMyController;
            $this->aCompDB = new CompDB("web601_assess");
        }

        public function fixString($prString)
        //mend any parts undesirable to SQL
        {
            $prString = trim($prString, " ");
            $prString = strip_tags($prString);
            //$prString = stripslashes($prString);
            $prString = htmlspecialchars($prString);
            return $prString;
        }
        
        function checkLogin($prUserName, $prPassword)
        {
            /*unused and in theory should be located in login model*/
            
            $lcReturnText = "";
            $lcResult = $this->aCompDB->checkLogin($prUserName, $prPassword);
            
            switch ($lcResult)
            {
                case -1:
                //logged in already
                    $lcReturnText = "You are already logged in";
                    break;
                case 0:
                //incorrect password
                    
                break;
                case 1:
                //login
                break;
            }
            
        }
        
        function loggedIn()
        {
             /*unused and questioning if should be located in login model*/
            $lcResult=false;
            if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'])
            {
                $lcResult=true;
            }
            return $lcResult;
        }
        
        function submit($prClassroom, $prSchool, $prEmail, $prPhone, $prQuestionid, $prAnsNum)
        {      
            /*pass controller submission to database*/
            $this->aCompDB->submit($prSchool, $prClassroom, $prEmail, $prPhone, $prQuestionid, $prAnsNum);
        }
        
        function getSubmission()
        {
            /*get last submission data from database*/
            $lcSubmissionData = $this->aCompDB->getSubmission();
            return $lcSubmissionData;
            /*$this->subQuestion = $lcQuestionData["question_text"];
            $this->subAnswer = $lcQuestionData["answer_text"];
            $this->subClass = $lcQuestionData["class"];
            $this->subSchool = $lcQuestionData["school"];
            $this->subEmail = $lcQuestionData["email"];
            $this->subPhone = $lcQuestionData["phone"];*/
        }
        
        function setQuestion()
        {
            /*get random question with related answers from database*/
            $lcQuestionData = $this->aCompDB->setQuestion();
            $this->Question = $lcQuestionData["question_text"];
            $this->Question_id = $lcQuestionData["question_id"];
            $this->Answer1 = $lcQuestionData["answer_text"];
            $this->Answer1_id = $lcQuestionData["answer_id"];
            if ($lcQuestionData["correct"])
            {
                $this->Correct = $lcQuestionData["answer_id"];    
            }
            $lcQuestionData = $this->aCompDB->getNext();
            
            $this->Answer2 = $lcQuestionData["answer_text"];
            $this->Answer2_id = $lcQuestionData["answer_id"];
            if ($lcQuestionData["correct"])
            {
                $this->Correct = $lcQuestionData["answer_id"];    
            }

            $lcQuestionData = $this->aCompDB->getNext();
            $this->Answer3 = $lcQuestionData["answer_text"];
            $this->Answer3_id = $lcQuestionData["answer_id"];
            if ($lcQuestionData["correct"])
            {
                $this->Correct = $lcQuestionData["answer_id"];    
            }
        }
        
        public function get($prPart)
        {/*retrieve specified variable from object*/
            $lcResult = "Don't understand";
            switch ($prPart)
            {
             /*comp question deatils*/
                case "question":
                    $lcResult=$this->Question;
                    break;
                case "questionid":
                    $lcResult=$this->Question_id;
                    break;
                case "answer1":
                    $lcResult=$this->Answer1;
                    break;
                case "answer1id":
                    $lcResult=$this->Answer1_id;
                    break;                        
                case "answer2":
                    $lcResult=$this->Answer2;
                    break;
                case "answer2id":
                    $lcResult=$this->Answer2_id;
                    break;                     
                case "answer3":
                    $lcResult=$this->Answer3;
                    break;
                case "answer3id":
                    $lcResult=$this->Answer3_id;
                    break;                    
            }
            return $lcResult;
        }
    }
        


//aCompModel = new CompModel();
//aCompModel->submit("Hampden", "Rm1", "hs@co.nz", "Huh?", "yep");
?>