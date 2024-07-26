!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task1</title>
    <style>
        section {
            font-size: large;
            padding: 15px;
            display: flex;
            justify-items: center;
            line-height: 2.5rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Task Week 2 </h1>
    <br />

    <section>
        <?php
        /*########
    # task1#
     #########
     */
        $name = 'programmer';
        echo "Hello," . $name;
        /*########
    # task2#
     #########
     */
        echo '<hr>';
        $x = 5;
        $y = 10;
        echo $x . '+' . $y . '=' . $x + $y . '<br>';
        echo $x . '*' . $y . '=' . $x * $y . '<br>';
        echo $x . '-' . $y . '=' . $x - $y . '<br>';
        /*########
    # task3#
     #########
     */
        echo '<hr>';
        $a = 1;
        $b = 2;
        $c = 3;
        $d = 4;
        echo 'Difference = ' . ($a * $b) - ($c * $d);
        /*########
    # task4#
     #########
     */
        echo '<hr>';
        $N = 10;
        $M = 12;
        echo ($N % 10) + ($M % 10);
        /*########
    # task5#
     #########
     */
        echo '<hr>';

        $number = 4569;
        $string = (string) $number;
        $firstDigit = $string[0];

        if ($firstDigit % 2 == 0) {
            echo 'EVEN';
        } else {
            echo 'ODD';
        }
        /*########
    # task 6 #
     #########
     */
        echo '<hr>';

        $a = 22;
        $b = 10;
        $k = 2;

        if (1 <= $a && $a <= 1018 && 1 <= $b && $b <= 1018 && 1 <= $k && $k <= 1018) {
            if (($a % $k) == 0 && ($b % $k) == 0) {
                print "Both";
            } elseif (($a % $k) == 0) {
                print "Memo";
            } elseif (($b % $k) == 0) {
                print "Momo";
            } else {
                print "No One";
            }
        } else {
            print 'Enter Positive Number';
        }
        /*########
    # task 7 #
     #########
     */
        echo '<hr>';

        $number = 64;

        if ($number >= 10 && $number <= 99) {
            $tens = intdiv($number, 10);
            $units = $number % 10;
            if ($units != 0 && ($tens % $units == 0 || $units % $tens == 0)) {
                echo "YES";
            } else {
                echo 'NO';
            }
        } else {
            echo "Enter a number between 10 and 99\n";
        }

        ?>
    </section>
</body>

</html>
