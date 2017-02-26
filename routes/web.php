<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
	includeRouteFiles(__DIR__ . '/Frontend/');
});

/* ----------------------------------------------------------------------- */

/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	/**
	 * These routes need view-backend permission
	 * (good if you want to allow more than one group in the backend,
	 * then limit the backend features by different roles or permissions)
	 *
	 * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
	 */
	includeRouteFiles(__DIR__ . '/Backend/');
});

Route::get('/images/{size}/{path}/{name}', function($size = NULL, $path = NULL , $name = NULL){



    if(!is_null($size) && !is_null($name) && !is_null($path)){

        $size = explode('x', $size);

        $extension = pathinfo($name, PATHINFO_EXTENSION);

       
        $type = "image/jpeg";

        if($extension=="png"){
        $type ="image/png";
        }

        if($extension=="jpg"){
        $type = "image/jpg";
        }


        $cache_image = Image::cache(function($image) use($size, $name, $path){

          if(isset($size[1])){
             return $image->make(public_path('/uploads/'.$path.'/'.$name))->resize($size[0], $size[1]);
         }else{
             return $image->make(public_path('/uploads/'.$path.'/'.$name))->resize($size[0], null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
         }
          

        }, 10); // cache for 10 minutes

        return Response::make($cache_image, 200, ['Content-Type' => $type]);

    } else {
        abort(404);
    }

});