<?php
	@session_start();
	// session_start();
	include '../engine/configdb.php';

	if(isset($_POST['btn-login'])){
		$username = trim($_POST['username']);
		$user_password = trim($_POST['password']);
		$password = base64_encode($user_password);
		$statusskpd = trim('AKTIF');

		try
			{ 
				$stmt = $db_con->prepare("SELECT user.USERID, user.USERNAME, user.USER_PASSWORD, skpd.STATUS  FROM user INNER JOIN skpd ON user.IDSKPD = skpd.IDSKPD WHERE user.USERNAME=:name");
				$stmt->execute(array(":name"=>$username));
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$count = $stmt->rowCount();

				if($row['USER_PASSWORD']==$password && $row['STATUS']==$statusskpd){
					echo "TRUE"; // log in
					$_SESSION['USER_SESSION'] = $row['USERID'];
				}else{
					echo "Nama Pengguna atau Kata Sandi Tidak Terdaftar, atau SKPD Sudah Tidak Aktif, Silahkan bertanya kepada IT Support Jika Mengalami Kendala"; // wrong details 
				}
			}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>

