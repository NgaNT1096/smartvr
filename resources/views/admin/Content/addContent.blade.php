@extends('admin.Layout.index')

@section('content')
	    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Content
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
                        <form id="form_add_content" action="admin/content/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" >
                            <div class="form-group">
                                <label>Title of Content:</label>
                                <input id="title" class="form-control" name="title" placeholder="Please Enter Title name" />
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <div class="dropdown">
                                     <select id="type_data" class="btn btn-default dropdown-toggle"  name="type_data" type="button" data-toggle="dropdown">
                                          <option value="video"> Video </option>
                                          <option value="image"> Image </option>
                                          <option value="assetbundel"> AssetBundel </option>
                                     </select>
                                </div>   
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Video</label>
                                <input id="link" type="file" name="link" id="link" accept="video/*">
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input id="price" class="form-control" name="price" placeholder="Please Enter Price" />
                            </div>
                            <button type="submit" class="btn btn-default" id="btn_submit" value='Load' >Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<script>

</script>
@endsection