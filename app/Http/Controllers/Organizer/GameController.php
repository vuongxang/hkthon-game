<?php

namespace App\Http\Controllers\Organizer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Game;
use App\Repositories\Contracts\CodeRepository;
use App\Repositories\Contracts\GameRepository;
use App\Repositories\Contracts\RoundRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    protected $gameRepository;
    protected $roundRepository;
    protected $codeRepository;

    public function __construct(GameRepository $gameRepository, RoundRepository $roundRepository, CodeRepository $codeRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->roundRepository = $roundRepository;
        $this->codeRepository = $codeRepository;
    }

    public function index()
    {
        $aGames = $this->gameRepository->getGames("");
        return view('organizer.game.index', ['aGame' => $aGames]);
    }

    public function edit($id)
    {

        $aGame = $this->gameRepository->getGames($id);
        $aRoundsGame = $this->gameRepository->getRoundsGame($id);
        $data = ['aGame' => $aGame, 'aRoundsGame' => $aRoundsGame];
        return view('organizer.game.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'user_id' => 1,
            'title' => $request->name,
            'description' => $request->description
        ];
        $result = Game::where('id', $id)->update($data);
        if (!$result) {
            Log::info("update game>>>" . json_encode($result));
            toastr()->error("Có lỗi xảy ra vui lòng thử lại");
        } else {
            toastr()->success("Cập nhật thành công");
        }
        return redirect()->route('organizer.game.edit', ['id' => $id]);
    }

    public function create()
    {
        return view('organizer.game.create');
    }

    public function store(Request $gameStore)
    {
        try {
            $data = [
                'user_id' => 1,
                'title' => $gameStore->title,
                'description' => $gameStore->description,
                'status' => Helper::checkBtnStatus($gameStore->status)
            ];
            $result = $this->gameRepository->create($data);
            if (!$result) {
                Log::info("create game>>>" . json_encode($result));
                toastr()->error('Có lỗi xảy ra vui lòng thử lại');
            }
            $dataCode = [
                'game_id' => $result->id,
                'code' => rand(),
                'status' => Code::STATUS_ACTIVE
            ];
            $resultCode = $this->codeRepository->create($dataCode);
            if (!$resultCode) {
                Log::info("create codegame>>>" . json_encode($result));
                toastr()->error('Có lỗi xảy ra vui lòng thử lại');
            }
            toastr()->success('Thêm thành công');
            return redirect()->route('organizer.game.edit', ['id' => $result->id]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

}
