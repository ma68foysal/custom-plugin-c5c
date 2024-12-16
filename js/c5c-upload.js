jQuery(document).ready(function($) {
    // Check for the success message using URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const uploadStatus = urlParams.get('upload_status');

    if (uploadStatus === 'success') {
        $('#uploadSuccessModal').show();
    }

    // Close the modal when the 'Close' button is clicked
    $('#closeModal').click(function() {
        $('#uploadSuccessModal').hide();
    });
});


jQuery(document).ready(function($) {
    $('#filter_button').on('click', function() {
        var category_id = $('#category_filter').val();
        
        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>', // Ensure this is correct
            method: 'POST',
            data: {
                action: 'c5c_file_filter', // This should match the action in your PHP code
                category_id: category_id
            },
            success: function(response) {
                if (response.success) {
                    // Clear the existing grid
                    $('.c5c-file-grid').empty();
                    
                    // Append the new files to the grid
                    response.data.forEach(function(file) {
                        $('.c5c-file-grid').append(`
                            <div class="c5c-file-item">
                                <img src="${file.file_url}" alt="Thumbnail">
                                <h3 class="c5c-file-title">${file.title}</h3>
                                <p class="c5c-file-description">${file.description}</p>
                                <a href="#" class="c5c-view-file">View Details</a>
                            </div>
                        `);
                    });
                } else {
                    // Handle the error case
                    alert('No files found for this category.');
                }
            },
            error: function() {
                alert('An error occurred while filtering files.');
            }
        });
    });
});
