<?php
     class Beneficiary{
        var $id;
        var $validdocument;
        var $fname;
        var $lname;
        var $contact; 
        var $username;
        var $password;
        var $address;
        var $barangay;
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
        function set_fname($f,$con){
            $this->fname=validate_data($f,$con);
        } 
        function set_lname($f,$con){
            $this->lname=validate_data($f,$con);
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
        function set_address($f,$con){
            $this->address=validate_data($f,$con);
        }
        function set_brgy($f,$con){
            $this->barangay=validate_data($f,$con);
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
            $sql='insert into tbl_beneficiary values(?,?,?,?,?,?,?,?,?,?)';
            $qry=$con->prepare($sql);   
            $qry->bind_param('issssssssi',$this->id,$this->validdocument,$this->fname,$this->lname,$this->contact,$this->address,$this->barangay,$this->username,$this->password,$this->status);
            if($qry->execute()){
                move_uploaded_file($this->tmp_name,$this->validdocument); 
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
            $sql="update tbl_beneficiary set contact=? where b_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->contact,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_password($con){
            $sql="update tbl_beneficiary set password=? where b_id=?";
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
            $sql="update tbl_beneficiary set status=? where b_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->status,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function login($con){
            $sql="select b_id,status from tbl_beneficiary where username=? and password=?";
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
            $sql="select count(b_id) from tbl_beneficiary";
            $qry=$con->prepare($sql); 
            $qry->bind_result($count);
            $qry->execute();
            if($qry->fetch()){
               return $count; 
            }
        }

        function beneficiary_info($id, $con){
            $sql = "select b_id, validdocument, fname, lname, contact, address, barangay, status from tbl_beneficiary where b_id=$id";
            $qry = $con->prepare($sql);
            $qry->bind_result($this->id, $this->validdocument, $this->fname, $this->lname, $this->contact, $this->address, $this->barangay, $this->status);
            $qry->execute();
            $data = "";
            $r = 0;
            $statz=array("pending..","<p style='color:green'>Accepted</p>","<p style='color:crimson'>Rejected</p>");
            while($qry->fetch()){
                $r++;
                $data = $data."<tr>
                    <td id='t".$this->id."'>".ucfirst($statz[$this->status])."</td>
                    <td>".ucfirst($this->fname)." ".ucfirst($this->lname)."</td>
                    <td>".ucfirst($this->contact)."</td>
                    <td>".ucfirst($this->address)."</td>
                    <td>".ucfirst($this->barangay)."</td>
                    <td><a target='_blank' href=".$this->validdocument.">Valid ID</a></td>
                </tr> 
                ";
            }
            return $data;
        }
    }
?>
