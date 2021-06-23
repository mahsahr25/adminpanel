@extends('master')
@section('title')افزودن دسته بندی @endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                        <span >افزودن دسته بندی ></span>
                        @if($parenttitles!=null)
                            @foreach($parenttitles as $parenttitle)
                                <span>&nbsp;{{$parenttitle}}&nbsp;></span>
                            @endforeach
                        @endif
                        @if($parent!=null)
                            <span>&nbsp;{{$parent->title}}&nbsp;></span>
                        @endif
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
{{--                                <h3 class="card-title">مثال ساده</h3>--}}
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <input name="categoryid" type="hidden" value="{{$categoryid}}">
                                    <div class="form-group">
                                        @if($errors->has('title'))
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                        <label for="exampleInputEmail1">عنوان </label>
                                        <input type="text" name="title" value="{{old('title')!=null?old('title'):''}}" class="form-control" id="exampleInputEmail1" placeholder="عنوان را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        @if($errors->has('description'))
                                                <p class="text-danger"> {{$errors->first('description')}}</p>
                                        @endif
                                        <label for="exampleInputPassword1">توضیحات</label>
                                        <textarea name="description" class="form-control" rows="4" value="{{old('description')!=null?old('description'):''}}" id="exampleInputPassword1" placeholder="توضیحات را وارد کنید">
                                        </textarea>
                                    </div>
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
                                    <button type="submit" class="btn btn-primary">افزودن دسته بندی</button>
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
    </div>
@endsection
