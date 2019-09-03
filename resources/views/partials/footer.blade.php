<footer class="footer text-center bg-dark text-light">
    <div class="container">
        <div class="row justify-content-center align-items-center py-1">
            <div class="col-12">
                <h6 class="font-weight-bold">{{ __('main.copyrights') }}</h6>
            </div>
            <div class="col-12">
                <h6 class="text-monospace mb-0">
                    @if(App::getLocale() == 'ar')
                    تم تطوير الموقع بواسطة <a href="mailto:omar@otscommunity.com" text-light font-weight-bold>OTS</a>
                    @else
                    Developed by <a href="mailto:omar@otscommunity.com" text-light font-weight-bold>OTS</a>
                    @endif
                </h6>
            </div>
        </div>
    </div>
</footer>