<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Organizer'], function () {
    Route::redirect('/', '/home');
    Route::get('/', 'HomeController@index')->name('organizer.home.index');
    Route::prefix('game')->group(function () {
        Route::get('/', 'GameController@index')->name('organizer.game.index');
        Route::get('/create', 'GameController@create')->name('organizer.game.create');
        Route::post('/store', 'GameController@store')->name('organizer.game.store');
        Route::get('/edit/{id}', 'GameController@edit')->name('organizer.game.edit');
        Route::put('/update/{id}', 'GameController@update')->name('organizer.game.update');
        Route::get('/{id}-round', 'RoundController@index')->name('organizer.game.round.index');
        Route::get('/{id}-round-create', 'RoundController@create')->name('organizer.game.round.create');
        Route::post('/{id}-round-store', 'RoundController@store')->name('organizer.game.round.store');
        Route::get('/round-{round_id}', 'RoundController@edit')->name('organizer.game.round.edit');
        Route::put('/round-{round_id}', 'RoundController@update')->name('organizer.game.round.update');
        Route::get('/{id}-round-delete-{round_id}', 'RoundController@delete')->name('organizer.game.round.delete');

        Route::get('/{round_id}/type-{type_id}', 'QuestionController@createQuestion')->name('organizer.game.round.question.create');

        Route::post('/{round_id}/store-text', 'QuestionController@storeQuestionText')->name('organizer.game.round.question_text.store');
        Route::post('/{round_id}/store-option', 'QuestionController@storeQuestionOption')->name('organizer.game.round.question_option.store');
        Route::post('/{round_id}/store-file', 'QuestionController@storeQuestionFile')->name('organizer.game.round.question_file.store');
        Route::get('/question-{question_id}-{type}', 'QuestionController@edit')->name('organizer.game.round.question.edit');
        Route::put('/{round_id}/question-{question_id}-update-text', 'QuestionController@updateQuestionText')->name('organizer.question_text.update');
        Route::put('/{round_id}/question-{question_id}-update-option', 'QuestionController@updateQuestionOption')->name('organizer.question_option.update');
        Route::put('/{round_id}/question-{question_id}-update-file', 'QuestionController@updateQuestionFile')->name('organizer.question_file.update');
        Route::get('/-{id}-question-{question_id}', 'QuestionController@delete')->name('organizer.game.round.question.delete');
        Route::get('/{id}-team', 'TeamController@index')->name('organizer.game.team.index');

    });
});
Route::get('/user', 'TemplateController@createUser');
Route::get('/get-list', 'TemplateController@getList');
Route::get('/get-user-info', 'TemplateController@getUserInfo');

