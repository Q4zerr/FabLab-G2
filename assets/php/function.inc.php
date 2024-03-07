<?php
    function getNbStudent($building){
        $rest_api_url = 'http://45.13.119.138:8000/total_etudiant/' . $building;

        // Reads the JSON file.
        $json_data = file_get_contents($rest_api_url);

        // Decodes the JSON data into a PHP array.
        $response_data = json_decode($json_data);

        return $response_data;
    }

    function getStatsDay(){
        $currentHour = getCurrentHour();
        $hoursOfDay = ['8h', '9h', '10h', '11h', '12h', '13h', '14h', '15h', '16h', '17h', '18h', '19h'];

        // Parcours des heures du jours
        foreach ($hoursOfDay as $hour) {
            $randomLevel = getRandomValue();
            // On ajoute la classe "actual" à l'heure actuel
            $chartClass = ($hour === $currentHour) ? 'actual' : '';

            echo '<div class="chart ' . $chartClass . '">';
            echo '  <div class="chart-level" style="height: ' . $randomLevel . '%"></div>';
            echo '  <div class="chart-day">' . $hour . '</div>';
            echo '</div>';
        }
    }

    function getCurrentDay(){
        $currentDate = date('Y-m-d');
        $currentDay = date('l', strtotime($currentDate));

        return $currentDay;
    }

    function getCurrentHour() {
        // Récupération du fuseau horaire de Paris
        date_default_timezone_set('Europe/Paris');
    
        $currentHour = date('H');
        return $currentHour . 'h';
    }

    function getRandomValue(){
        $st_num=1;
        $end_num=100;
        $mul=1000000;

        $randomNumber = mt_rand($st_num*$mul,$end_num*$mul)/$mul;
        return round($randomNumber, 2);
    }

    function getFrequentationLevel(){

    }
?>