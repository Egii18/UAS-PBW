<div class="card mt-3">
  <div class="card-header text-black" style="background-color: rgb(255, 233, 39);">
    Data Arsip Surat
  </div>
  <div class="card-body">
    <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-info mb-3">Tambah Data</a>
    <div class="table-responsive"> <!-- Menambahkan wrapper responsif untuk tabel -->
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nomor Surat</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Diterima</th>
            <th>Perihal</th>
            <th>Departemen/Tujuan</th>
            <th>Pengirim</th>
            <th>File</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*, tbl_departemen.nama_departemen, tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp FROM tbl_arsip, tbl_departemen, tbl_pengirim_surat WHERE tbl_arsip.id_departemen = tbl_departemen.id_departemen and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat");
            $no = 1;
            while($data = mysqli_fetch_array($tampil)) :
          ?>
          <tr>
            <td><?=$no++?></td>
            <td><?=$data['no_surat']?></td>
            <td><?=$data['tanggal_surat']?></td>
            <td><?=$data['tanggal_diterima']?></td>
            <td><?=$data['perihal']?></td>
            <td><?=$data['nama_departemen']?></td>
            <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
            <td>
              <?php
                //uji apakah file nya ada atau tidak
                if(empty($data['file'])){
                  echo " - ";
                }else{
              ?>
                <a href="file/<?=$data['file']?>" target="_blank"> Lihat File </a>
              <?php
                }
              ?>
            </td>
            <td class="d-flex justify-content-end">
              <a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success" style="margin-right: 10px;">Edit</a>
              <a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</a>
            </td>

          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
