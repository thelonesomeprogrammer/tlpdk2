<?php

use Illuminate\Support\Facades\Route;

Route::get('/{filename}', function ($filename) {
    $filePath = public_path('files/' . $filename);

    if (file_exists($filePath)) {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $mimeTypes = [
        'js'  => 'application/javascript',
        'css' => 'text/css',];

        $mimeType = $mimeTypes[$extension] ?? mime_content_type($filePath);

        $mimeType = $mimeType ?: 'application/octet-stream';

        return response()->file($filePath, ['Content-Type' => $mimeType,]);
    }
    abort(404, 'File not found.');
});

Route::get('/', function () {
    $filePath = public_path('files/index.html');
    return response()->file($filePath);
});

Route::get('/favicon.ico', function () {
    $filePath = public_path('favicon.ico');
    return response()->file($filePath);
});
