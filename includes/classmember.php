<?php include "database.php";
class Member
{
    
    public function __construct($id)
    {
        $this->_id          = $id;
        $this->_username    = "";
        $this->_mail        = "";
        $this->_propo       = "";
        $this->_characters  = array();        
        $this->_security    = 0;
    }
    
    public static function CheckUsername($username)
    {
        return preg_match("#^[a-zA-Z0-9]+$#", $username);
    }
    
    public static function CheckMail($mail)
    {
        return preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$#", $mail);
    }

    public static function CheckAlreadyUsed($username, $mail, $except = 0)
    {
        global $db_connect;

        $nameReq = $db_connect->prepare("SELECT * FROM account WHERE username = ? AND id != ?");
        $nameReq->execute(array($username, $except));
        
        $mailReq = $db_connect->prepare("SELECT * FROM account WHERE email = ? AND id != ?");
        $mailReq->execute(array($mail, $except));
        
        if ($nameReq->fetch())
            return "error_name_already_used";
        
        if ($mailReq->fetch())
           return "error_mail_already_used";
        
        return "OK";
    }
    
    public static function Create($id, $username, $pass, $mail, $propo)
    {
        
        global $db_connect;
        
        if (!$id)
        {
            if (!Member::CheckUsername($username))
                return "error_username";

            if (!Member::CheckMail($mail))
                return "error_mail";
        }

        $result = Member::CheckAlreadyUsed($username, $mail, $id);
        if ($result != "OK")
            return $result;

        $username = ucfirst(strtolower($username));
        $crypted_pass = sha1(strtoupper($username . ':' . $pass));

        
        if ($pass == "")
        {
            
                return "error_pass";
        }

        $reqUser = $db_connect->prepare("INSERT INTO account (id, username, pass, email, joindate, apropos) VALUES
                                     (?, ?, ?, ?, NOW(), ?)");
        $reqUser->execute(array($id, $username, $crypted_pass, $mail, $propo));
        
        if (!$id)
        {
            $reqUserId = $db_connect->prepare("SELECT id FROM account WHERE username = ?");
            $reqUserId->execute(array($username));
            
            if ($userIdData = $reqUserId->fetch())
                $id = $userIdData['id'];
        }
        
      

       
        return "OK";
    }
    }
    ?>