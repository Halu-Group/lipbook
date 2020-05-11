	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home');?>">
			<div class="sidebar-brand-icon">
				<img src='<?= base_url('assets/img/logo2.png');?>' alt="logo1" height="60px" width="75px">
			</div>
			<div class="sidebar-brand-text mx-3">ADMIN PAGE</div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">


		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Interface
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-folder"></i>
				<span>Admin Menu</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Menu:</h6>
					<a class="collapse-item" href="<?= base_url('home/tambahbuku')?>">Tambah Buku</a>
					<a class="collapse-item" href="cards.html">Kurangi Buku</a>
				</div>
			</div>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Addons
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
				<i class="fas fa-fw fa-cog"></i>
				<span>Admin Setting</span>
			</a>
			<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Settings :</h6>
					<a class="collapse-item" href="">Setting Account</a>
					<a class="collapse-item" href="<?= base_url('home/logout')?>">Logout</a>
				</div>
			</div>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
	<!-- End of Sidebar -->