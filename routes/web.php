<?php

use App\Exports\PayslipBankExport;
use App\Exports\PayslipMobileExport;
use App\Exports\PayslipNormalExport;
use App\Exports\PayslipsExport;
use App\Exports\PayslipNhimaExport;
use App\Exports\PayslipNapsaExport;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\RepaymentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\MicrosoftAuthController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DatabaseExportController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\PdfMergeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PricingPlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\WazaController;
use App\Http\Controllers\WorkerController;
use App\Mail\WelcomeEmail;

use App\Models\Clearance;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Maatwebsite\Excel\Facades\Excel;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::group(['middleware' => ['role:admin|user']], function () {
//  Route::group(['middleware' => ['isAdmin']], function () {
    Route::middleware(['auth', 'check.active'])->group(function () {
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::get('role/{roleId}/add-permission', [RoleController::class, 'addPermissionToRole']);
    Route::put('role/{roleId}/add-permission', [RoleController::class, 'givePermissionToRole']);
    Route::resource('dashboard', AdminController::class);
    Route::post('/dashboard/logout', [AdminController::class, 'logout'])->name('dashboard.logout');
    Route::resource('setting', SettingController::class);
    Route::resource('about_us', AboutController::class);
        Route::resource('doc', DocController::class);
Route::resource('documents', DocumentController::class);
Route::resource('assign', AssignController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('comments', CommentController::class);
Route::resource('services', ServiceController::class);


Route::resource('clearances', ClearanceController::class);

Route::resource('asset', AssetController::class);




Route::get('/clearances/{slug}/export-to-pdf', [ClearanceController::class, 'exportToPDF'])->name('clearances.exportToPDF');

//  Route::get('/my_documents', [AssignController::class, 'myDocuments'])->name('assign.myDocuments');
    Route::get('/currency_form', [CurrencyController::class, 'showForm'])->name('currency.form');
    Route::post('/currency-process', [CurrencyController::class, 'process'])->name('currencies.process');
    Route::post('/currency/update', [CurrencyController::class, 'update'])->name('currency.update');

    Route::get('/my_documents', [DocumentController::class, 'myDocuments'])->name('documents.my_documents');
Route::resource('background', BackgroundController::class);
Route::resource('menus', MenuController::class);
Route::resource('heros', HeroController::class);
Route::resource('solutions', SolutionController::class);

// Route for Payment Success

Route::get('/pdf/merge', [PdfMergeController::class, 'showForm'])->name('pdf.merge.form');
Route::post('/pdf/merge', [PdfMergeController::class, 'mergePdfs'])->name('pdf.merge');
    Route::post('/run-terminal', [TerminalController::class, 'runCommand'])->name('run.terminal');
    Route::get('/terminal/form', [TerminalController::class, 'showForm'])->name('terminal.form')->middleware(['auth', 'pricing_feature:terminal']);

    // Route::get('/terminal/form', [TerminalController::class, 'showForm'])->name('terminal.form')->middleware(['auth', 'pricing_feature:terminal']);
        Route::get('/terminal/form', [TerminalController::class, 'showForm'])->name('terminal.form');


Route::get('/merge', function () {
    return view('merge');
})->name('merge.form');

    // Route::resource('suppliers',SupplierController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('worker', WorkerController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('leave', LeaveController::class);
    Route::resource('quotations', QuotationController::class);
    Route::resource('repayments', RepaymentController::class);
    Route::resource('articles', ArticleController::class);
    Route::get('/quotations/{slug}/send', [QuotationController::class, 'sendEmail'])->name('quotations.sendEmail');

    Route::resource('client', ClientController::class);
    Route::resource('payslip', PayslipController::class);
    Route::get('/payslip/{slug}/export-to-pdf', [PayslipController::class, 'exportToPDF'])->name('payslip.exportToPDF');
    Route::resource('profit', ProfitController::class);
    Route::resource('programs', ProgramController::class);
    // Route::post('/get-worker', function(Request $request) {
    //     $worker = \App\Models\Worker::with('attendances')
    //         ->where('tracking_code', $request->tracking_code) // <- updated this line
    //         ->where('user_id', auth()->id())
    //         ->first();

    //     return response()->json($worker);
    // })->middleware('auth');


Route::post('/get-worker', function(Request $request) {
    $worker = \App\Models\Worker::with('attendances')
        ->where('tracking_code', $request->tracking_code)
        ->first(); // Removed user_id restriction for non-logged-in users

    return response()->json($worker);
});

Route::get('/test-html-email', function () {
    Mail::to('test@example.com')->send(new WelcomeEmail());
    return 'HTML email sent!';
});

// Route::get('/test-email', function () {
//     Mail::raw('Hello Stephen from Mailpit!', function ($message) {
//         $message->to('test@example.com')
//                 ->subject('Test Email');
//     });

//     return 'Email sent!';
// });


  // Email to Env File
    Route::get('/email-config', function () {
        return view('email-config');
    })->name('email.config');

    Route::post('/email-config', [EmailController::class, 'store'])->name('email.store');
    //  End here



Route::post('/ask', [AIController::class, 'ask']);
Route::get('/ask', [AIController::class, 'showForm']);


    // Route for showing the password form
    Route::get('/accounts/password', [AccountController::class, 'showPasswordForm'])->name('accounts.password');

    // Route for verifying the password
    Route::post('/accounts/verifyPassword', [AccountController::class, 'verifyPassword'])->name('accounts.verifyPassword');

    // Resource route for the accounts (index, show, create, store, etc.)
    Route::resource('accounts', AccountController::class);
        Route::resource('money', MoneyController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('pricingPlan', PricingPlanController::class);
    ROute::resource('cores', CoreController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('waza', WazaController::class);
        Route::put('/loans/{loan}/update-status', [LoanController::class, 'updateStatus'])->name('loans.updateStatus');
    Route::resource('loans', LoanController::class);
        Route::resource('client', ClientController::class);
    Route::post('/client/check-unique', [ClientController::class, 'checkUnique'])->name('client.checkUnique');

    Route::post('/waza/import', [WazaController::class, 'importExcel'])->name('waza.import');
    Route::delete('/waza/bulk-delete', [WazaController::class, 'bulkDelete'])->name('waza.bulkDelete');
    Route::delete('/waza/delete-all', [WazaController::class, 'deleteAll'])->name('waza.deleteAll');

        Route::get('/accounts/password', [AccountController::class, 'showPasswordForm'])->name('accounts.password');

    // Route for verifying the password
    Route::post('/accounts/verifyPassword', [AccountController::class, 'verifyPassword'])->name('accounts.verifyPassword');

    // Resource route for the accounts (index, show, create, store, etc.)
    Route::resource('accounts', AccountController::class);


    Route::get('/waza/delete-test', function () {
        return 'Route works!';
    });

    // Route::put('/pricing-plan/update', [PricingPlanController::class, 'update'])->name('pricingPlan.update');

    // Route::post('/user/update-pricing-plan', [UserController::class, 'updatePricingPlan'])->name('user.updatePricingPlan');


    // Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
    // Route::get('/subscriptions/form', [SubscriptionController::class, 'showForm'])->name('subscriptions.form');
    // Route::post('/subscribe', [SubscriptionController::class, 'processSubscription'])->name('subscriptions.process');
    Route::post('/user/{slug}/update-pricing-plan', [UserController::class, 'updatePricingPlan'])->name('user.updatePricingPlan');


   // Add a custom route for toggling user status
   Route::patch('user/{user}/status', [UserController::class, 'updateStatus'])->name('user.updateStatus');
   Route::post('/user/{slug}/update-pricing-plan', [UserController::class, 'updatePricingPlan'])->name('user.updatePricingPlan');
   Route::resource('user', UserController::class);

   Route::get('/custom-user/{user}/edit', [UserController::class, 'edit'])->name('custom-user.edit');
   Route::put('/custom-user/{user}', [UserController::class, 'update'])->name('custom-user.update');
   Route::get('/user/{slug}/export-to-pdf', [UserController::class, 'user'])->name('user.exportToPDF');

    Route::get('/wallpaper-selection', [WallpaperController::class, 'showWallpaperSelection'])
    ->name('wallpaper.selection'); // Name this route for easier reference

// Route to handle wallpaper update
Route::post('/wallpaper-update', [WallpaperController::class, 'updateWallpaper'])
    ->name('wallpaper.update'); // Name this route for easier reference


    // Route::get('/', [ProgramsController::class, 'index']);
    // Route::get('/get-programs', [ProgramsController::class, 'getPrograms']);
    // Route::post('/add-program', [ProgramsController::class, 'addProgram']);


    Route::controller(NavigateController::class)->group(function () {
        Route::get('/reports/advanced', 'reports')->name('reports.advanced');
        Route::get('/windows/traffic', 'traffic')->name('windows.traffic');
        Route::get('/reports/reported_days', 'days')->name('reports.reported_days');
        Route::get('/reports/days/export/excel', 'exportDaysToExcel')->name('reports.days.exportToExcel');
        Route::get('/windows/no_pricing_plan', 'no_pricing_plan')->name('windows.no_pricing_plan');
        Route::get('/windows/feature_restricted', 'feature_restricted')->name('windows.feature_restricted');
        Route::get('/restricted/contact-admin', 'contact')->name('restricted.contact-admin');
        Route::get('/apps/menu', 'apps')->name('apps.menu');
        Route::get('windows/developer_dashboard', [NavigateController::class, 'developer_dashboard'])->name('windows.developer_dashboard');

    });
    Route::resource('stores', StoreController::class);
    Route::post('/stores/install', [StoreController::class, 'install'])->name('stores.install');

    Route::get('restricted/password', [NavigateController::class, 'showPasswordForm'])->name('restricted.show_password_form');
    Route::post('restricted/password', [NavigateController::class, 'verifyPassword'])->name('restricted.verify_password');
    Route::get('restricted/developer_dashboard', [NavigateController::class, 'developer_dashboard'])->name('restricted.developer_dashboard');

    Route::get('/export-payslips', function () {
        return Excel::download(new PayslipsExport, 'payslips.xlsx');
    })->name('payslip.exportToExcel');

    // Route::get('/reports/days/export/excel', [PayslipController::class, 'exportDaysToExcel'])->name('payslip.days.exportToExcel');
    Route::get('/export-database', [DatabaseExportController::class, 'exportDatabase'])->name('export.database');



    Route::domain('{tenant}.yourapp.com')->middleware('tenant.subdomain')->group(function () {
        Route::get('/', function () {
            return view('tenant.home');
        });
    });


    // Add other routes that need to be tenant-specific
    Route::get('/repayment/{slug}/export-to-pdf', [RepaymentController::class, 'exportToPDF'])->name('repayment.exportToPDF');

    Route::resource('repayments', RepaymentController::class);


    Route::get('/normal_export-payslips', function () {
        return Excel::download(new PayslipNormalExport, 'payslips_normal.xlsx');
    })->name('payslip_normal.exportToExcel');

    Route::get('/bank_export-payslips', function () {
        return Excel::download(new PayslipBankExport, 'payslips_bank.xlsx');
    })->name('payslip_bank.exportToExcel');

    Route::get('/mobile_export-payslips', function () {
        return Excel::download(new PayslipMobileExport, 'payslips_mobile.xlsx');
    })->name('payslip_mobile.exportToExcel');


            Route::get('/nhima_export-payslips', function () {
        return Excel::download(new PayslipNhimaExport, 'payslips_nhima.xlsx');
    })->name('payslip_nhima.exportToExcel');

            Route::get('/napsa_export-payslips', function () {
        return Excel::download(new PayslipNapsaExport, 'payslips_napsa.xlsx');
    })->name('payslip_napsa.exportToExcel');





    Route::put('/quotations/{slug}/approve', [QuotationController::class, 'approve'])->name('quotations.approve');

    Route::post('/quotations/approve-delivery', [QuotationController::class, 'approveDelivery'])->name('quotations.approveDelivery');


    Route::get('/quotation/{slug}/export-to-pdf', [QuotationController::class, 'exportToPDF'])->name('quotation.exportToPDF');
    Route::get('/quotations/{slug}/export-to-pdf', [QuotationController::class, 'invoice'])->name('quotations.exportToPDF');
    Route::get('/receipts/{slug}/export-to-pdf', [QuotationController::class, 'receipts'])->name('receipts.exportToPDF');
    Route::get('/delivery/{slug}/export-to-pdf', [QuotationController::class, 'delivery'])->name('delivery.exportToPDF');

    Route::post('/attendance/clock-in/{worker_id}', [AttendanceController::class, 'clockIn'])->name('attendance.clockIn');
    Route::post('/attendance/clock-out/{worker_id}', [AttendanceController::class, 'clockOut'])->name('attendance.clockOut');
    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::post('/attendance/clock-out/{worker_id}', [AttendanceController::class, 'clockOut'])->name('attendance.clockOut');

    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
 Route::resource('advance', AdvanceController::class);
 Route::resource('details', DetailController::class);
    });
        Route::resource('informations', InformationController::class);



Route::get('oauth/microsoft', [MicrosoftAuthController::class, 'redirectToMicrosoft'])->name('microsoft.login');
Route::get('oauth/microsoft/callback', [MicrosoftAuthController::class, 'handleMicrosoftCallback']);

Route::controller(NavigateController::class)->group(function () {
    Route::get('/restricted/contact-admin', 'contact')->name('restricted.contact-admin');
    Route::get('/windows/payment_done', 'payment_done')->name('windows.payment_done');
    Route::get('/windows/pay_now', 'pay_now')->name('windows.pay_now');
    Route::get('/pages/widget', 'widget')->name('pages.widget');
});
    // None Middleware

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('welcome');

        Route::get('/attendance_register', 'attendance')->name('attendance_register');
        Route::get('/event_register', 'events')->name('event_register');
        Route::get('/our_services', 'services')->name('our_services');
        Route::get('/church_projects', 'projects')->name('church_projects');
        Route::get('/contact-us', 'contact')->name('contact-us');
           Route::get('/my_publications', 'publications')->name('my_publications');
                      Route::get('/book_store', 'book_store')->name('book_store');

    });

    Route::controller(NavigateController::class)->group(function () {
        // Route::get('/', 'index')->name('welcome');

        Route::get('/my_tickets', 'tickets')->name('my_tickets');

    });

    Route::get('doc/public/{doc}', [DocController::class, 'public_show'])->name('doc.public_show');
// Public route for non-authenticated users to view a specific event
Route::get('/store/{service}', [ServiceController::class, 'public_show'])->name('service.public_show');
Route::get('/core/{core}', [CoreController::class, 'public_show'])->name('cores.public_show');

Route::get('/features/{feature}', [FeatureController::class, 'public_show'])->name('features.public_show');
Route::get('/article/{article}', [ArticleController::class, 'public_show'])->name('articles.public_show');

// Route::get('/offers/{offer}', [OfferController::class, 'public_show'])->name('offers.public_show');
// Route::get('/article/{article}', [ArticleController::class, 'public_show'])->name('articles.public_show');


// Public route for non-authenticated users to view a specific event
Route::get('update/public/{update}', [UpdateController::class, 'public_show'])->name('update.public_show');

Route::get('event/public/{event}', [EventController::class, 'public_show'])->name('event.public_show');
Route::get('/client/approved', [ClientController::class, 'approved'])->name('client.approved');

Route::post('/client/{slug}/status', [ClientController::class, 'updateStatus'])->name('client.updateStatus');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
