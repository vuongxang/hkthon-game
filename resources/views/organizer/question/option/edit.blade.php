@extends('organizer.layouts.app')
@section('main_content')
    <div class="row  mb-2 ">
        <div class="col-sm-6">
            <h3>Câu hỏi: {{$data['aQuestion']->title}}</h3>
            <h3></h3>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
    <div class="card p-3">
        <form
            action="{{route('organizer.question_option.update',['round_id'=>$data['aQuestion']->round_id,'question_id'=>$data['aQuestion']->id])}}"
            enctype="multipart/form-data"
            method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <div class="preview-img row">
                        <div class="col-8 offset-2">
                            <img class="img-preview img-fluid" src="{{asset($data['aQuestion']->file)}}" alt="">
                            <input type="hidden" name="oldImage"
                                   value="{{$data['aQuestion']->file_id}}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh câu hỏi</label>
                        <input onchange="encodeImageFileAsURL(this)" type="file" name="image"
                               value=""
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Câu hỏi</label>
                                <input type="text" class="form-control" name="title"
                                       placeholder="Nhập tiêu đề câu hỏi" value="{{$data['aQuestion']->title}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Điểm</label>
                                <input type="number" name="point" value="{{$data['aQuestion']->point}}"
                                       class="form-control" id="" placeholder="Điểm">
                                @error('point')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    @foreach($data['aAnswer'] as $key=>$answer)
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="option_text_{{$key+1}}" class="control-label">Đáp án {{$key+1}}: </label>
                                <textarea name="option_text_{{$key+1}}" id="option_text_{{$key+1}}"
                                          class="form-control" cols=""
                                          rows="">{{$answer->content}}</textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="correct_{{$key+1}}" class="control-label">Correct</label>
                                <input type="hidden" class="" name="correct_{{$key+1}}" value="0"
                                       id="correct_{{$key+1}}">
                                <input type="checkbox" class="" name="correct_{{$key+1}}"
                                       @if($answer->status==1)
                                       checked
                                       @endif
                                       value="1"
                                       id="correct_{{$key+1}}">
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="">Gợi ý</label>
                        <textarea name="suggest" class="form-control">{{$data['aQuestion']->suggest}}</textarea>
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
    </script>
@endsection
