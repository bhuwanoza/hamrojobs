<?php

Route::get('/jobs','Front\JobsController@index')->name('jobs');
Route::get('/jobs/search','Front\JobsController@search')->name('job-search');
Route::post('/jobs','Front\JobsController@jobFilter')->name('job-filter');
Route::post('/jobs/savejob/{id}','Front\JobsController@jobSave')->name('job-save');


Route::get('/jobs/{slug}','Front\JobsController@showJobs')->name('jobs-single');

Route::post('/apply-job/{id}', 'Front\JobsController@applyJob')->name('job-apply');
//
Route::get('/company/','Front\CompaniesController@index')->name('company');
Route::get('/company/{slug}','Front\CompaniesController@showCompany')->name('company.show');

Route::get('/industry/','Front\IndustriesController@index')->name('industry');
Route::get('/industry/{slug}','Front\IndustriesController@showIndustry')->name('industry.show');
//Route::get('/companies/{slug}','Front\JobsController');

Route::get('/404', 'HomeController@pageNotFound');
Route::get('/501', 'HomeController@internalServerError');
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
Route::get('/contact-us', 'HomeController@contactUs')->name('contact-us');
Route::post('/contact-us', 'HomeController@postContactUs')->name('contact-us.save');
Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('privacy-policy');
Route::get('/terms-conditions', 'HomeController@termsConditions')->name('privacy-policy');
Route::get('/payment-methods', 'HomeController@paymentMethods')->name('payment-methods');

Route::get('/suggest-location', 'HomeController@locationSuggest')->name('suggest.location');

Route::resource('/', 'HomeController');


Route::get('/blogs/{slug}','BlogController@show')->name('blog.show');
Route::resource('/blogs','BlogController');

Route::get('download-pdf/{id}','PDFController@downloadCV')->name('download-cv');
Route::get('jobseeker-pdf','PDFController@jobseekerCV')->name('print-cv');
Route::get('job-pdf/{id}','PDFController@jobPDF')->name('print-job');


//Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['employer', 'admin']], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});
Route::get('clear', function (){
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    dd("Done");
});

Route::get('training', function () {
    
    return view('training');
});

Route::prefix('jobseeker')->group(function () {
    Route::group(['middleware' => 'jobseeker'], function () {
        Route::get('/profile/edit', 'Jobseeker\JSProfileController@showEditProfile')->name('userprofile.edit');

        Route::get('/profile/edit-profile', 'Jobseeker\JSProfileController@editProfile')->name('profile.edit-basic');
        Route::post('/profile/update-profile', 'Jobseeker\JSProfileController@updateProfile')->name('profile.update-basic');

        Route::get('/profile/edit-preference', 'Jobseeker\JSProfileController@editPreference')->name('profile.edit-preference');
        Route::post('/profile/update-preference', 'Jobseeker\JSProfileController@updatePreference')->name('profile.update-preference');

        Route::get('/profile/add-education', 'Jobseeker\JSProfileController@addEducation')->name('profile.add-education');
        Route::get('/profile/edit-education/{id}', 'Jobseeker\JSProfileController@editEducation')->name('profile.edit-education');
        Route::post('/profile/save-education', 'Jobseeker\JSProfileController@saveEducation')->name('profile.save-education');
        Route::post('/profile/update-education', 'Jobseeker\JSProfileController@updateEducation')->name('profile.update-education');
        Route::post('/profile/delete-education/{id}', 'Jobseeker\JSProfileController@deleteEducation')->name('profile.delete-education');

        Route::get('/profile/add-experience', 'Jobseeker\JSProfileController@addExperience')->name('profile.add-experience');
        Route::get('/profile/edit-experience/{id}', 'Jobseeker\JSProfileController@editExperience')->name('profile.edit-experience');
        Route::post('/profile/save-experience}', 'Jobseeker\JSProfileController@saveExperience')->name('profile.save-experience');
        Route::post('/profile/update-experience', 'Jobseeker\JSProfileController@updateExperience')->name('profile.update-experience');
        Route::post('/profile/delete-experience/{id}', 'Jobseeker\JSProfileController@deleteExperience')->name('profile.delete-experience');


        Route::get('/profile/add-social', 'Jobseeker\JSProfileController@addSocial')->name('profile.add-social');
        Route::get('/profile/edit-social/{id}', 'Jobseeker\JSProfileController@editSocial')->name('profile.edit-social');
        Route::post('/profile/edit-social', 'Jobseeker\JSProfileController@saveSocial')->name('profile.save-social');
        Route::post('/profile/update-social', 'Jobseeker\JSProfileController@updateSocial')->name('profile.update-social');
        Route::post('/profile/delete-social/{id}', 'Jobseeker\JSProfileController@deleteSocial')->name('profile.delete-social');

        Route::get('profile/saved-jobs','Jobseeker\JSProfileController@savedJobs')->name('profile.saved-jobs');
        Route::resource('/profile', 'Jobseeker\JSProfileController');

        Route::post('/account/change-password', 'Jobseeker\AccountController@changePassword')->name('account.change-password');
        Route::resource('/account', 'Jobseeker\AccountController');

        Route::resource('/applications', 'Jobseeker\ApplicationController');
    });
});

