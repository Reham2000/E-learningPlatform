@extends('admin.layout')

@section('title')
    Courses
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
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Courses</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Course Name</th>
                                        <th>Course Description</th>
                                        <th>Course Price</th>
                                        <th>Block Course</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($courses as $course)
                                    <tr>
                                        {{-- {{dd($course)}} --}}
                                        <td>{{$course->id}}</td>
                                        <td>{{$course->course_title}}</td>
                                        <td>{{$course->course_brief}}</td>
                                        <td>{{$course->course_price}}</td>
                                        <td><a href="{{route('courses.block',$course->id)}}" class="btn {{$course->blocked == '0' ? 'btn-danger' : 'btn-success' }}"> {{$course->blocked == '0' ? 'Block' : 'Active' }}</a></td>
                                    </tr>
                                        
                                    @empty
                                    <td colspan="4">No Categories Found</td>
                                        
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Course Name</th>
                                        <th>Course Description</th>
                                        <th>Course Price</th>
                                        <th>Block Course</th>
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
