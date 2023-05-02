<?php
	class View{
		public function index(){
			$this->importHead();
?>

	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-3 me-0 px-3 fs-6" href="index.php">
			<img src="./View/Template/assets/images/icon.png" style="width: 120px;">
		</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<input class="form-control form-control-light w-100 rounded-0 border-0" type="text" placeholder="Search the German Word " aria-label="Search">
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
				<button class="nav-link px-3" type="button" style="color: #ffcc00">Search</button>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block bg-body-tertiary sidebar collapse" >
				<div class="position-sticky pt-3 sidebar-sticky" style="background-color: #fc0;">

					<h4 class="d-flex align-items-center px-3 mt-4 mb-1 text-body-secondary">
						<svg xmlns="http://www.w3.org/2000/svg"
							 width="35"
							 height="35"
							 fill="currentColor"
							 class="bi bi-card-list"
							 viewBox="0 0 16 16"
						style="padding-right: 5px;">
							<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
							<path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
						</svg>Содержание

					</h4>
					<ul class="nav flex-column mb-2">
						<li class="nav-item ">
							<div class="btn-group p-1" style="width: 100%;">

								<button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									menu 1
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li><a class="dropdown-item" href="#">menu 1.1</a></li>
									<li><a class="dropdown-item" href="#">menu 1.2</a></li>
									<li><a class="dropdown-item" href="#">menu 1.3</a></li>
									<li><a class="dropdown-item" href="#">menu 1.4</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<div class="btn-group p-1" style="width: 100%;" >

								<button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									menu 2
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li><a class="dropdown-item" href="#">menu 2.1</a></li>
									<li><a class="dropdown-item" href="#">menu 2.2</a></li>
									<li><a class="dropdown-item" href="#">menu 2.3</a></li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<div class="btn-group p-1" style="width: 100%;" >

								<button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									menu 3
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li><a class="dropdown-item" href="#">menu 3.1</a></li>
									<li><a class="dropdown-item" href="#">menu 3.2</a></li>
									<li><a class="dropdown-item" href="#">menu 3.3</a></li>
									<li><a class="dropdown-item" href="#">menu 3.4</a></li>
									<li><a class="dropdown-item" href="#">menu 3.5</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>


			<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Menu 1.1</h1>
				</div>
				<div class="card mb-3" style="max-width: 740px; margin: auto;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="./View/Template/assets/images/kapusta1.jpg" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</div>

				<hr style="width: 80%; margin-left:auto; margin-right:auto;">

				<div class="card mb-3" style="max-width: 740px; margin: auto;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="./View/Template/assets/images/kapusta2.jpg" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</div>

				<hr style="width: 80%; margin-left:auto; margin-right:auto;">

				<div class="card mb-3" style="max-width: 740px; margin: auto;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="./View/Template/assets/images/kapusta3.jpg" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</div>

				<hr style="width: 80%; margin-left:auto; margin-right:auto;">

				<div class="card mb-3" style="max-width: 740px; margin: auto;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="./View/Template/assets/images/kapusta1.jpg" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</div>

				<hr style="width: 80%; margin-left:auto; margin-right:auto;">

				<div class="card mb-3" style="max-width: 740px; margin: auto;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="./View/Template/assets/images/kapusta2.jpg" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</div>

				<hr style="width: 80%; margin-left:auto; margin-right:auto;">

				<div class="card mb-3" style="max-width: 740px; margin: auto;">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="./View/Template/assets/images/kapusta3.jpg" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</div>

				<hr style="width: 80%; margin-left:auto; margin-right:auto;">



				<footer class="footer mt-auto py-3" style="background-color: #ffcc00">
					<div class="container" style="width: 100%; text-align: center; z-index: 1;">
						<span class="text-body-secondary">Все права защищены © 2023</span><br>
						<span class="text-body-secondary"> email: office@iwex.info</span>
					</div>
				</footer>
			</main>
		</div>
	</div>

<?php
		$this->importFoot();
	}
		public function loginPanel($param){
			$this->importHead();
			if($param){
				echo "<script>alert('There is not like this admin, please enter email or password correctly!');</script>";
			}
?>
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar col-md-3 col-lg-3 me-0 px-3 fs-6" href="index.php">
				<img src="./View/Template/assets/images/icon.png" style="width: 120px;">
			</a>
		</header>

		<div style=" padding-top: 180px;" >
			<form class="row g-2 needs-validation" style="width: 414px; margin:auto; background-color: #fc0; padding: 50px; border-radius: 25px;" action="index.php?page=admin" method="post" validate>
				<div class="col-md-12">
					<label for="validationCustom01" class="form-label">Email :</label>
					<div class="input-group has-validation">
						<input type="text" class="form-control" id="validationCustom01" name="email" placeholder="Enter the email" required>
						<div class="invalid-feedback">
							Please enter your email.
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<label for="validationCustom02" class="form-label">Password :</label>
					<div class="input-group has-validation">
						<input type="password" class="form-control" id="validationCustom02" name="password" placeholder="Password" required>
						<div class="invalid-feedback">
							Please enter your password.
						</div>
					</div>
				</div>

				<div class="col-12" >
					<button type="submit" class="btn btn-dark" style="width: 100%;">Login</button>
				</div>
			</form>

		</div>



<?php
		$this->importFoot();
	}

	public function adminPanel(){
			$this->importHead();
			$this->importAdminNavigationBar();
?>


	<h1>Admin panel</h1>




<?php
			$this->importFoot();
	}
		public function importHead(){
			include "./View/Template/Head.html";
		}

		public function importFoot(){
			include "./View/Template/Footer.html";
		}

//		Admin panel
	public function importAdminNavigationBar(){
		include "./View/Template/adminNavBar.html";
	}
	}
?>
