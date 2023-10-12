<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <title>Home Two — Red Parts</title>
        <link rel="icon" type="image/png" href="vendor/themes/redparts/images/favicon.png">
        <!-- fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
        <!-- css -->
        <link rel="stylesheet" href="vendor/themes/redparts/css/bootstrap.css">
        <link rel="stylesheet" href="vendor/themes/redparts/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendor/themes/redparts/css/photoswipe/photoswipe.css">
        <link rel="stylesheet" href="vendor/themes/redparts/css/photoswipe/default-skin/default-skin.css">
        <link rel="stylesheet" href="vendor/themes/redparts/css/select2/select2.min.css">
        <link rel="stylesheet" href="vendor/themes/redparts/css/style.css">

        @themedir([
            'rtl' => [
                '<link rel="stylesheet" href="vendor/themes/redparts/css/style-rtl.css">',
                '<link rel="preconnect" href="https://fonts.googleapis.com">',
                '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>',
                '<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@600&family=Tajawal&display=swap" rel="stylesheet">'
            ],
            'ltr' => [

            ]
        ])

        <link rel="stylesheet" href="vendor/themes/redparts/css/style.header-classic-variant-one.css" media="(min-width: 1200px)">
        <link rel="stylesheet" href="vendor/themes/redparts/css/style.mobile-header-variant-one.css" media="(max-width: 1199px)">
        <!-- font - fontawesome -->
        <link rel="stylesheet" href="vendor/themes/redparts/css/fontawesome/css/all.min.css">

        @yield('page-css')

    </head>

    <body>
        <!-- site -->
        <div class="site">
            @include('themes.redparts.common.partials.mobile-header')
            @include('themes.redparts.common.partials.header')

            <!-- site__body -->
            <div class="site__body">
                @yield('page-body')
            </div>
            <!-- site__body / end -->

            @include('themes.redparts.common.partials.footer')
        </div>
        <!-- site -->

        <!-- mobile-menu -->
        @include('themes.redparts.common.partials.mobile-menu')

        <!-- modal -->
        @yield('page-modals')

        @include('themes.redparts.common.partials.photoswipe')

        <!-- script -->
        @include('base-js')

        @include('themes.redparts.common.partials.scripts')

        @yield('page-scripts')
        <script src="vendor/themes/redparts/js/language-switcher.min.js"></script>
        <script src="vendor/themes/redparts/js/blurry-load.min.js"></script>
        <script>
            new BlurryImageLoad().load();
        </script>

    </body>

</html>

