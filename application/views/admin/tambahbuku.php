
			<!-- Begin Page Content -->
			<div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Tambah Buku</h1>
                <?= $this->session->flashdata('pesan');?>
                        <form method="post" action="<?= base_url('admin/tambahbuku');?>">
                            <div class="form-group">
                                <label for="inputBookName">Judul buku</label>
                                <input type="text" class="form-control" name="Judul" required>
                            </div>
                            <div class="form-group">
                                <label for="inputBookName">Kode buku</label>
                                <input type="text" class="form-control" name="Kode_Buku" required>
                            </div>
                            <div class="form-group">
                                <label for="inputBookName">Penulis</label>
                                <input type="text" class="form-control" name="Penulis"required>
                            </div>
                            <div class="form-group">
                                <label for="inputBookName">Penerbit</label>
                                <input type="text" class="form-control" name="Penerbit" required>
                            </div>
                            <div class="form-group">
                                <label for="inputBookName">Tahun terbit</label>
                                <input type="text" class="form-control" name="Tahun_Terbit" required>
                            </div>
                            <div class="form-group">
                                <label for="inputBookName">Nomor Rak</label>
                                <input type="text" class="form-control" name="ID_Rak" required>
                            </div>
                            
                            <label for="inputBookName">Foto buku</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02" >Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

			</div>
			<!-- /.container-fluid -->