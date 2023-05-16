<?php
	class View{
	public function index($chapters){
		$this->importHead();
?>

		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar col-md-3 col-lg-3 me-0 px-3 fs-6 mb-1 mt-1" href="index.php">
				<img src="./View/Template/assets/images/icon.png" style="width: 120px;">
			</a>

			<div class="navbar-nav">
				<div class="nav-item text-nowrap">
					<button class="nav-link px-3" type="button" style="color: #ffcc00">
						<a href="index.php?page=admin" style="text-decoration: none; color: #fc0;">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
								<path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
								<path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
							</svg>Login
						</a>
					</button>
				</div>
			</div>
		</header>


		<div class="container mt-5" style="margin-bottom: 130px;">
			<h1 style="font-family: 'Sans-serif'; margin-bottom: 18px;">Inhalt:</h1>
			<div class="card-group">
				<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
					<?php  foreach ($chapters as $chapter) { ?>
					<div class="col-lg-4">
						<form  action="index.php?page=chapter" method="post" enctype="multipart/form-data">
							<input type="hidden" name="chapterId" value="<?php echo $chapter->getId(); ?>">
							<button class="card" type="submit">
								<img src="./Controller/chapterUploads/<?php echo $chapter->getImageUrl();?>" class="card-img-top object-fit-cover" alt="<?php $chapter->getImageUrl();?>" style="object-fit: cover; height:270px;">
								<div class="card-body">
									<h4 class="card-title" style="font-family: 'Times New Roman'; text-transform: uppercase;"><b> <?php echo $chapter->getChapterName(); ?></b></h4>
								</div>
							</button>
						</form>
					</div>

					<?php  } ?>

				</div>
			</div>
		</div>


		<footer class="text-center text-lg-start py-2 fixed-bottom" style="background-color: #ffcc00; z-index: 0;">
			<div class="container" style="width: 100%; text-align: center; z-index: 1;">
				<span class="text-body-secondary">Все права защищены © 2023</span><br>
				<span class="text-body-secondary"> email: office@iwex.info</span>
			</div>
		</footer>

<?php
	$this->importFoot();
}

	public function chapterContentPage($navComponents, $subMenuWords, $chapterId){
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
							<?php foreach ($navComponents as $key => $values) { ?>

							<li class="nav-item ">
								<div class="btn-group p-1" style="width: 100%;">

									<button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
										<?php echo $key; ?>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<?php foreach ($values as $subMenu){?>
										<li>
											<form method="post" action = "index.php?page=wordsBySubMenu">
												<input type="hidden" name="subMenuId" value="<?php echo $subMenu->getId();?>">
												<input type="hidden" name="chapterId" value="<?php echo $chapterId;?>">
												<button class="dropdown-item"  type="submit"><?php echo $subMenu->getSubMenuName();?></button>
											</form>

										</li>

										<?php } ?>
									</ul>
								</div>
							</li>

							<?php }?>

						</ul>
					</div>
				</nav>


				<main class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Menu 1.1</h1>
					</div>
					<?php if (count($subMenuWords) > 0){

						foreach ($subMenuWords as $words){
						?>
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

					<?php }
						}else{ ?>

						<div class="jumbotron jumbotron-fluid">
							<div class="container">
								<h1 class="display-4">Fluid jumbotron</h1>
								<p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
							</div>
						</div>

					<?php } ?>


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

	public function adminPanel($warning, $message){
			$this->importHead();
			$this->importAdminNavigationBar();

		if($warning){
			echo "<script>alert('$message')</script>";
		}
?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-9 mx-auto pt-5">
					<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="./View/Template/assets/images/slider1.jpeg"  class="d-block w-100 bg-dark  opacity-50" alt="Slide 1" style="object-fit: cover; height: 580px;">
								<div class="carousel-caption d-none d-md-block">
									<h5 style="color: black;">Хелен Келлер</h5>
									<p style="color: black;">Самые лучшие в мире вещи невозможно увидеть или потрогать руками. Их можно только почувствовать </p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="./View/Template/assets/images/slider2.jpg"  class="d-block w-100 bg-dark  opacity-50" alt="Slide 2" style="object-fit: cover; height: 580px;">
								<div class="carousel-caption d-none d-md-block">
									<h5 style="color: black;">Сенека</h5>
									<p style="color: black;">Жизнь вещь грубая. Ты вышел в долгий путь, – значит, где-то и поскользнешься, и получишь пинок, и упадешь, и устанешь, и воскликнешь «умереть бы!», и стало быть, солжешь</p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="./View/Template/assets/images/slider3.jpg"  class="d-block w-100 opacity-50" alt="Slide 3" style="object-fit: cover; height: 580px;">
								<div class="carousel-caption d-none d-md-block">
									<h5 style="color: black;">Альберт Эйнштейн</h5>
									<p style="color: black;">Жизнь как езда на велосипеде. Чтобы сохранить равновесие, вы должны продолжать двигаться.</p>
								</div>
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
		</div>
<?php
			$this->importFoot();
	}

//	****************** CHAPTER PART START ******************* //
	public function allChapters($chapters){
			$this->importHead();
			$this->importAdminNavigationBar();
?>

		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-9 mx-auto pt-5">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Chapter Name</th>
							<th scope="col">Chapter Image</th>
							<th scope="col">
								Update
							</th>
							<th scope="col">
								Delete
							</th>

						</tr>
						</thead>
						<tbody class="table-group-divider">


						<?php  foreach ($chapters as $chapter) { ?>
							<tr>
								<th scope="row"><?php echo $chapter->getId(); ?></th>
								<td><?php echo $chapter->getChapterName(); ?></td>
								<td>
									<img src="./Controller/chapterUploads/<?php echo $chapter->getImageUrl();?>" class="object-fit-cover rounded mx-auto" alt="<?php echo $chapter->getImageUrl();?>" style="width: 150px; height: 100px;">
								</td>
								<td>
									<button type='button' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?php echo $chapter->getId(); ?>">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
											<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
										</svg>
									</button>
								</td>
								<td>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete<?php echo $chapter->getId(); ?>">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
											<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
										</svg>
									</button>
								</td>
							</tr>





							<!-- Modal -->
							<div class="modal fade" id="delete<?php echo $chapter->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Өчүрүлгөн маалыматтар кайра калыбына келтирилбейт. Чын эле өчүрүүнү каалап жатасызбы?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
											<form action='index.php?page=deleteChapter' method='post'>
												<input type='hidden' name='chapterID' value='<?php echo $chapter->getId();?>'>
												<input type='hidden' name='imageUrl' value='<?php echo $chapter->getImageUrl();?>'>
												<button type="submit" class="btn btn-danger">Удалить</button>
											</form>
										</div>
									</div>
								</div>
							</div>

							<!-- Modal -->
							<div class="modal fade" id="update<?php echo $chapter->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Бул бөлүмдүн маалыматтарын жаңыртууну каалайсызбы?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
											<form action='index.php?page=updateChapterForm' method='post'>
												<input type='hidden' name='chapterID' value='<?php echo $chapter->getId();?>'>
												<input type='hidden' name='chapterName' value='<?php echo $chapter->getChapterName();?>'>
												<input type='hidden' name='imageName' value='<?php echo $chapter->getImageUrl();?>'>
												<button type="submit" class="btn btn-primary">Дальше</button>
											</form>
										</div>
									</div>
								</div>
							</div>





						<?php }?>

						</tbody>
					</table>
				</div>
			</div>
		</div>



<?php
			$this->importFoot();
	}
	public function createChapterForm(){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-6 mx-auto pt-5">
					<h1 class="mb-5">Бөлүм түзүү</h1>

					<form method="post" action="index.php?page=createChapter" enctype="multipart/form-data">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="chapterName" placeholder="Бөлүмдүн ысымын жазыңыз..." required>
						</div>
						<div class="input-group">
							<input type="file" class="form-control" id="inputGroupFile04" name="chapterImage" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
							<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Түзүү</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
		$this->importFoot();
	}
	public function updateChapter($chapterId, $chapterName, $imageName){
			$this->importHead();
			$this->importAdminNavigationBar();
			?>
			<div class="container-fluid " >
				<div class="row">
					<div class="col-lg-6 mx-auto pt-5">
						<h1 class="mb-5">Update Chapter</h1>

						<form method="post" action="index.php?page=updateChapter" enctype="multipart/form-data">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="chapterName" value="<?php echo $chapterName;?>" required>
							</div>
							<div class="input-group">
								<input type='hidden' name='chapterID' value='<?php echo $chapterId;?>'>
								<input type='hidden' name='imageNameUpdate' value='<?php echo $imageName;?>'>
								<input type="file" class="form-control" id="inputGroupFile04" name="chapterImage" aria-describedby="inputGroupFileAddon04" aria-label="Upload" placeholder="<?php echo $imageName;?>" required>
								<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<?php
			$this->importFoot();
}

//	****************** CHAPTER PART END  ******************* //



//	****************** CHAPTER MENU PART START ******************* //
	public function allChaptersMenu($chaptersMenu){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>

		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-9 mx-auto pt-5">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">Menu Id</th>
							<th scope="col">Menu Name</th>
							<th scope="col">Chapter Name</th>
							<th scope="col">Update</th>
							<th scope="col">Delete</th>
						</tr>
						</thead>
						<tbody class="table-group-divider">
						<?php ?>
						<?php  foreach ($chaptersMenu as $menu) { ?>
						<tr>
							<th scope="row"> <?php echo $menu->getId(); ?></th>
							<td><?php echo $menu->getChapterMenuName();?></td>
							<td><?php echo $menu->getChapterName(); ?></td>
							<td>
								<button type='button' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?php echo $menu->getId(); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
										<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
									</svg>
								</button>
							</td>
							<td>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete<?php echo $menu->getId(); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
										<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
									</svg>
								</button>
							</td>
						</tr>

							<!-- Modal delete -->
							<div class="modal fade" id="delete<?php echo $menu->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Өчүрүлгөн маалыматтар кайра калыбына келтирилбейт. Чын эле өчүрүүнү каалап жатасызбы?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
											<form action='index.php?page=deleteChapterMenu' method='post'>
												<input type='hidden' name='chapterMenuId' value='<?php echo $menu->getId();?>'>
												<button type="submit" class="btn btn-danger">Удалить</button>
											</form>
										</div>
									</div>
								</div>
							</div>

							<!-- Modal update -->
							<div class="modal fade" id="update<?php echo $menu->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Бул теманын маалыматтарын жаңыртууну каалайсызбы?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
											<form action='index.php?page=updateChapterMenuForm' method='post'>
												<input type='hidden' name='chapterMenuId' value='<?php echo $menu->getId();?>'>
												<input type='hidden' name='chapterMenuName' value='<?php echo $menu->getChapterMenuName();?>'>
												<input type='hidden' name='chapterId' value='<?php echo $menu->getChapterId();?>'>
												<button type="submit" class="btn btn-primary">Дальше</button>
											</form>
										</div>
									</div>
								</div>
							</div>

						<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php
		$this->importFoot();
	}
	public function createChapterMenu($allChapters){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-6 mx-auto pt-5">
					<h1 class="mb-5">Бөлүмдүн темасын түзүү</h1>

					<form method="post" action="index.php?page=createChapterMenu" enctype="multipart/form-data">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="chapterMenuName" placeholder="Теманын ысымын жазыныз..." required>

							<div class="form-floating">
								<select name="chapterSelect" class="form-select" id="floatingSelect" aria-label="Floating label select example" >
									<?php  foreach ($allChapters as $chapter) { ?>
									<option value="<?php echo $chapter->getId();?>"><?php echo $chapter->getChapterName();?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="input-group">
							<button class="btn btn-outline-secondary w-100" type="submit">Түзүү</button>
						</div>
					</form>
				</div>
			</div>
		</div>




		<?php
		$this->importFoot();

	}
	public function updateChapterMenu($chapterMenuId, $chapterMenuName, $allChapters, $chapterId){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-6 mx-auto pt-5">
					<h1 class="mb-5">Update Chapter Menu</h1>

					<form method="post" action="index.php?page=updateChapterMenu" enctype="multipart/form-data">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="chapterMenuName" value="<?php echo $chapterMenuName; ?>" required>

							<div class="form-floating">
								<select name="chapterSelect" class="form-select" id="floatingSelect" aria-label="Floating label select example" >
									<?php  foreach ($allChapters as $chapter) {

										if ($chapter->getId() == $chapterId){ ?>
											<option value="<?php echo $chapter->getId();?>" selected><?php echo $chapter->getChapterName();?></option>
										<?php } else{ ?>
											<option value="<?php echo $chapter->getId();?>"><?php echo $chapter->getChapterName();?></option>
											<?php
										}
									} ?>
								</select>
							</div>
						</div>
						<div class="input-group">
							<input type='hidden' name='chapterMenuId' value='<?php echo $chapterMenuId;?>'>
							<button class="btn btn-outline-secondary w-100" type="submit">Жаныртуу</button>
						</div>
					</form>
				</div>
			</div>
		</div>




		<?php
		$this->importFoot();
	}

//	****************** CHAPTER MENU PART END  ******************* //




//	****************** CHAPTER SUB MENU PART START ******************* //
	public function allChaptersSubMenu($allChapterSubMenu){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>


		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-9 mx-auto pt-5">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Sub Menu</th>
							<th scope="col">Menu</th>
							<th scope="col">Chapter</th>
							<th scope="col">Update</th>
							<th scope="col">Delete</th>
						</tr>
						</thead>

						<tbody class="table-group-divider">

						<?php  foreach ($allChapterSubMenu as $subMenu) { ?>
						<tr>
							<th scope="row"> <?php echo $subMenu->getId(); ?></th>
							<td><?php echo $subMenu->getSubMenuName();?></td>
							<td><?php echo $subMenu->getMenuName(); ?> </td>
							<td><?php echo $subMenu->getChapterName(); ?></td>
							<td>
								<button type='button' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?php echo $subMenu->getId(); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
										<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
									</svg>
								</button>
							</td>
							<td>
								<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete<?php echo $subMenu->getId(); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
										<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
									</svg>
								</button>
							</td>
						</tr>



							<!-- Modal delete -->
							<div class="modal fade" id="delete<?php echo $subMenu->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Өчүрүлгөн маалыматтар кайра калыбына келтирилбейт. Чын эле өчүрүүнү каалап жатасызбы?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
											<form action='index.php?page=deleteChapterSubMenu' method='post'>
												<input type='hidden' name='chapterSubMenuId' value='<?php echo $subMenu->getId();?>'>
												<button type="submit" class="btn btn-danger">Удалить</button>
											</form>
										</div>
									</div>
								</div>
							</div>



							<!-- Modal update -->
							<div class="modal fade" id="update<?php echo $subMenu->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Бул подтеманын маалыматтарын жаңыртууну каалайсызбы?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
											<form action='index.php?page=updateChapterSubMenuForm' method='post'>
												<input type='hidden' name='chapterSubMenuId' value='<?php echo $subMenu->getId();?>'>
												<input type='hidden' name='chapterSubMenuName' value='<?php echo $subMenu->getSubMenuName();?>'>
												<input type='hidden' name='menuId' value='<?php echo $subMenu->getMenuid();?>'>
												<input type='hidden' name='menuName' value='<?php echo $subMenu->getMenuName();?>'>
												<input type='hidden' name='chapterName' value='<?php echo $subMenu->getChapterName();?>'>
												<button type="submit" class="btn btn-primary">Дальше</button>
											</form>
										</div>
									</div>
								</div>
							</div>

						<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>


		<?php
		$this->importFoot();
	}
	public function createChapterSubMenu($allChaptersMenu){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-6 mx-auto pt-5">
					<h1 class="mb-5">Подтема түзүү</h1>

					<form method="post" action="index.php?page=createChapterSubMenu" enctype="multipart/form-data">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="chapterSubMenuName" placeholder="Подтеманын ысымын жазыңыз..." required>

							<div class="form-floating">
								<select name="chapterMenuSelect" class="form-select" id="floatingSelect" aria-label="Floating label select example" >
									<?php  foreach ($allChaptersMenu as $chapterMenu) { ?>
										<option value="<?php echo $chapterMenu->getId();?>"><?php echo $chapterMenu->getChapterMenuName();?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="input-group">
							<button class="btn btn-outline-secondary w-100" type="submit">Түзүү</button>
						</div>
					</form>
				</div>
			</div>
		</div>




		<?php
		$this->importFoot();
	}
	public function updateChapterSubMenu($chapterSubMenuId, $chapterSubMenuName, $allChaptersMenu, $menuId){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-6 mx-auto pt-5">
					<h1 class="mb-5">Update Chapter Menu</h1>

					<form method="post" action="index.php?page=updateChapterSubMenu" enctype="multipart/form-data">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="chapterSubMenuName" value="<?php echo $chapterSubMenuName; ?>" required>

							<div class="form-floating">
								<select name="chapterMenuSelect" class="form-select" id="floatingSelect" aria-label="Floating label select example" >
									<?php  foreach ($allChaptersMenu as $menu) {

										if ($menu->getId() == $menuId){ ?>
											<option value="<?php echo $menu->getId();?>" selected><?php echo $menu->getChapterMenuName();?></option>
										<?php } else{ ?>
											<option value="<?php echo $menu->getId();?>"><?php echo $menu->getChapterMenuName();?></option>
											<?php
										}
									} ?>
								</select>
							</div>
						</div>
						<div class="input-group">
							<input type='hidden' name='subMenuId' value='<?php echo $chapterSubMenuId;?>'>
							<button class="btn btn-outline-secondary w-100" type="submit">Жаныртуу</button>
						</div>
					</form>
				</div>
			</div>
		</div>




		<?php
		$this->importFoot();
	}


//	****************** CHAPTER SUB MENU PART END ******************* //



//	****************** WORD PART  START ******************* //
	public function allWords($allWords){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>

		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-10 mx-auto pt-5">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Image</th>
							<th scope="col">German</th>
							<th scope="col">Russian</th>
							<th scope="col">Description</th>
							<th scope="col">Chapter</th>
							<th scope="col">Menu</th>
							<th scope="col">Sub Menu</th>

							<th scope="col">Update</th>
							<th scope="col">Delete</th>
						</tr>
						</thead>
						<tbody class="table-group-divider">

						<?php  foreach ($allWords as $word) { ?>
						<tr>
							<th scope="row"><?php  echo $word->getId(); ?></th>
							<td>
								<img src="./Controller/wordUploads/<?php echo $word->getWordImage();?>" class="object-fit-cover rounded mx-auto" alt="<?php echo $word->getWordImage();?>" style="width: 150px; height: 100px;">
							</td>
							<td><?php  echo $word->getGermanWord(); ?></td>
							<td><?php  echo $word->getRussianWord(); ?></td>
							<td><?php  echo $word->getDescriptionOfWord(); ?></td>
							<td><?php  echo $word->getChapterName(); ?></td>
							<td><?php  echo $word->getMenuName(); ?></td>
							<td><?php  echo $word->getSubMenuName(); ?></td>

							<td>
								<button type='button' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?php echo $word->getId(); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
										<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
									</svg>
								</button>
							</td>
							<td>
								<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete<?php echo $word->getId(); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
										<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
									</svg>
								</button>
							</td>
						</tr>



						<!-- Modal delete -->
						<div class="modal fade" id="delete<?php echo $word->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										Өчүрүлгөн маалыматтар кайра калыбына келтирилбейт. Чын эле өчүрүүнү каалап жатасызбы?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
										<form action='index.php?page=deleteWord' method='post'>
											<input type='hidden' name='wordId' value='<?php echo $word->getId();?>'>
											<input type='hidden' name='imageName' value='<?php echo $word->getWordImage();?>'>
											<button type="submit" class="btn btn-danger">Удалить</button>
										</form>
									</div>
								</div>
							</div>
						</div>



						<!-- Modal update -->
						<div class="modal fade" id="update<?php echo $word->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Эскертүү!!!</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										Бул сөздүктүн маалыматтарын жаңыртууну каалайсызбы?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
										<form action='index.php?page=updateWordForm' method='post'>

											<input type='hidden' name='wordId' value='<?php echo $word->getId();?>'>
											<input type='hidden' name='chapterSubMenuId' value='<?php echo $word->getSubMenuId();?>'>
											<input type='hidden' name='wordImage' value='<?php echo $word->getWordImage();?>'>

											<input type='hidden' name='germanWord' value='<?php echo $word->getGermanWord();?>'>
											<input type='hidden' name='russianWord' value='<?php echo $word->getRussianWord();?>'>
											<input type='hidden' name='description' value='<?php echo $word->getDescriptionOfWord();?>'>

											<button type="submit" class="btn btn-primary">Дальше</button>
										</form>
									</div>
								</div>
							</div>
						</div>




						<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php
		$this->importFoot();
	}
	public function createWord($allChapterSubMenu){
		$this->importHead();
		$this->importAdminNavigationBar();
		?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-6 mx-auto pt-5">
					<h1 class="mb-5">Сөздүк түзүү</h1>

					<form class="form-floating" method="post" action="index.php?page=createWord" enctype="multipart/form-data">
						<div class="input-group mb-3">
							<span class="input-group-text" >German</span>
							<input type="text" class="form-control" name="germanWord" placeholder="Сөздүн немисче мааниси..." required>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" >Russian</span>
							<input type="text" class="form-control" name="russianWord" placeholder="Сөздүн орусча мааниси..." required>
						</div>
						<div class="input-group mb-3">
							<div class="form-floating">
								<textarea class="form-control" name = "description" placeholder="Please, write description of word" id="floatingTextarea2" style="height: 100px"></textarea>
								<label for="floatingTextarea2">Сөздүн түшүндүрмөсүн жазыңыз...</label>
							</div>
						</div>
						<div class="input-group mb-3">

							<div class="form-floating">
								<select name ="subMenuSelect" class="form-select" id="floatingSelect" aria-label="Floating label select example">
									<?php  foreach ($allChapterSubMenu as $chapterSubMenu) { ?>
										<option value="<?php echo $chapterSubMenu->getId();?>"><?php echo $chapterSubMenu->getSubMenuName();?></option>
									<?php }?>
								</select>
								<label for="floatingSelect">Кайсы подтемага таандык экендигин тандаңыз :</label>
							</div>
						</div>
						<div class="input-group">
							<input type="file" class="form-control" id="inputGroupFile04" name="wordImage" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
							<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Түзүү</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
		$this->importFoot();

	}
	public function updateWord($id, $subMenuId , $wordImage, $germanWord, $russianWord, $description, $allChapterSubmenu){

		$this->importHead();
		$this->importAdminNavigationBar();
		?>
		<div class="container-fluid " >
			<div class="row">
				<div class="col-lg-6 mx-auto pt-5">
					<h1 class="mb-5">Сөздүктү жаңыртуу</h1>

					<form class="form-floating" method="post" action="index.php?page=updateWord" enctype="multipart/form-data">
						<div class="input-group mb-3">
							<span class="input-group-text" >German</span>
							<input type="text" class="form-control" name="germanWord" placeholder="Сөздүн немисче мааниси..." value = "<?php echo $germanWord; ?>" required>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" >Russian</span>
							<input type="text" class="form-control" name="russianWord" placeholder="Сөздүн орусча мааниси..." value = "<?php echo $russianWord; ?>" required>
						</div>
						<div class="input-group mb-3">
							<div class="form-floating">
								<textarea class="form-control" name = "description" placeholder="Please, write description of word" id="floatingTextarea2" style="height: 100px"><?php echo $description; ?></textarea>
								<label for="floatingTextarea2">Сөздүн түшүндүрмөсүн жазыңыз...</label>
							</div>
						</div>
						<div class="input-group mb-3">

							<div class="form-floating">
								<select name ="subMenuSelect" class="form-select" id="floatingSelect" aria-label="Floating label select example">
									<?php  foreach ($allChapterSubmenu as $chapterSubMenu) {

										if ($chapterSubMenu->getId() == $subMenuId){ ?>
											<option value="<?php echo $chapterSubMenu->getId();?>" selected><?php echo $chapterSubMenu->getSubMenuName();?></option>
										<?php } else{ ?>
											<option value="<?php echo $chapterSubMenu->getId();?>" ><?php echo $chapterSubMenu->getSubMenuName();?></option>
											<?php
										}
									}?>
								</select>
								<label for="floatingSelect">Кайсы подтемага таандык экендигин тандаңыз :</label>
							</div>
						</div>
						<div class="input-group">
							<input type="file" class="form-control" id="inputGroupFile04" name="wordImage" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
							<input type='hidden' name='wordId' value='<?php echo $id;?>'>
							<input type='hidden' name='oldWordImage' value='<?php echo $wordImage;?>'>
							<button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Жаңыртуу</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
		$this->importFoot();

	}

//	****************** WORD PART END ******************* //

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
