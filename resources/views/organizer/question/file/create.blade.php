@extends('organizer.layouts.app')
@section('header_custom')
@endsection
@section('main_content')
    <div class="row  mb-2 ">
        <div class="col-sm-6">
            <h3>{{$data['aRound']->name}}</h3>
            <h3>Câu hỏi dạng tệp</h3>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="card p-3">
        <form action="{{route('organizer.game.round.question_file.store',['round_id'=>$data['aRound']->id])}}"
              enctype="multipart/form-data"
              method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="preview-img row">
                        <div class="col-8 offset-2">
                            <img class="img-preview img-fluid" src="{{asset('default-img.png')}}" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh câu hỏi</label>
                        <input onchange="encodeImageFileAsURL(this)" type="file" name="image" value="{{old('image')}}"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="answers row">
                            <div class="col-8 offset-2">
                                <img class="answer-preview img-fluid" src="{{asset('default-img.png')}}" alt="">
                            </div>
                        </div>
                        <label for="">Đáp án</label>
                        <input onchange="encodeImageAnswerAsURL(this)" type="file" name="answers"
                               value="{{old('image')}}"
                               class="form-control">
                        @error('answers')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-8">
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
@section('footer_custom')
    <script>
        function encodeImageFileAsURL(element) {
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

        function encodeImageAnswerAsURL(element) {
            var file = element.files[0];
            if (file === undefined) {
                $(".answers img").attr('src', "images/default-img.jpg");
            } else {
                var reader = new FileReader();
                reader.onloadend = function () {
                    if (reader.result) {
                        $(".answers img").attr('src', reader.result);
                    }
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
