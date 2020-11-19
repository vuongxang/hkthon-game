@extends('organizer.layouts.app')
@section('header_custom')
@endsection
@section('main_content')
    <div class="row  mb-2 ">
        <div class="col-sm-6">
            <h3>Câu hỏi chữ</h3>
            <h3>Tên câu hỏi:{{$data['aQuestion']->title}}</h3>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="card p-3">
        <form
            action="{{route('organizer.question_text.update',['question_id'=>$data['aQuestion']->id,'round_id'=>$data['aQuestion']->round_id])}}"
            enctype="multipart/form-data"
            method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <div class="preview-img row">
                        <div class="col-8 offset-2">
                            <img class="img-preview img-fluid" src="{{asset($data['aQuestion']->file)}}" alt="">
                            <input type="hidden" name="oldImage" value="{{$data['aQuestion']->file_id}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh câu hỏi</label>
                        <input onchange="encodeImageFileAsURL(this)" type="file" name="image" value=""
                               class="form-control">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Câu hỏi</label>
                                <input type="text" class="form-control" name="title"
                                       placeholder="Nhập tiêu đề câu hỏi" value="{{$data['aQuestion']->title}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Đáp án</label>
                                <input type="text" class="form-control" name="answers"
                                       placeholder="Nhập câu trả lời" value="{{$data['aAnswer'][0]->content}}">
                                @error('answers')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Điểm</label>
                                <input type="number" name="point" class="form-control" id=""
                                       value="{{$data['aQuestion']->point}}" placeholder="Điểm">
                                @error('point')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Gợi ý</label>
                        <textarea name="suggest" class="form-control">{{$data['aQuestion']->suggest}}</textarea>
                        @error('suggest')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary m-2">Lưu</button>
                <a href="{{route('organizer.game.round.edit',['round_id'=>$data['aQuestion']->round_id])}}"
                   class="btn btn-danger m-2">Hủy</a>
            </div>

        </form>
    </div>
@endsection
@section('footer_custom')
    <script>function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if (file === undefined) {
                $(".preview-img img").attr('src', "images/default-img.jpg");
            } else {
                var reader = new FileReader();
                reader.onloadend = function () {
                    if (reader.result) {
                        $(".preview-img img").attr('src', reader.result);
                    }
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
