var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

$(document).ready(function(){
    $('#updateButton').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: 'update.php',
            method: 'POST',
            data: { id: $('#updateForm input[name="id"]').val(), category: $('#updateForm input[name="category"]').val() }
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: 'Success',
                    text: 'Category updated! Going back now.',
                  })
                setTimeout(function(){
                    window.location.assign( base_url + 'admins/crud/categories/view.php')
                }, 2000);
            }
            if(data == 'Category exists') {
                Swal.fire({
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'That category already exists!',
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