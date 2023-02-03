var base_url = 'http://localhost/Brainster%20Library%20Project%202/';


// All books print

$(document).ready(function(){
    $.ajax({
        url: base_url + `books/allBooks.php`,
        method: 'GET',
        success: function(data) {
            data = $.parseJSON(data);
            // console.log(data);

        // CARDS PRINT

            data.forEach(book => {
                var card = `<div class="cardCard col my-5" data-category="`+ book.category +`"> <div data-tilt class="card mx-auto" style="width: 18rem; box-shadow: 13px 12px 22px -1px rgba(230,200,180,0.74);">`
                card += `<img src="` + book.cover + `" class="card-img-top" style="height:350px; width: auto;" alt="` + book.title +`">`
                card += `<div style=" background-color: rgb(40, 11, 11); " class="card-body text-light">`
                card +=  `<h4 class="card-title text-center">` + book.book_title +`</h4>`
                card +=  `<span class="card-text">Author </span> <h5> ` + book.name + `<span> </span>` + book.surname +`</h5>`
                card +=  `<span class="card-text">Category </span> <h5> ` + book.category +` </h5>`
                card +=  `<div class="text-center">`
                card +=  `<a href="book.php?id=` + book.book_id +`" class="btn btn-outline-warning mt-2">View book</a>`
                card +=  `</div>`
                card +=  `</div>`
                card +=  `</div>`
                card +=  `</div>`;

                $('#wrapper').append(card)         
            });

            $('.card').tilt({
                maxTilt: 11,
                glare: true,
                maxGlare: .3,
                perspective: 1200,
                transition: true,
                speed: 2000,
                scale: 1.1,
                easing: "cubic-bezier(.03,.98,.52,.99)"
               
            })
            
        }
    })

   
});
