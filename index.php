<?php
$start = microtime(true);

$cacheFile = "cache/index.cache.php";

if(file_exists($cacheFile) && filemtime($cacheFile) > time()-300){
    echo("From Cache </br>");
    include $cacheFile;
}
else{
    // $data = file_get_contents('cities.json');
    // $cityId = array(); -->

    // $json = json_decode($data, 1);
    // $Lists = $json['List'];

    // foreach($Lists as $li){
    //     // $cityId[] = intval( $li['CityCode']);   
    //     $cityId[] = $li['CityCode'];      

    // }
    // header('Content-Type: application/json');
    // // echo json_encode($cityId);
    // json_encode($cityId);
    // $cityId = implode(",", $cityId);
    // // echo $cityId;

    $cityId = '1248991,1850147,2644210,2988507,2147714,4930956,1796236,3143244';
    $apiKey = 'fb5a47e828425201e56fd088fc9f0e55';
    $apiUrl = "https://api.openweathermap.org/data/2.5/group?id=".$cityId."&units=metric&appid=".$apiKey;

    // $apiUrl = "https://api.openweathermap.org/data/2.5/group?id='".$cityId."'&units=metric&appid=".$apiKey;


    $weatherData =  json_decode(file_get_contents($apiUrl),true);

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Weather App</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class = "container">
            <h1>Weather App</h1>
            <?php

                for($i=0; $i < 8 ; $i++){
            ?>
                <div class = "city">

                    <?php
                        $temperature = $weatherData['list'][$i]['main']['temp'];
                        $weatherDescription = $weatherData['list'][$i]['weather'][0]['description'];
                        $weatherId = $weatherData['list'][$i]['id'];
                        $cityName = $weatherData['list'][$i]['name'];

                        echo $cityName."<br>";
                        echo "Id: ".$weatherId."<br>";
                        echo "Temperature: ".$temperature."<br>";
                        echo "Description: ".$weatherDescription;                        
                    ?>

                </div>  
            <?php   
                }
                $str = implode(" ",$weatherData);
                $handle = fopen($cacheFile,'w');
                fwrite($handle,$str);
                fclose($handle);
                echo("Cache Created</br>");
}
            
    $end = microtime(true);
    echo round($end-$start,4);
?>
    <div class = "footer">
        <h3>Thank you!</h3>
    </div>
    </div>   
    
</body>
</html>