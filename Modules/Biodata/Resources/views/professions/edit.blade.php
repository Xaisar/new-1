@extends('admin.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Pekerjaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Pekerjaan</li>
              <li class="breadcrumb-item active">Edit Data Pekerjaan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" method="POST" action="{{route('professions.update', $professionsData->id)}}">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">Kode</label>
                            <input type="text" name="code" value="{{$professionsData->code}}" class="form-control" id="code" placeholder="Masukan Kode Pekerjaan" required>

                            @if ($errors->has('code'))
                                <span class="text-danger text-left">{{ $errors->first('code') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" value="{{$professionsData->name}}" class="form-control" id="name" placeholder="Masukan Nama Pekerjaan" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Pekerjaan</button>
                    <a href="{{route('professions.index')}}" class="btn btn-default">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
  
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
</div>


@endsection