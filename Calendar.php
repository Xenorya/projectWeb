<?php
class Calendar {

    private $active_year, $active_month, $active_day;
    private $events = [];

    public function __construct($date = null) {
        $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
    }

    public function add_event($txt, $date, $days = 1, $color = '') {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$txt, $date, $days, $color];
    }

    public function __toString() {
        $num_days = date('t', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year));
        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
        $html = '<div class="calendar">';
        $html .= '<div class="header">';
        $html .= '<div class="month-year">';
        $html .= date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day));
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="days">';
        foreach ($days as $day) {
            $html .= '
                <div class="day_name">
                    ' . $day . '
                </div>
            ';
        }
        for ($i = $first_day_of_week; $i > 0; $i--) {
            $html .= '
                <div class="day_num ignore">
                    ' . ($num_days_last_month-$i+1) . '
                </div>
            ';
        }
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = '';
            if ($i == $this->active_day) {
                $selected = ' selected';
            }
            $html .= '<div class="day_num' . $selected . '">';
            $html .= '<span>' . $i . '</span>';
            foreach ($this->events as $event) {
                for ($d = 0; $d <= ($event[2]-1); $d++) {
                    if (date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1]))) {
                        $html .= '<div class="event' . $event[3] . '">';
                        $html .= $event[0];
                        $html .= '</div>';
                    }
                }
            }
            $html .= '</div>';
        }
        for ($i = 1; $i <= (42-$num_days-max($first_day_of_week, 0)); $i++) {
            $html .= '
                <div class="day_num ignore">
                    ' . $i . '
                </div>
            ';
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

}

date_default_timezone_set("Africa/Tunis");
$date=date('Y-m-d');
if (@$_GET['date']!=''){
    $date=$_GET['date'];
    $action=$_GET['action'];
    if ($action=="Next"){
        $date = date('Y-m-d', strtotime($date. ' + 1 month'));        
    }else if ($action=="Prev"){
        $date = date('Y-m-d', strtotime($date. ' - 1 month'));
    }
}
$calendar = new Calendar($date);

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$sql = "SELECT id,title,text,date FROM notes WHERE date<>'0000-00-00'";
$stmt = $conn->prepare($sql);
$stmt->execute();
while($row = $stmt->fetch()) {
    $calendar->add_event($row['title'], $row['date'], 1, 'green');
}    

//$calendar->add_event('Birthday', '2021-02-03', 1, 'green');

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/styleHome.css" rel="stylesheet" type="text/css">
		<link href="./css/stylecal.css" rel="stylesheet" type="text/css">
		<link href="./css/calendar.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="logo2.png" type="image/icon type">

	</head>
	<body>
        <header>
            <div class="navbar">

                <div class="icon">
                    <img src="P4u.png" class="logo2">
                </div>  
               
                <div class="menu">
                    <ul>
                        <li><a href="home.php">HOME</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="#">SERVICE</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </div>
                

                <div class="search">
                    <input class="srch" type="search" name="" placeholder="Type To text">
                    <a href="view.php"> <button class="btn">Search</button></a>
                </div>
            </div> 
        </header>
		<div class="content home">
        <?php echo $calendar;?>
        <?php echo ' <button onclick="location.href=\'Calendar.php?action=Prev&date='. $date .'\'" type="button" class="btn btn-sm btn-outline-secondary"> < </button>
        <button onclick="location.href=\'Calendar.php?action=Next&date='. $date .'\'" type="button" class="btn btn-sm btn-outline-secondary"> > </button>' ?>
        </div>
        <script src="./js/bootstrap.bundle.min.js"></script>

	</body>
</html>