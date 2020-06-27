<?php 
    if($_GET['search']){
        $page = file_get_contents('https://www.weather-forecast.com/locations/London/forecasts/latest');
        echo $page;
    }    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
    </head>
    <body>
        <section class="border container w-50 p-5 mt-5">
            <form method="GET">
                <h1 class="m-3">What's The Weather?</h1>
                <div class="form-group text-secondary ml-3">
                    <label for="search">Enter name of city</label>
                </div>
                
                <input type="text" name="search" id="search" placeholder="eg London, Tokyo" class="form-control m-3 w-75" >
                <input type="submit" value="Search" class="btn btn-primary m-3 ">
                
            </form>
            
        </section>
    </body>
</html>