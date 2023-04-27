// Load the CSV data using a library such as PapaParse
Papa.parse('./data/data.csv', {
    header: true,
    download: true,
    complete: function(results) {
        var dataPoints = results.data; // Store the CSV data as an array of objects

        // Define a function to update the heatmap layer with new data based on the selected crime category
        function updateHeatmap(crimeCategory) {
            var filteredData = dataPoints.filter(function(d) {
                return d.crimeCategory === crimeCategory; // Filter the data based on the selected crime category
            });
            var newDataPoints = filteredData.map(function(d) {
                return [d.latitude, d.longitude]; // Extract the lat/long values for the filtered data
            });
            heatmapLayer.setLatLngs(newDataPoints); // Update the heatmap layer with the new data points
        }

        // Add a UI element to let the user toggle between different crime categories
        var crimeSelect = document.getElementById('crime-select');
        crimeSelect.addEventListener('change', function() {
            var crimeCategory = this.value; // Get the value of the selected crime category
            updateHeatmap(crimeCategory); // Update the heatmap layer with the selected crime category
        });

        // Initialize the heatmap layer with the first crime category in the dataset
        updateHeatmap(dataPoints[0].crimeCategory);
    }
});