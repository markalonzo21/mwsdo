<?php 

    class Request{ 
        var $id;
        var $ben_id;
        var $typeofcalamity;
        var $file;
        var $descriptionofrequest;
        var $amountreceived;
        var $status;
        var $remarks; 
        var $datez;
        var $tmp_name;
        var $notification;

         function set_id($f,$con){
            $this->id=validate_data($f,$con);
        }
        
         function set_datez($f,$con){
            $this->datez=validate_data($f,$con);
        }
        function set_ben_id($f,$con){
            $this->ben_id=validate_data($f,$con);
        }
        function set_tmp_name($f,$con){
            $this->tmp_name=$f;
        }
        function set_typeofcalamity($f,$con){
            $this->typeofcalamity=validate_data($f,$con);
        } 
        function set_file($f,$con){
            $this->file=validate_data($f,$con);
        } 
        function set_descriptionofrequest($f,$con){
            $this->descriptionofrequest=validate_data($f,$con);
        } 
        function set_amountreceived($f,$con){
            $this->amountreceived=validate_data($f,$con);
        } 
        function set_status($f,$con){
            $this->status=validate_data($f,$con);
        }
        function set_remarks($f,$con){
            $this->remarks=validate_data($f,$con);
        }   
        function insert($con){
            $sql="insert into tbl_request values(?,?,?,?,?,?,?,?,?)";
            $qry=$con->prepare($sql);
            $qry->bind_param('iissssiss',$this->id,$this->ben_id,$this->typeofcalamity,$this->file,$this->descriptionofrequest,$this->amountreceived,$this->status,$this->remarks,$this->datez); 
            if($qry->execute()){
                move_uploaded_file($this->tmp_name,$this->file);
                // $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_descriptionofrequest($con){
            $sql="update tbl_request set descriptionofrequest=? where r_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->descriptionofrequest,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_amountreceived($con){
            $sql="update tbl_request set amountreceived=? where r_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->amountreceived,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_status($con){
            $sql="update tbl_request set status=? where r_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ii',$this->status,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_remarks($con){
            $sql="update tbl_request set remarks=? where r_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->remarks,$this->id);
            if($qry->execute()){
                $this->notify_bene($con, $this->status, $this->id);
                // $qry->close();
            }else{
                return $qry->error;
            }
        }
        function notify_bene($con, $status, $id){
            $this->notification = new Notification();
            $this->notification->set_receiver_id($this->ben_id, $con);
            $this->notification->set_message('#'.$id.($status == 1 ? ' request  has been accepted!' : ' request has been rejected!'), $con);
            $this->notification->set_status(0, $con);
            $this->notification->insert_notification($con);
        }
        function countz($con){
            $sql="select count(r_id) from tbl_request";
            $qry=$con->prepare($sql); 
            $qry->bind_result($count);
            $qry->execute();
            if($qry->fetch()){
               return $count; 
            }
        }
        function select($id,$con){
            $sql="";
            if($id!=null){
                 $sql="select * from tbl_request where ben_id='".$id."' order by status asc order by date";
            }else{
                 $sql="select a.*,b.fname,b.lname,b.address,b.contact from tbl_request as a
                 inner join tbl_beneficiary as b on a.ben_id=b.b_id
                 order by status asc";
            }
            $qry=$con->prepare($sql); 
            $qry->bind_result($this->id,$this->ben_id,$this->typeofcalamity,$this->file,$this->descrioptionofrequest,$this->amountreceived,
                              $this->status,$this->remarkz,$this->datez, $fname,$lname,$address,$contact);
            $qry->execute();
            $data="";
            $color=array("class='pendings'","class='accepteds'","class='rejecteds'");
            $calamities=array("nd"=>"Natural Disaster", "fr"=>"Fire", "ac"=>"Accident");
            while($qry->fetch()){
                $statz=array("<a href='#' style='color:green' onclick=\"acceptz('".$this->id."','".$this->ben_id."')\">Accept</a> / <a href='#' style='color:crimson' onclick=\"deletez('".$this->id."','".$this->ben_id."')\">Reject</a>",'Accepted',"<p style='color:crimson'>Rejected</p>");
                 $data=$data."<tr> 
                        <td>".ucfirst($fname.", ".$lname)."</td>  
                        <td>".ucfirst($address)."</td>
                        <td>".ucfirst($contact)."</td>
                        <td>".ucfirst($calamities[$this->typeofcalamity])."</td>
                        <td>".($this->file ? $this->view_image($this->file) : "")."</td>
                        <td>".ucfirst($this->descrioptionofrequest)."</td>
                        <td>".ucfirst($this->remarkz)."</td> 
                        <td>".ucfirst($this->datez)."</td> 
                        <td id='t".$this->id."'>".ucfirst($statz[$this->status])."</td>
                    </tr> 
                    ";
            }
            return $data;
        } 
        function select_cliz($id,$con){
            $sql="";
            if($id!=null){
                 $sql="select * from tbl_request where ben_id='".$id."' order by  r_id desc";
            }else{
                 $sql="select * from tbl_request order by  r_id desc";
            }
            $qry=$con->prepare($sql); 
            $qry->bind_result($this->id,$this->ben_id,$this->typeofcalamity,$this->file,
                $this->descrioptionofrequest,$this->amountreceived,$this->status,$this->remarkz,$this->datez);
            $qry->execute();
            $data="";
            $color=array("class='pendings'","class='accepteds'","class='rejecteds'"); 
                
            $statz=array("pending..","<p style='color:green'>Accepted</p>","<p style='color:crimson'>Rejected</p>");
            $calamities=array("nd"=>"Natural Disaster", "fr"=>"Fire", "ac"=>"Accident");
            while($qry->fetch()){ 
                if($this->status==1&&$this->amountreceived=="0"){
                    $this->amountreceived="<a href='#' style='color:orange;font-weight:bolder' onclick='set_amount(\"$this->id\")'>Set Received Amount </a>";
                }
                 $data=$data."<tr>
                         
                        <td>".ucfirst($this->datez)."</td> 
                        <td>".ucfirst($this->id)."</td> 
                        <td>".ucfirst($calamities[$this->typeofcalamity])."</td>
                        <td>".($this->file ? $this->view_image($this->file) : "")."</td>
                        <td>".ucfirst($this->descrioptionofrequest)."</td> 
                        <td id='r".$this->id."'>".ucfirst($this->remarkz)."</td>
                        <td id='t".$this->id."'>".ucfirst($statz[$this->status])."</td>
                    </tr> 
                    ";
            }
            return $data;
        }
        function view_image($image){
            return "<a class='img-link' href=".$image." target='_blank' >
                <span class='glyphicon glyphicon-new-window' aria-hidden='true'></span> View image</a>";
        }
        function notify($id,$con){ 
            $sql="select count(r_id) from tbl_request where ben_id='".$id."' and status=1 and amountreceived='0'"; 
            $qry=$con->prepare($sql); 
            $qry->bind_result($c);
            $qry->execute();  
            if($qry->fetch()){
                return $c;
            } 
            echo $qry->error;
        }
    }

    // <td>".ucfirst($this->amountreceived)."</td>
    /*include'../connect/coon.php';
    //$d=new Request();
    $d->set_ben_id(1,$con);
    $d->set_descriptionofrequest(2,$con);
    $d->set_amountreceived(3,$con);
    $d->set_status(4,$con);
    $d->set_remarks(5,$con);
   // echo $d->insert($con);
    $d->set_id(2,$con);
    $d->set_descriptionofrequest('xxc',$con);
    echo $d->update_descriptionofrequest($con); 
    
    $d->set_amountreceived('1xxc',$con);
    echo $d->update_amountreceived($con);
    $d->set_status('0',$con);
    echo $d->update_status($con);

    $d->set_remarks('asdasd',$con);
    echo $d->update_remarks($con);
*/ 
    ?>