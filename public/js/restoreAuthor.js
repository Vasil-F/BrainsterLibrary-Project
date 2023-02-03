var base_url = "http://localhost/Brainster%20Library%20Project%202/";

$(document).ready(function () {
  $(".restoreButton").each(function () {
    $(this).on("click", function (e) {
      Swal.fire({
        background: "linear-gradient(to bottom, #66ccff 0%, #ffffcc 86%)",
        title: "Are you sure?",
        text: "This will restore the author as available!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "linear-gradient(to right, #00cc00 0%, #ffffcc 86%)",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, restore it!",
      }).then((result) => {
        if (result.isConfirmed) {
          e.preventDefault();
          $.ajax({
            url: "restore.php",
            method: "POST",
            data: { id: $(this).val() },
          }).done(function (data) {
            if (data == "Success") {
              Swal.fire({
                background: "linear-gradient(to bottom, #ffcccc 0%, #ffffcc 86%)",
                icon: "success",
                title: "Success",
                text: "Author restored!",
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
