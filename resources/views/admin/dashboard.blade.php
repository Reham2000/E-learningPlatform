@extends('admin.layout')

@section('title')
    Dashboard
@endsection
{{-- {{dd($data)}} --}}

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box pt-3 bg-warning">
                        <div class="inner">
                            <h3 class="py-2 px-3">{{$data['registertion_num']}}</h3>

                            <h4>User Registrations</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box pt-3 bg-danger">
                        <div class="inner">
                            <h3 class="py-2 px-3">{{$data['instructors_num']}}</h3>

                            <h4>Instructors</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('instructor.instructors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box pt-3 bg-info">
                        <div class="inner">
                            <h3 class="py-2 px-3">{{$data['instructors_num']}}</h3>

                            <h4>Courses</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('course.courses')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box pt-3 bg-success">
                        <div class="inner">
                            <h3 class="py-2 px-3">{{$data['instructors_num']}}</h3>

                            <h4>Enrollment</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('admin.enrollment')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box pt-3 bg-success">
                        <div class="inner">
                            <h3 class="py-2 px-3">{{$data['instructors_num']}}</h3>

                            <h4>Admins</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('admin.admins')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box pt-3 bg-warning">
                        <div class="inner">
                            <h3 class="py-2 px-3">{{$data['instructors_num']}}</h3>

                        <h4>Support</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('support.supports')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box pt-3 bg-danger">
                        <div class="inner">
                            <h3 class="py-2 px-3">{{$data['instructors_num']}}</h3>

                        <h4>Payments</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('admin.payments')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
