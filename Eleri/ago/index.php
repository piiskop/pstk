<?php
date_default_timezone_set('Europe/Tallinn');

/**
 * class for time-related schooltasks
 */
class TimeDifference
{

    /**
     * Calculate difference between 2 timestamps
     * 
     * @param int $timest1
     * @param int $timest2
     * @return DateInterval
     */
    public function DiffBetweenTwoTimeStamps($timest1, $timest2)
    {
        $date1 = new DateTime();
        $date1->setTimestamp($timest1);

        $date2 = new DateTime();
        $date2->setTimestamp($timest2);

        $interval = null;
        if ($timest1 < $timest2) {
            $interval = $date1->diff($date2);
        } else {
            $interval = $date2->diff($date1);
        }

        //shorthand if
        //$interval = ($timest1 < $timest2) ? $date1->diff($date2) : $date2->diff($date1);

        return $interval;
    }

}

$dateTime1 = new DateTime('1999-12-10 14:42:49');
$dateTime2 = new DateTime();
$Time = new TimeDifference();
$timest1 = $dateTime1->getTimestamp();
$timest2 = $dateTime2->getTimestamp();

/**
 * swap timestamp if $timest1 is not smaller than $timest2
 */
if (!($timest1 < $timest2)) {
    $$timest3 = $timest1;
    $timest1 = $timest2;
    $timest2 = $timest3;
}
?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Time</title>
    </head>
    <body>
        <h2>PHP</h2>
        <?php
        $dateInterval = $Time->DiffBetweenTwoTimeStamps($timest1, $timest2);
        ?>

        <p>Ajatemplite <?php echo $timest1 ?> ja <?php echo $timest2 ?> vahe on: </p>
        <ul>
            <li>Aastaid: <?php echo $dateInterval->y ?></li>
            <li>Kuid: <?php echo $dateInterval->m ?></li>
            <li>Päevi: <?php echo $dateInterval->d ?></li>
            <li>Tunde: <?php echo $dateInterval->h ?></li>
            <li>Minuteid: <?php echo $dateInterval->i ?></li>
            <li>Sekundeid: <?php echo $dateInterval->s ?></li>
        </ul>

        <h2>Javascript</h2>
        <p>Ajatemplite <?php echo $timest1 ?> ja <?php echo $timest2 ?> vahe on: </p>
        <ul>
            <li id="years"></li>
            <li id="months"></li>
            <li id="days"></li>
            <li id="hours"></li>
            <li id="minutes"></li>
            <li id="seconds"></li>
        </ul>
        <script>
            var date1 = new Date(<?php echo $timest1 ?> * 1000); //milliseconds
            var date2 = new Date(<?php echo $timest2 ?> * 1000);

            function calculate(x, y, z) {
                if (x < y) {
                    return x.getDate() - y.getDate() + y.getDate();
                    return z--;
                }
                else if (x > y) {
                    return x.getDate() - y.getDate();
                }
            }


            var minutes = date2.getMinutes() - date1.getMinutes();
            var hours = date2.getHours() - date1.getHours();
            var months = date2.getMonth() - date1.getMonth();
            
            var days = calculate(date2, date1, months);
            
            var years = date2.getFullYear() - date1.getFullYear();
            var seconds = date2.getSeconds() - date1.getSeconds();

            if (seconds < 0) {
                seconds = 60 + seconds;
                minutes--;
            }
            if (minutes < 0) {
                minutes = 60 + minutes;
                hours--;

            }
            ;
            if (hours < 0) {
                hours = 24 + hours;
                days--;
            }
            ;
            if (months < 0) {
                months = 12 + months;
                years--;
            }
            ;
//            if(days < 0) {
//                days = days + date2.getDate();
//                months--;
//            };

            document.getElementById('years').innerHTML = 'Aastaid: ' + (years).toString();
            document.getElementById('months').innerHTML = 'Kuid: ' + (months).toString();
            document.getElementById('days').innerHTML = 'Päevi: ' + (days).toString();
            document.getElementById('hours').innerHTML = 'Tunde: ' + (hours).toString();
            document.getElementById('minutes').innerHTML = 'Minuteid: ' + (minutes).toString();
            document.getElementById('seconds').innerHTML = 'Sekundeid: ' + (seconds).toString();

        </script>

    </body>
</html>
