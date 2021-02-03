
/*  $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label x', 'Label y'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [69, 59]
            ]
        ])
        ->options([]);
        return view('index',compact('chartjs')); */


        // PHP program to display sunday as first day of a week

        // l will display the name of the day
        // d, m and Y will display the day, month and year respectively

        // For current week the time-string will be "sunday -1 week"
        // here -1 denotes last week
        $firstdayWeek1 = date('l - d/m/Y', strtotime("monday -1 week"));
        echo "First day of this week1: ", $firstdayWeek1, "\n";

        // For previous week the time-string wil be "monday -2 week"
        // here -2 denotes week before last week
        $firstdayWeek2 = date('l - d/m/Y', strtotime("monday 0 week"));
        echo "First day of last week2: ", $firstdayWeek2, "\n";

        // For next week the time-string wil be "monday 0 week"
        // here 0 denotes this week
        $firstdayWeek3 = date('l - d/m/Y', strtotime("monday 1 week"));
        echo "First day of next week3: ", $firstdayWeek3, "\n";

        // For week after next week the time-string wil be "monday 1 week"
        // here 1 denotes next week
        $firstdayWeek4 = date('l - d/m/Y', strtotime("monday 2 week"));
        echo "First day of week after next week4 : ", $firstdayWeek4;
