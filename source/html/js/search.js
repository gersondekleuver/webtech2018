// search.js: to redirect the user to the search page while passing the right
// parameters
$( document ).ready(function() { 
    $('#search, #search-small').keyup(function(e){
        // 'enter' key press detection
        var key = e.which || e.keyCode;     
        if (key == 13) {
            var id = $(this).attr('id');
            var tags = $('#'+ id).val();
            // lightweight uri encoding
            tags = tags.replace(/\s/g, '%20');
            tags = tags.replace(/,/g, '%2C');
            document.location.replace("search.php?tags=" + tags);
        }
    });
});