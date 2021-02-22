<script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LejY9AZAAAAAFpdc0QzQzrqRtaaflf3PfP64qdE', {action: 'submit'}).then(function(token) {
                // Add your logic to submit to your backend server here.
                let elements = document.querySelectorAll('[name="grecaptcha"]');
            });
        });
    }
</script>
