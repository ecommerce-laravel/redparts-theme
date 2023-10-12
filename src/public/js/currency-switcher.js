(function() {
    if (typeof jQuery === 'undefined') {
        console.error("jQuery is not loaded");
        return;
    }

    $(function () {
        let selectedCurrency = CookieManager.get('app_currency');

        window.switchCurrency = function(currency) {
            CookieManager.delete('app_currency');
            // CookieManager.set('app_currency', currency);
            $.post('/')
            window.location.reload();
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