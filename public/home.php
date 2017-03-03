<!DOCTYPE html>
<html>
    <head>
        <style>
            body {margin: 0;}

            ul.topnav {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                /*                position: fixed;*/
                top: 0;
                width: 100%;

            }

            ul.topnav li {float: left;
            }

            ul.topnav li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: violet;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,100,0,0.2);
            }
            .dropdown:hover .dropdown-content {
                display: block;
            }

            ul.topnav li a:hover:not(.active) {background-color: #111;}


            input[type=text] {
                margin: auto;
                width: 130px;
                max-height: 30px;
                margin: 5px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                background-image: url('searchicon.png');
                background-position: 10px 10px; 
                background-repeat: no-repeat;
                padding: 12px 20px 12px 40px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }

            input[type=text]:focus {
                width: 50%;
            }
        </style>
    </head>
    <body>

        <ul class="topnav">
            <li class="dropdown">
                <a href="javascript:void(0);" style="font-size:15px;" class="dropbtn" onclick="myFunction()">☰</a>
                <div class="dropdown-content" id="myDropdown">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </li>
            <form class="form-signin" method="POST">
                <input type="text" name="username"  class="form-control" id="username" placeholder="Search..">
                 <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
            </form>
        </ul>

        <div class="main">
            <?php
            $connection = mysqli_connect('localhost', 'root', '');
            if (!$connection){
                die("Database Connection Failed" . mysqli_error($connection));
            }
            $select_db = mysqli_select_db($connection, 'MOOBLE');
            if (!$select_db){
                die("Database Selection Failed" . mysqli_error($connection));
            }

            if(isset($_POST) & !empty($_POST)){
                $username = $_POST['username'];
                $result = mysqli_query($connection,"SELECT * FROM `pasien` where username = '$username'");
            } else {
            

                $result = mysqli_query($connection,"SELECT * FROM `pasien`");}
            
                echo "<table border='1'>";

                $i = 0;
                while($row = $result->fetch_assoc())
                {
                    if ($i == 0) {
                        $i++;
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            echo "<th>" . $key . "</th>";
                        }
                        echo "</tr>";
                    }
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";

                mysqli_close($connection);
            ?>
        </div>


        <script>
            //            /* When the user clicks on the button, 
            //toggle between hiding and showing the dropdown content */
            //            function myFunction() {
            //                document.getElementById("myDropdown").classList.toggle("show");
            //            }
            //
            //            // Close the dropdown if the user clicks outside of it
            //            window.onclick = function(e) {
            //                if (!e.target.matches('.dropbtn')) {
            //
            //                    var dropdowns = document.getElementsByClassName("dropdown-content");
            //                    for (var d = 0; d < dropdowns.length; d++) {
            //                        var openDropdown = dropdowns[d];
            //                        if (openDropdown.classList.contains('show')) {
            //                            openDropdown.classList.remove('show');
            //                        }
            //                    }
            //                }
            //            }
        </script>

    </body>
</html>
