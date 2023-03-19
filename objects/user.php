<?php 
    class User{ 
        var $id;
        var $username;
        var $password;
        var $fname;
        var $lname; 
        var $email;
        var $contact;
        var $usertype;
        function set_id($f,$con){
            $this->id=validate_data($f,$con);
        }
        function set_username($f,$con){
            $this->username=validate_data($f,$con);
        }
        function set_password($f,$con){
            $this->password=validate_data($f,$con);
        }
        function set_fname($f,$con){
            $this->fname=validate_data($f,$con);
        } 
        function set_lname($f,$con){
            $this->lname=validate_data($f,$con);
        }
        function set_email($f,$con){
            $this->email=validate_data($f,$con);
        }
        function set_contact($f,$con){
            $this->contact=validate_data($f,$con);
        }
        function set_usertype($f,$con){
            $this->usertype=validate_data($f,$con);
        }
        function insert($con){
            $sql="insert into tbl_user values(?,?,?,?,?,?,?,?)";
            $qry=$con->prepare($sql);
            $qry->bind_param('issssssi',$this->id,$this->username,$this->password,$this->fname,$this->lname,$this->email,$this->contact,$this->usertype); 
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_user($con){
            $sql="update tbl_user set fname=?,lname=?,email=?,contact=? where u_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ssssi',$this->fname,$this->lname,$this->email,$this->contact,$this->id);  
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_password($con){
            $sql="update tbl_user set password=? where u_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->password,$this->id);  
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function delete_user($con){
            $sql="delete from tbl_user where u_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('i',$this->id); 
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function select($con){
            $sql="select * from tbl_user order by fname desc";
            $qry=$con->prepare($sql);
            $qry->bind_result($r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8); 
            $data="";
            if($qry->execute()){
                while($qry->fetch()){
                    $data=$data."
                        <tr id='tr$r1'>
                        <td>$r2</td>
                        <td>$r4</td>
                        <td>$r5</td>
                        <td>$r6</td>
                        <td>$r7</td>
                        <td><a href='#' onclick='updates(\"$r1\")'>Update</a> / <a href='#' onclick='deletes(\"$r1\")' style='color:crimson'> Delete </a> / <a href='#' onclick='recovers(\"$r1\")' style='color:green'> Recover </a></td>
                            </tr>
                    ";
                }
                return $data;
            }else{
                return $qry->error;
            }
        }
        function select_indi($id,$con){
            $sql="select * from tbl_user where u_id=".$id." order by fname desc";
            $qry=$con->prepare($sql);
            $qry->bind_result($r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8); 
            $data="";
            if($qry->execute()){
                while($qry->fetch()){
                    $data=$data."
                        <tr+>
                        <td>$r2</td>
                        <td>$r4</td>
                        <td>$r5</td>
                        <td>$r6</td>
                        <td>$r7</td>
                        <td><a href='#' onclick='updates(\"$r1\")'>Update</a> / <a href='#' onclick='deletes(\"$r1\")' style='color:crimson'> Delete </a> / <a href='#' onclick='recovers(\"$r1\")' style='color:green'> Recover </a></td>
                            </tr>
                    ";
                }
                return $data;
            }else{
                return $qry->error;
            }
        }
        function login($con){
            $sql="select u_id from tbl_user where username=? and password=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ss',$this->username,$this->password);
            $qry->bind_result($this->id);
            if($qry->execute()){
               if($qry->fetch()){
                   return $this->id;
               }
            }else{
                return $qry->error;
            }
        }
        
     }
   
    ?>