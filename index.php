<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>
    <style>
        body {
            background: purple;
            color: white;
        }
    </style>
   <body>
       <?php

       function connect(
                        
                        $servername = "localhost",
                        $username = "root",
                        $password = "root",
                        $dbname = "bd-hotel"){

            $conn = new mysqli($servername, $username,$password,$dbname);
            
            if($conn && $conn->connect_error){
                
                echo 'connection failed' . $conn->connect_error;
            }
            return $conn;

        }

        function getStanze(){
            return "
             SELECT room_number
             FROM stanze" ;
        }


        $conn = connect();
        $sql = getStanze();
     

        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $stmt -> bind_result($room_number);
       
        while($stmt -> fetch()){

            echo  
            'il numero della stanza : ' . $room_number . '<br>';
        }
      
        $conn-> close();
        $stmt-> close();

       ?>
   </body>
</html> 