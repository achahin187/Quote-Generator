<!DOCTYPE html>
<html>

<head>
    <title>Random Quote Generator</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Random Quote Generator</h1>
        <div id="quote-container"></div>
        <button id="generate-button">Generate Quote</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#generate-button").click(function() {
            // Send a request to the backend PHP script
            $.ajax({
                type: "POST",
                url: "chatbot.php",
                dataType: "json",
                success: function(response) {
                    // Update the quote container with the generated quote
                    $("#quote-container").text(response.quote);
                }
            });
        });
    });
    </script>
</body>

</html>