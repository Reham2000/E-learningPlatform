@extends('admin.layout')

@section('title')
    Categories
@endsection


@section('content')
@php
    $id = session()->get('id');
@endphp
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 pb-3">
                    <a href="{{route('category.add',compact('id'))}}" class="btn btn-success"><i class="fas fa-user px-2"></i> Add New Category </a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Edite</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td><a href="{{route('category.edite',$category->id)}}" class="btn btn-primary">Edite</a></td>
                                        <td><a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                        
                                    @empty
                                    <td colspan="4">No Categories Found</td>
                                        
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Edite</th>
                                        <th>Delete</th>
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
