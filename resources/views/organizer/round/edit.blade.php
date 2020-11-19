@extends('organizer.layouts.app')
@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('organizer.game.round.update',['round_id'=>$data['aRound']->id])}}"
                          method="POST"
                          class="form-group">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-lg">
                            <input type="hidden" class="form-control" name="game" value="{{$data['aRound']->game_id}}">
                            <input type="text" class="form-control" name="name" value="{{$data['aRound']->name}}">
                            <input type="hidden" class="form-control" name="code" value="{{$data['aRound']->code}}">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat">OK!</button>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-4 pl-2 mt-3">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="card-text text-xl-left font-weight-bold">{{$data['aLocation']->code}}</span>
                            </div>

                            <div class="col-4 pl-2 mt-3">
                                <i class="nav-icon fas  fa-calendar mt-1 mr-2"></i> Ngày
                                tạo:{{$data['aRound']->created_at}}
                            </div>
                            <div class="col-4 pl-2 mt-3">
                                <label>Trạng thái hiển thị: </label>
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="status"
                                           @if($data['aRound']->status==1)
                                           checked
                                           @endif id="checkboxPrimary1">
                                    <label for="checkboxPrimary1">
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 pl-2 mt-3">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <label for="">Địa điểm :</label>
                                <input type="text" class="form-control" name="time"
                                       value="{{$data['aLocation']->name}}">
                                </span>
                            </div>
                            <div class="col-6 pl-2 mt-3">
                                <label>Thời gian</label>
                                <input type="number" class="form-control" name="time" value="{{$data['aRound']->time}}">
                            </div>
                            <div class="col-12 mt-3">
                                <h5 class="float-left mr-3">Gợi ý cho địa điểm:</h5>
                                <textarea name="description" class="form-control"
                                          id="">{{$data['aLocation']->suggest}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="card-body">
                <p class="h3 float-left mr-5">Tổng {{count($data['aQuestions'])}} câu hỏi</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Thêm câu hỏi
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chọn câu hỏi: </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <a href="{{route('organizer.game.round.question.create',['round_id'=>$data['aRound']->id,'type_id'=>1])}}"
                                       class="btn btn-primary">Text</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('organizer.game.round.question.create',['round_id'=>$data['aRound']->id,'type_id'=>2])}}"
                                       class="btn btn-primary">File</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('organizer.game.round.question.create',['round_id'=>$data['aRound']->id,'type_id'=>3])}}"
                                       class="btn btn-primary">Options</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Câu trả lời</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Cập nhật lần cuối</th>
                        <th scope="col" colspan="2">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data['aQuestions'])
                        @foreach($data['aQuestions'] as $key=>$question)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$question->title}}</td>
                                <td>@if($question->content)
                                        {{$question->content}}
                                    @else
                                        <img width="100px" src="{{asset($question->url)}}" alt="">
                                    @endif</td>
                                <td class="text-center">@if($question->status===1)
                                        <span class="text-success">Hoạt động</span>
                                    @else
                                        <span class="text-success">Không hoạt động</span>
                                    @endif
                                </td>
                                <td>{{$question->updated_at}}</td>
                                <td class="text-center">
                                    <a href="{{route('organizer.game.round.question.edit',['question_id'=>$question->id,'type'=>$question->type_answers])}}"
                                       class="btn btn-primary "><span
                                                class="fa fa-edit"></span>
                                        Sửa</a></td>
                                <td class="text-center">
                                    <a href="{{route('organizer.game.round.question.delete',['id'=>$data['aRound']->id,'question_id'=>$question->id])}}"
                                       class="btn btn-danger "><span class="fa fa-trash"></span> Xóa</a></td>

                            </tr>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <span>Không có dữ liệu</span>
                        </div>
                    @endif
                    </tbody>
                </table>
                <div class="col-md-6">
                    {{--                    {{ $data['aQuestions']->withQueryString()->links() }}--}}
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    {{--    @foreach($data['aQuestions'] as $key=>$question)--}}
    {{--        <div class="col-lg-12 mt-3 border card">--}}
    {{--            <div class="card-body">--}}
    {{--                <div class="">--}}
    {{--                    <p class="h4 float-left mr-2">Câu hỏi: {{$key+1}}</p>--}}
    {{--                    <div class="form-group float-right">--}}
    {{--                        <a href="edit-question-text.html" class="btn btn-primary "><span class="fa fa-edit"></span>--}}
    {{--                            Sửa</a>--}}
    {{--                        <a href="{{route('organizer.game.round.question.delete',['id'=>$data['aRound']->id,'question_id'=>$question->id])}}"--}}
    {{--                           class="btn btn-danger "><span class="fa fa-trash"></span> Xóa</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="float-left">--}}
    {{--                    <p class="">--}}
    {{--                        {{$question->title}}--}}
    {{--                    </p>--}}

    {{--                    <p>--}}
    {{--                    <hr>--}}
    {{--                    Đáp án:  {{$question->answer}}--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        @endforeach--}}


@endsection
