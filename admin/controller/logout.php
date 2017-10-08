<?php
	error_reporting(0);
	session_start();
	unset($_SESSION['USER_SESSION']);
 
	if(session_destroy()){
		// header("Location: index.html");
?>
		<script>
		setTimeout(function(){
			window.location.href = "login.html";
		})
		</script>
<?php
	}
?>