@extends('master')
@section('title')نمایش دسته بندی ها@endsection
@section('pagehead')
    <div class="card-header d-flex justify-content-between">

    <div>
        <span >دسته بندی ها ></span>
        @if($parenttitles!=null)
            @foreach($parenttitles as $parenttitle)
                <span>&nbsp;{{$parenttitle}}&nbsp;></span>
            @endforeach
        @endif
        @if($parent!=null)
            <span>&nbsp;{{$parent->title}}&nbsp;></span>
        @endif
    </div>
    </div>
@endsection
@section('content')

        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="col-1 offset-lg-11 mt-4">
                            <a href="{{url('categories/create/'.$parentid)}}">
                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus " aria-hidden="true" ></i></button>
                            </a>
                        </div>


{{--                        </div>--}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
{{--                                    <th> توضیحات</th>--}}
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
{{--                                        <td>{{$category->description}}</td>--}}
                                        <td >
                                            @if(isset($category->image))
                                        <img style="width: 8vw;height: 10vh" src="{{asset($category->image)}}">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('categories/index/'.$category->id)}}">
                                                <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-list"></i></button>
                                            </a>
                                            <a href="{{url('categories/'.$category->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                            </a>
                                            <a href="{{url('categories/delete/'.$category->id)}}">
                                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </a>
                                        </td>


                                    </tr>
                                @endforeach

                                </tbody>

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


@endsection
