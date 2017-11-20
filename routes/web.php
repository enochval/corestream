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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/auth/facebook/redirect', 'Auth\FacebookAuthController@redirect')->name('facebook.login');
Route::get('/auth/facebook/callback', 'Auth\FacebookAuthController@callback')->name('facebook.callback');

Route::get('/auth/twitter/redirect', 'Auth\TwitterAuthController@redirect')->name('twitter.login');
Route::get('/auth/twitter/callback', 'Auth\TwitterAuthController@callback')->name('twitter.callback');

// Change Password Routes...
/*$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');*/
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('events/display', 'EventController@displayEvents');

Route::get('package', 'EventController@package');

Route::get('event-details/{id}', 'EventController@eventDetails')->name('event.details');

Route::group(['middleware' => ['auth']], function() {

    Route::post('/pay/{id}', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
    Route::get('/payment/book/callback', 'PaymentController@handleGatewayBookCallback');



    Route::get('invoice/{id}', 'EventController@invoice')->name('event.invoice');
    Route::get('event/create/{id}', 'EventController@create')->name('event.create');
    Route::post('event/store', 'EventController@store')->name('event.store');
    Route::get('event/edit/{id}', 'EventController@edit')->name('event.edit');
    Route::get('event/general/edit/{id}', 'EventController@generalEdit')->name('event.general.edit');
    Route::patch('event/update/{id}', 'EventController@update')->name('event.update');
    Route::patch('event/general/update/{id}', 'EventController@generalUpdate')->name('event.general.update');
    Route::get('event/confirm/{id}','EventController@confirmEvent')->name('event.confirm');

    Route::get('my-event', 'EventController@myEvents')->name('my.event');


    Route::get('booked/{id}', 'EventController@bookedEvent')->name('event.booked');


    Route::get('my-account', 'ProfileController@myAccount');
    Route::patch('update/{id}', 'ProfileController@updateProfile')->name('profile.update');

    Route::group(['prefix'=>'admin'], function (){

        Route::get('dashboard', 'HomeController@dashboard');

        Route::resource('users','UserController');

        Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index'/*,'middleware' => ['permission:role-list|role-create|role-edit|role-delete']*/]);
        Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create'/*,'middleware' => ['permission:role-create']*/]);
        Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store'/*,'middleware' => ['permission:role-create']*/]);
        Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit'/*,'middleware' => ['permission:role-edit']*/]);
        Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update'/*,'middleware' => ['permission:role-edit']*/]);
        Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy'/*,'middleware' => ['permission:role-delete']*/]);


        Route::get('events', 'EventController@index')->name('events');
        Route::get('approve-event/{id}', 'EventController@approve')->name('approve.event');
        Route::get('decline-event/{id}', 'EventController@decline')->name('decline.event');
        Route::get('manage-event/{id}', 'EventController@manage')->name('manage.event');

        Route::post('settings/uri/{id}', 'GeneralSettingController@eventUrl')->name('event.uri');
        Route::get('settings/event/golive/{id}', 'GeneralSettingController@eventGoLive')->name('event.golive');
        Route::get('settings/event/disable-uri/{id}', 'GeneralSettingController@disableUrl')->name('event.disable');
});



    Route::get('watch/{id}', 'EventController@watchEvent')->name('watch.event');

});


/*Route::any('{catchall}', function() {
    return view('home');
})->where('catchall', '.*');*/