Route::prefix('employer')->group(function () {
    Route::group(['middleware' => 'employer'], function () {
        Route::get('/company-profile/edit', 'Employer\EMPProfileController@editCompanyProfile')->name('company.edit');
        Route::post('/company-profile/edit', 'Employer\EMPProfileController@updateCompanyProfile')->name('company.update');
        Route::post('/company-profile/update-logo', 'Employer\EMPProfileController@updateLogo')->name('company.update-logo');
        Route::post('/company-profile/update-cover', 'Employer\EMPProfileController@updateCover')->name('company.update-cover');
        Route::get('/company-profile/edit-user', 'Employer\EMPProfileController@editUser')->name('company.edit-user');
        Route::post('/company-profile/edit-user', 'Employer\EMPProfileController@updateUser')->name('company.update-user');
        Route::resource('/company-profile', 'Employer\EMPProfileController');

        Route::get('/job-post/json-pendingJobs', 'Employer\PostJobController@pendingJobs')->name('job-post.pending-jobs');
        Route::get('/job-post/json-activeJobs', 'Employer\PostJobController@activeJobs')->name('job-post.active-jobs');
        Route::get('/job-post/json-inactiveJobs', 'Employer\PostJobController@inactiveJobs')->name('job-post.inactive-jobs');
        Route::get('/job-post/json-draftJobs', 'Employer\PostJobController@draftJobs')->name('job-post.draft-jobs');
        Route::get('/job-post/json-expiredJobs', 'Employer\PostJobController@expiredJobs')->name('job-post.expired-jobs');

        Route::get('/job-post/edit-job/{id}', 'Employer\PostJobController@editPostedJob')->name('job-post.editjob');
        Route::post('/job-post/update-job', 'Employer\PostJobController@updatePostedJob')->name('job-post.updatejob');

        Route::get('/manage-jobs', 'Employer\PostJobController@manageJobs')->name('manage-jobs');
        Route::resource('/job-post', 'Employer\PostJobController');
        Route::resource('/job-post/specification', 'Employer\PostJobAdditionalController');


//        Route::resource('application/view','Employer\ApplicationController');
        Route::get('/application/json-jobApplication', 'Employer\ApplicationController@applications')->name('application.json');
        Route::resource('application','Employer\ApplicationController');


    });
});

Route::resource('employer/add-company', 'Employer\CompanyController');

