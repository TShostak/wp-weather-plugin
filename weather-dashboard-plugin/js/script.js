jQuery(document).ready(function($) {
    // Handle refresh data button click

    function getWeather() {
        var selectedCountry = $('#country-select').val();

        // Fetch weather data from the OpenWeatherMap API
        $.getJSON('https://api.openweathermap.org/data/2.5/weather?q=' + selectedCountry + '&appid=b76a1f7909d2b3ac313a8fb4e1db1e29', function(data) {
            // Update weather tiles with new data
            $('#weather-tiles').empty();
            $('#weather-tiles').append('<div class="column"><div class="weather-dashboard__tile"><span class="name">Temperature:</span><span class="value">' + data.main.temp_min + ' / ' + data.main.temp_max + '</span></div></div>')
                .append('<div class="column"><div class="weather-dashboard__tile"><span class="name">Wind:</span><span class="value">' + data.wind.speed + ' m/s, ' + data.wind.deg + '°</span></div></div>')
                .append('<div class="column"><div class="weather-dashboard__tile"><span class="name">Humidity:</span><span class="value">' + data.main.humidity + '%</span></div></div>')
                .append('<div class="column"><div class="weather-dashboard__tile"><span class="name">Pressure:</span><span class="value">' + data.main.pressure + ' hPa</span></div></div>');
        });
    }

    getWeather();

    $('#refresh-data').on('click', function() {
        getWeather();
    });
});