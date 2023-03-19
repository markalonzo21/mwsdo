<?php
     class Donor{
        var $id;
        var $validdocument;
        var $fullname; 
        var $contact; 
        var $username;
        var $password;
        var $status;
        var $tmp_name;
        function set_id($f,$con){
            $this->id=validate_data($f,$con);
        }
        function set_tmp_name($f,$con){
            $this->tmp_name=$f;
        }
        function set_valid_document($f,$con){
            $this->validdocument=validate_data($f,$con);
        }
        function set_fullname($f,$con){
            $this->fullname=validate_data($f,$con);
        } 
        function set_contact($f,$con){
            $this->contact=validate_data($f,$con);
        } 
        function set_username($f,$con){
            $this->username=validate_data($f,$con);
        }
        function set_password($f,$con){
            $this->password=validate_data($f,$con);
        }
        function set_status($f,$con){
            $this->status=validate_data($f,$con);
        }
        function get_valid_document($f,$con){
            $this->$validdocument=$f;
        }
        function get_id(){
            return get_id();
        }
        function get_fullname(){ 
            return $this->fullname;
        } 
        function get_contact(){ 
            return $this->contact;
        }
        function get_address(){ 
            return $this->address;
        }
        function get_username(){ 
            return $this->username;
        }
        function get_password(){ 
            return $this->password;
        }
        function insert($con){  
            $sql='insert into tbl_donor values(?,?,?,?,?,?,?)';
            $qry=$con->prepare($sql);   
            $qry->bind_param('isssssi',$this->id,$this->validdocument,$this->fullname,$this->contact,$this->username,$this->password,$this->status);
            if($qry->execute()){
                move_uploaded_file($this->tmp_name,$this->validdocument);
                return "Successfully";
            }
            return  $qry->error;
        }
        function update_fullname($con){
            $sql="update tbl_donor set donorname=? where d_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->fullname,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
         function update_contact($con){
            $sql="update tbl_donor set contact=? where d_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->contact,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_password($con){
            $sql="update tbl_donor set password=? where d_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->password,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_document($con){
            $sql="update tbl_donor set validdocument=? where d_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->validdocument,$this->id);
            if($qry->execute()){
                move_uploaded_file($this->tmp_name,$this->validdocument);
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_status($con){
            $sql="update tbl_donor set status=? where d_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->status,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function login($con){
            $sql="select d_id,status from tbl_donor where username=? and password=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ss',$this->username,$this->password);
            $qry->bind_result($this->id,$this->status);
            if($qry->execute()){
               if($qry->fetch()){
                   return array($this->id,$this->status);
               }
            }else{
                return $qry->error;
            }
        }
        function countz($con){
            $sql="select count(d_id) from tbl_donor";
            $qry=$con->prepare($sql); 
            $qry->bind_result($count);
            $qry->execute();
            if($qry->fetch()){
               return $count; 
            }
        }
    }
   /* require '../connect/coon.php';
    $d=new Donor();
    $d->set_id(19,$con);
    $d->set_password(1,$con);
    echo $d->update_password($con);*/
?>