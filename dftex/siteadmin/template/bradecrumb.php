<!-- start: PAGE TITLE & BREADCRUMB -->
<ol class="breadcrumb">
	<li>
		<i class="clip-home-3"></i>
		<a href="index.php">
			Home
		</a>
	</li>
	<li class="active">
		<?php echo isset($page_name) ? $page_name :'' ; ?>
	</li>
	<!-- <li class="search-box">
		<form class="sidebar-search">
			<div class="form-group">
				<input type="text" placeholder="Start Searching...">
				<button class="submit">
					<i class="clip-search-3"></i>
				</button>
			</div>
		</form>
	</li> -->
</ol>
<div class="page-header">
	<h1><?php echo isset($page_name) ? $page_name :'' ; ?> <small><?php echo isset($description) ? $description :'' ; ?></small></h1>
</div>
<!-- end: PAGE TITLE & BREADCRUMB -->