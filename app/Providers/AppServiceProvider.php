<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Code;
use App\Models\Collaborator;
use App\Models\File;
use App\Models\Game;
use App\Models\Location;
use App\Models\Player;
use App\Models\Question;
use App\Models\Round;
use App\Models\Team;
use App\Models\TeamAnswer;
use App\Models\User;

use App\Repositories\Contracts\AnswerRepository as CAnswer;
use App\Repositories\Contracts\CodeRepository as CCode;
use App\Repositories\Contracts\CollaboratorRepository as CCollaborator;
use App\Repositories\Contracts\FileRepository as CFile;
use App\Repositories\Contracts\GameRepository as CGame;
use App\Repositories\Contracts\LocationRepository as CLocation;
use App\Repositories\Contracts\PlayerRepository as CPlayer;
use App\Repositories\Contracts\QuestionRepository as CQuestion;
use App\Repositories\Contracts\RoundRepository as CRound;
use App\Repositories\Contracts\TeamAnswerRepository as CTeamAnswer;
use App\Repositories\Contracts\TeamRepository as CTeam;
use App\Repositories\Contracts\UserRepository as CUser;

use App\Repositories\Eloquent\EloquentAnswerRepository as EAnswer;
use App\Repositories\Eloquent\EloquentCodeRepository as ECode;
use App\Repositories\Eloquent\EloquentCollaboratorRepository as ECollaborator;
use App\Repositories\Eloquent\EloquentFileRepository as EFile;
use App\Repositories\Eloquent\EloquentGameRepository as EGame;
use App\Repositories\Eloquent\EloquentLocationRepository as ELocation;
use App\Repositories\Eloquent\EloquentPlayerRepository as EPlayer;
use App\Repositories\Eloquent\EloquentQuestionRepository as EQuestion;
use App\Repositories\Eloquent\EloquentRoundRepository as ERound;
use App\Repositories\Eloquent\EloquentTeamAnswerRepository as ETeamAnswer;
use App\Repositories\Eloquent\EloquentTeamRepository as ETeam;
use App\Repositories\Eloquent\EloquentUserRepository as EUser;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRepository();
    }

    private function loadRepository()
    {
        $this->app->bind(CAnswer::class, function () {
            return new EAnswer(new Answer());
        });
        $this->app->bind(CCode::class, function () {
            return new ECode(new Code());
        });
        $this->app->bind(CCollaborator::class, function () {
            return new ECollaborator(new Collaborator());
        });
        $this->app->bind(CFile::class, function () {
            return new EFile(new File());
        });
        $this->app->bind(CGame::class, function () {
            return new EGame(new Game());
        });
        $this->app->bind(CLocation::class, function () {
            return new ELocation(new Location());
        });
        $this->app->bind(CPlayer::class, function () {
            return new EPlayer(new Player());
        });
        $this->app->bind(CQuestion::class, function () {
            return new EQuestion(new Question());
        });
        $this->app->bind(CRound::class, function () {
            return new ERound(new Round());
        });
        $this->app->bind(CTeam::class, function () {
            return new ETeam(new Team());
        });
        $this->app->bind(CTeamAnswer::class, function () {
            return new ETeamAnswer(new TeamAnswer());
        });
        $this->app->bind(CUser::class, function () {
            return new EUser(new User());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
