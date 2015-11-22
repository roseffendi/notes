<?php

$router->group(['namespace' => 'Backend'], function($router){
    $router->group(['prefix' => 'admin', 'middleware' => 'auth'], function($router){
        $router->get('notes', ['uses' => 'NotesController@getIndex', 'as' => 'admin.notes.note.index.get']);
        $router->get('notes/access-code', ['uses' => 'NotesController@getAccessCode', 'as' => 'admin.notes.note.access-code.get']);
    });
});