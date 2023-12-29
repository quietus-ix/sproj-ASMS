<?php
require_once '../php/config.php';
session_start();

$sessionID = $_SESSION['sessionID'];

if (!isset($sessionID)) {
	header('Location: ../login/index.php');
}

$query = $conn->query("SELECT user_fullname FROM tbl_user WHERE user_id = '$sessionID'");
$user = $query->fetch_column();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title> ASMS Main </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../src/extensions/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../../src/extensions/datatables/datatables.css">
	<link rel="stylesheet" href="../../src/extensions/icons/bootstrap-icons.css">
	<link rel="stylesheet" href="style.css">
</head>

<body class="">
	<div class="d-flex h-100">
		<!-- the side bar where nav is placed -->
		<div class="sidebar d-flex flex-column px-0 mx-0 position-relative">
			<div class="layer position-absolute top-0 start-0 w-100 h-100"></div>

			<!-- logo above the links -->
			<div class="logo-details d-flex align-items-center mb-2 position-relative z-1">
				<img src="../../src/assets/img/logo.png" class="logo">
				<span class="logo_name" style="letter-spacing: 5px;">ASMS</span>
			</div>

			<div class="nav-links d-flex flex-column pe-0 position-relative z-1">
				<div class="" id="dashboard_tab">
					<a href="#" class="active">
						<i class="bi bi-circle-square"></i>
						<span class="links_name">Dashboard</span>
					</a>
				</div>
				<div class="" id="applicationView_tab">
					<a href="#">
						<i class="bi bi-file-earmark-person-fill"></i>
						<span class="links_name">Your Application</span>
					</a>
				</div>
				<div class="" id="scholarList_tab">
					<a href="#">
						<i class="bi bi-mortarboard-fill"></i>
						<span class="links_name">Scholars</span>
					</a>
				</div>
			</div>
		</div>

		<div class="content d-flex flex-column px-0 mx-0">
			<!-- the nav bar above -->
			<div class="nav-top shadow-sm d-flex align-items-center px-3 py-2 w-100">
				<div class="col-10 align-items-center d-flex w-75">
					<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-clipboard-data-fill me-2 nav-heading-icon" viewBox="0 0 16 16">
						<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
						<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1" />
					</svg>
					<h4 id="nav-heading" class="nav-heading m-0">Scholar Dashboard</h4>
				</div>
				<div class="col-2 d-flex justify-content-end w-25 gap-3 align-items-center">
					<button class="btn border border-2 position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
						<i class="bi bi-bell-fill"></i>
						<?php
						$query = $conn->query("SELECT * FROM tbl_unotif WHERE unotif_for = $sessionID AND unotif_status = false");
						if ($query->num_rows > 0) {
						?>
							<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
								<span class="visually-hidden">New alerts</span>
							</span>
						<?php } ?>
					</button>

					<div class="dropdown">
						<button class="btn d-flex align-items-center gap-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="../../src/assets/img/test-profile.png" class="rounded" alt="" style="width: 2.5rem; height: 2.5rem;">
							<?php echo $user; ?>
						</button>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item d-flex align-items-center py-2" href="#">
									<i class='bx bxs-contact fs-3 me-3'></i>
									Your information
								</a>
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center py-2" href="../php/logout.php">
									<i class='bx bxs-log-out fs-3 me-3'></i>
									Log out
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<!-- this <main> element is where the content of each tabs are displayed. Refer to your script.js to know what is displayed here -->
			<main class="px-0">
				<!-- content here -->
			</main>
		</div>
	</div>

	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<?php
			while ($query->fetch_assoc()) {
			?>
				<div class="row mb-3">
					<div class="col">
						<div class="card border border-4">
							<div class="card-body">
								<p class="card-text fw-bold">Your application form has been updated!</p>
								<a href="#" id="notif_btnGoTo" class="btn btn-primary w-100" data-bs-dismiss="offcanvas">Go to</a>
							</div>
						</div>

					</div>
				<?php } ?>
				</div>
		</div>
	</div>

	<!-- toasts area -->
	<div class="success toast position-fixed top-0 end-0 z-3 m-3 slideRight" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-check-square-fill me-2 text-success" viewBox="0 0 16 16">
				<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
			</svg>
			<strong class="me-auto text-success">Success</strong>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			message
		</div>
	</div>

	<div class="alert toast position-fixed top-0 end-0 z-3 m-3 slideRight" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-check-square-fill me-2 text-danger" viewBox="0 0 16 16">
				<path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
			</svg>
			<strong class="me-auto text-danger">Alert</strong>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			message
		</div>
	</div>

	<script src="../../src/extensions/jquery-up.js"></script>
	<script src="../../src/extensions/popper.js"></script>
	<script src="../../src/extensions/bootstrap/js/bootstrap.js"></script>
	<script src="../../src/extensions/datatables/datatables.js"></script>
	<script src="../../src/extensions/datatables/Buttons-2.4.2/js/dataTables.buttons.js"></script>
	<script src="../../src/extensions/datatables/Buttons-2.4.2/js/buttons.print.js"></script>
	<script src="script.js" type="module"></script>
	<script src="script.js"></script>
</body>

</html>