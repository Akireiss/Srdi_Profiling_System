<!DOCTYPE html>
<html>
<head>
    <title>Log Event</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<button onclick="logEvent(123, 'Login', 'User logged in')">Log Event</button>

<script>
function logEvent(user_id, event_type, event_description) {
    // Fetch the user's name based on user_id from tb_user table
    $.ajax({
        type: "POST",
        url: "audit_logs.php", // Replace with the actual PHP file that fetches user details
        data: { user_id: user_id },
        success: function(data) {
            var user_name = data.fullname;

            // Prepare and execute the SQL statement
            $.ajax({
                type: "POST",
                url: "logEvent.php", // Replace with the actual PHP file that inserts audit logs
                data: {
                    fullname: user_name,
                    event_type: event_type,
                    event_description: event_description
                },
                success: function(response) {
                    // Handle the response from the server if needed
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });
        },
        error: function(xhr, status, error) {
            // Handle errors if any
            console.error(xhr.responseText);
        }
    });
}
</script>

</body>
</html>
