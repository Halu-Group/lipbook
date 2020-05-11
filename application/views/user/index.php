<!-- Begin Page Content -->
			<div class="container-fluid">
			<?= $this->session->flashdata('pesan');?>
				<ul class="list-unstyled">
					<?php
					$dataBuku;
					foreach($data as $b){
						
						echo "
							<li class='media'>
								<div class='card mb-3' style='width: 100%;'>
									<div class='row no-gutters'>
									<div class='col-md-2'>
										<img  style='width: 250px;height:auto;' src='".base_url("card.png")."' class='card-img' alt='...'>
									</div>
									<div class='col-md-8'>
										<div class='card-body' >
										<h5 class='card-title'>".$b["Judul"]."</h5>
										<p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
										<form action='".base_url('home/pinjambuku')."'>
										<button type='submit' class='btn btn-primary' name='pinjam' value='".$b["Kode_Buku"]."'>Pinjam</button>
										</form>
										</div>
									</div>
									</div>
								</div>
							</li>
							<p><br></p>
						";
					}
					?>
				</ul>
				<div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
	</div>
			</div>
			<!-- /.container-fluid -->

	