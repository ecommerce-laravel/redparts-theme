(function() {
    if (typeof jQuery === 'undefined') {
        console.error("jQuery is not loaded");
        return;
    }

    $(function () {
        let selectedLocale = CookieManager.get('app_locale');

        window.switchLanguage = function(locale) {
            CookieManager.delete('app_locale');
            // CookieManager.set('app_locale', locale);
            window.location.href = '/' + locale;
        }

        window.cookieName = function (str) {
            return str
                .toLowerCase()
                .replace(/\s+|_+|-+/g, '_')  // Replace spaces, underscores, or hyphens with a single underscore
                .replace(/[^a-z0-9_]/g, '')  // Remove non-alphanumeric characters (except underscores)
                .replace(/^_|_$/g, '');      // Remove leading or trailing underscores
        }
    });
})();