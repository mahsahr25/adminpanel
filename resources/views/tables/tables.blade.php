@extends('master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>جداول کاربران</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">جداول کاربران</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>نام</th>
                                    <th> ایمیل</th>
{{--                                    <th>ورژن</th>--}}
{{--                                    <th>امتیاز</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}
                                        </td>
                                        <td>{{$user->email}}</td>
{{--                                        <td> 4</td>--}}
{{--                                        <td>X</td>--}}
                                    </tr>
                                @endforeach









                                </tbody>
{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>موتور رندر</th>--}}
{{--                                    <th>مرورگر</th>--}}
{{--                                    <th>سیستم عامل</th>--}}
{{--                                    <th>ورژن</th>--}}
{{--                                    <th>امتیاز</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div>
                    {{$users->links()}}
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
