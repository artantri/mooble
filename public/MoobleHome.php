<html>
    <head>
        <!--        load jquery-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        
        <!--        load css file-->
        <link rel="stylesheet" type="text/css" href="stylePasienProf.css">

        <script type="text/javascript" src="https://www.google.com/jsapi"></script> 

    </head>
    <body>
        <!--Menu Bar-->
        <ul class="topnav">
            <li class="dropdown">
                <div class="menu">
                    <img src="menu.png" class="menubtn" onclick="openNav()">
                </div>
            </li>
        </ul>

        <!--Side Navigation-->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="pilihanMenu"  onmouseover="onHoverPasien();" onmouseout="offHoverPasien();">
                <img src="check-wht.png" id="menuImg" >
                <a href="#">Pasien</a>
            </div>
            <div class="pilihanMenu" onmouseover="onHoverStaff();" onmouseout="offHoverStaff();">
                <img src="staff-wht.png" id="menuImgStaff">
                <a href="#">Staff</a>
            </div>
            <div class="pilihanMenu" onmouseover="onHoverDokter();" onmouseout="offHoverDokter();">
                <img src="tool-wht.png" id="menuImgDokter">
                <a href="#">Dokter</a>
            </div>
        </div>
        
        <script>
            function onHoverPasien()
            {
                $("#menuImg").attr('src', 'check-grn.png');
            }

            function offHoverPasien()
            {
                $("#menuImg").attr('src', 'check-wht.png');
            }
            
            function onHoverDokter()
            {
                $("#menuImgDokter").attr('src', 'tool-grn.png');
            }

            function offHoverDokter()
            {
                $("#menuImgDokter").attr('src', 'tool-wht.png');
            }
            
            function onHoverStaff()
            {
                $("#menuImgStaff").attr('src', 'staff-grn.png');
            }

            function offHoverStaff()
            {
                $("#menuImgStaff").attr('src', 'staff-wht.png');
            }

        </script>
        
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "150px";
//                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
//                document.body.style.backgroundColor = "#EEEEEE";
            }
        </script>
    </body>
</html>