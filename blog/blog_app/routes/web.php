<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Route for viewing all blogs
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    // Route for creating a new blog
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    // Route for editing a blog
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    // Route for deleting a blog
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});

require __DIR__ . '/auth.php';
