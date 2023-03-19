<div class="right-header">
    <div class="right-menu">
        <p><?php echo ucfirst($fullname); ?></p>
        <img src="../assets/images/user.png" alt="">
    </div>

    <div class="dropdown notif">
        <div class="dropdown-toggle notification-center" id="dNotif" data-target="#" role="button" aria-haspopup="true" aria-expanded="false">
            <?php if($notif_count > 0) echo "<span id='notify'></span>"; ?>
            <span class="glyphicon glyphicon-bell notif-icon" aria-hidden="true"></span>
        </div>
        <div class="messages dropdown-menu dropdown-menu-right w350" aria-labelledby="dNotif">
            <div class="notif-header">
                <h4 class="notif-title">Notifications</h4>
                <h6 class="notif-sub">
                    <a href="#" onclick="read_all_messages()">Mark all as read</a>
                </h6>
            </div>
            <ul id="notif_c" class="notif-container">
            </ul>
        </div>
    </div>
</div>

<script>
function getNotifications() {
    console.log('get notifications!');
    notif_c.innerHTML="";
    $.ajax({
        url: host + "/select_proc/donor_notifications.php",
        method:"POST",
        data:{},
        success:(e)=>{ 
            notif_c.innerHTML=e;
        }
    });
}
getNotifications();

$('.dropdown.notif').on('click', function (event) {
    $(this).toggleClass('open');
});

function read_all_messages(){
    console.log('read_all_messages');
    
    // keep dropdown open
    $('.dropdown.notif').toggleClass('open');

    var messages = document.getElementsByClassName('notif-message');
    console.log('messages: ', messages);
    var ids = [];
    for (let index = 0; index < messages.length; index++) {
        const message = messages[index];
        if(message.id) ids.push(message.id);
    }

    $.ajax({
        url: host + "panel_proc/markasread.php",
        method: "POST",
        data:{ids},
        success:(e) => {
            notif_c.innerHTML=e;
            $('#notify').hide();
        }
    })
}
</script>