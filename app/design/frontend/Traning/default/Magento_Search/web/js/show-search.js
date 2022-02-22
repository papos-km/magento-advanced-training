require([
    'jquery'
], function($) {
    $(document).ready( function() {
        $('#search-btn').click(function(){
            $('#custom-search').toggle('slow');
        });
    });
});
