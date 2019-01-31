@extends('admin.Layout.index')

@section('content')
	    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Oculus
                            <small>Add</small>
                     </h1>
                    </div>
                   
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}} <br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>                       
                        @endif
                        <form action="admin/oculus/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" >
                            <div class="form-group">
                                <label>Name Oculus:</label>
                                <input class="form-control" name="name" placeholder="Please Enter Name Oculus" />
                            </div>
                            <div class="form-group">
                                <label>Select Flatforms:</label>
                                <div class="dropdown">
                                     <select class="btn btn-default dropdown-toggle"  name="flat form" type="button" data-toggle="dropdown">
                                          <option value="oculus"> Oculus Go </option>
                                          <option value="samsung"> Samsung Gear VR </option>
                                     </select>
                                </div>   
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default" id="btn_submit" value='Load' onclick='showFileSize()'>Flatform Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection