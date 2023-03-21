<?php include'header.php'; ?>
<div class="content-heading">
    <h1 class="title">Events</h1>
    <?php include 'content_heading.php'; ?>
</div>
<div style="padding:20px;">
    <button class="btn btn-lg btn-success" data-target="#eventModal" data-toggle='modal'>Add Event</button>
</div>

<?php
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

<div class="event-container">
    <?php foreach($data as $key=>$item): ?>
    <div class="event-item">
        <div class="caption">
            <div class="caption-left">
                <h3><?php echo $item['title']; ?></h3>
                <p><?php echo $item['description']; ?></p>
            </div>
            <div class="caption-right">
                <div>
                    <button type="button" class="btn btn-default btn-sm edit" data-target='#editEventModal' data-toggle='modal' data-event-id="<?php echo $item['id'];?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                    </button>
                    <button type="button" class="btn btn-default btn-sm delete">
                        <span class="glyphicon glyphicon-trash" onclick="deleteEvent(<?php echo $item['id'];?>);" aria-hidden="true"></span> Delete
                    </button>
                </div>
                <span class="event-date"><?php echo $item['date']; ?></span>
            </div>
        </div>
        <div class="event-imgs">
            <?php foreach($item['images'] as $image): ?>
            <div class="item">
                <img src="../files/events/<?php echo $image; ?>" alt="">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Add Event</h4>
    </div>
    <div class="modal-body">

          <form class="form-donation" id="event_f">
                  <div class="row">
                      <div class="form-group col-md-12 ">
                          Upload Images<input type="file" name="images[]" class="form-control" required accept="image/png, image/jpeg, image/jpg" multiple>
                      </div>

                  </div>
                  <div class="row">

                      <div class="form-group col-md-12 ">
                          <input type="text" class="form-control php" name="title" placeholder="Title" required>
                      </div>

                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <input type="text" class="form-control php" name="description" placeholder="Description" d="d" required>
                      </div>

                      <div class="form-group col-md-12">
                          <input type="text" class="form-control php" name="date_of_event" placeholder="Date of Event" d="d" required>
                      </div>
                  </div>

                  <div class="row">

                      <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-primary pull-right btn-round">Add Event</button> 
                      </div>

                  </div> 
          </form>
      
    </div>
  </div>
</div>

</div> <!-- /.modal -->

<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Edit Event</h4>
    </div>
    <div class="modal-body">

          <form class="form-donation" id="edit_event_f">
            <input type="hidden" name="id" id="edit-id">
                  <div class="row">
                      <div class="form-group col-md-12 ">
                          <input type="text" class="form-control php" id="edit-title" name="title" placeholder="Title" required>
                      </div>

                  </div>

                  <div class="row">
                      <div class="form-group col-md-12">
                          <input type="text" class="form-control php" id="edit-desc" name="description" placeholder="Description" d="d" required>
                      </div>

                      <div class="form-group col-md-12">
                          <input type="text" class="form-control php" id="date_of_event_edit" name="date_of_event" placeholder="Date of Event" d="d" required>
                      </div>
                  </div>

                  <div class="row">

                      <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-primary pull-right btn-round">Update Event</button> 
                      </div>

                  </div> 
          </form>
      
    </div>
  </div>
</div>

</div> <!-- /.modal -->

</body>
</html>
<script>
    const host = 'http://localhost/mswdo/';
    $(document).ready(function(){
        $(".event-imgs").owlCarousel();
    });

    const datePickerOption = {
        singleDatePicker: true,
        locale: {
            format: "YYYY-MM-DD"
        }
    }

    $('input[name="date_of_event"]').daterangepicker(datePickerOption);

    $('#date_of_event_edit').daterangepicker(datePickerOption);

    $("#editEventModal").on('show.bs.modal', function (e) {
        let btn = $(e.relatedTarget);
        let id = btn.data('event-id');
        $.ajax({
            method:"POST",
            url:"process/event_info.php",
            data:{id},
            success:(e)=>{
                const data = JSON.parse(e);

                console.log(data);

                $("#edit-id").val(data[0].id);
                $("#edit-title").val(data[0].title);
                $("#edit-desc").val(data[0].description);
                $("#date_of_event_edit").val(data[0].date);
            }
        });
    })

    function deleteEvent(id) {
        console.log('event delete!', id);
        if(confirm("Are you sure you want to Delete this Event?")==false){ 
               return;
        }
        $.ajax({
            method:"POST",
            url:"process/delete_event.php",
            data:{id},
            success:(e)=>{
                alert("Successfully Deleted");
                location.reload();
            }
        });
    }

    $("#edit_event_f").on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "process/edit_event.php",
            type: "POST",
            data: formData,
            success: function (data){
                if(!data){
                    alert('Event successfully updated!!');
                    $('#editEventModal').hide('modal');
                    location.reload();
                }
            },
            cache: false,
            contentType: false,
            processData: false
        })
    });

    $("#event_f").on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url:  host + "insert_proc/add_event.php",
            type: "POST",
            data: formData,
            success: function (data){
                if(!data){
                    alert('Event successfully added!');
                    $('#eventModal').hide('modal');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        })
    });

</script>