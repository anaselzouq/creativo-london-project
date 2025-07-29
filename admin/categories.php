<?php
  include "includes/header.php";
  include "includes/sidebar.php";
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Categories</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Categories</h1>
			</div>
		</div><!--/.row-->

    <div class="row">
			<div class="col-lg-12">
				<!-- include - views -->
				<?php  

					if (!isset($_GET['action'])) {

						include "views/categories/cat_view.php";

					} elseif ($_GET['action'] == 'add') {

						include "views/categories/cat_add.php";

					}  elseif ($_GET['action'] == 'edit') {

						include "views/categories/cat_edit.php";

					}
				
				?>
			</div>
		</div>

	</div>	<!--/.main-->

<?php  

	include "includes/footer.php";

?>