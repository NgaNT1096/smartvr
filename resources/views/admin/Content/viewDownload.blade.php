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
						<table class="col-lg-7 table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr align="center">
									<th>ID</th>
									<th>Title</th>
									<th>Description</th>   
									<th>Price</th>
									<th>Download</th>
								</tr>
							</thead>
							<tbody>

						@foreach($downloads as $down)
							<tr>
								<td>{{$down->id}}</td>
								<td>{{$down->title}}</td>
								<td>{{$down->description}}</td>
								<td>{{$down->price}}</td>
								
								<td>
								<a href="download/{{$down->link}}" download="{{$down->link}}">
									<button type="button" class="btn btn-primary">
									<i class="glyphicon glyphicon-download">
										Download
									</i>
									</button>
								</a>
								</td>
							</tr>
						@endforeach
						</tbody>
						</table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection