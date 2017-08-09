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

Route::get('/', 'PageController@index')->name('index');

/*
 * EXPLORE
 * This route for the explore any campaign.
 *
 */
Route::get('/explore', 'PageController@explore')
    ->name('explore');

/*
 * CAMPAIGN DETAIL
 *
 * Display a single campaign with the details information
 * about this campaign.
 */
Route::get('campaign/{id}/{slug}', 'PageController@campaign')
    ->name('campaign.detail');


/*
 * USER PROFILE
 *
 * This route is provide for view the profile of a user, it can view by
 * user itself or by the other users.
 *
 * Note: 'u' is the name for user.
 *       '{user}' is the parameter to get the user id or user slug.
 */
Route::get('/u/{user}', function() {
    return 'This User profle view by user itself or by the others user.';
})->name('user.profile');


/*
 * DONATION ADD
 *
 * This route is provide to display donation amount form
 */
Route::get('/campaign/{id}/{slug}/contribute/new', 'DonationController@addNew')
    ->name('donation.new');

/*
 * DONATION PAYMENT
 *
 *  This route provide for select a payment method by user
 */
Route::post('/checkouts/{id}/{slug}/payments/new', 'DonationController@payment')
    ->name('donation.payment');

/*
 * DONATION STORE
 *
 * Storing donation and payment method to the database
 */
Route::post('/checkouts/payments/done', 'DonationController@store')
    ->name('donation.store');

/*
 * DONATION BILLING
 *
 * This route is for display the billing of the payment
 */
Route::get('/checkouts/payments/{id_campaign}/billing/{id_donation}/{slug}', 'DonationController@billing')
    ->name('donation.billing');



/*
|--------------------------------------------------------------------------
| Web Routes Need Login to Access This is for User
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function() {

    /*
     * HOME
     *
     * This route is for user home after login
     * or it can be called as dashboard for user.
     */
    Route::get('/home', 'PageController@home')
        ->name('home');

    /*
     * USER CAMPAIGN NEW
     *
     * This route for the user to create their campaign
     */
    Route::get('campaign/new', 'CampaignController@create')
        ->name('user.campaign.new');

    /*
     * USER CAMPAIGN SAVE
     *
     * This route is for storing data campaign by user to
     * database
     */
    Route::post('campaign/new', 'CampaignController@store')
        ->name('user.campaign.save');

    /*
     * USER CAMPAIGN EDIT
     *
     * This route for edit campaign by the user
     */
    Route::get('campaign/{id}/edit/{slug}', 'CampaignController@edit')
        ->name('user.campaign.edit');

    /*
     * USER CAMPAIGN UPDATE
     *
     * This route for update data campaign by user and
     * put them to database
     */
    Route::put('campaign/{id}/edit/{slug}', 'CampaignController@update')
        ->name('user.campaign.update');

    /*
     * USER SETTING
     *
     * display the view to update user's profile
     */
    Route::get('user/account/settings', 'UserController@userAccount')
        ->name('user.setting');

    /*
     * USER PROFILE SAVE
     *
     * This route for save all settings for user profile
     */
    Route::put('user/account/profile/save', 'UserController@profileSave')
        ->name('user.profile.save');

    /*
     * USER BANK SAVE
     *
     * This route for save user bank data
     */
    Route::put('user/account/bank/save', 'UserController@bankSave')
        ->name('user.bank.save');

    /*
     * USER SECURITY SAVE
     *
     * This route for save for security of user like email or password.
     */
    Route::put('user/account/security/save', 'UserController@securitySave')
        ->name('user.security.save');

    /*
     *
     */
    Route::get('user/campaign/donated', 'UserController@campaignDonated')
        ->name('user.campaign.donated');







//    Route::get('/c/{user}/edit/{campaign}', 'CampaignController@edit')
//        ->name('campaign.edit');
//
//    Route::put('/c/{user}/edit/{campaign}', 'CampaignController@update')
//        ->name('campaign.update');
//
//    Route::get('/c/{user}/view/{campaign}', 'CampaignController@show')
//        ->name('campaign.show');
});


