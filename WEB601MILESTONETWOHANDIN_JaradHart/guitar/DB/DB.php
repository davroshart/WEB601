<?php
class DBconnection {
        private $rs; // Procedural "handle" or "resource" to database
        private $connectRs;
        private $fetchResult;
        private $DBi;
        
        private function connectDb($prStrDatabase)
        {
        //connect to host and database
            /*link to server*/
            $this->connectRs = mysqli_connect("localhost","root","");
            if(!$this->connectRs)
            {
                echo "Error connecting to the database server".mysqli_error($this->connectRs);
                $this->connectRs = -1;
            }
            else
            /*link to database*/
            $dbRs = mysqli_select_db($this->connectRs,$prStrDatabase);
            if(! $dbRs)
            {
                echo "Error selecting the database".mysql_error($this->connectRs);
                
            }
        }
        
        public function query($prStrSQL)
        {       
            //attempt running query
            $this->rs = -1;// BAD RECORDSET
        
            $this->rs = mysqli_query($this->connectRs,$prStrSQL);
            if(!$this->rs)
            {
                echo "Error running query [$prStrSQL] ".mysqli_error($this->connectRs)."<br>";
                $this->rs = -1;  
            }
            else
            {
                return true;
            }
        }

        public function __construct($prDatabase)
        {
        //create database
            $this->connectDb($prDatabase);
        }
    

        public function getNext()
        {
        //return next available row
            $aRow = mysqli_fetch_assoc($this->rs);
            return $aRow;
        }
    
        
        public function free()
        {
        //release the potentially used resource
            mysqli_free_result($this->rs);
        }
    }// end of database class
?>