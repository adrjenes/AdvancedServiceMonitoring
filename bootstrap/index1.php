<!DOCTYPE html>
<html>
<head>
    <title>Strona z ikonami</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .footer-icon {
            width: 30px;
            height: 30px;
            margin: 5px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        #assistant-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #assistant-avatar {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        #assistant-message {
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Twój istniejący kod HTML -->
        <div id="monitoring-data" class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Host</th>
                        <th>Port</th>
                        <th>Stan</th>
                        <th>Errors</th>
                    </tr>
                </thead>
                <!-- Tutaj powinien być generowany kod PHP, który tworzy wiersze tabeli -->
                <!-- Przykład kodu PHP: -->
                <?php
                $data = array(
                    array(1, 'Host1', 8080, 'Error', 3),
                    array(2, 'Host2', 8000, 'Ok', 0),
                    array(3, 'Host3', 8888, 'Error', 5)
                );
                foreach ($data as $row) {
                    echo "<tr>";
                    foreach ($row as $cell) {
                        echo "<td>$cell</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <div id="assistant-container">
        <img id="assistant-avatar" src="student1.svg" onclick="askAssistant()">
        <div id="assistant-message"></div>
    </div>

    <script>
        var icons = ["1.svg", "2.svg", "3.svg", "4.svg"];
        var currentIconIndex = 0;

        function changeIcon() {
            var footerIcon = document.getElementById("footer-icon");
            currentIconIndex = (currentIconIndex + 1) % icons.length;
            footerIcon.src = icons[currentIconIndex];
        }

        function askAssistant() {
            var question = prompt("Wpisz pytanie dla asystenta:");
            if (question) {
                // Wywołaj funkcję do przetwarzania pytania i uzyskiwania odpowiedzi
                processQuestion(question);
            }
        }

        function processQuestion(question) {
            var answer;
            var servicesNotWorking = [];
            var servicesWorking = [];

            if (question.includes("Jakie usługi/serwery/urządzenia nie działają")) {
                var rows = document.querySelectorAll("#monitoring-data table tbody tr");
                rows.forEach(function(row) {
                    var host = row.cells[1].textContent;
                    var stan = row.cells[3].textContent;
                    if (stan === "Error") {
                        servicesNotWorking.push(host);
                    }
                });

                if (servicesNotWorking.length > 0) {
                    answer = "Następujące usługi/serwery/urządzenia nie działają: " + servicesNotWorking.join(", ");
                } else {
                    answer = "Wszystkie usługi/serwery/urządzenia działają poprawnie.";
                }
            } else if (question.includes("Jakie usługi/serwery/urządzenia działają")) {
                var rows = document.querySelectorAll("#monitoring-data table tbody tr");
                rows.forEach(function(row) {
                    var host = row.cells[1].textContent;
                    var stan = row.cells[3].textContent;
                    if (stan === "Ok") {
                        servicesWorking.push(host);
                    }
                });

                if (servicesWorking.length > 0) {
                    answer = "Następujące usługi/serwery/urządzenia działają: " + servicesWorking.join(", ");
                } else {
                    answer = "Wszystkie usługi/serwery/urządzenia nie działają.";
                }
            } else {
                answer = "Przepraszam, nie rozumiem pytania. Spróbuj inaczej sformułować pytanie.";
            }

            displayAssistantMessage(answer);
        }

        function displayAssistantMessage(message) {
            var assistantMessage = document.getElementById("assistant-message");
            assistantMessage.textContent = message;
        }

        function refreshData() {
            var monitoringData = document.getElementById("monitoring-data");
            monitoringData.innerHTML = "<tr><td colspan='5'>Pobieranie danych...</td></tr>";

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    monitoringData.innerHTML = this.responseText;
                    processQuestion("usługi/serwery/urządzenia nie działają");
                }
            };
            xhttp.open("GET", "get_monitoring_data.php", true);
            xhttp.send();
        }

        setInterval(refreshData, 30000);
        refreshData();
    </script>

    <!-- Footer z ikonami -->
    <footer class="footer">
        <div class="container">
            <img id="footer-icon" class="footer-icon" src="1.svg" onclick="changeIcon()">
        </div>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>