<body>
    <div id="monitoring-data"></div>

    <script>
        function refreshData() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("monitoring-data").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_monitoring_data.php", true);
            xhttp.send();
        }

        setInterval(refreshData, 10000); // Odświeżanie co 10 sekund
        refreshData(); // Pierwsze odświeżenie przy załadowaniu strony
    </script>
    
</body>