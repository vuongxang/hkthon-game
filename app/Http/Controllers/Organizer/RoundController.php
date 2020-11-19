<?php

namespace App\Http\Controllers\Organizer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Round;
use App\Repositories\Contracts\GameRepository;
use App\Repositories\Contracts\LocationRepository;
use App\Repositories\Contracts\QuestionRepository;
use App\Repositories\Contracts\RoundRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoundController extends Controller
{
    protected $gameRepository;
    protected $roundRepository;
    protected $locationRepository;
    protected $questionRepository;

    public function __construct(
        GameRepository $gameRepository,
        RoundRepository $roundRepository,
        LocationRepository $locationRepository,
        QuestionRepository $questionRepository
    )
    {
        $this->questionRepository = $questionRepository;
        $this->gameRepository = $gameRepository;
        $this->roundRepository = $roundRepository;
        $this->locationRepository = $locationRepository;
    }

    public function index($id)
    {

    }

    public function create($id)
    {
        $gameRound = $this->gameRepository->find($id);
        return view('organizer.round.create', ['gameRound' => $gameRound]);
    }

    public function edit($id)
    {
        //find game by id
        $aRound = $this->roundRepository->find($id);

        //find location round by id round
        $aLocation = $this->locationRepository->findWhere($id, 'round_id');

        //get all question in 1 round
        $aQuestions = $this->questionRepository->getQuestionRound($aRound->id);
        $data = ['aRound' => $aRound, 'aLocation' => $aLocation, 'aQuestions' => $aQuestions];
        return view('organizer.round.edit', ['data' => $data]);
    }

    public function store(Request $roundStore, $gameId)
    {
        try {
            $data = [
                'game_id' => $gameId,
                'name' => $roundStore->name,
                'status' => Helper::checkBtnStatus($roundStore->status),
                'time' => $roundStore->time,
            ];

            $result = $this->roundRepository->create($data);
            if (isset($result->id) && !empty($result->id)) {
                $dataDetail = [
                    'round_id' => $result->id,
                    'name' => $roundStore->location,
                    'suggest' => $roundStore->suggest,
                    'code' => rand(),
                ];
                $this->locationRepository->create($dataDetail);
            }
            if (!$result) {
                toastr()->error('Có lỗi xảy ra vui lòng thử lại!');
                Log::info('create round>>>' . json_encode($result));
            } else {
                toastr()->success('Thêm thành công');
            }
            return redirect()->route('organizer.game.edit', ['id' => $gameId]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    public function update(Request $request, $roundId)
    {
        try {
            $data = [
                'game_id' => $request->game,
                'name' => $request->name,
                'status' => Helper::checkBtnStatus($request->status),
                'time' => $request->time,
            ];
            $result = Round::where('id', $roundId)->update($data);

            if (isset($result->id) && !empty($result->id)) {
                $dataDetail = [
                    'round_id' => $result->id,
                    'name' => $request->location,
                    'suggest' => $request->suggest,
                    'code' => rand(),
                ];
                Location::where('id', $roundId)->update($dataDetail);
            }
            if (!$result) {
                toastr()->error('Có lỗi xảy ra vui lòng thử lại!');
                Log::info('create round>>>' . json_encode($result));
            } else {
                toastr()->success('Cập nhật thành công');
            }
            return redirect()->route('organizer.game.round.edit', ['round_id' => $roundId]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    public function delete($id, $roundId)
    {
        try {
            $result = $this->roundRepository->deleteRoundGame($roundId);
            if (!$result) {
                toastr()->error('Có lỗi xẩy ra vui lòng thử lại');
            } else {
                toastr()->success('Xóa thành công');
                return redirect()->route('organizer.game.edit', ['id' => $id]);
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }
}
