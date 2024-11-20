<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('route:clear');
	return 'Application cache cleared';
});

Route::group(['prefix'=>'access','middleware'=>['access','auth'],'namespace'=>'access'],function(){

	Route::get('/website/main-menus', '\App\Http\Controllers\access\MainMenuController@index')->name('create.menu');
	Route::post('/website/main-menus', '\App\Http\Controllers\access\MainMenuController@store')->name('store.menu');
	
	Route::DELETE('/website/delete-menu/{main_menu}', '\App\Http\Controllers\access\MainMenuController@destroy')->name('destroy.menu');
	
	Route::get('/website/edit-main-menu/{main_menu}', '\App\Http\Controllers\access\MainMenuController@edit');
	Route::post('/website/edit-main-menu/{main_menu}', '\App\Http\Controllers\access\MainMenuController@update')->name('update.menu');
	
	Route::post('/website/sub-menu', '\App\Http\Controllers\access\SubMenuController@store')->name('store.sub_menu');
	Route::get('/website/edit-sub-menu/{sub_menu}', '\App\Http\Controllers\access\SubMenuController@edit')->name('edit.sub_menu');
	Route::get('/website/edit-sub-menu/{sub_menu}', '\App\Http\Controllers\access\SubMenuController@edit')->name('edit.sub_menu');
	Route::post('/website/edit-sub-menu/{sub_menu}', '\App\Http\Controllers\access\SubMenuController@update')->name('update.sub_menu');
	Route::delete('/website/delete-sub-menu/{sub_menu}', '\App\Http\Controllers\access\SubMenuController@destroy');

	
	Route::get('/website/posts', '\App\Http\Controllers\access\PostController@index')->name('page.post');
	Route::get('/website/create-post', '\App\Http\Controllers\access\PostController@create')->name('create.post');
	Route::post('/website/create-post', '\App\Http\Controllers\access\PostController@store')->name('store.post');
	Route::get('/website/edit-post/{post}', '\App\Http\Controllers\access\PostController@edit')->name('edit.post');
	Route::post('/website/edit-post/{post}', '\App\Http\Controllers\access\PostController@update')->name('update.post');
	Route::delete('/website/delete-post/{post}', '\App\Http\Controllers\access\PostController@destroy');
	
	Route::get('/website/post-additional-fields', '\App\Http\Controllers\access\PostAdditionalController@index')->name('post.additiona-fields');
	Route::post('/website/post-additional-fields', '\App\Http\Controllers\access\PostAdditionalController@store')->name('post.store-fields');

	Route::get('/website/edit-additional-field/{post_additional_field}', '\App\Http\Controllers\access\PostAdditionalController@edit')->name('edit.additiona-field');
	Route::post('/website/edit-additional-field/{post_additional_field}', '\App\Http\Controllers\access\PostAdditionalController@update')->name('update.additional-field');
	Route::delete('/website/delete-additional-field/{post_additional_field}', '\App\Http\Controllers\access\PostAdditionalController@destroy')->name('destroy.additional-field');


	Route::get('/website/forms', '\App\Http\Controllers\access\FormController@index')->name('form.index');
	Route::get('/website/create-forms', '\App\Http\Controllers\access\FormController@create')->name('create.forms');
	Route::post('/website/create-forms', '\App\Http\Controllers\access\FormController@store')->name('store.forms');
	Route::get('/website/show-form/{form}','\App\Http\Controllers\access\FormController@show')->name('form-show');
	Route::get('/website/extend-form/{form}','\App\Http\Controllers\access\FormController@extend')->name('form-extend.index');
	Route::get('/website/edit-form/{form}','\App\Http\Controllers\access\FormController@edit')->name('form-edit');
	Route::post('/website/edit-form/{form}','\App\Http\Controllers\access\FormController@update')->name('form-update');

	Route::get('/form/form-messege/{form}','\App\Http\Controllers\access\FormController@form_message')->name('message.form');


	
	Route::get('/website/slider/employee-slider/{type}/{menu_id}', '\App\Http\Controllers\access\SliderController@employee_slider')->name('extend.slider');
	Route::get('/website/slider/logo-slider/{type}/{id}/{slider}', '\App\Http\Controllers\access\SliderController@logo_slider')->name('extend-logo-slider');
	Route::get('/set-logo-slider/{type}/{menu_type}/{id}/{slider}', '\App\Http\Controllers\access\SliderController@set_logo_slider')->name('logo.slider');
	
	Route::get('/website/slider/index/{slider_type}', '\App\Http\Controllers\access\SliderController@index')->name('create.slider');
	Route::get('/website/slider/create-slider', '\App\Http\Controllers\access\SliderController@create')->name('slider.list');
	Route::post('/website/slider/create-slider', '\App\Http\Controllers\access\SliderController@store')->name('store.slider');

	Route::get('/website/slider/edit-slider/{slider}', '\App\Http\Controllers\access\SliderController@edit')->name('slider.edit');
	Route::post('/website/slider/edit-slider/{slider}', '\App\Http\Controllers\access\SliderController@update')->name('update.slider');

	Route::get('/website/slider/types', '\App\Http\Controllers\access\SliderTypeController@index')->name('slider-type.list');


	Route::get('/website/greetings', '\App\Http\Controllers\access\GreetingController@index')->name('greetings.index');
	
	Route::post('/website/greetings', '\App\Http\Controllers\access\GreetingController@store')->name('greetings.store');
	Route::get('/website/greetings/edit/{greeting}', '\App\Http\Controllers\access\GreetingController@edit')->name('greetings.edit');
	Route::post('/website/greetings/edit/{greeting}', '\App\Http\Controllers\access\GreetingController@update')->name('greetings.update');


	Route::get('/website/content-settings', '\App\Http\Controllers\access\SettingController@index')->name('settings');
	Route::post('/website/content-settings', '\App\Http\Controllers\access\SettingController@update')->name('update.settings');

	Route::get('/company/company-info', '\App\Http\Controllers\access\CompanyInfoController@index')->name('company-info');
	Route::get('/company/edit-info/{company_info}', '\App\Http\Controllers\access\CompanyInfoController@edit')->name('edit.company-info');
	Route::post('/company/edit-info/{company_info}', '\App\Http\Controllers\access\CompanyInfoController@update')->name('update.info');

	Route::get('/company/company-social-info', '\App\Http\Controllers\access\SocielMediaController@index')->name('social-info');
	Route::get('/company/create-social-info', '\App\Http\Controllers\access\SocielMediaController@create')->name('social-create');
	Route::post('/company/create-social-info', '\App\Http\Controllers\access\SocielMediaController@store')->name('social-store');

	Route::get('/company/edit-social-info/{sociel_media}', '\App\Http\Controllers\access\SocielMediaController@edit')->name('social-edit');
	Route::post('/company/edit-social-info/{sociel_media}', '\App\Http\Controllers\access\SocielMediaController@update')->name('social-update');

	Route::get('/employee/employee-table', '\App\Http\Controllers\access\EmployeeController@index')->name('employee.index');
	Route::post('/employee/employee-table', '\App\Http\Controllers\access\EmployeeController@store')->name('employee.store');

	Route::get('/employee/create-employee', '\App\Http\Controllers\access\EmployeeController@create')->name('employee.create');
	Route::post('/employee/create-employee', '\App\Http\Controllers\access\EmployeeController@store')->name('employee.save');
	Route::get('/employee/edit-employee/{employee}', '\App\Http\Controllers\access\EmployeeController@edit')->name('employee.edit');
	Route::post('/employee/edit-employee/{employee}', '\App\Http\Controllers\access\EmployeeController@update')->name('employee.update');

	Route::get('/employee/category', '\App\Http\Controllers\access\EmployeeTypeController@index')->name('employee.category');
	Route::post('/employee/category', '\App\Http\Controllers\access\EmployeeTypeController@store')->name('store.category');

	Route::get('/employee/category/edit/{employee_type}', '\App\Http\Controllers\access\EmployeeTypeController@edit')->name('edit.category');
	Route::post('/employee/category/edit/{employee_type}', '\App\Http\Controllers\access\EmployeeTypeController@update')->name('update.category');

	Route::get('/user/users', '\App\Http\Controllers\access\UserController@index')->name('user.index');

	Route::post('/user/users', '\App\Http\Controllers\access\UserController@store')->name('user.store')->where(['role' => 'admin']);;
	Route::get('/user/create-user', '\App\Http\Controllers\access\UserController@create')->name('user.create');
	Route::post('/user/create-user', '\App\Http\Controllers\access\UserController@store')->name('user.save');
	Route::get('/user/edit-user/{user}', '\App\Http\Controllers\access\UserController@edit')->name('user.edit');
	Route::post('/user/edit-user/{user}', '\App\Http\Controllers\access\UserController@update')->name('user.update');

	// clients 
	Route::get('/client/index', '\App\Http\Controllers\access\ClientController@index')->name('client.index');
	Route::get('/client/create-client', '\App\Http\Controllers\access\ClientController@create')->name('client.create');
	Route::post('/client/create-client', '\App\Http\Controllers\access\ClientController@store')->name('client.store');
	Route::get('/client/edit-client/{client}', '\App\Http\Controllers\access\ClientController@edit')->name('client.edit');
	Route::post('/client/edit-client/{client}', '\App\Http\Controllers\access\ClientController@update')->name('client.update');

	// partners	
	Route::get('/partner/index', '\App\Http\Controllers\access\PartnerController@index')->name('partner.index');
	Route::get('/partner/create-partner', '\App\Http\Controllers\access\PartnerController@create')->name('partner.create');
	Route::post('/partner/create-partner', '\App\Http\Controllers\access\PartnerController@store')->name('partner.store');
	Route::get('/partner/edit-partner/{partner}', '\App\Http\Controllers\access\PartnerController@edit')->name('partner.edit');
	Route::post('/partner/edit-partner/{partner}', '\App\Http\Controllers\access\PartnerController@update')->name('partner.update');


	Route::get('/website/fun-factors', '\App\Http\Controllers\access\FunFactorController@index')->name('fun-factor.index');
	Route::get('/website/fun-factor/create', '\App\Http\Controllers\access\FunFactorController@create')->name('fun-factor.create');
	Route::post('/website/fun-factor/create', '\App\Http\Controllers\access\FunFactorController@store')->name('fun-factor.store');
	
	Route::get('/website/fun-factor/edit/{fun_factor}', '\App\Http\Controllers\access\FunFactorController@edit')->name('fun-factor.edit');
	Route::post('/website/fun-factor/edit/{fun_factor}', '\App\Http\Controllers\access\FunFactorController@update')->name('fun-factor.update');

	Route::delete('/website/fun-factor/delete/{fun_factor}', '\App\Http\Controllers\access\FunFactorController@destroy')->name('fun-factor.destroy');


	Route::post('/website/fun-factor/create-factor-field', '\App\Http\Controllers\access\FunFactorField@store')->name('factor-field.store');
	Route::get('/website/fun_factor/edit-field/{fun_factor_field}', '\App\Http\Controllers\access\FunFactorField@edit')->name('fun-factor-field.edit');
	Route::post('/website/fun_factor/edit-field/{fun_factor_field}', '\App\Http\Controllers\access\FunFactorField@update')->name('fun-factor-field.update');
	Route::delete('/website/fun_factor/delete-field/{fun_factor_field}', '\App\Http\Controllers\access\FunFactorField@destroy')->name('fun-factor-field.destroy');


	Route::get('/get-sub-menus/{main_menu}', '\App\Http\Controllers\access\SubMenuController@get_sub_menus')->name('menu.sub-menu');

	Route::get('/sort-menus/', '\App\Http\Controllers\access\MainMenuController@sort_menu')->name('menu.sort');
	// for ajax call
	Route::get('/set-employee-slider/{type}/{menu_type}/{id}/{emp_id}', '\App\Http\Controllers\access\SliderController@set_employee_slider')->name('employee.slider');

	Route::get('/get-form-extension/{type}/{text}/{form_id}', '\App\Http\Controllers\access\FormDetailController@index');
	Route::get('/get-form-extension-demo/{form_id}', '\App\Http\Controllers\access\FormDetailController@field_demo');
	Route::get('/extend-form-save/','\App\Http\Controllers\access\FormDetailController@store')->name('store.form');

	Route::get('/website/edit-form-fields/{form_id}','\App\Http\Controllers\access\FormDetailController@edit')->name('form-field-edit');
	
	Route::get('/get-form-detail-item/{form_detail}','\App\Http\Controllers\access\FormDetailController@show')->name('form-field-show');
	Route::post('/website/update-form-fields/{form_detail}','\App\Http\Controllers\access\FormDetailController@update')->name('form-field-update');

	Route::get('/delete-form-field/{form_detail}','\App\Http\Controllers\access\FormDetailController@destroy')->name('form-destroy');

	Route::get('/sort-fields', '\App\Http\Controllers\access\FormDetailController@sort')->name('sort.fields');


	Route::get('/profile','\App\Http\Controllers\access\ProfileController@index')->name('profile');
	Route::get('/edit-profile/{user}','\App\Http\Controllers\access\ProfileController@edit')->name('edit-profile');
	Route::post('/edit-profile/{user}','\App\Http\Controllers\access\ProfileController@update')->name('update-profile');
	Route::get('/password','\App\Http\Controllers\access\ProfileController@password')->name('password');
	Route::post('/password','\App\Http\Controllers\access\ProfileController@change_password')->name('change-password');


});
Route::get('/home', '\App\Http\Controllers\access\HomeController@index')->name('dashboard');


// front page routes ................

// route for form-submission
Route::post('/submit-form', '\App\Http\Controllers\FrontController@save_form')->name('save-form');


Route::get('/', '\App\Http\Controllers\FrontController@index')->name('home');
Route::get('/page/{sub_menu}-{slug}', '\App\Http\Controllers\FrontController@sub_menu_page')->name('sub-menu-content');
Route::get('/{title}', '\App\Http\Controllers\FrontController@main_menu_page')->name('menu-content');

Route::get('/post/{post}-{slug}', '\App\Http\Controllers\FrontController@post_details')->name('post-details');

