@extends('admin.layout')

@section('title')
    Payments
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
                            <h3 class="card-title">All Payments</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>payment_id</th>
                                        <th>payer_id </th>
                                        <th>amount</th>
                                        <th>currency</th>
                                        <th>payment_status</th>
                                        <th>created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                    <tr>
                                        <td>{{$payment->id}}</td>
                                        <td>{{$payment->payment_id}}</td>
                                        <td>{{$payment->payer_id}}</td>
                                        <td>{{$payment->amount}}</td>
                                        <td>{{$payment->currency}}</td>
                                        <td>{{$payment->payment_status}}</td>
                                        <td>{{$payment->created_at}}</td>

                                    </tr>
                                        
                                    @empty
                                    <td colspan="4">No Categories Found</td>
                                        
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>payment_id</th>
                                        <th>payer_id </th>
                                        <th>amount</th>
                                        <th>currency</th>
                                        <th>payment_status</th>
                                        <th>created_at</th>
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
