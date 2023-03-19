<?php 

class Event {
    var $id;
    var $title;
    var $description;
    var $date;
    var $images;
    var $imagesArr = array();
    var $created_at;
    var $upload_location = "../files/events/";

    function set_id($f,$con) {
        $this->id=validate_data($f,$con);
    }
    function set_title($f, $con) {
        $this->title=validate_data($f,$con);
    }
    function set_description($f, $con) {
        $this->description=validate_data($f,$con);
    }
    function set_date($f, $con) {
        $this->date=validate_data($f,$con);
    }
    function set_images($f, $con) {
        $this->images=validate_data($f,$con);
    }

    function insert_event($con){
        $sql="insert into tbl_event (title, description, date) values(?,?,STR_TO_DATE(?,'%Y-%m-%d'))";
        $qry=$con->prepare($sql);
        $qry->bind_param('sss',$this->title,$this->description,$this->date);
        if($qry->execute()){
            $this->save_and_upload_images($qry->insert_id, $con);
        }else{
            return $qry->error;
        }
    }

    function save_and_upload_images($event_id, $con) {
        $sql="insert into tbl_event_image (event_id, image) values ";
        $insert_data = unserialize(html_entity_decode($this->images));
        foreach ($insert_data as $image) {
            $sql .= "('".$event_id."', '".$image."'),";
        }

        // remove the last comma
        $sql = rtrim($sql, ",");

        if($con->query($sql) === TRUE){
            foreach($this->imagesArr as $key=>$val) {
                if(!move_uploaded_file($key, $this->upload_location.$val)){
                    return 'Failed to upload images';
                }
            }
            $con->close();
        }else{
            return $con->error;
        }
    }

    function get_event_info($con) {
        $sql = "select * from tbl_event where id = ?";
        $qry = $con->prepare($sql);
        $qry->bind_param('i', $this->id);
        $qry->execute();
        $result = $qry->get_result();
        $data = array();

        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return json_encode($data);
    }

    function edit_event($con) {
        $sql = "update tbl_event set title=?, description=?, date=STR_TO_DATE(?,'%Y-%m-%d') where id=?";
        $qry = $con->prepare($sql);
        $qry->bind_param('sssi', $this->title, $this->description, $this->date, $this->id);
        if($qry->execute()){
            $qry->close();
        }else{
            return $qry->error;
        }
    }

    function delete_event($con) {
        $this->delete_event_image($con);

        $sql="delete from tbl_event where id = ?";
        $qry=$con->prepare($sql);
        $qry->bind_param('i', $this->id);
        if($qry->execute()){
            $qry->close();
        }else {
            return $qry->error;
        }
    }

    function delete_event_image($con) {
        $sql_select_images = "select * from tbl_event_image where event_id = ?";
        $qry=$con->prepare($sql_select_images);
        $qry->bind_param('i', $this->id);
        $qry->execute();
        $result = $qry->get_result();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $sql = "delete from tbl_event_image where id = ?";
                $qry = $con->prepare($sql);
                $qry->bind_param('i', $id);
                if(!$qry->execute()){
                    echo "Error deleting event image: " . $qry->error."<br>";
                }
            }
        }
    }
}

?>