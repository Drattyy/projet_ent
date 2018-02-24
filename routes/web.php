<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/prof'], function (){
    Route::get('/', 'ProfController@index')->name('prof_home')->middleware('auth');
    Route::group(['prefix' => '/students'], function (){
        Route::get('/', 'ProfStudentsController@index')->name('prof_users')->middleware('auth');
        Route::get('/tdgroup/{tdgroup}', 'ProfStudentsController@list_td')->name('prof_list_td_users')->middleware('auth');
        Route::get('/tpgroup/{tpgroup}', 'ProfStudentsController@list_tp')->name('prof_list_tp_users')->middleware('auth');
        Route::get('/promotion/{promotion}', 'ProfStudentsController@list_promotion')->name('prof_list_promotion_users')->middleware('auth');
    });

    Route::group(['prefix' => '/notes'], function (){
        Route::get('/', 'ProfNotesController@index')->name('prof_notes')->middleware('auth');
        Route::post('/students/get', 'ProfNotesController@get_students')->name('prof_students_get')->middleware('auth');
        Route::post('/students/post', 'ProfNotesController@post_notes')->name('prof_students_post')->middleware('auth');
        Route::get('/students/view/module/{module_id}', 'ProfNotesController@viewExams')->name('prof_students_view')->middleware('auth');
        Route::get('/students/view/module/{module_id}/notes/{exam_id}', 'ProfNotesController@viewNotes')->name('prof_students_view_notes')->middleware('auth');
        Route::post('/students/note/edit/{note_id}', 'ProfNotesController@editNotePost')->name('prof_students_note_edit_post')->middleware('auth');
        Route::get('/students/note/edit/{note_id}', 'ProfNotesController@editNote')->name('prof_students_note_edit')->middleware('auth');

        Route::get('/students/tdgroup/{module_id}', 'ProfNotesController@json_td_groups')->middleware('auth');
        Route::get('/students/tpgroup/{tdgroup_id}', 'ProfNotesController@json_tp_groups')->middleware('auth');
    });
});

