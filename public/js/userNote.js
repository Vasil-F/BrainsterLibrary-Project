var base_url = "http://localhost/Brainster%20Library%20Project%202/";

$(document).ready(function () {
  $("h2 #swal2-title").css("margin", "auto");
  $("#submitNote").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      url: base_url + "/users/createNote.php",
      method: "POST",
      data: {
        note: $('#noteForm input[name="note"]').val(),
        user_id: $('#noteForm input[name="user_id"]').val(),
        book: $('#noteForm input[name="book"]').val(),
      },
    }).done(function (data) {
      if (data == "Success") {
        Swal.fire({
          background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
          icon: "success",
          title: "",
          text: "NOTE ADDED!",
        });
        setTimeout(function () {
          window.location.reload();
        }, 1500);
      }
      if (data == "All fields required") {
        Swal.fire({
          background:
            "linear-gradient(to bottom right, #ccffff 0%, #ffcc99 86%)",
          icon: "error",
          title: "",
          text: "CAN NOT POST AN EMPTY NOTE!",
        });
      }
    });
  });

  $(".deleteNote").each(function () {
    $(this).on("click", function (e) {
      Swal.fire({
        background: "linear-gradient(to bottom, #99ccff 0%, #ffcccc 86%)",
        title: "",
        text: "THE NOTE WILL BE DELETED PERMANENTLY!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor:
          "linear-gradient(to right, #66ff66 0%, #ffff99 86%)",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          e.preventDefault();
          $.ajax({
            url: base_url + "/users/deleteNote.php",
            method: "POST",
            data: { id: $(this).val() },
          }).done(function (data) {
            if (data == "Success") {
              Swal.fire({
                background:
                  "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                icon: "success",
                title: "",
                text: "NOTE DELETED!",
              });
              setTimeout(function () {
                window.location.reload();
              }, 1500);
              // setTimeout(function(){
              //     window.location.assign( base_url + 'admins/crud/books/view.php')
              // }, 2000);
            }
            if (data == "") {
              Swal.fire({
                background:
                  "linear-gradient(to bottom right, #ccffff 0%, #ff9966 86%)",
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
              });
            }
          });
        }
      });
    });
  });

  $(".editNote").each(function () {
    $(this).on("click", function (e) {
        console.log('EDIT BUTTON CLICK')
        $(this).prev().removeClass('d-block');
        $(this).prev().addClass('d-none');
        $(this).next().removeClass('d-inline-block');
        $(this).next().addClass('d-none');
        $(this).removeClass('d-inline-block');
        $(this).addClass('d-none');
        $(this).next().next().removeClass('d-none');
        $(this).next().next().addClass('d-flex');
       
       
    });
  });


  $('.updateNoteButton').each(function(){
    $(this).on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: base_url+'/users/updateNote.php',
            method: 'POST',
            data: { id: $(this).val(), note: $(this).prev().val() }
        }).done(function(data){
            if(data == 'Success') {
                Swal.fire({
                    background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                    icon: 'success',
                    title: '',
                    text: 'NOTE UPDATED!',
                  })
                setTimeout(function(){
                    window.location.reload()
                }, 1500);
            }
    
            
        })

    })
})

$('.cancelUpdateButton').each(function(){
  $(this).on('click', function(e){
    e.preventDefault();
    $(this).parent('.editNoteForm').removeClass('d-flex');
    $(this).parent('.editNoteForm').addClass('d-none');
    $(this).parent().prev().prev().prev().removeClass('d-none');
    $(this).parent().prev().prev().prev().addClass('d-block');
    $(this).parent().prev().prev().removeClass('d-none');
    $(this).parent().prev().prev().addClass('d-inline-block');
    $(this).parent().prev().removeClass('d-none');
    $(this).parent().prev().addClass('d-inline-block');
    


  })
})


});
