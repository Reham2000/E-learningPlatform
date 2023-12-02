@extends('admin.layout')

@section('title')
    Supports
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 pb-3">
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Support</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Message</th>
                                        <th>Answer</th>
                                        <th>Created At</th>
                                        <th>User ID</th>
                                        <th>Admin ID</th>
                                        <th>Answer</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($supports as $support)
                                    <tr>
                                        {{-- {{dd($support)}} --}}
                                        <td>{{$support->id}}</td>
                                        <td>{{$support->meassage}}</td>
                                        <td>{{$support->answer ?? '--'}}</td>
                                        <td>{{$support->created_at }}</td>
                                        <td>{{$support->user_id}}</td>
                                        <td>{{$support->admin_id ?? '--'}}</td>
                                        @if (is_null($support->admin_id))
                                        <td><a href="{{route('support.add',$support->id)}}" class="btn btn-primary">Answer</a></td>
                                        @else
                                        <td ><p class="btn btn-secondary">Answer</p></td>
                                        @endif
                                    </tr>
                                        
                                    @empty
                                    <td colspan="4" class="text-center text-bold text-danger"><h3>No Support Messages Found</h3></td>
                                        
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Message</th>
                                        <th>Answer</th>
                                        <th>Created At</th>
                                        <th>User ID</th>
                                        <th>Admin ID</th>
                                        <th>Answer</th>
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
