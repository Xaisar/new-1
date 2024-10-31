@extends('admin.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agama</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Agama</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <div class="lead">
                    <a type="button" href="{{route('religions.create')}}"  class="btn btn-primary btn-success float-right">Tambah Data Agama</a>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th width="12%" colspan="2"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($religions as $item)
                        <tr>
                            <td  width="1%"><center>{{ $loop->iteration }}</center></td>
                            <td>{{ $item->name }}</td>
                            <td width="12%" colspan="2" >
                                <center>
                                <a type="button" class="btn btn-primary btn-warning" href="{{route('religions.edit', $item->id)}}">Edit</a>
                                <a type="button" class="btn btn-primary btn-danger" href="{{route('religions.destroy', $item->id)}}" onclick="return confirm('Apakah kamu yakin ingin menghapus item ini?');">Hapus</a>
                                </center>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td class="border px-10 py-5 text-center" colspan="6">Tidak ada Data</td>
                    </tr>
                        
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



@endsection
