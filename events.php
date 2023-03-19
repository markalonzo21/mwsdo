<?php include'header.php'; 
    $sql="select distinct a.*, group_concat(b.image separator', ') from tbl_event as a 
    inner join tbl_event_image as b on a.id=b.event_id 
    group by a.id";
    $qry=$con->prepare($sql);
    $qry->bind_result($id, $title, $description, $date, $timestamp, $image);
    $images = array();
    $data = array();
    if($qry->execute()){
        while($qry->fetch()){
            $data[] = [
                'id' => $id,
                'title' => $title,
                'description' => $description,
                'date' => $date,
                'images' => explode(', ', $image)
            ];
        }
    }else{
        return $qry->error;
    }
?>

<div class="login-header">
    <img src="assets/images/urbizlogo.png">
    <div class="login-header-title">
        <h3 class="org">MWSDO</h3>
        <h3>Calamity Assistance Request and Monitoring System</h3>
    </div>
</div>

<div class="container">
    <div class="row">
    <h3>Donation Events</h3>
    <div class="event-container">
        <?php foreach($data as $key=>$item): ?>
        <div class="event-item">
            <div class="caption">
                <div class="caption-left">
                    <h3><?php echo $item['title']; ?></h3>
                    <p><?php echo $item['description']; ?></p>
                </div>
                <div class="caption-right">
                    <span class="event-date"><?php echo $item['date']; ?></span>
                </div>
            </div>
            <div class="event-imgs">
                <?php foreach($item['images'] as $image): ?>
                <div class="item">
                    <img src="files/events/<?php echo $image; ?>" alt="">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>
<?php include'footer.php'; ?>