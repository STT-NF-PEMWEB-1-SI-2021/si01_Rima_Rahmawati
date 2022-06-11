<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Mata Kuliah STT-NF</h1>
            <a class="btn btn-success" href="<?php echo base_url('index.php/matakuliah/create')?>" role="button">Daftar Mata Kuliah</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Kelola Mata Kuliah</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <h3>
        Daftar Matakuliah
    </h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th><th>Kode</th><th>Nama Matkul</th><th>SKS</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor=1;
            foreach($list_mk as $row){
            ?>
            <tr>
                <td><?=$nomor?></td>
                <td><?=$row->kode?></td>
                <td><?=$row->nama?></td>
                <td><?=$row->sks?></td>
                <td>
                      <a class="btn btn-info" href="matakuliah/view?id=<?=$row->kode?>">View</a>
                      <a class="btn btn-primary" href="matakuliah/edit?id=<?=$row->kode?>">Edit</a>
                      <a class="btn btn-danger" href="matakuliah/delete?id=<?=$row->kode?>">Delete</a>
                    </td>
            </tr>
            <?php
            $nomor++;
            }
            ?>
        </tbody>
    </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>