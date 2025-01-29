<?php
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use  Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\BusController;

use Symfony\Component\Routing\RouteCompiler;
use App\Http\Controllers\TripsController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->get('/redirect',[AdminController::class,'redirect'])->name('redirect');

//route::get('/redirect',[AdminController::class,'redirect'])->name('redirect');
Route::get('/trips.index', [TripsController::class,'index']);
Route::get('/schedules.index', [SchedulesController::class,'index']);

Route::resource('routes', RouteController::class);
Route::get('/routes/create', [RouteController::class, 'create'])->name('routes.create');
Route::post('/routes', [RouteController::class, 'store'])->name('routes.store');
Route::post('/bus', [BusController::class, 'store'])->name('bus.store');

Route::get('/buses.edit/{id}', [BusController::class, 'editBus'])->name('buses.edit');
Route::post('/buses.edit/{id}', [BusController::class, 'editBusConfirm'])->name('buses.edit_confirm');
Route::post('/trips', [TripsController::class, 'store'])->name('trips.store');

route::get('/book/{id}',[RouteController::class,'book'])->name('book');// Edit user form
Route::get('/routes.edit/{id}', [RouteController::class, 'edit']); // Edit user form
route::post('/routes.edit_confirm/{id}',[RouteController::class,'edit_confirm']);
Route::get('/trips/{trip}/edit', [TripsController::class, 'edit'])->name('trips.edit');
Route::get('/home', [AdminController::class, 'home'])->name('home');
Route::get('/manageroute', [AdminController::class, 'manageroute'])->name('manageroute');
Route::get('/bus', [BusController::class, 'bus'])->name('bus');
Route::delete('/bus/{id}', [BusController::class, 'destroy'])->name('bus.destroy');


Route::put('/trips/{trip}', [TripsController::class, 'update'])->name('trips.update');
Route::get('/scheduleview', [DriverController::class, 'scheduleview'])->name('scheduleview');



//Route::get('/redirect', [AdminController::class, 'redirect'])->name('redirect');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/register-user', [AdminController::class, 'create'])->name('admin.register-user');
    Route::get('/register-user', [AdminController::class, 'create'])->name('admin.register-user');
    Route::get('/illitrate', [TicketController::class, 'illitrate'])->name('illitrate');
    Route::get('/requestrefunds', [TicketController::class, 'requestrefunds']);
    Route::get('/showRefundRequests', [TicketController::class, 'showRefundRequests'])->name('refund.requests');
    Route::post('/refund-requests/handle', [TicketController::class, 'handleRefundRequest'])->name('refund.requests.handle');
    Route::get('/admin.users.index', [AdminController::class, 'getindex'])->name('admin.users.getindex');
    Route::post('/adminstoring', [AdminController::class, 'adminstoring'])->name('adminstoring');
    Route::get('/adminediting/{id}', [AdminController::class, 'adminediting'])->name('adminediting');
    Route::delete('/admindestroying/{id}', [AdminController::class, 'admindestroying'])->name('admindestroying');
    Route::put('/adminupdating/{id}', [AdminController::class, 'adminupdating'])->name('adminupdating');
    Route::get('/users_history', [UserController::class, 'users_history'])->name('users_history');
   
 
Route::post('/user/requestRefund', [PaymentController::class, 'requestRefund'])->name('user.requestRefund');


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Resource Routes
Route::resources([
    'routes' => RouteController::class,
    'trips' => TripsController::class,
    'schedules' => SchedulesController::class,
]);

Route::get('/home', [AdminController::class, 'home'])->name('home');
Route::get('/admincreate', [AdminController::class, 'admincreate']);


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/logout', function () {
    return view('welcome');
})->name('welcome');
Route::middleware(['web'])->group(function () {
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/error', [PaymentController::class, 'error'])->name('payment.error');
});

Route::post('/search-schedule', [AdminController::class, 'search'])->name('schedule.search');
Route::get('/search-schedule', [AdminController::class, 'search'])->name('schedule.search');

Route::get('/reportissues', [DriverController::class, 'reportissues'])->name('reportissues');
Route::post('/reportissuecreate', [DriverController::class, 'reportissuecreate'])
    ->middleware(['web', VerifyCsrfToken::class])
    ->name('reportissuecreate');
Route::get('/issuedisplay', [DriverController::class, 'issuedisplay'])->name('issuedisplay');
Route::get('/test', [AdminController::class, 'test'])->name('test');
Route::get('/dashboardd', [AdminController::class, 'dashboardd'])->name('dashboardd');
Route::get('/driver.report', [DriverController::class, 'report'])->name('report');
Route::get('/feedbackview', [FeedbackController::class, 'showFeedbackView'])->name('feedback.view');

Route::get('/dashboardadmin', [AdminController::class, 'dashboardadmin'])->name('dashboardadmin');
Route::get('/booknow', [UserController::class, 'booknow']);
Route::get('/history', [DriverController::class, 'history']);

// Display the booking page for a specific schedule (GET)
Route::get('/book-now/{schedule}', [TicketController::class, 'showBookingPage'])->name('book.now');

// Handle the booking action (POST)
Route::post('/book-ticket/{schedule}', [TicketController::class, 'bookTicket'])->name('book.ticket');

// Generate QR code for the booked ticket (GET)
Route::get('/generate-qr/{ticketId}', [TicketController::class, 'showQrCode'])->name('generate.qr');

// Show QR code (GET)
Route::get('/qr-code/{ticketId}', [TicketController::class, 'showQrCode'])->name('generate.qr');

// Download the generated QR code (GET)
Route::get('/download-qr/{ticketId}', [TicketController::class, 'downloadQr'])->name('download.qr');

// Optional route for booking a schedule (GET)
Route::get('/schedule/{id}/booknow', [TicketController::class, 'booknow'])->name('booknow');

Route::get("/fff", function() {
    return view("xxx");
});


Route::post('/payment/initialize/{id}', [PaymentController::class, 'initialize'])->name('payment.initialize');
Route::get('/payment/callback/{tx_ref}', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/error', [PaymentController::class, 'error'])->name('payment.error');
Route::get('/account/manage', [AccountController::class, 'manage'])->name('account.manage');

Route::get('/feedback/{scheduleId}', [FeedbackController::class, 'showFeedbackForm'])->name('feedback.form');
Route::post('/feedback/submit', [FeedbackController::class, 'submitFeedback'])->name('feedback.submit');

Route::post('/update-ticket-status/{paymentId}', [PaymentController::class, 'updateTicketStatus'])->name('update.ticket.status');