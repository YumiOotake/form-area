<?php

use App\Http\Controllers\FormController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FormController::class, 'index']);#最初のindex表示
Route::get('/confirm', fn() => redirect('/')); #確認画面リロード、直用　ユーザーが /confirm をGETで踏むケース（リロード・直打ち）があるから。「単純なリダイレクトだけ」なら、ルート直書きがよく使われる。
Route::post('/confirm', [FormController::class, 'confirm']);#入力内容→確認画面
Route::post('/contacts', [FormController::class, 'store']);#確認画面→DB保存
