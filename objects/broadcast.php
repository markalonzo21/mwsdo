<?php
    class Broadcast{
        var $id;
        var $broadcast_mes;
        var $datez;
        function set_id($f,$con){
            $this->id=validate_data($f,$con);
        }
        function set_broadcast_mes($f,$con){
            $this->broadcast_mes=validate_data($f,$con);
        }
        function set_date($f,$con){
            $this->datez=validate_data($f,$con);
        }
        function get_broadcast_mes(){
            return $this->broadcast_mes;
        }
        function update_broadcast($con){
            $sql="update tbl_broadcastmessage set broadcastmes=?,date=? where id=?";
            $qry=$con->prepare($sql);
            $qry->bind_param('ssi',$this->broadcast_mes,$this->datez,$this->id); 
            if($qry->execute()){ 
                echo $this->id;
                $qry->close();
            }else{
                return $qry->error;
            }
        }
        function select($con){
            $sql="select broadcastmes from tbl_broadcastmessage";
            $qry=$con->prepare($sql);
            $qry->bind_result($mes);
            $qry->execute();
            if($qry->fetch()){
                return $mes;
            }
            
        }
    }
?>