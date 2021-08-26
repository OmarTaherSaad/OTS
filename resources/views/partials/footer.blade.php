<footer class="footer text-center bg-primary text-light" id="footer">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center py-1">
            <div class="col-12 my-2">
                <p>
                    This site is protected by hCaptcha and its
                    <a href="https://hcaptcha.com/privacy" class="font-italic text-dark">Privacy Policy</a> and
                    <a href="https://hcaptcha.com/terms" class="font-italic text-dark">Terms of Service</a> apply.
                </p>
                <hr>
            </div>
            <div class="col-12">
                <h6 class="font-weight-bold">{{ __('main.copyrights') }}</h6>
            </div>
            <div class="col-12">
                <h6 class="text-monospace mb-0">
                    Developed by <a href="mailto:contact@omartahersaad.com" class="text-light font-weight-bold">OTS</a>
                </h6>
            </div>
            <div class="col-12">
                <a href="{{ route('privacy-policy') }}" class="text-light">Privacy Policy</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('terms-and-conditions') }}" class="text-light">Terms and Conditions</a>
            </div>
        </div>
    </div>
</footer>