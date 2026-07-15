<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Bài tập 02: Route cơ bản & gợi nhớ PHP

// Route GET /hello trả về chuỗi chào
Route::get('/hello', function () {
    return 'Xin chào Laravel 12!';
});

// Route GET /time trả về thời gian hệ thống hiện tại
Route::get('/time', function () {
    // Dùng Carbon (helper now()) để định dạng thời gian
    return now()->format('H:i:s d/m/Y');
});

// Route GET /sum/{a}/{b} trả về tổng 2 số nguyên
Route::get('/sum/{a}/{b}', function ($a, $b) {
    // Kiểm tra tham số có phải là số hay không
    if (!is_numeric($a) || !is_numeric($b)) {
        return response('Tham số phải là số nguyên', 400);
    }
    return (int)$a + (int)$b;
});

// Bài tập 03: Controller & Blade - danh sách sinh viên
// Route trỏ tới hàm index() trong StudentController
Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/combined', [StudentController::class, 'combined']);

Route::get('/students/db', [StudentController::class, 'indexDb']);