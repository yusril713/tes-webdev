<div class="conatainer">
	<div class="row">
		<div class="col-md-4">
			<div style="padding-top: 10px;padding-left: 10px" class="input-group-sm">
				<label>Kode Pesanan</label>
				<input class="form-control" type="text" name="kode_pesanan" value="<?php echo $kode_pesanan?>" disabled>
			</div>
			<div style="padding-top: 10px;padding-left: 10px" class="input-group-sm">
				<label>Nama Makanan</label>
				<select class="form-control" name="status" id="makanan" required>
			        <option value="" selected="selected">Pilih Makanan</option>
			        <option value="Tersedia">Tersedia</option>
			        <option value="Tidak Tersedia">Tidak Tersedia</option>                    
			    </select>   
			</div>
			<div style="padding-top: 10px;padding-left: 10px" class="input-group-sm">
				<label>Jumlah Makanan</label>
				<input class="form-control" type="text" name="jumlah_makanan" placeholder="Masukkan jumlah makanan" required>
			</div>
			<div style="padding-top: 10px;padding-left: 10px" class="input-group-sm">
				<label>Nama Minuman</label>
				<select class="form-control" name="status" id="minuman" required>
			        <option value="" selected="selected">Pilih Minuman</option>
			        <option value="Tersedia">Tersedia</option>
			        <option value="Tidak Tersedia">Tidak Tersedia</option>                    
			    </select>   
			</div>
			<div style="padding-top: 10px;padding-left: 10px" class="input-group-sm">
				<label>Jumlah Minuman</label>
				<input class="form-control" type="text" name="jumlah_minumann" placeholder="Masukkan jumlah minuman" required>
			</div>
			<div style="padding-top: 10px;padding-left: 10px" class="input-group-sm">
                <label>Nomor Meja</label>
                <input class="form-control" type="text" name="nama_anggota" id="nama_anggota" placeholder="Masukkan nama lengkap" value="" required>
            </div>
            <div style="padding-top: 20px;padding-left: 10px">
                <button class="btn btn-primary" type="submit" name="submit" value="Tambah">SIMPAN</button>
                <!--<button class="btn btn-primary" type="submit" name="cetak" formtarget="_blank">CETAK</button>!-->
            </div>
		</div>
	</div>
</div>