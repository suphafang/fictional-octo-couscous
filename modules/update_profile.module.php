<?php
    require 'database.module.php';

    Class Update {
        private $facebookid;
        private $bio;
        private $tags;
        private $facebook;
        private $instagram;
        private $line;

        public $error;

        public function set_value(string $facebookid, $bio = null, $tags = null, $facebook = null, $instagram = null, $line = null) {
            $this->facebookid = $facebookid;
            $this->bio = $bio;
            $this->tags = $tags;
            $this->facebook = $facebook;
            $this->instagram = $instagram;
            $this->line = $line;
            return true;
        }

        public function upload(string $type) {
            try {
                $sql = "UPDATE accounts SET";

                if($type === 'profile') {
                    if(is_null($this->bio) || is_null($this->tags)) {
                        throw new Exception("Bed request", 1);
                    }
                    $sql .= " acc_bio = ?, acc_other_hashtags = ?";
                } elseif($type === 'contact') {
                    if(is_null($this->facebook) || is_null($this->instagram) || is_null($this->line)) {
                        throw new Exception("Bed request", 1);
                    }
                    $sql .= " acc_sn_facebook = ?, acc_sn_instagram = ?, acc_sn_line = ?";
                } else {
                    throw new Exception("Update type is invalid", 1);
                }

                $sql .= " WHERE acc_facebookid = ? LIMIT 1";
                

                $db = new Database;
                $db->connect();
                $stmt = $db->conn->prepare($sql);
                ($type === 'profile') ? $stmt->bind_param('sss', $this->bio, $this->tags, $this->facebookid) : $stmt->bind_param('ssss', $this->facebook, $this->instagram, $this->line, $this->facebookid);
                if(!$stmt->execute()) {
                    throw new Exception("Execute failed", 1);
                }

                return true;

            } catch (Exception $e) {
                $this->error = $e->getMessage();
                return false;
            }
        }
    }
?>