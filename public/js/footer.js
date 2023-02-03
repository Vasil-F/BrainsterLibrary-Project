$(document).ready(function(){
    $.ajax({
        url:`http://api.quotable.io/random`,
        method: 'GET',
        success: function(data) {
        $('footer p i').text('"'+ data.content + '" - "' + data.author + '"')

        }
    })
 });