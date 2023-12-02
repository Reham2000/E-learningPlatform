@extends('admin.layout')

@section('title')
    Instructors
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 pb-3">
                    <a href="{{route('admin.add')}}" class="btn btn-success"><i class="fas fa-user px-2"></i> Add New Instructor </a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Instructors</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Edite</th>
                                        <th>Change Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as $admin)
                                    @if ($admin->role == 1)
                                        @continue
                                    @endif
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{$admin->fullname}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td class="font-weight-bold {{$admin->active == '1' ? 'text-success' : 'text-danger'}}">{{$admin->active == 1 ? 'Active' : 'Not Active'}}</td>
                                        <td>
                                            <a href="{{route('instructor.edite',$admin->id)}}" class="btn btn-primary">Edite</a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.block',$admin->id)}}" class="btn {{$admin->active == '1' ? 'btn-danger' : 'btn-success'}}">
                                            @if ($admin->active == 1)
                                            <i class="fas fa-ban px-2"></i> Block
                                            @else
                                            <i class="fas fa-check px-2"></i> Active
                                            @endif
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6"><h3>No Data Found</h3></td>

                                    </tr>
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Edite</th>
                                        <th>Change Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
