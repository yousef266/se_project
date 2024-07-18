<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser()) {
		header('Location: login.php');
	}
?>

<?php

	require_once 'D:\Xampp\htdocs\SE\app\controllers\MoneyTransfercontrollers.php';
	if (!empty($_POST) && isset($_POST['IPA']) && isset($_POST['amount'])) {
		$IPA = $_POST['IPA'];
		$amount = $_POST['amount'];
		session_start();
		MoneyTransfercontrollers::request($_SESSION['usingIPA'], $IPA, $amount);
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>request money</title>
	</head>
	<body>
	<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Request Money</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
		<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Request Money</div>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100">
				<form method="post">
				<div class="form-group">
						<label for="savedIPA">Saved IPA</label>
						<select name="IPA" id="savedIPA" class="custom-select">
							<option selected>Open this select menu</option>
							<?php
								require_once 'D:\Xampp\htdocs\SE\app\controllers\SavedIPAcontrollers.php';
								$savedIPAcontrollers = new SavedIPAcontrollers();
								$_SESSION['UserID'] = 1;
								$savedIPA = $savedIPAcontrollers->showSavedIPA(true);
								foreach ($savedIPA as $IPA) {
									?>
									<option value="<?php echo $IPA['SavedIPA'] ?>"><?php echo $IPA["name"] ?></option>`;
									<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="amount">Amount</label>
						<input
							type="number"
							class="form-control"
							id="amount"
							name="amount"
							placeholder="Enter amount"
						/>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<div class="d-flex justify-content-between align-items-center h-100">
					<a href="requestmoneyUser.php" class="bg-info text-white p-3 m-2 rounded d-flex justify-content-center align-items-center" style="height: 100px; width: 100px"><div>User</div></a>	
					<div class="border border-info text-black p-3 m-2 rounded d-flex justify-content-center align-items-center" style="height: 100px; width: 100px" style="height: 100px; width: 100px"><div>Favorite</div></div>
				</div>
			</div>
		</div>
	</body>
</html>

	</body>
</html>
