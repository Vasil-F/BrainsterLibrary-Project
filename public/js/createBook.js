var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

$(document).ready(function() {

    $('#viewCreateButton').on('click', function(){
        $('#viewCreateButton').removeClass('d-inline');
        $('#viewCreateButton').addClass('d-none');
        $('#viewBooksButton').removeClass('d-none');
        $('#viewBooksButton').addClass('d-inline');
        $('#tableView').removeClass('d-table');
        $('#tableView').addClass('d-none');
        $('#createView').removeClass('d-none');
        $('#createView').addClass('d-block');
    })

    $('#viewBooksButton').on('click', function(){
        $('#viewBooksButton').removeClass('d-inline');
        $('#viewBooksButton').addClass('d-none');
        $('#viewCreateButton').removeClass('d-none');
        $('#viewCreateButton').addClass('d-inline');
        $('#createView').removeClass('d-block');
        $('#createView').addClass('d-none');
        $('#tableView').removeClass('d-none');
        $('#tableView').addClass('d-table');
    })


    $('#createBookButton').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: { bookTitle: $('#createForm input[name="bookTitle"]').val(), author: $('#createForm select[name="author"]').val(), yearPublished: $('#createForm input[name="yearPublished"]').val(), pages: $('#createForm input[name="pages"]').val(), cover: $('#createForm input[name="cover"]').val(), category: $('#createForm select[name="category"]').val() }
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: 'Success',
                    text: 'Book created! Going back now.',
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
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required!',
                  })
            }
            if(data == 'All fields requiredBook exists') {
                Swal.fire({
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required!',
                  })
                Swal.fire({
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'That book already exists!',
                  })
            }
        })
    })


});