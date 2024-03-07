<?php
    function getNbStudent($building){
        $rest_api_url = 'http://45.13.119.138:8000/total_etudiant/' . $building;

        // Reads the JSON file.
        $json_data = file_get_contents($rest_api_url);

        // Decodes the JSON data into a PHP array.
        $response_data = json_decode($json_data);

        return $response_data;
    }

    function getStatsDay($jour, $campus_id) {
        $currentHour = getCurrentHour();
        $currentDay = getCurrentDay();
        $hoursOfDay = ['8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19'];
    
        foreach ($hoursOfDay as $hour) {
            $actualValue = getActualValueFromDatabase($jour, $hour, $campus_id);
            $chartClass = ($hour === substr($currentHour, 0, -1) && $jour === $currentDay) ? 'actual' : '';
    
            $hourWithSuffix = $hour . 'h';
    

            
            echo '<div class="chart ' . $chartClass . '">';
            echo '  <div class="chart-level" style="height: ' . $actualValue . '%"></div>';
            echo '  <div class="chart-day">' . $hourWithSuffix . '</div>';
            echo '</div>';
        }
    }


    function getCurrentDay() {
        $currentDate = date('Y-m-d');
        $currentDay = ucfirst(strftime('%A', strtotime($currentDate)));
    
        // Convert English day names to French
        $translations = [
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
        ];
    
        return isset($translations[$currentDay]) ? $translations[$currentDay] : $currentDay;
    }

    function getCurrentHour() {
        // Récupération du fuseau horaire de Paris
        date_default_timezone_set('Europe/Paris');
    
        $currentHour = date('H');
        return $currentHour . 'h';
    }

    function getBusiestDay($campus_id) {
        $daysOfWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
        $maxAttendance = 0;
        $busiestDay = '';
    
        foreach ($daysOfWeek as $day) {
            $attendance = getTotalAttendanceForDay($day, $campus_id);
    
            if ($attendance > $maxAttendance) {
                $maxAttendance = $attendance;
                $busiestDay = $day;
            }
        }
    
        return $busiestDay;
    }
    
    function getLeastBusiestDay($campus_id) {
        $daysOfWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
        $minAttendance = PHP_INT_MAX;
        $leastBusiestDay = '';
    
        foreach ($daysOfWeek as $day) {
            $attendance = getTotalAttendanceForDay($day, $campus_id);
    
            if ($attendance < $minAttendance) {
                $minAttendance = $attendance;
                $leastBusiestDay = $day;
            }
        }
    
        return $leastBusiestDay;
    }
    

    function getTotalAttendanceForDay($day, $campus_id) {
        $totalAttendance = 0;

        for ($hour = 8; $hour <= 19; $hour++) {
            $rest_api_url = "http://45.13.119.138:8000/frequence/jour/{$day}/heure/{$hour}/campus/{$campus_id}";
            $json_data = file_get_contents($rest_api_url);
            $response_data = json_decode($json_data, true);
    
            // Add the attendance for the current hour to the total
            $totalAttendance += isset($response_data['frequence_etudiant']) ? $response_data['frequence_etudiant'] : 0;
        }
    
        return $totalAttendance;
    }
?>