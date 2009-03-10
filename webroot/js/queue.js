var QUEUE_TIMER = null
function update_queue(timeout) {

    $.ajax({
        type: "POST",
        url: "queue.php",
        success: function(info) {
            // UPDATE TABLE WITH INFO.
            QUEUE_TIMER = setTimeout("update_queue(' " + timeout + "')", timeout * 1000)
        }
    })
}
// Update every 30 seconds.
QUEUE_TIMER = update_queue(30)