 <div class="modal fade" id="broadcastModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Change Broadcast</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation" id="broadcast_f">

                        <h3 class="title-style-1 text-center">Change Broadcast<span class="title-under"></span>  </h3>
                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <textarea  class="form-control" placeholder="Broadcast.." required id="broad"></textarea>
                            </div>

                        </div>
                        

                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow">submit</button> 
                            </div>

                        </div> 
                </form>
          </div>
        </div>
      </div>
</div> <!-- /.modal -->
<script>
    function show_broad(){
        $("#broadcastModal").modal('show');
    }
    broadcast_f.addEventListener("submit",(e)=>{
        e.preventDefault();
        if(confirm("are you sure want to change it?")==false){
            return;
        }
        $.ajax({
            url:"process/broadcast.php",
            data:{mes:broad.value},
            method:"post",
            success:(e)=>{ 
                alert("Broadcast Message Has been change!");
                $("#broadcastModal").modal('hide');
            }
        });
    },false);
</script>