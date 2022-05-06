<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Assignment
    Route::post('assignments/media', 'AssignmentApiController@storeMedia')->name('assignments.storeMedia');
    Route::apiResource('assignments', 'AssignmentApiController');

    // Submission
    Route::apiResource('submissions', 'SubmissionApiController');

    // Attendence
    Route::apiResource('attendences', 'AttendenceApiController');
});
