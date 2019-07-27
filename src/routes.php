<?php

foreach (config('saml2_settings.idpNames') as $key => $value) {
   
    Route::group([
        'prefix' => $value,
        'middleware' => config('saml2_settings.routesMiddleware'),
    ], function () use ($value) {
        
        Route::get('/logout', array(
            'as' => $value.'_logout',
            'uses' => 'Saml2Controller@logout',
        ));

        Route::get('/login', array(
            'as' => $value.'_login',
            'uses' => 'Saml2Controller@login',
        ));

        Route::get('/metadata', array(
            'as' => $value.'_metadata',
            'uses' => 'Saml2Controller@metadata',
        ));

        Route::post('/acs', array(
            'as' => $value.'_acs',
            'uses' => 'Saml2Controller@acs',
        ));

        Route::get('/sls', array(
            'as' => $value.'_sls',
            'uses' => 'Saml2Controller@sls',
        ));
    });

}