<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Pealkiri</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"> 

    </head>
    <body>
        
        <form name="qForm">
            
            <div id="q1" class="Show">
                
                <label>Is the victim at the home</label><br>
                <input type="radio" name="q1" value="0">EI<br>
                <input type="radio" name="q1" value="1">JAH<br>

                <br>
            </div>

            <div id="q2" class="Hide">
                
                <label>Is the victim reachable via phone?</label><br>
                <input type="radio" name="q2" value="0">EI<br>
                <input type="radio" name="q2" value="1">JAH<br>

                <br>
            </div>
            
            <div id="q3" class="Hide">
                
                <label>Does the victim agree</label><br>
                <input type="radio" name="q3" value="0">EI<br>
                <input type="radio" name="q3" value="1">JAH<br>

                <br>
            </div>
            
        </form>

        <script src="js/app.js"></script>
    </body>
</html>
