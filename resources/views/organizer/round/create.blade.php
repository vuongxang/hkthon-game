@extends('organizer.layouts.app')
@section('header_custom')
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("main_content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="content-header ml-2">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <h3 class="m-0 text-dark text-bold">Trò chơi: {{$gameRound->title}}</h3>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <h4 class="m-0 text-dark text-bold">Thêm vòng đấu</h4>
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <form method="POST" action="{{route('organizer.game.round.store',['id'=>$gameRound->id])}}"
                          class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên vòng đấu</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Địa điểm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="location" class="form-control" id="inputPassword3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gợi ý địa điểm</label>
                                <div class="col-sm-10">
                                        <textarea type="text" class="form-control ckeditor" name="suggest"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Thời gian</label>
                                <div class="col-sm-10">
                                    <input type="number" name="time" class="form-control" placeholder="Phút">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Trạng thái hiển thị</label>
                                <div class="col-sm-10">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="status" id="checkboxPrimary1">
                                        <label for="checkboxPrimary1">
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{route('organizer.game.edit',['id'=>$gameRound->id])}}" type="submit"
                               class="btn btn-danger ">Hủy</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_custom')
    <!-- CK-EDITOR-->
    <script type="text/javascript" language="javascript"
            src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

@endsection
