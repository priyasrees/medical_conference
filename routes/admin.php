<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('admin', 'Admin\LoginController@login')->name('admin.login');
Route::post('admin-post', 'Admin\LoginController@loginPost')->name('admin.login.post');
Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');

    return 'config, cache, and view cleared!';
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function(){
    Route::get('onsite', 'Admin\OnsiteRegisterController@spot_registration')->name('onsite.list');
    Route::get('onsite_registration', 'Admin\OnsiteRegisterController@onsite_registration')->name('admin.spot_register.add');
    Route::post('/onsite-register/store', 'Admin\OnsiteRegisterController@store')
     ->name('admin.onsite.register.store');

    // Razorpay callback/webhook
    Route::post('/onsite/razorpay/success', 'Admin\OnsiteRegisterController@razorpaySuccess')
    ->name('onsite.razorpay.success');


    
    Route::get('attendance', 'Admin\DashboardController@attendance')->name('admin.attendance');
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('profile', 'Admin\DashboardController@profile')->name('admin.profile');
    Route::post('profile-update', 'Admin\DashboardController@profileUpdate')->name('admin.profile.update');
    Route::get('logout', 'Admin\DashboardController@logout')->name('admin.logout');

    Route::get('airs-members', 'Admin\DashboardController@airsMembers')->name('admin.airs.members');
    Route::get('airs-members/detail/{id}', 'Admin\DashboardController@airsMembersDetail')->name('admin.view.airs.members');
    Route::get('airs-members/edit/{id}', 'Admin\DashboardController@airsMembersEdit')->name('admin.edit.airs.members');
    Route::post('members-update', 'Admin\DashboardController@membersUpdate')->name('admin.update.members');
    Route::post('delete-airs-members', 'Admin\DashboardController@airsMembersDelete')->name('admin.delete.airs.members');
    Route::get('airs-members/export', 'Admin\DashboardController@airsMembersExport')->name('admin.eexport.airs.members');
    Route::get('abstract/export', 'Admin\DashboardController@abstractExport')->name('admin.export.abstract');
    Route::get('handstrain/export', 'Admin\DashboardController@handstrainExport')->name('admin.export.handstrain');
    Route::get('airs-members/send_mail/{id}', 'Admin\DashboardController@airsMembersSendMail')->name('admin.airs.members.mail');
    
    Route::get('reg-confiramtion-mail/{id}', 'Admin\DashboardController@confiramtionMail')->name('admin.reg.confiramtion.mail');
    
    
    Route::get('vip-members', 'Admin\DashboardController@vipMembers')->name('admin.vip.members');
    Route::get('vip-members/detail/{id}', 'Admin\DashboardController@vipMembersDetail')->name('admin.view.vip.members');
    Route::get('vip-members/edit/{id}', 'Admin\DashboardController@vipMembersEdit')->name('admin.edit.vip.members');
    Route::post('vip-members-update', 'Admin\DashboardController@vipMembersUpdate')->name('admin.update.vipMembersUpdate');
    Route::post('delete-vip-members', 'Admin\DashboardController@vipMembersDelete')->name('admin.delete.vip.members');
    Route::get('vip-members/export', 'Admin\DashboardController@vipMembersExport')->name('admin.export.vip.members');
    Route::get('resident-package/export', 'Admin\DashboardController@residentPackageExport')->name('admin.export.residentpackage');
    Route::get('gala-dinner/export', 'Admin\DashboardController@galaDinnerExport')->name('admin.export.galaDinner');
    
    
    Route::get('abstract-data', 'Admin\DashboardController@abstractData')->name('admin.abstractdata');
    Route::get('abstract-bckup', 'Admin\DashboardController@abstractBckupData');
    Route::get('abstract-data/detail/{id}', 'Admin\DashboardController@abstractDetail')->name('admin.view.abstractdata');
    

    Route::get('non-members', 'Admin\DashboardController@nonMembers')->name('admin.non.members');
    Route::get('non-members/detail/{id}', 'Admin\DashboardController@nonMembersDetail')->name('admin.view.non.members');
    Route::get('non-members/edit/{id}', 'Admin\DashboardController@nonMembersEdit')->name('admin.edit.non.members');
    Route::post('delete-non-members', 'Admin\DashboardController@nonMembersDelete')->name('admin.delete.non.members');
    Route::get('non-members/export', 'Admin\DashboardController@nonMembersExport')->name('admin.export.non.members');

    Route::get('pg-student', 'Admin\DashboardController@pgStudent')->name('admin.pg.student');
    Route::get('pg-student/detail/{id}', 'Admin\DashboardController@pgStudentDetail')->name('admin.view.pg.student');
    Route::get('pg-student/edit/{id}', 'Admin\DashboardController@pgStudentEdit')->name('admin.edit.pgStudent.members');
    Route::post('delete-pg-student', 'Admin\DashboardController@pgStudentDelete')->name('admin.delete.pg.student');
    Route::get('pg-student/export', 'Admin\DashboardController@pgStudentExport')->name('admin.export.pg.student');


    Route::get('international', 'Admin\DashboardController@international')->name('admin.international');
    Route::get('international/detail/{id}', 'Admin\DashboardController@internationalDetail')->name('admin.view.international');
    Route::get('international/edit/{id}', 'Admin\DashboardController@internationalEdit')->name('admin.edit.international.members');
    Route::post('delete-international', 'Admin\DashboardController@internationalDelete')->name('admin.delete.international');
    Route::get('international/export', 'Admin\DashboardController@internationalExport')->name('admin.export.international');


    Route::get('spouse', 'Admin\DashboardController@spouse')->name('admin.international');
    Route::get('spouse/detail/{id}', 'Admin\DashboardController@spouseDetail')->name('admin.view.spouse');
    Route::get('spouse/edit/{id}', 'Admin\DashboardController@spouseEdit')->name('admin.edit.spouse.members');
    Route::post('delete-spouse', 'Admin\DashboardController@spouseDelete')->name('admin.delete.spouse');
    Route::get('spouse/export', 'Admin\DashboardController@spouseExport')->name('admin.export.spouse');


    Route::get('hands-on-training', 'Admin\DashboardController@handsTraining')->name('admin.hands.training');
    Route::get('hands-on-training/detail/{id}', 'Admin\DashboardController@trainingDetail')->name('admin.view.training');
    Route::get('hands-on-training/edit/{id}', 'Admin\DashboardController@trainingEdit')->name('admin.edit.training.members');
    Route::post('delete-hands-on-training', 'Admin\DashboardController@trainingDelete')->name('admin.delete.training');
    
    Route::get('gala-dinner', 'Admin\DashboardController@galaDinner')->name('admin.gala.dinner');
    Route::get('residential-package', 'Admin\DashboardController@residentialPackage')->name('admin.residential.package');
    Route::get('become-airs-members', 'Admin\DashboardController@becomeAirsMembers')->name('admin.become.members');
    Route::get('resident-rooms', 'Admin\DashboardController@residentRooms')->name('admin.resident.rooms');

    Route::resource('plan', 'Admin\PlanController');
    Route::post('plan/delete-record', 'Admin\PlanController@delete')->name('admin.delete.plan');
    Route::resource('package', 'Admin\PackageController');
    Route::post('package/delete-record', 'Admin\PackageController@delete')->name('admin.delete.package');
    
    Route::resource('dinner', 'Admin\DinnerController');
    Route::post('dinner/delete-record', 'Admin\DinnerController@delete')->name('admin.delete.dinner');
    Route::resource('training', 'Admin\TrainingController');
    Route::post('training/delete-record', 'Admin\TrainingController@delete')->name('admin.delete.training');
    
    
    
    Route::get('payment', 'Admin\DashboardController@payment')->name('admin.payment');
    Route::get('onsite_payment', 'Admin\DashboardController@onsite_payment')->name('admin.onsite_payment');
    
    Route::get('generate-idcard/{id}', 'Admin\DashboardController@generatePDF')->name('admin.idcard');
});