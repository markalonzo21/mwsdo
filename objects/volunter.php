<?php  
    class Volunteer{ 
        var $id;
        var $fname;
        var $mname;
        var $contact; 
        var $date_voluntered; 
        var $tmp_name; 
        var $status;
        var $validdocument;
        function set_valid_document($f,$con){
            $this->validdocument=$f;
        }
        function set_tmp_name($f,$con){
            $this->tmp_name=$f;
        } 
        function set_id($f,$con){
            $this->id=validate_data($f,$con);
        }
        function set_status($f,$con){
            $this->status=$f;
        }
        function set_fname($f,$con){
            $this->fname=validate_data($f,$con);
        } 
        function set_mname($f,$con){
            $this->mname=validate_data($f,$con);
        } 
        function set_lname($f,$con){
            $this->lname=validate_data($f,$con);
        }
        function set_contact($f,$con){
            $this->contact=validate_data($f,$con);
        }
        function set_date_voluntered($f,$con){
            $this->date_voluntered=validate_data($f,$con);
        }
        function insert($con){
            $sql="insert into tbl_volunteer values(?,?,?,?,?,?,?,?)";
            $qry=$con->prepare($sql);
            $qry->bind_param('issssssi',$this->id,$this->validdocument,$this->fname,$this->mname,$this->lname,$this->contact,$this->date_voluntered,$this->status);  
                
            if($qry->execute()){
                move_uploaded_file($this->tmp_name,$this->validdocument);
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_volunteer($con){
            $sql="update tbl_volunteer set fname=?,mname=?,lname=?,contact=? where v_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ssssi',$this->fname,$this->mname,$this->lname,$this->contact,$this->id); 
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_status($con){
            $sql="update tbl_volunteer set status=? where v_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ii',$this->status,$this->id); 
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function delete_volunteer($con){
            $sql="delete from tbl_volunteer where v_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('i',$this->id); 
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        
     }
    include'../connect/coon.php';
    $d=new Volunteer();  
    if(isset($_POST['insert'])){
        $stat=isset($_POST["qwe"]) ? 1 : 0;
        $d->set_fname($_POST['fname'],$con);
        $d->set_mname($_POST['mname'],$con);
        $d->set_lname($_POST['lname'],$con);
        $d->set_contact($_POST['contact'],$con);
        $d->set_date_voluntered(date('Y-m-d'),$con);
        $d->set_status($stat,$con);
        $d->set_tmp_name($_FILES['file']['tmp_name'],$con);
        $d->set_valid_Document("../files/".hash("SHA256",$_FILES['file']['tmp_name']).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION),$con);
        echo $d->insert($con);
    }
    if(isset($_POST['update'])){ 
        $d->set_id($_POST['id'],$con);
        $d->set_fname($_POST['fname'],$con);   
        $d->set_mname($_POST['mname'],$con);
        $d->set_lname($_POST['lname'],$con);
        $d->set_contact($_POST['contact'],$con); 
        $d->update_volunteer($con);
    } 
    if(isset($_POST['accept'])){ 
        $d->set_id($_POST['id'],$con);
        $d->set_status(1,$con); 
        $d->update_status($con);
    } 
    if(isset($_POST['delete'])){  
        $d->set_id($_POST['id'],$con);
        echo $d->delete_volunteer($con);
    }
    ?>