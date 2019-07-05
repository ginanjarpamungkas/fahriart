@extends('dashboard.admin')
@section('content')
	<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Artikel</h4>
                                
                                <div class="table-responsive m-t-40">
                                <a class="btn btn-primary" href="{{ route('post.create') }}">Create <i class="fa fa-plus"></i></a>
                                <table id="myTable" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                            	<th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 95.4px;">Judul</th>
                                            	<th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 140.4px;">Status</th>
                                            	<th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 77.4px;">View</th>
                                            	<th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 47.4px;">Dibuat</th>
                                            	<th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 78.4px;">Action</th></tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            	<th rowspan="1" colspan="1">Judul</th>
                                            	<th rowspan="1" colspan="1">Status</th>
                                            	<th rowspan="1" colspan="1">View</th>
                                            	<th rowspan="1" colspan="1">Dibuat</th>
                                            	<th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($posts as $post)
	                                        <tr role="row" class="odd">
	                                        	<td class="sorting_1">{{ $post->title }}</td>
	                                        	<td>
                                                    @if ($post->status == 'Draft')
                                                        <span class="label label-info">{{$post->status}}</span>
                                                    @elseif ($post->status == 'Publish')
                                                        <span class="label label-primary">{{$post->status}}</span>
                                                    @endif
                                                </td>
	                                        	<td>{{ $post->view }}</td>
	                                        	<td>{{ $post->created_at }}</td>
	                                        	<td><a class="btn btn-sm btn-primary" href="{{ route('post.show',$post->id) }}"><i class="fa fa-file"></i></a>
                                                    <form action="{{ url('post', $post->id) }}" method="post">
                                                    {{csrf_field()}}
                                                    {{ method_field('delete') }}
                                                    <button class="btn btn-sm btn-danger" type="submit" onclick="javasciprt: return confirm('Are you sure to delete this data')"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
	                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
@endsection
@section('footer')

@endsection
