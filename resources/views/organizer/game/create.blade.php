@extends('organizer.layouts.app')
@section('main_content')
    <div class="row  mb-2 ">
        <div class="col-sm-6">
            <h3>Câu hỏi dạng tệp</h3>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="card p-3">
        <form action=""
              enctype="multipart/form-data"
              method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Câu hỏi</label>
                                <input type="text" class="form-control" name="title"
                                       placeholder="Nhập tiêu đề câu hỏi" value="{{old('title')}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Điểm</label>
                                <input type="number" name="point" class="form-control" id="" placeholder="Điểm">
                                @error('point')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Gợi ý</label>
                        <textarea name="suggest" class="form-control">{{old('suggest')}}</textarea>
                        @error('suggest')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary m-2">Lưu</button>
                <button type="submit" class="btn btn-danger m-2">Hủy</button>
            </div>

        </form>
    </div>
@endsection
