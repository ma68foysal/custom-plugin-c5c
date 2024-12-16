jQuery(document).ready(function($) {
    $('#category-filter').change(function() {
        var category = $(this).val();
        
        $.ajax({
            url: ajaxurl, // Default WordPress AJAX URL
            type: 'POST',
            data: {
                action: 'c5c_filter_files', // PHP function to handle this
                category: category
            },
            success: function(response) {
                $('#file-grid').html(response); // Update the file grid with filtered files
            }
        });
    });
});
