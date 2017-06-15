<?php
	session_start();
	if (is_null($_SESSION['user'])) {
		header("location:userlogin.php");
	}
?>


<script>
    $(function () {
		<?php
		include "connection.php";
		$select = "select DISTINCT symptom from symptoms";
		$res = mysqli_query($conn, $select);
		$ans = "";
		while ($row = mysqli_fetch_array($res)) {
			$ans .= '"' . $row[0] . '",';
		}
		$ans = substr($ans, 0, strlen($ans) - 1);
		?>

        $("#txtsrch").tagit({
            availableTags: [<?php echo $ans; ?>]
        });

    });
    function searchareas() {
//        var city = document.getElementById("city").value;
        var symp = document.getElementById("txtsrch").value;
//         alert(symp);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("symptoms").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "getdata.php?s=" + symp, true);
        xhttp.send();
    }
    function appoint() {
//        var city = document.getElementById("city").value;
		var time = new Date();
		var time = time.toDateString();
		var mobileno = <?php echo $_SESSION['user'] ?> ;
		var iss = document.getElementById("txtsrch").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
//                location.href = "userhome.php";
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "subapp.php?time=" + time + "&mo=" + mobileno + "&sym=" + iss, true);
        xmlhttp.send();
    }

    function proceed(centre) {

        var parr=document.getElementsByName("patient");
        var patient;
        for (var i = 0, length = parr.length; i < length; i++) {
            if (parr[i].checked) {
                // do whatever you want with the checked radio
                patient=parr[i].value;
                // only one radio can be logically checked, don't check the rest
                break;
            }
        }
        window.location.assign("proceed.php?c="+centre+"&p="+patient);
    }
    function changeclr(cntrl,id,amt) {
        if(cntrl.checked==true){
            document.getElementById("tr"+id).style.backgroundColor="#ff5f25";
            document.getElementById("tr"+id).style.color="#ffffff";
            var total=document.getElementById("total").value;
            var tot=parseFloat(total)+parseFloat(amt);
            document.getElementById("total").value=tot;
        }
        else{
            document.getElementById("tr"+id).style.backgroundColor="#ffffff";
            document.getElementById("tr"+id).style.color="#000000";
            var total=document.getElementById("total").value;
            var tot=parseFloat(total)-parseFloat(amt);
            document.getElementById("total").value=tot;
        }
    }
</script>

<div class="header">
	<div class="container-fluid">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="logo">
					<a class="navbar-brand" href="userhome.php">Clinico</a>
				</div>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
				<nav class="cl-effect-5" id="cl-effect-5">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"
							   role="button" aria-haspopup="true" aria-expanded="false">Settings<span
									class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="editprofile.php">Edit Profile</a> </li>
								<li><a href="userchangepassword.php">Change Password</a></li>
								<li><a href="userlogout.php">LogOut</a></li>
							</ul>
						</li>
						<li class="active navbar-right"><a>Welcome ,

								<?php $u=$_SESSION['user']; $q="select name from userprofile where mobileno= '$u'"; $qu=mysqli_query($conn,$q);$qu1=mysqli_fetch_array($qu); echo $qu1[0]; ?></a></li>

					</ul>
				</nav>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
	</div>
</div>





