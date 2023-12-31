(function(global) {
    const config = {};

    function set(key, value) {
        config[key] = value;
    }

    function get(key) {
        if (config.hasOwnProperty(key)) {
            return config[key];
        }
        return null;
    }

    async function loadConfigFromLaravel() {
        try {
            const response = await fetch('/redparts-api/config');
            const data = await response.json();

            for (const key in data) {
                if (data.hasOwnProperty(key)) {
                    set(key, data[key]);
                }
            }
        } catch (error) {
            console.error('Failed to load configuration:', error);
        }
    }

    global.configLib = {
        set: set,
        get: get,
        loadConfigFromLaravel: loadConfigFromLaravel
    };

})(this);
