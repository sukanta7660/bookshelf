@extends('layouts.master')
@section('title')
 User List
@endsection

@section('content')


<div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <table id="dataTable" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>UserRoll</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->userType}}</td>
                            <td class="text-right">
                            	@if($row->userType=='User')
                            	<a href="{{action('UserList\UserController@make_admin', ['id' => $row->id])}}" onclick="return confirm('Are you sure to make Admin?')" class="btn btn-sm btn-success" aria-label="Close"><span aria-hidden="true">Make Admin</span></a>
                            	@else
                            	<a href="{{action('UserList\UserController@make_user', ['id' => $row->id])}}" onclick="return confirm('Are you sure to make User?')"  class="btn btn-sm btn-warning" aria-label="Close"><span aria-hidden="true">Make User</span></a>
                            	@endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        
        $(function () {
            $('#dataTable').DataTable({
                "order": [[ 0, "DESC" ]],
                "iDisplayLength": 25,
                "columnDefs": [
                    { "orderable": false, "targets": [3 ]}//For Column Order
                ]
            });
        });



    </script>

@endsection