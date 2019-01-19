<div class="container">
	<div class="row col-md-4">
		<?php echo form_open('simpan_minuman', array('class'=> 'login100-form validate-form')); ?>
			<div class="wrap-input100 validate-input" data-validate = "ID minuman">
				<input class="input100" type="text" name="id_minuman" value="<?php echo $data_minuman['id_minuman']; ?>">
					<span class="focus-input100" data-placeholder="ID minuman"></span>
			</div>

			<div class="wrap-input100 validate-input" data-validate = "Enter id_minuman">
				<input class="input100" type="text" name="nama" value="<?php echo $data_minuman['nama']; ?>">
					<span class="focus-input100" data-placeholder="Nama minuman"></span>
			</div>

			<div class="wrap-input100 validate-input" data-validate = "Enter Harga">
				<input class="input100" type="text" name="harga" value="<?php echo $data_minuman['harga']; ?>">
					<span class="focus-input100" data-placeholder="Harga minuman"></span>
			</div>

			
			<div style="padding-top: 10px;padding-left: 10px" class="input-group-sm">
                    <select class="form-control" name="status" id="status" required>
                        <option value="" selected="selected">Pilih status</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>                    
                    </select>   

            </div> 
			<div class="container-login100-form-btn">
				<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
					<button class="login100-form-btn">Simpan
					</button>
				</div>
			</div>
		</form>
	</div>
	<br>
	<hr>
	<div class="row">
		<div align="center" id="pagination_link" class="col-md-12"></div>
		<div class="table-responsive col-md-12" id="country_table">
	</div>
</div>

<script>
	var p=1;
    $(document).ready(function(){
        function LoadDaftarminuman(page){
            AjaxHapusData(page);
        }
         
        LoadDaftarminuman(1);

        $(document).on("click", ".pagination li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            p = page;
            LoadDaftarminuman(page)
        });
    });


    function KoneksiStatus(str) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("POST","<?php echo base_url(); ?>pages/ubah_status_keanggotaan/"+str,true);
        xmlhttp.send();
        swal(
          'Status berhasil diubah!',
          '',
          'success'
        )
    }

    function AjaxHapusData(page){
        $.ajax({
            url:"<?php echo base_url(); ?>pages/pagination_daftar_minuman/"+p,
            method:"GET",
            dataType:"json",
            success:function(data){
                $('#country_table').html(data.country_table);
                $('#pagination_link').html(data.pagination_link);
            },
            error: function(xhr, status, error) {
  				alert(xhr.responseText);
			}
        });
    }

    function HapusData(id_minuman){
        console.log(p);
        swal({
          title: 'Yakin ingin menghapus data tersebut?',
          text: "Data akan dihapus secara permanen!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var obj = {id_minuman};
                var hapus = JSON.stringify(obj);
                $.ajax({

                    type: "POST",
                    url: "<?php echo base_url()?>pages/hapus_minuman",
                    data: {data:hapus},
                    cache: false,
                    success: function(data) {
                        AjaxHapusData(p);
                        
                    },
                    error: function(request, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
  						alert(err.Message);
                    },
                });
                swal(
                    data,
                    'Your file has been deleted.',
                    'success'
                );
            }
        });
    }
</script>