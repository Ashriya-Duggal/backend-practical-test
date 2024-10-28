<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Send Email Notification</h1>

        <form id="emailNotificationForm" method="POST" action="{{ url('/send-email') }}">
            @csrf
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send Email</button>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#emailNotificationForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = Object.values(errors).flat().join('\n');
                        alert("Validation Errors:\n" + errorMessages);
                    }
                });
            });
        });
    </script>
</body>

</html>