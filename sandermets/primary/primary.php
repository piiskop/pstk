<pre>
<?php
function sumOfPrimaryNumbers($intUntil)
{

    $sum = 0;
    $steps = 0;
    $numbers = [];

    for ($i = 2; $i <= $intUntil; $i++) {
        $isPrimary = true;
        for ($j = 2; $j <= ceil(sqrt($i)); $j++) {
            $steps++;
            if ($j !== $i) {
                if ($i % $j === 0) {
                    $isPrimary = false;
                    break;
                }
            }
        }
        if ($isPrimary) {
            $numbers[] = $i;
            $sum += $i;
        }
    }
    return (object) [
                'sum' => $sum,
                'steps' => $steps,
                'numbers' => $numbers
    ];
}

$r = sumOfPrimaryNumbers(100);
echo 'sum: ', $r->sum, ' steps: ', $r->steps, ' ';

echo 'numbers: ';

for ($i = 0; $i < count($r->numbers); $i++) {
    
    echo $r->numbers[$i], '<br>';
    
}




