<?php
 
 
$servername = "localhost";//Server Name
$username = "root";//Server User Name
$password = "";//Server Password
$dbname = "new_task";//Database Name
 
//Create DB Connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
 
?>


<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>

<body>
    <div class="container">
        <div class="row">

            <form action="" method="post">

                <div>
                    <h3>Student Rating System</h3>
                </div>

                <div>
                    <label>Name</label>
                    <input type="text" name="name">
                </div>

                <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                </div>

                <span class='result'>0</span>
                <input type="hidden" name="rating">
                <input type="hidden" name="rating">

        </div>

        <div><input type="submit" name="add"> </div>

        </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
    </script>
</body>

</html>
<?php
$sql2 = "SELECT * FROM `num`";
$result =mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result);
$num=$row['num'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // echo $row['avrege'];
    
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $nume= intval($num);
    echo is_int($nume),'fafas',$nume;
    $nume++;
    // echo is_int($num2);
    $sql2 = "UPDATE `num` SET  `num` = $nume WHERE id='1'";
    $result4 =mysqli_query($conn, $sql2);

    
    $sql = "INSERT INTO ratee (name,rate) VALUES ('$name','$rating'/$nume)";
    // echo $avrege;
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate addedddd successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>