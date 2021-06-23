@extends('master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>دسته بندی ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
{{--                            <li class="breadcrumb-item"><a href="#">دسته بندی ها></a></li>--}}
{{--                            <li class="breadcrumb-item active">جداول کاربران</li>--}}
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
                        <div class="card-header d-flex justify-content-between">
                                <p >دسته بندی ها ></p>
                            <a href="{{url('categories/create/'.$categoryid=0)}}">
                                <button type="button" class="btn btn-success"><i class="fa fa-plus " aria-hidden="true" ></i></button>


                            </a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th> توضیحات</th>
                                    <th>تصویر</th>
                                    <th>مشاهده/ویرایش/حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}
                                        </td>
                                        <td>{{$category->description}}</td>
{{--                                        <td>{{$category->image}}</td>--}}
                                        <td ><img style="width: 8vw;height: 10vh" src="{{asset($category->image)}}"></td>
                                        <td>
                                            <a href="{{url('categories/index/'.$category->id)}}">
                                                <button type="button" class="btn btn-secondary"><i class="fa fa-list"></i></button>
                                            </a>
                                            <a href="{{url('categories/'.$category->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                            </a>
                                            <a href="{{url('categories/delete/'.$category->id)}}">
                                                <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </a>
                                        </td>


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
{{--                    {{$categories->links()}}--}}
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
