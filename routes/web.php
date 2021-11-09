<?php

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/about_us', 'AboutUsController@index')->name('about_us');
Route::get('/careers', 'CareersController@index')->name('careers');
Route::get('/eduedge', 'EduedgeController@index')->name('eduedge');
Route::get('/edupro', 'EduproController@index')->name('edupro');
Route::get('/contact', 'ContactUsController@index')->name('contact');
Route::get('/enquiry', 'EnquiriesController@index')->name('enquiry');
Route::get('enroll/login/{course}', 'EnrollmentController@handleLogin')->name('enroll.handleLogin')->middleware('auth');
Route::get('enroll/{course}', 'EnrollmentController@create')->name('enroll.create');
Route::post('enroll/{course}', 'EnrollmentController@store')->name('enroll.store');
Route::get('my-courses', 'EnrollmentController@myCourses')->name('enroll.myCourses')->middleware('auth');
Route::resource('courses', 'CourseController')->only(['index', 'show']);
Route::resource('blog', 'BlogController')->only(['index', 'show']);
Route::resource('enquiries', 'EnquiriesController');
Route::resource('contacts', 'ContactUsController');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Disciplines
    Route::delete('disciplines/destroy', 'DisciplinesController@massDestroy')->name('disciplines.massDestroy');
    Route::resource('disciplines', 'DisciplinesController');

    // Institutions
    Route::delete('institutions/destroy', 'InstitutionsController@massDestroy')->name('institutions.massDestroy');
    Route::post('institutions/media', 'InstitutionsController@storeMedia')->name('institutions.storeMedia');
    Route::resource('institutions', 'InstitutionsController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::resource('courses', 'CoursesController');

    // Enrollments
    Route::delete('enrollments/destroy', 'EnrollmentsController@massDestroy')->name('enrollments.massDestroy');
    Route::resource('enrollments', 'EnrollmentsController');

    //Enquiries
    Route::delete('enquiries/destroy', 'EnquiriesController@massDestroy')->name('enquiries.massDestroy');
    Route::resource('enquiries', 'EnquiriesController');

    //Slides
    Route::delete('slides/destroy', 'SlidesController@massDestroy')->name('slides.massDestroy');
    Route::post('slides/media', 'SlidesController@storeMedia')->name('slides.storeMedia');
    Route::resource('slides', 'SlidesController');

    //Blog
    Route::delete('blog/destroy', 'BlogController@massDestroy')->name('blog.massDestroy');
    Route::post('blog/media', 'BlogController@storeMedia')->name('blog.storeMedia');
    Route::resource('blog', 'BlogController');

    //About Us
    Route::post('about/media', 'AboutUsController@storeMedia')->name('about.storeMedia');
    Route::resource('about', 'AboutUsController');

    //Core Team
    Route::post('coreteam/media', 'CoreTeamController@storeMedia')->name('coreteam.storeMedia');
    Route::resource('coreteam', 'CoreTeamController');

    //Careers
    Route::post('careers/media', 'CareersController@storeMedia')->name('careers.storeMedia');
    Route::resource('careers', 'CareersController');

    //Contact
    Route::resource('contact', 'ContactController');

    //Edupro
    Route::resource('edupro', 'EduproController');

    //Eduedge
    Route::resource('eduedge', 'EduedgeController');

    //Menus
    Route::delete('menus','MenuController@clear')->name('menus.clear');
    Route::post('menus','MenuController@store')->name('menus.store');    
    Route::resource('menus','MenuController');

    Route::get('clear_cache', function () {

        Artisan::call('storage:link');

        dd("Cache Clear Successfully");
    
    });

    Route::get('/test', function(){
        symlink('/home/domains/techadamie.com/public_html/storage', '/home/domains/techadamie.com/public_html/storage/app/public');
    });
}); 
