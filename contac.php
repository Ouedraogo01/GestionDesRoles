<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


try {
	$contact = new PDO(
		'mysql:host=localhost;dbname=sitevoyage',
		'root',
		'',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);
} catch (Exception $e) {
	die("Error " . $e->getMessage());
}

if (isset($_POST['envoyer'])) {
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$sql = $contact->prepare("INSERT INTO inscription (nom, email, subject, message)
                VALUES (:nom, :email, :subject, :message)");

	$sql->bindParam(':nom', $nom);
	$sql->bindParam(':email', $email);
	$sql->bindParam(':subject', $subject);
	$sql->bindParam(':message', $message);
	$sql->execute();

	if ($sql->execute()) {
		echo "Votre message à bien été envoyé";
	} else {
		echo "echec, problème technique";
	}
}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="contac.css">

</head>

<body>
	<?php include("header.php"); ?>
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Contact Us</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<!-- <p class="request_message">Votre message à bien été envoyé!</p> -->
									<h3 class="mb-4">Get in touch</h3>
									<div id="form-message-warning" class="mb-4"></div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm"
										action="">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Full Name</label>
													<input type="text" class="form-control" name="nom" id="nom"
														placeholder="Name" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Email Address</label>
													<input type="email" class="form-control" name="email" id="email"
														placeholder="Email" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Subject</label>
													<input type="text" class="form-control" name="subject" id="subject"
														placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message</label>
													<textarea name="message" class="form-control" id="message" cols="30"
														rows="4" placeholder="Message" required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="envoyer" value="Send Message"
														class="btn btn-success">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-success text-white w-100 p-md-5 p-4">
									<h3>Let's get in touch</h3>
									<p class="mb-4">We're open for any suggestion or just to have a chat</p>
									<div class="dbox d-flex align-items-start mt-5 m-3">
										<div class="icon d-flex align-items-center justify-content-center"
											style="font-size: 20px;">
											<span class="fa fa-map-marker m-3"></span>
										</div>
										<div class="text pl-3">
											<p class="m-3"><span>Address:</span> 198 Bobo</p>
										</div>
									</div>
									<div class="dbox d-flex align-items-start mt-5">
										<div class="icon d-flex align-items-center justify-content-center"
											style="font-size: 20px;">
											<span class="fa fa-phone m-3"></span>
										</div>
										<div class="text pl-3">
											<p class="m-3"><span>Phone:</span> <a class="text-white" href="#">+226
													66250114</a></p>
										</div>
									</div>
									<div class="dbox d-flex align-items-start mt-5">
										<div class="icon d-flex align-items-center justify-content-center"
											style="font-size: 20px;">
											<span class="fa fa-paper-plane m-3"></span>
										</div>
										<div class="text pl-3">
											<p class="m-3"><span>Email:</span> <a class="text-white"
													href="#">abou@gmail.com</a>
											</p>
										</div>
									</div>
									<div class="dbox d-flex align-items-start mt-5">
										<div class="icon d-flex align-items-center justify-content-center"
											style="font-size: 20px;">
											<span class="fa fa-globe m-3"></span>
										</div>
										<div class=" text pl-3">
											<p class="m-3"><span>Website:</span> <a class="text-white"
													href="#">yoursite.com</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include("footer.php"); ?>


	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>