var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

$(document).ready(function(){
    $('#updateButton').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: 'update.php',
            method: 'POST',
            data: { id: $('#updateForm input[name="id"]').val(), bookTitle: $('#updateForm input[name="bookTitle"]').val(), author: $('#updateForm select[name="author"]').val(), yearPublished: $('#updateForm input[name="yearPublished"]').val(), pages: $('#updateForm input[name="pages"]').val(), cover: $('#updateForm input[name="cover"]').val(), category: $('#updateForm select[name="category"]').val() }
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: 'Success',
                    text: 'Book updated! Going back now.',
                  })
                setTimeout(function(){
                    window.location.assign( base_url + 'admins/crud/books/view.php')
                }, 2000);
            }
            if(data == 'Book exists') {
                Swal.fire({
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'That book already exists!',
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