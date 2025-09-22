<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header mr-auto">
            <a class="navbar-brand" href="/" title="{{ __('misc.home_alt') }}">{{ __('misc.homepage_title') }}</a>
        </div>
        <div id="navbar" class="form-inline">
            <a href="/contact" class="btn btn-outline-light mr-2">{{ __('misc.contact') }}</a>


            <form method="GET" action="" class="d-inline mr-2" id="lang-switcher-form">
                <select name="language" class="form-control" onchange="if(this.value) window.location.href='/language/' + this.value + '/';">
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="nl" {{ app()->getLocale() == 'nl' ? 'selected' : '' }}>Nederlands</option>
                </select>
            </form>

            <script>
                (function () {
                    var cx = 'partner-pub-6236044096491918:8149652050';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                })();
            </script>
            <gcse:searchbox-only></gcse:searchbox-only>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
