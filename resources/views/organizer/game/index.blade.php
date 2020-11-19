@extends('organizer.layouts.app')
@section('main_content')
    <div class="row">
        <div class="col-md-12 m-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Thêm mới trò chơi
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm trò chơi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('organizer.game.store')}}" method="POST">
                            <div class="modal-body">

                                @csrf
                                <div class="form-group">
                                    <label for="nameGame">Tên trò chơi</label>
                                    <input type="text" value="{{old('title')}}" name="title" class="form-control"
                                           id="nameGame"
                                           placeholder="Nhập tên trò chơi">
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả trò chơi</label>
                                    <textarea class="form-control" name="description" id=""
                                              placeholder="Mô tả trò chơi">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="text-danger"></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Hiển thị trò chơi</label>
                                    <input type="checkbox" class="form-control" name="status">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        @foreach($aGame as $key=> $game)
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$game->title}}</h3>
                        <p>Người tạo:</p>
                        <!-- Button trigger modal -->

                        <p>Ngày tạo:{{$game->created_at}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <a href="{{route('organizer.game.edit',['id'=>$game->id])}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->
@endsection
