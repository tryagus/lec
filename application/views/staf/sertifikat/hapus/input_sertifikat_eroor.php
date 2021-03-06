            
        <?php $this->load->view('staf/layout/header');?>
        <?php $this->load->view('staf/layout/side'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Tambah Sertifikat</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-certificate icon-menu" aria-hidden="true"></i></i> Tambah Sertifikat
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- isi content -->
                <!-- table -->   
                <!-- form kelas -->
                
                <div class="clearfix"></div> 
                  <div class="col-xs-12 col-sm-12 col-md-12 wrapper">      
                  <div class="col-xs-12 col-sm-12 col-md-12 panel panel-primary form-daftar-offline">                    
                    <div class="panel-body daftar">

                      <!-- <?php foreach($tampil as $row) : ?> -->

                      <tr>                      
                        <td></td>   
                        <div class="form-group margin">        
                          <input type="hidden" class="form-control input" placeholder="Masukkan No Pendaftaran" name="id_pendaftaran" value="<?php print $row->id_pendaftaran; ?>">
                        </div>                   
                      </tr>
                      <!-- <?php endforeach; ?> -->
                      
                      <form action="<?php print site_url();?>/staf/sertifikat/cari" method=POST>
                        <input class="form-control input" type=text name=cari placeholder="Masukkan No Pendaftaran Siswa" value="<?php print $row->id_pendaftaran; ?>"
                        <input type=submit value="Masukan No Pendaftaran">
                      </form>                                      

                      <form action="<?php echo base_url(). 'staf/sertifikat/tambah_sertifikat'; ?>" method="post">

                      <div class="form-group margin">        
                        <input type="hidden" class="form-control input" placeholder="Id Pendaftaran" name="id_pendaftaran" value="<?php print $row->id_pendaftaran; ?>">
                      </div>    
                      <div class="form-group margin">        
                        <input class="form-control input" placeholder="Id Pendaftaran" value="<?php print $row->nama_siswa; ?>">
                      </div>                   
                      <div class="form-group">  
                        <label>Status</label>     
                        <select class="form-control" name="status">
                          <option value="Lulus">Lulus</option>
                          <option value="Tidak Lulus">Tidak Lulus</option>
                        </select>
                      </div>
                      <div class="form-group">  
                        <label>Keterangan</label>     
                        <select class="form-control" name="keterangan">
                          <option value="Sudah Mengambil">Sudah Mengambil</option>
                          <option value="Belum Mengambil">Belum Mengambil</option>
                        </select>
                      </div>
                      <div class="col-md-12 btn-daftar">
                        <a href="<?php echo base_url(). 'staf/sertifikat/data_sertifikat'; ?>" class="btn btn-default">Kembali</a>&nbsp&nbsp
                        <input type="submit" class="btn btn-success" value="Simpan"></button>
                      </div>
                  </div>
                  </div>
                  </form>

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('layout/footer'); ?>