Route::group(['middleware' => 'visitor'], function () {
    Route::get('/register', 'Auth\RegistrationController@register')->name('register');
    Route::post('/register', 'Auth\RegistrationController@postRegister')->name('register.post');

    Route::get('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/login', 'Auth\LoginController@postLogin')->name('login.post');

    Route::get('/forgot-password', 'Auth\ForgotPasswordController@forgotPassword')->name('forgot-password');
    Route::post('/forgot-password', 'Auth\ForgotPasswordController@postForgotPassword')->name('forgot-password.post');

    Route::get('/reset-password/{email}/{resetCode}', 'Auth\ForgotPasswordController@resetPassword');
    Route::post('/reset-password/{email}/{resetCode}', 'Auth\ForgotPasswordController@postResetPassword');

    Route::get('/activate/{email}/{activationCode}', 'Auth\ActivationController@activate');

});

Route::post('/logout', 'Auth\LoginController@logout');

Route::prefix('admin')->group(function () {
    Route::group(['middleware'=>'admin'], function(){

        Route::get('/dashboard/job-json','Admin\AdminController@recentJobsJson')->name('dashboard.recentjson');
        Route::get('/admin-profile','Admin\AdminController@profile')->name('admin.profile');
        Route::post('/admin-profile','Admin\AdminController@postProfile')->name('admin.postprofile');
        Route::post('/admin-update-password','Admin\AdminController@postPasswordChange')->name('admin.updatepassword');
        Route::post('/update-image','Admin\AdminController@updateImage')->name('dashboard.updateimage');

        Route::resource('/dashboard','Admin\AdminController');

        Route::get('/blogposts/blogs-json','Admin\BlogController@blogJson')->name('blogposts.json');
        Route::post('/blogposts/update-blog','Admin\BlogController@updateBlog')->name('blogposts.update.blog');
        Route::post('/blogposts/update-status/{id}','Admin\BlogController@updateStatus')->name('blogposts.status');
        Route::resource('/blogposts','Admin\BlogController');
        Route::get('/blogposts/delete-image/{id}', 'Admin\BlogController@deleteImage')->name('blogposts.delete.image');


        Route::get('/jobapplications/application-json/{id}','Admin\JobApplicationController@applicationJson')->name('jobapplications.json');
        Route::resource('/jobapplications','Admin\JobApplicationController');
        Route::get('/jobapplicationslist/{id}','Admin\JobApplicationController@index')->name('jobapplications.index');
        Route::get('/job-applications', 'Admin\JobApplicationController@jobApplications')->name('job_applications');
        Route::get('/job-applications/json', 'Admin\JobApplicationController@jobApplicationsJson')->name('job_applications.json');
        Route::get('/job-applications/export-to-excel/{id}', 'Admin\JobApplicationController@exportToExcel')->name('export.excel');

        Route::get('/employers/employer-json','Admin\EmployerController@employerJson')->name('employers.json');
        Route::post('/employers/update-employer/','Admin\EmployerController@updateEmployer')->name('employers.update.employer');
        Route::post('/employers/update-status/{id}','Admin\EmployerController@updateStatus')->name('employers.status');
        Route::post('/employers/update-top-employer/{id}','Admin\EmployerController@updateTopEmployer')->name('employers.topemployer');
        Route::resource('/employers','Admin\EmployerController');

        Route::get('/companies/company-json','Admin\CompanyController@companyJson')->name('companies.json');
        Route::post('/companies/update-company/','Admin\CompanyController@updateCompany')->name('companies.update.company');
        Route::post('/companies/update-status/{id}','Admin\CompanyController@updateStatus')->name('companies.status');
        Route::post('/companies/update-top-company/{id}','Admin\CompanyController@updateTopcompany')->name('companies.topcompany');
        Route::resource('/companies','Admin\CompanyController');

        Route::get('/job-posts/jobs-json','Admin\JobPostController@jobsJson')->name('job-posts.json');
        Route::post('/job-posts/update-job/','Admin\JobPostController@updateJob')->name('job-posts.update.job');
        Route::post('/job-posts/update-status/{id}','Admin\JobPostController@updateStatus')->name('job-posts.status');
        Route::resource('/job-posts','Admin\JobPostController');

        Route::get('/jobseekers/jobseeker-json','Admin\JobseekerController@jobSeekerJson')->name('jobseekers.json');
        Route::post('/jobseekers/update-jobseeker/','Admin\JobseekerController@updateJobSeeker')->name('jobseekers.update.jobseeker');
        Route::post('/jobseekers/update-status/{id}','Admin\JobseekerController@updateStatus')->name('jobseekers.status');
        Route::resource('/jobseekers','Admin\JobseekerController');

        Route::get('/industries/industry-json','Admin\IndustryController@industryJson')->name('industries.json');
        Route::post('/industries/update-industry/','Admin\IndustryController@updateIndustry')->name('industries.update.industry');
        Route::post('/industries/update-status/{id}','Admin\IndustryController@updateStatus')->name('industries.status');
        Route::post('/industries/update-top/{id}','Admin\IndustryController@updateTop')->name('industries.top');
        Route::resource('/industries','Admin\IndustryController');

        Route::get('/academics/academic-json','Admin\AcademicController@academicJson')->name('academics.json');
        Route::post('/academics/update-academic/','Admin\AcademicController@updateAcademic')->name('academics.update.academic');
        Route::post('/academics/update-status/{id}','Admin\AcademicController@updateStatus')->name('academics.status');
        Route::resource('/academics','Admin\AcademicController');

        Route::get('/users/user-json','Admin\UsersController@userJson')->name('users.json');
        Route::get('/users/admin-json','Admin\UsersController@adminJson')->name('users.json1');
        Route::get('/users/add-admin','Admin\UsersController@addAdmin')->name('users.addAdmin');
        Route::resource('/users','Admin\UsersController');

        Route::get('/advertise/advertise-json','Admin\AdsController@adsJson')->name('advertise.json');
        Route::post('/advertise/update-advertise/','Admin\AdsController@updateAdvertise')->name('advertise.update.advertise');
        Route::post('/advertise/update-status/{id}','Admin\AdsController@updateStatus')->name('advertise.status');
        Route::resource('/advertise','Admin\AdsController');

        Route::get('/payment/payment-json','Admin\PaymentInfoController@paymentJson')->name('payment.json');
        Route::post('/payment/update-payment/','Admin\PaymentInfoController@updatePayment')->name('payment.update.payment');
        Route::post('/payment/update-status/{id}','Admin\PaymentInfoController@updateStatus')->name('payment.status');
        Route::resource('/payment','Admin\PaymentInfoController');

        Route::get('/testimonial/testimonial-json','Admin\TestimonialController@testimonialJson')->name('testimonial.json');
        Route::post('/testimonial/update-testimonial/','Admin\TestimonialController@updateTestimonial')->name('testimonial.update.testimonial');
        Route::post('/testimonial/update-status/{id}','Admin\TestimonialController@updateStatus')->name('testimonial.status');
        Route::resource('/testimonial','Admin\TestimonialController');


        Route::get('/messages/message-json','Admin\ContactUsController@messageJson')->name('messages.json');
        Route::post('/messages/update-status/{id}','Admin\ContactUsController@updateStatus')->name('messages.status');
        Route::resource('/messages','Admin\ContactUsController');

        Route::get('/settings','Admin\ConfigurationController@index')->name('settings.index');
        Route::post('/settings', 'Admin\ConfigurationController@postConfiguration')->name('settings.update');

        Route::post('/skills/autosuggest','Admin\SkillController@autoSuggest')->name('skills.autosuggest');

        Route::get('/skills/skills-json','Admin\SkillController@skillJson')->name('skills.json');
        Route::post('/skills/update-skills/','Admin\SkillController@updateSkill')->name('skills.update.skill');
        Route::post('/skills/update-status/{id}','Admin\SkillController@updateStatus')->name('skills.status');
        Route::resource('/skills','Admin\SkillController');


    });
});

