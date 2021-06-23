@extends('master')
@section('title')ویرایش دسته بندی @endsection
@section('pagehead')
    <div class="card-header d-flex justify-content-between">

        <div>
            <span >دسته بندی ها ></span>
            @if($parenttitles!=null)
                @foreach($parenttitles as $parenttitle)
                    &nbsp;{{$parenttitle}}&nbsp;></>
                @endforeach
            @endif
            @if($parent!=null)
                <span>&nbsp;{{$parent->title}}&nbsp;></span>
            @endif
        </div>
    </div>
@endsection

@section('content')
{{--    <div class="content-wrapper">--}}
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{url('categories/'.$category->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="card-body">
                                    <input name="categoryid" type="hidden" value="{{$category->id}}">
                                    <div class="form-group">
                                        @if($errors->has('title'))
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                        <label for="exampleInputEmail1">عنوان </label>
                                        <input type="text" name="title" value="{{old('title')!=null?old('title'):$category->title}}" class="form-control" id="exampleInputEmail1" placeholder="عنوان را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        @if($errors->has('description'))
                                            <p class="text-danger"> {{$errors->first('description')}}</p>
                                        @endif
                                        <label for="exampleInputPassword1">توضیحات</label>
                                        <textarea name="description" class="form-control" rows="4" value="" id="exampleInputPassword1" placeholder="توضیحات را وارد کنید">
                                            {{old('description')!=null?old('description'):$category->description}}
                                        </textarea>
                                    </div>
                                    @if(isset($category->image))
                                        <div class="d-flex mb-5 align-items-center justify-content-around" id="{{$category->id}}">
                                            <div >
                                                <img src="{{asset($category->image)}}" style="width:30vh;height:30vh">
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-danger btn-sm" id="deleteimagebtn"
                                                data-value="{{$category->id}}"><i class="fa fa-trash"></i></button>

                                            </div>

                                        </div>
                                    @endif
                                    <div class="form-group">
                                        @if($errors->has('image'))
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        @endif
                                        <label for="exampleInputFile">آپلود تصویر</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image">

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ویرایش دسته بندی</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->




                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
{{--    </div>--}}

@endsection
