<?php 

class Notification {
    var $id;
    var $receiver_id;
    var $message;
    var $status;
    var $created_at;

    function set_id($f,$con) {
        $this->id=validate_data($f,$con);
    }
    function set_receiver_id($f, $con) {
        $this->receiver_id=validate_data($f,$con);
    }
    function set_message($f, $con) {
        $this->message=validate_data($f,$con);
    }
    function set_status($f, $con) {
        $this->status=validate_data($f,$con);
    }

    function insert_notification($con){
        $sql="insert into tbl_notification (receiver_id, message, status) values(?,?,?)";
        $qry=$con->prepare($sql);
        $qry->bind_param('isi',$this->receiver_id,$this->message,$this->status);
        if($qry->execute()){
            $qry->close();
        }else{
            return $qry->error;
        }
    }

    function mark_all_as_read($ids,$r_id,$con){
        $sql="update tbl_notification set status=1 where id in (".implode(',', array_fill(0, count($ids), '?')).")";
        $qry=$con->prepare($sql);
        $qry->bind_param(str_repeat("i", count($ids)), ...$ids);
        if($qry->execute()){
            return $this->select_notifications($r_id,$con);
            // $qry->close();
        }else{
            return $qry->error;
        }
    }

    function count($r_id, $con) {
        $sql="select count(id) from tbl_notification where receiver_id='".$r_id."' and status=0";
        $qry=$con->prepare($sql); 
        $qry->bind_result($count);
        $qry->execute();
        if($qry->fetch()){
            return $count; 
        }
    }

    function select_notifications($r_id,$con){
        $sql="select * from tbl_notification where receiver_id='".$r_id."' order by created_at DESC";
        $qry=$con->prepare($sql);
        $qry->bind_result($this->id,$this->receiver_id,$this->message,$this->status,$this->created_at);
        $qry->execute();
        $data="";
        while ($qry->fetch()) {
            $data=$data."<li id=".$this->id." class='notif-message ".($this->status == 1 ? 'read': '')."'>".$this->message."</li>";
        }
        return $data;
    }
}

?>