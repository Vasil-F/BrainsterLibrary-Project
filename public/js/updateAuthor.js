var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

$(document).ready(function(){
    $('#updateButton').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: 'update.php',
            method: 'POST',
            data: { id: $('#updateForm input[name="id"]').val(), name: $('#updateForm input[name="name"]').val(), surname: $('#updateForm input[name="surname"]').val(), bio: $('#updateForm input[name="bio"]').val() }
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: 'Success',
                    text: 'Author updated! Going back now.',
                  })
                setTimeout(function(){
                    window.location.assign( base_url + 'admins/crud/authors/view.php')
                }, 2000);
            }
            if(data == 'Author exists') {
                Swal.fire({
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'That author already exists!',
                  })
            }
            if(data == 'All fields required') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required!',
                  })
               
            }

            
        })
    })
});