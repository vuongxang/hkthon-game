@extends('organizer.layouts.app')
@section('main_content')

    <div class="content-header ml-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <h1 class="m-0 text-dark text-bold">Thông tin game</h1>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <form action="{{route('organizer.game.update',['id'=>$data['aGame'][0]->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="card card-info">
            <div class="card-body">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="name" value="{{$data['aGame'][0]->title}}">
                    <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat">OK!</button>
                            </span>
                </div>
                <div class="row">
                    <div class="col-4 pl-2 mt-3">
                        <i class="nav-icon fas fa-key mt-1 mr-2"></i> {{$data['aGame'][0]->code}}
                    </div>
                    <div class="col-4 pl-2 mt-3">
                        <i class="nav-icon fas  fa-calendar mt-1 mr-2"></i> Ngày tạo:{{$data['aGame'][0]->created_at}}
                    </div>
                    <div class="col-12 mt-3">
                        <h5 class="float-left mr-3">Mô tả:</h5>
                        <textarea name="description" class="form-control"
                                  id="">{{$data['aGame'][0]->description}}</textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </form>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-2">
                    <h4 class="m-0 text-dark">Tổng có {{count($data['aRoundsGame'])}} vòng đấu</h4>
                </div>
                <div class="col">
                    <a href="{{route('organizer.game.round.create',['id'=>$data['aGame'][0]->id])}}"
                       class="btn btn-info btn-md">Thêm</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <hr>

    @foreach($data['aRoundsGame'] as $key => $round)
        <div class="card card-info">
            <div class="card-body">
                <div class="input-group input-group-lg">
                    <div class="col-9">
                        <h4>{{$round->name}}</h4>
                    </div>
                    <div class="col-3" style="text-align: right; color: white;">
                        <button type="button" class="btn btn-info btn-sm">Lấy mã địa điểm</button>
                        <a href="{{route('organizer.game.round.edit',['round_id'=>$round->id])}}"
                           class="btn btn-success btn-sm right"><span class="fa fa-edit"></span> Xem</a>
                        <a href="{{route('organizer.game.round.delete',['id'=>$data['aGame'][0]->id,'round_id'=>$round->id])}}"
                           class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Xóa</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 pl-2 mt-3">
                        <i class="nav-icon fas fa-question-circle mt-1 mr-2"></i>Số câu hỏi 3
                    </div>
                    <div class="col-4 pl-2 mt-3">
                        <i class="nav-icon fas  fa-clock mt-1 mr-2"></i> Thời gian: {{$round->time}} phút
                    </div>
                    <div class="col-12 mt-3">
                        <h5 class="float-left mr-3">Gợi ý địa điểm:</h5>
                        {!!  $round->suggest!!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
