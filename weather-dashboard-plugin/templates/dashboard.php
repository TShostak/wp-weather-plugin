<div class="weather-dashboard">
    <div class="weather-dashboard__wrap">
        <h2>Weather</h2>

        <div class="contry-select-form">
            <label for="country-select">Select Country:</label>
            <select id="country-select">
                <?php
                // Fetch the list of countries from the REST API
                $response = wp_remote_get('https://restcountries.com/v3.1/all');
                $countries = json_decode(wp_remote_retrieve_body($response), true);
                
                foreach ($countries as $country) {
                    echo '<option value="' . $country['name']['common'] . '">' . $country['name']['common'] . '</option>';
                }
                ?>
            </select>
            <button id="refresh-data">Select</button>
        </div>

        <div id="weather-tiles" class="weather-dashboard__tiles-wrap">
            <!-- Weather tiles will be dynamically loaded here -->
        </div>

        
    </div>
</div>