var base_url = "http://localhost/Brainster%20Library%20Project%202/";

$(document).ready(function () {
  $(".deleteButton").each(function () {
    $(this).on("click", function (e) {
      Swal.fire({
        background: "linear-gradient(to bottom, #99ccff 0%, #ffcccc 86%)",
        title: "Are you sure?",
        text: "The author will be removed for guests and users!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "linear-gradient(to right, #66ff66 0%, #ffff99 86%)",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          e.preventDefault();
          $.ajax({
            url: "delete.php",
            method: "POST",
            data: { id: $(this).val() },
          }).done(function (data) {
            if (data == "Success") {
              Swal.fire({
                background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                icon: "success",
                title: "Success",
                text: "Author deleted!",
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
                background: "linear-gradient(to bottom right, #ccffff 0%, #ff9966 86%)",
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
});
