var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

$(document).ready(function() {
$('h2 #swal2-title').css("margin" , "auto");
    $('#submitComment').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: base_url+'/users/createComment.php',
            method: 'POST',
            data: { comment: $('#commentForm input[name="comment"]').val(), user_id: $('#commentForm input[name="user_id"]').val(), book: $('#commentForm input[name="book"]').val()}
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: '',
                    text: 'COMMENT POSTED! PLEASE WAIT FOR ADMIN APPROVAL.',
                  })
                  setTimeout(function(){
                    window.location.reload()
                }, 2000);
            }
            if(data == 'All fields required') {
                Swal.fire({
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: '',
                    text: 'CAN NOT POST AN EMPTY COMMENT!',
                  })
            }
     
        })
    })


});