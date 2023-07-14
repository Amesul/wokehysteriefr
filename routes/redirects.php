<?php
/*
|--------------------------------------------------------------------------
| Redirect Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/dashboard', '/dashboard/profile');
Route::redirect('/profile', '/dashboard/profile');
Route::redirect('/blog', '/blog/posts');
Route::redirect('/about', '/about/members');