/*
 * ROUTE FOR INTERNAL MANAGEMENT
 *
 * this all og route for admin with the use guard
 * is admin to manage all resources in the web.
 */
Route::group(['prefix' => 'internal'], function () {

    /*
     * ADMIN LOGIN
     *
     * Login action show the login form for administrator.
     */
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')
        ->name('admin.login');

    /*
     * ADMIN LOGIN SUBMIT
     *
     * Login action when user submit the login form.
     */
    Route::post('login', 'Auth\AdminLoginController@login')
        ->name('admin.login.submit');

    /*
     * ADMIN GROUP
     *
     * Use Admin namespaces to access the controller
     * inside the admin directory.
     */
    Route::group(['namespace' => 'Admin'], function() {

        /*
         * ADMIN DASHBOARD
         *
         * Overview all the resources in the dashboard controller
         */
        Route::get('dashboard', 'DashboardController@index')
            ->name('admin.dashboard');


        /*
         * CAMPAIGNS
         *
         * This route group for campaigns in admin section.
         */
        Route::group(['prefix' => 'campaigns'] , function () {

            /*
             * ADMIN CAMPAIGN NEW
             *
             * route for create new resource of the campaign
             */
            Route::get('new', 'CampaignController@create')
                ->name('admin.campaign.new');

            /*
             * ADMIN CAMPAIGN SAVE
             *
             * this action to save of the new one of the campaign
             */
            Route::post('new', 'CampaignController@store')
                ->name('admin.campaign.save');

            /*
             * ADMIN CAMPAIGN EDIT
             *
             * Edit single resource on the campaign controller and get the
             * edit form. to access this route there two parameter.
             * {id} is for the campaign id, and {campaign} for the campaign slug
             */
            Route::get('{id}/edit/{campaign}', 'CampaignController@edit')
                ->name('admin.campaign.edit');

            /*
             * ADMIN CAMPAIGN UPDATE
             *
             * Update the resource in the edit form for the campaign. to update
             * campaign use to parameter. {id} for campaign id and {campaign} for campaign slug
             */
            Route::put('{id}/edit/{campaign}', 'CampaignController@update')
                ->name('admin.campaign.update');

            /*
             * ADMIN CAMPAIGN SHOW
             *
             * Show single resource by two parameters,
             * {id} for campaign id and {campaign} campaign slug.
             */
            Route::get('{id}/show/{campaign}', 'CampaignController@show')
                ->name('admin.campaign.show');

            /*
             * ADMIN CAMPAIGN EDIT LIST
             *
             * Show all resources list and when select a single resource
             * it will direct to edit itself.
             */
            Route::get('edit/list', 'CampaignController@editList')
                ->name('admin.campaign.editList');

            /*
             * ADMIN CAMPAIGN LIST
             *
             * Admin campaign list is show all campaign resources in list.
             */
            Route::get('list', 'CampaignController@index')
                ->name('admin.campaign.list');
        });


        /*
         * BANKS
         *
         * Route group for banks prefixes to manages banks resources.
         */
        Route::group(['prefix' => 'banks'], function() {

            /*
             * ADMIN BANK LIST
             *
             * Route for display all banks list resources.
             */
            Route::get('list', 'BankController@index')
                ->name('admin.bank.list');


            /*
             * ADMIN BANK ADD
             *
             * This route is for add new resources for bank.
             */
            Route::get('add', 'BankController@create')
                ->name('admin.bank.add');

            /*
             * ADMIN BANK STORE
             */
            Route::post('add', 'BankController@store')
                ->name('admin.bank.store');

            /*
             * ADMIN BANK EDIT
             *
             * Display edit form for resource
             */
            Route::get('{id}/edit/{code}', 'BankController@edit')
                ->name('admin.bank.edit');

            /*
             * ADMIN BANK UPDATE
             *
             * This route for storing data to update.
             */
            Route::put('{id}/edit/{code}', 'BankController@update')
            ->name('admin.bank.update');
        });
    });
});



Auth::routes();
