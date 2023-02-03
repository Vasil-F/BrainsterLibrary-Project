var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

$(document).ready(function() {

    $('#viewCreateButton').on('click', function(){
        $('#viewCreateButton').removeClass('d-inline');
        $('#viewCreateButton').addClass('d-none');
        $('#viewAuthorsButton').removeClass('d-none');
        $('#viewAuthorsButton').addClass('d-inline');
        $('#tableView').removeClass('d-table');
        $('#tableView').addClass('d-none');
        $('#createView').removeClass('d-none');
        $('#createView').addClass('d-block');
    })

    $('#viewAuthorsButton').on('click', function(){
        $('#viewAuthorsButton').removeClass('d-inline');
        $('#viewAuthorsButton').addClass('d-none');
        $('#viewCreateButton').removeClass('d-none');
        $('#viewCreateButton').addClass('d-inline');
        $('#createView').removeClass('d-block');
        $('#createView').addClass('d-none');
        $('#tableView').removeClass('d-none');
        $('#tableView').addClass('d-table');
    })


    $('#createAuthorButton').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: { name: $('#createForm input[name="name"]').val(), surname: $('#createForm input[name="surname"]').val(), bio: $('#createForm textarea[name="bio"]').val() }
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: 'Success',
                    text: 'Author created! Going back now.',
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
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required!',
                  })
            }
            if(data == 'All fields requiredAuthor exists') {
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
                    text: 'That author already exists!',
                  })
            }
        })
    })


});