<?php
    class Register
    {
        private $db;
        public $error;

        public function set_database($database){
            $this->db = $database;
        }
        private function escape($var) {
            return $this->db->real_escape_string($var);
        }
        public function regis(
            string $facebookid,
            string $firstname, 
            string $lastname, 
            string $studentid,
            string $year,
            string $programme,
            string $bio,
            string $hashtags,
            string $otherHashtags )
        {
            $isAleady = $this->db->query("SELECT * FROM accounts WHERE acc_facebookid = '{$this->escape($facebookid)}'");
            if($isAleady->num_rows === 0){
                $sql = "INSERT INTO accounts (acc_facebookid, acc_firstname, acc_lastname, acc_studentid, acc_year, acc_programme, acc_bio, acc_hashtags, acc_other_hashtags, acc_status)
                 VALUES ('{$this->escape($facebookid)}','{$this->escape($firstname)}','{$this->escape($lastname)}'
                 ,'{$this->escape($studentid)}','{$this->escape($year)}','{$this->escape($programme)}','{$this->escape($bio)}'
                 ,'{$this->escape($hashtags)}','{$this->escape($otherHashtags)}','registered')";
                $insert = $this->db->query($sql);
                 
                if($insert){
                    return true;
                } else {
                    $this->error = [$this->db->error, $sql];
                    return false;
                }
            }
        }
    }
    
?>