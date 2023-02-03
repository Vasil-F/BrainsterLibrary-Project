var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

$(document).ready(function() {

    $('#viewCreateButton').on('click', function(){
        $('#viewCreateButton').removeClass('d-inline');
        $('#viewCreateButton').addClass('d-none');
        $('#viewCategoriesButton').removeClass('d-none');
        $('#viewCategoriesButton').addClass('d-inline');
        $('#tableView').removeClass('d-table');
        $('#tableView').addClass('d-none');
        $('#createView').removeClass('d-none');
        $('#createView').addClass('d-block');
    })

    $('#viewCategoriesButton').on('click', function(){
        $('#viewCategoriesButton').removeClass('d-inline');
        $('#viewCategoriesButton').addClass('d-none');
        $('#viewCreateButton').removeClass('d-none');
        $('#viewCreateButton').addClass('d-inline');
        $('#createView').removeClass('d-block');
        $('#createView').addClass('d-none');
        $('#tableView').removeClass('d-none');
        $('#tableView').addClass('d-table');
    })


    $('#createCategoryButton').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: { category: $('#createForm input[name="category"]').val() }
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: 'Success',
                    text: 'Category created! Going back now.',
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
                    background: "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required!',
                  })
            }
            if(data == 'All fields requiredCategory exists') {
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
                    text: 'That category already exists!',
                  })
            }
        })
    })


});