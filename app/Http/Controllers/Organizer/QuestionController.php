<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Repositories\Contracts\AnswerRepository;
use App\Repositories\Contracts\FileRepository;
use App\Repositories\Contracts\QuestionRepository;
use App\Repositories\Contracts\RoundRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class QuestionController extends Controller
{
    protected $questionRepository;
    protected $answerRepository;
    protected $roundRepository;
    protected $fileRepository;

    public function __construct(
        QuestionRepository $questionRepository,
        AnswerRepository $answerRepository,
        RoundRepository $roundRepository,
        FileRepository $fileRepository
    )
    {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
        $this->roundRepository = $roundRepository;
        $this->fileRepository = $fileRepository;

    }

    public function createQuestion($roundId, $typeId)
    {
        $aRound = $this->roundRepository->find($roundId);

        $data = ['aRound' => $aRound];
        if ($typeId == 1) {
            return view('organizer.question.text.create', ['data' => $data]);
        }
        if ($typeId == 2) {
            return view('organizer.question.file.create', ['data' => $data]);
        }
        if ($typeId == 3) {
            return view('organizer.question.option.create', ['data' => $data]);
        }
    }

    public function storeQuestionFile(Request $fileQuestionStore, $roundId)
    {
        $fileID = null;
        if ($fileQuestionStore->hasFile('image')) {
            $resultFile = $this->uploadFile($fileQuestionStore->image, "question-file");
            $fileID = $resultFile->id;
        }
        $data = [
            'round_id' => $roundId,
            'title' => $fileQuestionStore->title,
            'point' => $fileQuestionStore->point,
            'suggest' => $fileQuestionStore->suggest,
            'file_id' => $fileID,
            'status' => 1
        ];
        $result = $this->questionRepository->create($data);
        if ($fileQuestionStore->hasFile('answers')) {
            $files = $fileQuestionStore->answers->getClientOriginalName();
            $newNameFile = 'question-file' . '-' . rand() . $files;
            $path = $fileQuestionStore->answers->storeAs('question-file', $newNameFile, 'public');
            $fileUrl = 'storage/' . $path;
        }
        $dataAnswer = [
            'question_id' => $result->id,
            'type_answers' => 2,
            'url' => $fileUrl,
            'status' => 1
        ];
        if (!$result) {
            Log::info("create question>>>" . json_encode($result));
            toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
            return false;
        }
        $resultAnswer = $this->answerRepository->create($dataAnswer);
        if (!$resultAnswer) {
            Log::info("create answer>>>" . json_encode($resultAnswer));
            toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
            return false;
        }
        toastr()->success("Thêm thành công");
        return redirect()->route('organizer.game.round.edit', ['round_id' => $roundId]);
    }

    public function uploadFile($file, string $nameFolder)
    {
        $files = $file->getClientOriginalName();
        $newNameFile = $nameFolder . '-' . rand() . $files;
        $path = $file->storeAs($nameFolder, $newNameFile, 'public');
        $fileUrl = 'storage/' . $path;
        $dataFile = [
            'status' => 1,
            'url' => $fileUrl
        ];
        $resultFile = $this->fileRepository->create($dataFile);
        return $resultFile;
    }

    public function storeQuestionText(Request $textQuestionStore, $roundId)
    {
        try {
            $fileID = null;
            if ($textQuestionStore->hasFile('image')) {
                $resultFile = $this->uploadFile($textQuestionStore->image, "question-text");
                $fileID = $resultFile->id;
            }
            $data = [
                'round_id' => $roundId,
                'title' => $textQuestionStore->title,
                'point' => $textQuestionStore->point,
                'suggest' => $textQuestionStore->suggest,
                'file_id' => $fileID,
                'status' => 1
            ];

            $result = $this->questionRepository->create($data);
            $dataAnswer = [
                'question_id' => $result->id,
                'type_answers' => 1,
                'content' => $textQuestionStore->answers,
                'status' => 1
            ];
            if (!$result) {
                Log::info("create question>>>" . json_encode($result));
                toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
                return false;
            }
            $resultAnswer = $this->answerRepository->create($dataAnswer);
            if (!$resultAnswer) {
                Log::info("create answer>>>" . json_encode($resultAnswer));
                toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
                return false;
            }
            toastr()->success("Thêm thành công");
            return redirect()->route('organizer.game.round.edit', ['round_id' => $roundId]);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    public function storeQuestionOption(Request $optionQuestionStore, $roundId)
    {
        $fileID = null;
        if ($optionQuestionStore->hasFile('image')) {
            $resultFile = $this->uploadFile($optionQuestionStore->image, "question-option");
            $fileID = $resultFile->id;
        }
        $data = [
            'round_id' => $roundId,
            'title' => $optionQuestionStore->title,
            'point' => $optionQuestionStore->point,
            'suggest' => $optionQuestionStore->suggest,
            'file_id' => $fileID,
            'status' => 1
        ];
        $result = $this->questionRepository->create($data);
        if ($result) {
            for ($answer = 1; $answer <= 4; $answer++) {
                $option = $optionQuestionStore->input('option_text_' . $answer, '');
                if ($option != '') {
                    $dataAnswer = [
                        'question_id' => $result->id,
                        'type_answers' => 3,
                        'content' => $option,
                        'status' => $optionQuestionStore->input('correct_' . $answer)
                    ];
                    $this->answerRepository->create($dataAnswer);
                }
            }
            toastr()->success("Thêm thành công");
        } else {
            toastr()->error("Có lỗi xảy ra vui lòng thử lại");
        }
        return redirect()->route('organizer.game.round.edit', ['round_id' => $roundId]);
    }

    public function edit($questionId, $type)
    {

        $aQuestion = $this->questionRepository->getQuestionById($questionId);

        //đang check lại
        $aAnswer = Answer::where('question_id', $questionId)->get();

//        $aFile = $this->fileRepository->find($aQuestion->file_id);

        $data = ['aQuestion' => $aQuestion, 'aAnswer' => $aAnswer];
        if ($type == 1) {

            return view('organizer.question.text.edit', ['data' => $data]);
        }
        if ($type == 2) {
            return view('organizer.question.file.edit', ['data' => $data]);
        }
        if ($type == 3) {
            return view('organizer.question.option.edit', ['data' => $data]);
        }

    }

    public function updateQuestionText(Request $textQuestionUpdate, $roundId, $questionId)
    {
        try {

            if ($textQuestionUpdate->hasFile('image')) {
                $resultFile = $this->uploadFile($textQuestionUpdate->image, "question-text");
                $fileID = $resultFile->id;
            } else {
                $fileID = $textQuestionUpdate->oldImage;
            }
            $data = [
                'round_id' => $roundId,
                'title' => $textQuestionUpdate->title,
                'point' => $textQuestionUpdate->point,
                'suggest' => $textQuestionUpdate->suggest,
                'file_id' => $fileID,
                'status' => 1
            ];

            $result = $this->questionRepository->update('id', $questionId, $data);
            $dataAnswer = [
                'question_id' => $questionId,
                'content' => $textQuestionUpdate->answers,
                'status' => 1
            ];

            if (!$result) {
                Log::info("update question>>>" . json_encode($result));
                toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
                return false;
            }

            $resultAnswer = $this->answerRepository->update("question_id", $questionId, $dataAnswer);
            if (!$resultAnswer) {
                Log::info("create answer>>>" . json_encode($resultAnswer));
                toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
                return false;
            }
            toastr()->success("Sửa thành công");
            return redirect()->route('organizer.game.round.edit', ['round_id' => $roundId]);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }

    public function updateQuestionFile(Request $fileQuestionUpdate, $roundId, $questionId)
    {
        if ($fileQuestionUpdate->hasFile('image')) {
            $resultFile = $this->uploadFile($fileQuestionUpdate->image, "question-file");
            $fileID = $resultFile->id;
        } else {
            $fileID = $fileQuestionUpdate->oldFileQuestion;
        }
        $data = [
            'round_id' => $roundId,
            'title' => $fileQuestionUpdate->title,
            'point' => $fileQuestionUpdate->point,
            'suggest' => $fileQuestionUpdate->suggest,
            'file_id' => $fileID,
            'status' => 1
        ];
        $result = $this->questionRepository->update('id', $questionId, $data);
        if ($fileQuestionUpdate->hasFile('answers')) {
            $files = $fileQuestionUpdate->answers->getClientOriginalName();
            $newNameFile = 'question-file' . '-' . rand() . $files;
            $path = $fileQuestionUpdate->answers->storeAs('question-file', $newNameFile, 'public');
            $fileUrl = 'storage/' . $path;
        } else {
            $fileUrl = $fileQuestionUpdate->oldAnswer;
        }
        $dataAnswer = [
            'question_id' => $questionId,
            'type_answers' => 2,
            'url' => $fileUrl,
            'status' => 1
        ];
        if (!$result) {
            Log::info("create question>>>" . json_encode($result));
            toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
        }
        $resultAnswer = $this->answerRepository->update("question_id", $questionId, $dataAnswer);
        if (!$resultAnswer) {
            Log::info("update answer>>>" . json_encode($resultAnswer));
            toastr()->error("Có lỗi xẩy ra vui lòng thử lại");
        }
        toastr()->success("Sửa thành công");
        return redirect()->route('organizer.game.round.edit', ['round_id' => $roundId]);
    }

    public function updateQuestionOption(Request $optionQuestionUpdate, $roundId, $questionId)
    {
        if ($optionQuestionUpdate->hasFile('image')) {
            $resultFile = $this->uploadFile($optionQuestionUpdate->image, "question-option");
            $fileID = $resultFile->id;
        } else {
            $fileID = $optionQuestionUpdate->oldImage;
        }
        $data = [
            'round_id' => $roundId,
            'title' => $optionQuestionUpdate->title,
            'point' => $optionQuestionUpdate->point,
            'suggest' => $optionQuestionUpdate->suggest,
            'file_id' => $fileID,
            'status' => 1
        ];
        $result = $this->questionRepository->update('id', $questionId, $data);
        if ($result) {
            for ($answer = 1; $answer <= 4; $answer++) {
                $option = $optionQuestionUpdate->input('option_text_' . $answer, '');
                if ($option != '') {
                    $dataAnswer = [
                        'question_id' => $questionId,
                        'type_answers' => 3,
                        'content' => $option,
                        'status' => $optionQuestionUpdate->input('correct_' . $answer)
                    ];
                    $this->answerRepository->update("question_id", $questionId, $dataAnswer);
                }
            }
            toastr()->success("Sửa thành công");
        } else {
            toastr()->error("Có lỗi xảy ra vui lòng thử lại");
        }
        return redirect()->route('organizer.game.round.edit', ['round_id' => $roundId]);
    }

    public function delete($id, $questionId)
    {
        try {
            $result = $this->questionRepository->deleteQuestionRound($questionId);
            $resultAnswer = $this->answerRepository->deleteAnswerQuestion($questionId);
            if (!$result && !$resultAnswer) {
                toastr()->error('Có lỗi xẩy ra vui lòng thử lại');
            } else {
                toastr()->success('Xóa thành công');
                return redirect()->route('organizer.game.round.edit', ['round_id' => $id]);
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return $message;
        }
    }
}
