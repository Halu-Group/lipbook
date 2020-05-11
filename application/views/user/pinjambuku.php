
			<!-- Begin Page Content -->
			<div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Pinjam Buku</h1>
                <table class="table table-striped">
                        <tr>
                        <th scope="row">Judul</th>
                        <td>:</td>
                        <td><?= $databuku['Judul']?></td>
                        </tr>
                        <tr>
                        <th scope="row">Penerbit</th>
                        <td>:</td>
                        <td><?= $databuku['Penerbit']?></td>
                        </tr>
                        <tr>
                        <th scope="row">Penulis</th>
                        <td>:</td>
                        <td><?= $databuku['Penulis']?></td>
                        </tr>
                </table>
                <?= $this->session->flashdata('pesan');?>
                        <form method="post" action="<?= base_url('admin/tambahbuku');?>">
                            <div class="form-group">
                                <label for="inputBookName">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tgl_pinjam" required>
                            </div>
                            <div class="form-group">
                                <label for="inputBookName">Tanggal Kembali</label>
                                <input type="date" class="form-control" name="tgl_kembali" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

			</div>
			<!-- /.container-fluid -->