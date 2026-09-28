<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.site_key') }}"></script>
<script>
    grecaptcha.ready(function() {
        var form = document.getElementById('ContactForm');
        if (!form) return;
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            grecaptcha.execute('{{ config('captcha.site_key') }}', {
                action: 'contact'
            }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
                form.submit();
            });
        });
    });
</script>
