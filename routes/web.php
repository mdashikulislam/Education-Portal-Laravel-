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
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Frontend')->group(function (){
    Route::get('/','HomeController@index')->name('user.home');
//    Route::get('/information','HomeController@information')->name('user.information');

    Route::prefix('skill-development')->group(function (){
        //Skill Development Retrieve
        Route::get('/soft-skill','HomeController@softSkill')->name('user.skill.softskill');
        Route::get('/academic-skill','HomeController@academicSkill')->name('user.skill.academicskill');
        Route::get('/professional-skill','HomeController@professionalSkill')->name('user.skill.professionalskill');
        Route::get('/skill-detail/{slug}','HomeController@skillDetails')->name('user.skill.details');
    });
    Route::prefix('tips-and-tricks')->group(function (){
        //Tips and Tricks Retrieve
        Route::get('interview','HomeController@interviewTips')->name('user.tips.interview');
        Route::get('educational','HomeController@educationalTips')->name('user.tips.educational');
        Route::get('career-and-planing','HomeController@careerAndPlaningTips')->name('user.tips.career');
        Route::get('others','HomeController@othersTips')->name('user.tips.others');
        Route::get('tips-detail/{slug}','HomeController@tipsDetails')->name('user.tips.details');

    });
    Route::get('blog','HomeController@blog')->name('user.blog');
    Route::get('blog/category/{id}','HomeController@category')->name('user.blog.category');
});













//Admin Route
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/','HomeController@index')->name('admin.mainpage')->middleware('auth:admin');
    Route::get('/home', 'HomeController@index')->name('admin.home')->middleware('auth:admin');
    //For Skill Development
    Route::prefix('skill-development')->group(function (){
        Route::get('index','SkillController@index')->name('admin.skill.index');
        Route::get('create','SkillController@create')->name('admin.skill.create');
        Route::post('store','SkillController@store')->name('admin.skill.store');
        Route::get('delete/{id}','SkillController@delete')->name('admin.skill.delete');
        Route::get('{id}/edit','SkillController@edit')->name('admin.skill.edit');
        Route::put('{id}/update','SkillController@update')->name('admin.skill.update');
        Route::get('trash','SkillController@trashIndex')->name('admin.skill.trash.index');
        Route::get('{id}/restore','SkillController@restore')->name('admin.skill.trash.restore');
        Route::get('{id}/forcedelete','SkillController@trashDelete')->name('admin.skill.trash.delete');
    });
    //For Tips and Tricks
    Route::prefix('tips-and-tricks')->group(function (){
        Route::get('index','TipsController@index')->name('admin.tips.index');
        Route::get('create','TipsController@create')->name('admin.tips.create');
        Route::post('store','TipsController@store')->name('admin.tips.store');
        Route::get('delete/{id}','TipsController@delete')->name('admin.tips.delete');
        Route::get('{id}/edit','TipsController@edit')->name('admin.tips.edit');
        Route::put('{id}/update','TipsController@update')->name('admin.tips.update');
        Route::get('trash','TipsController@trashIndex')->name('admin.tips.trash.index');
        Route::get('{id}/restore','TipsController@restore')->name('admin.tips.trash.restore');
        Route::get('{id}/forcedelete','TipsController@trashDelete')->name('admin.tips.trash.delete');
    });
    //For Blog
    Route::prefix('blog')->group(function (){
        //For blog Category
        Route::prefix('category')->group(function (){
            Route::get('index','BlogController@categoryIndex')->name('admin.blog.category.index');
            Route::get('create','BlogController@categoryCreate')->name('admin.blog.category.create');
            Route::post('store','BlogController@categoryStore')->name('admin.blog.category.store');
            Route::get('delete/{id}','BlogController@categoryDelete')->name('admin.blog.category.delete');
            Route::get('{id}/edit','BlogController@categoryEdit')->name('admin.blog.category.edit');
            Route::put('{id}/update','BlogController@categoryUpdate')->name('admin.blog.category.update');
            Route::get('trash','BlogController@categoryTrash')->name('admin.blog.category.trash');
            Route::get('{id}/restore','BlogController@categoryRestore')->name('admin.blog.category.restore');
            Route::get('{id}/forcedelete','BlogController@categoryForceDelete')->name('admin.blog.category.forcedelete');
        });
        //For blog
        Route::get('index','BlogController@index')->name('admin.blog.index');
        Route::get('create','BlogController@create')->name('admin.blog.create');
        Route::post('store','BlogController@store')->name('admin.blog.store');
        Route::get('delete/{id}','BlogController@delete')->name('admin.blog.delete');
        Route::get('{id}/edit','BlogController@edit')->name('admin.blog.edit');
        Route::put('{id}/update','BlogController@update')->name('admin.blog.update');
        Route::get('trash','BlogController@trashIndex')->name('admin.blog.trash.index');
        Route::get('{id}/restore','BlogController@restore')->name('admin.blog.trash.restore');
        Route::get('{id}/forcedelete','BlogController@forceDelete')->name('admin.blog.trash.delete');
    });
    //For Partner Panel
    Route::prefix('partner')->group(function (){
        Route::get('index','PartnerController@index')->name('admin.partner.index');
        Route::get('create','PartnerController@create')->name('admin.partner.create');
        Route::post('store','PartnerController@store')->name('admin.partner.store');
        Route::get('delete/{id}','PartnerController@delete')->name('admin.partner.delete');
        Route::get('{id}/edit','PartnerController@edit')->name('admin.partner.edit');
        Route::put('{id}/update','PartnerController@update')->name('admin.partner.update');
        Route::get('trash','PartnerController@trashIndex')->name('admin.partner.trash.index');
        Route::get('{id}/restore','PartnerController@restore')->name('admin.partner.trash.restore');
        Route::get('{id}/forcedelete','PartnerController@forceDelete')->name('admin.partner.trash.delete');
    });
    //For SOE Team
    Route::prefix('team')->group(function (){
        //For SOE team Panel Name
        Route::prefix('panel-name')->group(function (){
            Route::get('index','TeamPanelNameController@index')->name('admin.team.panel.index');
            Route::get('create','TeamPanelNameController@create')->name('admin.team.panel.create');
            Route::post('store','TeamPanelNameController@store')->name('admin.team.panel.store');
            Route::get('delete/{id}','TeamPanelNameController@delete')->name('admin.team.panel.delete');
            Route::get('{id}/edit','TeamPanelNameController@edit')->name('admin.team.panel.edit');
            Route::put('{id}/update','TeamPanelNameController@update')->name('admin.team.panel.update');
            Route::get('trash','TeamPanelNameController@trashIndex')->name('admin.team.panel.trash');
            Route::get('{id}/restore','TeamPanelNameController@restore')->name('admin.team.panel.restore');
            Route::get('{id}/forcedelete','TeamPanelNameController@forceDelete')->name('admin.team.panel.delete');
        });
        //For SOE TEAM
        Route::get('index','TeamController@index')->name('admin.team.index');
        Route::get('create','TeamController@create')->name('admin.team.create');
        Route::post('store','TeamController@store')->name('admin.team.store');
        Route::get('delete/{id}','TeamController@delete')->name('admin.team.delete');
        Route::get('{id}/edit','TeamController@edit')->name('admin.team.edit');
        Route::put('{id}/update','TeamController@update')->name('admin.team.update');
        Route::get('trash','TeamController@trashIndex')->name('admin.team.trash.index');
        Route::get('{id}/restore','TeamController@restore')->name('admin.team.trash.restore');
        Route::get('{id}/forcedelete','TeamController@forceDelete')->name('admin.team.trash.delete');
    });
    //Admin Login
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

});

