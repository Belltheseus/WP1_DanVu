<?php

//Simple array for topics - Övning 4
//$model = array("Första inlägget", "Snart är det vår", "Robin presenterar sig", "Senaste inlägget");

//2D Associative array for full posts - Övning 9
$host = 'localhost';
$dbname = 'blogg';
$user = 'admin';
$password = 'Papaya123';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
$pdo = new PDO($dsn, $user, $password, $attr);

if($pdo) {

$sql = "SELECT p.Slug, p.Headline, u.Username, p.CREATION_Time, p.text FROM posts AS p JOIN users AS u on p.User_ID = u.ID ORDER BY CREATION_Time DESC";

$model = array();

echo "<pre>";

foreach($pdo->query($sql) as $row ) {
    $model += array (
        $row["Slug"] => array(
                 "title" => $row["Headline"],
                 "author" => $row["Username"],
                 "date" => $row["CREATION_Time"],
                 "text" => $row["text"]
         )

    );

}

echo "</pre>";

} else {
    print_r($pdo->errorinfo());
}

// $model = array(
//     "forsta-inlagget" => array(
//         "title" => "första inlägget",
//         "author" => "Gugge",
//         "date" => "2015-01-01",
//         "text" => "Här kommer själva inlägget i sin helhet. Välkommen till Labb 3! Här övar vi på PHP för att bli duktiga webbserverprogrammerare."
// ),
// "snart-ar-det-var" => array(
//     "title" => "snart är det vår",
//     "author" => "Gugge",
//     "date" => "2015-02-24",
//     "text" => "Då övar vi på PHP för att bli duktiga webbserverprogrammerare."
// ),
// "robin-presenterar-sig" => array(
//     "title" => "Robin presenterar sig",
//     "author" => "Robin",
//     "date" => "2015-02-25",
//     "text" => "Robin är en trevlig prick som gärna övar på PHP för att som du bli en duktig webbserverprogrammerare."
// ),
// "senaste-inlagget" => array(
//     "title" => "senaste inlägget",
//     "author" => "Gugge",
//     "date" => "2015-01-01",
//     "text" => " Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat."
// )
// );

?>
