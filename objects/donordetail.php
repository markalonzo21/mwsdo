<?php
    require_once('notification.php');

    class Donor_detail{ 
        var $id;
        var $donor_id;
        var $typeofdonation;
        var $amount;
        var $relief;
        var $detail;
        var $datez;
        var $status;
        var $proofofpayment;
        var $tmpname;
        var $notification;

        function set_id($f,$con){
            $this->id=validate_data($f,$con);
        }
        function set_donor_id($f,$con){
            $this->donor_id=validate_data($f,$con);
        }
        function set_typeofdonation($f,$con){
            $this->typeofdonation=validate_data($f,$con);
        }
        function set_amount($f,$con){
            $this->amount=validate_data($f,$con);
        } 
        function set_relief($f,$con){
            $this->relief=validate_data($f,$con);
        } 
        function set_detail($f,$con){
            $this->detail=validate_data($f,$con);
        }
        function set_date($f,$con){
            $this->datez=validate_data($f,$con);
        } 
        function set_status($f,$con){
            $this->status=validate_data($f,$con);
        }
        function set_proof_of_payment($f,$con){
            $this->proofofpayment=validate_data($f,$con);
        }
        function set_tmp_name($f,$con){
            $this->tmpname=$f;
        }
        function insert($con){
            $sql="insert into tbl_donordetail values(?,?,?,?,?,?,?,?,?)";
            $qry=$con->prepare($sql);
            $qry->bind_param('iisssssis',$this->id,$this->donor_id,$this->typeofdonation,$this->amount,$this->relief,$this->detail,$this->datez,$this->status,$this->proofofpayment); 
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_typeofdonation($con){
            $sql="update tbl_donordetail set typeofdonation=? where dd_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->typeofdonation,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_amount($con){
            $sql="update tbl_donordetail set amount=? where dd_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->amount,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_detail($con){
            $sql="update tbl_donordetail set detail=? where dd_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si',$this->detail,$this->id);
            if($qry->execute()){
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_status($con){
            $sql="update tbl_donordetail set status=? where dd_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ii',$this->status,$this->id);
            if($qry->execute()){
                $this->notify_donor($con, $this->status, $this->id);
                // $qry->close();
            }else{
                return $qry->error;
            }
        }
        function update_proofofpayment($con){
            $sql="update tbl_donordetail set proofofpayment=? where dd_id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('si', $this->proofofpayment,$this->id);
            if($qry->execute()){
                move_uploaded_file($this->tmpname,$this->proofofpayment);
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function notify_donor($con, $status, $id){
            $this->notification = new Notification();
            $this->notification->set_receiver_id($this->donor_id, $con);
            $this->notification->set_message('#'.$id.($status == 1 ? ' donation  has been accepted!' : ' donation has been rejected!'), $con);
            $this->notification->set_status(0, $con);
            $this->notification->insert_notification($con);
        }
        function countz($con){
            $sql="select count(dd_id) from tbl_donordetail";
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
                 $sql="select * from tbl_donordetail where donor_id='".$id."' order by dd_id desc";
            }else{
                 $sql="select * from tbl_donordetail   order by dd_id desc";
            }
            $qry=$con->prepare($sql); 
            $qry->bind_result($this->id,$this->donorid,$this->typeofdonation,$this->amount,$this->relief,$this->detail,$this->datez,$this->status,$this->proofofpayment);
            $qry->execute();
            $data="";
            $color=array("class='pendings'","class='accepteds'","class='rejecteds'"); 
            $r=0;
            while($qry->fetch()){
                $dat="";
                $statz=array("<a href='#' style='color:green' onclick=\"acceptz('".$this->id."','".$this->donorid."')\">Accept</a> / <a href='#' style='color:crimson' onclick=\"deletez('".$this->id."','".$this->donorid."')\">Reject</a>",'Accepted',"<p style='color:crimson'>Rejected</p>");
                if(strlen($this->detail)>30){
                    $dat=substr($this->detail,0,30);
                    $dat=$dat."<span id='hide$r' style=\"display:none\">
                    ".substr($this->detail,30,strlen($this->detail))."
                    </span><span onclick=\"readmore('hide$r','rm$r')\" id=\"rm$r\" class=\"hoverr\">..Read More</span>"; 
                } else{
                    $dat=$this->detail;
                }
                $r++;
                 $data=$data."<tr ".$color[$this->status]." >
                 
                        <td>".ucfirst(date('Y-m-d',strtotime($this->datez)))."</td>
                        <td>".ucfirst($this->typeofdonation)."</td>
                        <td>".ucfirst($this->amount)."</td>
                        <td>".ucfirst($this->relief)."</td>
                        <td>".ucfirst($dat)."</td>
                        <td id='t".$this->id."'.>".ucfirst($statz[$this->status])."</td>
                        <td>".($this->proofofpayment ? $this->view_image($this->proofofpayment) : "")."</td>
                    </tr> 
                    ";
            }
            return $data;
        }
        function qr_icon($id){
            return "<a href='#' class='qr' onclick='set_id(".$id.");' data-target='#qrdonatesModal' data-toggle='modal'><span class='glyphicon glyphicon-qrcode' aria-hidden='true'></span> </a>";
        }
        function view_image($image){
            return "<a class='img-link' href=".$image." target='_blank' >
                <span class='glyphicon glyphicon-new-window' aria-hidden='true'></span> View image</a>";
        }
        function donation(){
            return $this->relief ? ucfirst($this->relief) :
                ($this->amount && $this->status !== 1 ? $this->qr_icon($this->id) : '').ucfirst($this->amount);
        }
        function select_cliz($id,$con){
            $sql="";
            if($id!=null){
                 $sql="select * from tbl_donordetail where donor_id='".$id."'";
            }else{
                 $sql="select * from tbl_donordetail";
            }
            $qry=$con->prepare($sql); 
            $qry->bind_result($this->id,$this->donorid,$this->typeofdonation,$this->amount,$this->relief,$this->detail,$this->datez,$this->status,$this->proofofpayment);
            $qry->execute();
            $data=""; 
            $r=0;
            
            $statz=array("pending..","<p style='color:green'>Accepted</p>","<p style='color:crimson'>Rejected</p>");
            while($qry->fetch()){
                $dat="";
                if(strlen($this->detail)>30){
                    $dat=substr($this->detail,0,30);
                    $dat=$dat."<span id='hide$r' style=\"display:none\">
                    ".substr($this->detail,30,strlen($this->detail))."
                    </span><span onclick=\"readmore('hide$r','rm$r')\" id=\"rm$r\" class=\"hoverr\">..Read More</span>"; 
                } else{
                    $dat=$this->detail;
                }
                $r++;
                 $data=$data."<tr>
                        <td>".ucfirst(date('Y-m-d',strtotime($this->datez)))."</td>
                        <td>".$this->id."</td>
                        <td>".$this->donation()."</td>
                        <td>".ucfirst($dat)."</td>
                        <td id='t".$this->id."'.>".ucfirst($statz[$this->status])."</td>
                        <td>".($this->proofofpayment ? $this->view_image($this->proofofpayment) : "")."</td>
                    </tr> 
                    ";
            }
            return $data;
        }
     }

    //  <td>".ucfirst($this->typeofdonation)."</td>
    //  td id='".$this->id."'.>".($this->amount && $this->status !== 1 ? $this->qr_icon($this->id) : '').ucfirst($this->amount)."</td>
    //                     <td>". ucfirst($this->relief)."</td>

    /*require '../connect/coon.php';
    $d=new Donor_detail();
    echo $d->countz($con);
    /*update 
    $d->set_donor_id(2,$con);
    $d->set_typeofdonation(8,$con);
    $d->set_amount(3,$con);
    $d->set_detail(4,$con);
    $d->set_date(5,$con);
    $d->set_status(6,$con);
    $d->insert($con);
    
    
    $d->set_id(2,$con);
    $d->set_typeofdonation('xxc',$con);
    echo $d->update_typeofdonation($con); 
    
    $d->set_amount('1xxc',$con);
    echo $d->update_amount($con);
    $d->set_detail('2xxc',$con);
    echo $d->update_detail($con);
    
    $d->set_status('0',$con);
    echo $d->update_status($con);*/
?>