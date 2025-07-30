<html>
<head>
    <title>Speed Convertor</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-5 col-md-offset-3">
             <form class="form-horizontal" action="index.php" method="POST">
                <div class="form-group">
                    <label for="temperature">Speed Convertor</label>
                    <input type="text" id="temperature" name="temperature" class="form-control" required autofocus>
                </div>

                <div class="form-group"> 
                    <div class="checkbox-inline">
                        <label for="fahrenheit">km/h to mph</label>
                        <input type="radio" name="conversion" id="fahrenheit" value="fahrenheit">
                     </div>

                     <div class="checkbox-inline">
                        <label for="celsius">mph to km/h</label>
                        <input type="radio" name="conversion" id="celsius" value="celsius">
                     </div>
                 </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        
<?php
function sanitizeString($str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return $str;
}

function toFahrenheit($celsius)
{
    return ($celsius*1.609344); 
}

function toCelsius($fahrenheit)
{
    return($fahrenheit /1.609344); 
}

if(isset($_POST['temperature']))
{
    // sanitize temperature
    $temperature = sanitizeString($_POST['temperature']);
    
    $output = "Error!";
    
    // business logic
    if(isset($_POST['conversion']) && $_POST['conversion'] === 'fahrenheit')
    {
        $output = $temperature . " km/h = " . toCelsius($temperature) . " mph";
    }
    else if(isset($_POST['conversion']) && $_POST['conversion'] === 'celsius')
    {
        $output = $temperature . " mph = " . toFahrenheit($temperature) . " km/h";       
    }
    
    // print temperature
    echo $output;
}
?>   
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
