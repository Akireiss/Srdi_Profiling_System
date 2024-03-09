$(document).ready(function() {
    // Handle remove file icon click
    $('.remove-file').on('click', function() {
        var file_id = $(this).data('file-id');
        var file_type = $(this).data('type');

        // AJAX request to remove the file
        $.ajax({
            type: 'POST',
            url: 'edit_file.php',
            data: {
                file_id: file_id,
                file_type: file_type
            },
            dataType: 'json',
            success: function(response) {
                if(response.status === 'success') {
                    // Update the UI or perform any other action on success
                    alert('File removed successfully!');
                    // Reload the page or update the UI as needed
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(error) {
                console.log('AJAX Error: ', error);
            }
        });
    });
});