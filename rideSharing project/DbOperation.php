<?php
    class DbOperation{
        private $con;
        private $db;
        //__construct if first start function ,java e.x.) public DbOperation(){}
        
        /**
         * [__construct description]
         */
        function __construct(){
            require_once dirname(__FILE__).'/DbConnect.php';
            $db=new DbConnect();
            $this->con=$db->connect();
        }
        //declaration used function.
        //
        //
        //
        //sample function.
        //function createUser($username,$pass,$email){
        //    $password=md5($pass); //CheckSum password
        //    $stmt=$this->con->prepare("INSERT INTO 'users' ('id','username','password','email') VALUES(NULL,?,?,?);");//prepare(mysql command);
        //    $stmt->bind_param("sss",$username,$password,$email);                                                        //exchange parameter;
        //    if($stmt->execute()){                               //stmt is execute?
        //        return true;
        //    }else{
        //        return false;
        //        }

        //}

        //Costomer Function
        
        
        function InsertdataToCostomer($postName,$postAddress,$postNumber,$DeliverCheck,$postEmail,$ReceiverName,$ReceiverAddress,$ItemName,$ReceiverNumber,$postCheck,$d){
            if($stmt=$this->con->prepare("INSERT INTO COMSTOMERS VALUE(?,?,?,?,?,?,?,?,?,?,?)")){
            $stmt->bind_param('ssiissssiis',$postName,$postAddress,(int)$postNumber,(int)$DeliverCheck,$postEmail,$ReceiverName,$ReceiverAddress,$ItemName,(int)$ReceiverNumber,(int)$postCheck,$d);
            if($stmt->execute()){
                return true; 
            }else{
                return false;
            }
        }else{
                return "\n"."error_code : ".mysqli_error($this->con) . "\n";

        }
        }

        function getValueToCostomer($Costomerkey){
            if($stmt=$this->con->prepare("SELECT * FROM COMSTOMERS WHERE postName=?")){
                $stmt->bind_param('s',$Costomerkey);
                $stmt->execute();
                $result=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);//mysqli_fetch_array($stmt);
                $str="";
                if($result==NULL)
                    return "null";
                else{
                    for ($i=0; $i <count($result); $i++) { 
                        if($i==0)
                            $str=implode(',', $result[$i]);
                        else
                            $str=$str.'/'.implode(',', $result[$i]);
                    }
                    return $str;
                }
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }
        }

        function DeleteToCostomer($DeleteKey){
            
            if($stmt=$this->con->prepare("DELETE FROM COMSTOMERS WHERE postName=?")){
                $stmt->bind_param('s',$DeleteKey);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
                }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
                }
             

            }
        


        //Item Function
        function InsertdataToItems($itemNumber,$itemName,$Sender,$Receiver,$ItemCount){
            if($stmt=$this->con->prepare("INSERT INTO Items VALUE(?,?,?,?,?)")){
            $stmt->bind_param('isssi',(int)$itemNumber,$itemName,$Sender,$Receiver,(int)$ItemCount);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }else{
                return "\n"."error_code : ".mysqli_error($this->con) . "\n";

        }
        }
        function getValueToItem($ItemKey){
            if($stmt=$this->con->prepare("SELECT * FROM ITEMS WHERE itemName=?")){
                $stmt->bind_param('s',$ItemKey);
                $stmt->execute();
                $result=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);//mysqli_fetch_array($stmt);
                $str="";
                if($result==NULL)
                    return "null";
                else{
                    for ($i=0; $i <count($result); $i++) { 
                        if($i==0)
                            $str=implode(',', $result[$i]);
                        else
                            $str=$str.'/'.implode(',', $result[$i]);
                    }
                    return $str;
                }
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }
        }
        function DeleteToItems($DeleteKey){
            if($stmt=$this->con->prepare("DELETE FROM ITEMS WHERE itemName=?")){
                $stmt->bind_param('s',$DeleteKey);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
                }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
                }

        }


        //Uber Function
        function InsertdataToUber($ReceiverName,$ReceiverNumber,$ReceiverAddress,$Item,$SenderAddress,$SenderNumber,$DeliverCheck,$UberId,$UberName,$postCheck,$d){
            if($stmt=$this->con->prepare("INSERT INTO UBER(ReceiverName,ReceiverNumber,ReceiverAddress,Item,SenderAddress,SenderNumber,DeliverCheck,UberId,UberName,postCheck,d) VALUE(?,?,?,?,?,?,?,?,?,?,?)")){
                    $Receivernumber=(int)$ReceiverNumber;
                    $Sendernumber=(int)$SenderNumber;
                    $Delivercheck=(int)$DeliverCheck;
                    $postcheck=(int)$postCheck;
            $stmt->bind_param('sisssiissis',$ReceiverName,$Receivernumber,$ReceiverAddress,$Item,$SenderAddress,$Sendernumber,$Delivercheck,$UberId,$UberName,$postcheck,$d);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
        }
        }
        function getUbernameToUber($Uberkey){
            if($stmt=$this->con->prepare("SELECT * FROM UBER WHERE UberName=?")){
                $stmt->bind_param('s',$Uberkey);
                $stmt->execute();
                $result=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);//mysqli_fetch_array($stmt);
                $str="";
                for ($i=0; $i <count($result); $i++) { 
                    if($i==0)
                        $str=implode(',', $result[$i]);
                    else
                        $str=$str.'/'.implode(',', $result[$i]);
                }
                if($result==NULL)
                    return "null";
                else
                    return $str;
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }

        }
        function getDateToUber($Uberkey){
            if($stmt=$this->con->prepare("SELECT * FROM UBER WHERE d=?")){
                $stmt->bind_param('s',$Uberkey);
                $stmt->execute();
                $result=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);//mysqli_fetch_array($stmt);
                $str="";
                for ($i=0; $i <count($result); $i++) { 
                    if($i==0)
                        $str=implode(',', $result[$i]);
                    else
                        $str=$str.'/'.implode(',', $result[$i]);
                }
                if($result==NULL)
                    return "null";
                else
                    return $str;
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }


        }
        function getAllToUber(){
            if($stmt=$this->con->prepare("SELECT * FROM UBER")){
                $stmt->execute();
                $result=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);//mysqli_fetch_array($stmt);
                $str="";
                for ($i=0; $i <count($result); $i++) { 
                    if($i==0)
                        $str=implode(',', $result[$i]);
                    else
                        $str=$str.'/'.implode(',', $result[$i]);
                }
                if($result==NULL)
                    return "null";
                else
                    return $str;
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }


        }
        function DeleteToUber($DeleteKey){
            if($stmt=$this->con->prepare("DELETE FROM UBER WHERE UberId=? AND d=?")){
                $arr=explode(",", $DeleteKey);
                $stmt->bind_param('ss',$arr[0],$arr[1]);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
                }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
                }
        }

        function changeUbertoUber($ChangeUberIdName,$changedUberName,$date){
            if($stmt=$this->con->prepare("UPDATE UBER SET UberName=?,UberId=? WHERE UberName=? AND d=?")){
            $arr=explode(",", $ChangeUberIdName);
            $stmt->bind_param('ssss',$arr[0],$arr[1],$changedUberName,$date);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }
        }

        function changepostChecktoUber($postCheck,$ReceiverName,$item){
            if($stmt=$this->con->prepare("UPDATE UBER SET postCheck=? WHERE ReceiverName=? AND Item=?")){
                $postcheck=(int)$postCheck;
            $stmt->bind_param('iss',$postcheck,$ReceiverName,$item);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }
        }
        function changedeliveryChecktoUber($DeliverCheck,$ReceiverName,$item){
            if($stmt=$this->con->prepare("UPDATE UBER SET DeliverCheck=? WHERE ReceiverName=? AND Item=?")){
            $deliverCheck=(int)$DeliverCheck;
            $stmt->bind_param('iss',$deliverCheck,$ReceiverName,$item);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }
        }

        //User Function
        function InsertdataToUser($userID,$userPassword,$userName,$userAge,$userAddress,$userNumber,$userEmail,$tag){
            if($stmt=$this->con->prepare("INSERT INTO USER  VALUE(?,?,?,?,?,?,?,?)")){
                $userage=(int)$userAge;
                $usernumber=(int)$userNumber;
                $Tag=(int)$tag;
            $stmt->bind_param("sssisisi",$userID,$userPassword,$userName,$userage,$userAddress,$usernumber,$userEmail,$Tag);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }
        }
        function getValueToUser($Userkey){
            
                if($stmt=$this->con->prepare("SELECT * FROM USER WHERE userID=?")){
                $stmt->bind_param('s',$Userkey);
                $stmt->execute();
                $result=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);//mysqli_fetch_array($stmt);
                $str="";
                if($result==NULL)
                    return "null";
                else{
                    for ($i=0; $i <count($result); $i++) { 
                        if($i==0)
                            $str=implode(',', $result[$i]);
                        else
                            $str=$str.'/'.implode(',', $result[$i]);
                    }
                    return $str;
                }
            }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
            }
        }
        function DeleteToUser($DeleteKey){
            if($stmt=$this->con->prepare("DELETE FROM USER WHERE userID=?")){
                $stmt->bind_param('s',$DeleteKey);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
                }else{
                    return "\n"."error_code : ".mysqli_error($this->con) . "\n";
                }
        }
    }

?>