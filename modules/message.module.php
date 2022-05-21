<?php
    require 'encrypt.module.php';

    Class Message extends Encryption {
        private $to;
        private $from;
        private $message;
        private $db;

        public string $error = '';

        public function __construct($db){
            $this->db = $db;
        }
        public function to(string $facebookid) {
            $this->to = $facebookid;
        }
        public function from(string $facebookid) {
            $this->from = $facebookid;
        }
        public function message(string $message) {
            $this->message = $message;
        }
        public function send() {
            try {
                if(!$this->db->ping()) {
                    throw new Exception("Cannot connect to database.", 1);
                }
                if(empty($this->to)) {
                    throw new Exception("Receiver cannot empty", 1);
                }
                if(empty($this->from)) {
                    throw new Exception("Sender cannot empty", 1);
                }
                if(empty($this->message)) {
                    throw new Exception("Message cannot empty", 1);
                }
                if($this->to === $this->from) {
                    throw new Exception("Sender and receiver cannot be the same", 1);
                }

                $stmt = $this->db->prepare("SELECT acc_facebookid FROM accounts WHERE acc_facebookid = ?");
                $stmt->bind_param("s", $facebookid);
                
                $facebookid = $this->to;
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows !== 1) {
                    throw new Exception("Receiver not found", 1);
                }

                $facebookid = $this->from;
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows !== 1) {
                    throw new Exception("Sender not found", 1);
                }

                $stmt = $this->db->prepare("INSERT INTO messages SET mss_to = ?, mss_from = ?, mss_message = ?, mss_time = ?");
                $stmt->bind_param("ssss", $to, $from, $message, $time);

                parent::__construct();
                
                $to = $this->to;
                $from = $this->from;
                $message = $this->encrypt($this->message);
                $time = date('Y-m-d H:i:s');

                if($stmt->execute()) {
                    return true;
                } else {
                    throw new Exception("Final statement failed", 1);
                }
            } catch (Exception $e) {
                $this->error = $e->getMessage();
                return false;
            }
        }
    }
?>