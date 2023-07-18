<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MvcController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\YouthController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\RenderController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OrgchartController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ContactUsController;
use League\Flysystem\PortableVisibilityGuard;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\CardGenerateController;
use App\Http\Controllers\CommitteeDetailController;
use App\Http\Controllers\ExecutiveDetailController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\UnitCommitteeDetailController;
use App\Http\Controllers\LocalCommitteeDetailController;
use App\Http\Controllers\CampusCommitteeDetailController;
use App\Http\Controllers\CentralCommitteeDetailController;
use App\Http\Controllers\DistrictCommitteeDetailController;
use App\Http\Controllers\MemberInformationController;
use App\Http\Controllers\ProvinceCommitteeDetailController;

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

Route::get('/', [ HomeController::class, 'index'] )->name('home');
Route::get('/single/{slug}', [ SingleController::class, 'index'] );

Route::get('registermember', [ HomeController::class, 'register' ])->name('registermember');

// ROUTE FOR USER INFO STORE

Route::post('infostore', [UserInformationController::class, 'store'])->name('userinfo.store');


// ROUTES FOR ADMIN PANEL

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::as('admin.')->prefix('admin')->group( function () {

        // ROUTE FOR ADMIN INDEX

        Route::get('/', [ AdminController::class, 'index'] )->name('index');
        Route::get('dashboard', [ AdminController::class, 'dashboard'] )->name('dashboard');

        // ROUTE FOR COVER IMAGES

        Route::as('coverimage.')->prefix('coverimage')->group( function () {
            Route::get('index', [ CoverImageController::class, 'index'] )->name('index');
            Route::get('create', [ CoverImageController::class, 'create'] )->name('create');
            Route::post('store', [ CoverImageController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ CoverImageController::class, 'edit'] )->name('edit');
            Route::post('update', [ CoverImageController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ CoverImageController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR COMMITTEE DETAILS

        Route::as('committeedetails.')->prefix('committeedetails')->group( function () {
            Route::get('index', [ CommitteeDetailController::class, 'index'] )->name('index');
            Route::get('edit/{id}', [ CommitteeDetailController::class, 'edit'] )->name('edit');
            Route::get('create', [ CommitteeDetailController::class, 'create'] )->name('create');
            Route::post('store', [ CommitteeDetailController::class, 'store'])->name('store');
            Route::post('update', [ CommitteeDetailController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ CommitteeDetailController::class, 'destroy'] )->name('destroy');
            Route::get('file-import-export', [ CommitteeDetailController::class, 'fileImportExport'] )->name('file');
            Route::post('file-import', [ CommitteeDetailController::class, 'fileImport'] )->name('file-import');
            Route::get('file-export', [ CommitteeDetailController::class, 'fileExport'] )->name('file-export');
        });

        // // ROUTES FOR EXECUTIVE DETAILS

        // Route::as('executivedetails.')->prefix('executivedetails')->group( function () {
        //     Route::get('index', [ ExecutiveDetailController::class, "index"] )->name('index');
        //     Route::get('create', [ ExecutiveDetailController::class, "create"] )->name('create');
        //     Route::post('store', [ ExecutiveDetailController::class, "store"] )->name('store');
        //     Route::get('edit/{id}', [ ExecutiveDetailController::class, 'edit'] )->name('edit');
        //     Route::post('update', [ ExecutiveDetailController::class, 'update'] )->name('update');
        //     Route::get('destroy/{id}', [ ExecutiveDetailController::class, 'destroy'] )->name('destroy');
        //     Route::get("file-import-export-exe", [ ExecutiveDetailController::class, "fileImportExport"] )->name('file');
        //     Route::post("file-import-exe", [ ExecutiveDetailController::class, "fileImport"] )->name("file-import-exe");
        //     Route::get('file-export-exe', [ ExecutiveDetailController::class, "fileExport"] )->name("file-export-exe");
        // });

        // ROUTES FOR CENTRAL COMMITTEE DETAILS

        Route::as('centralcommitteedetails.')->prefix('centralcommitteedetails')->group( function () {
            Route::get('index', [ CentralCommitteeDetailController::class, "index"] )->name('index');
            Route::get('create', [ CentralCommitteeDetailController::class, "create"] )->name('create');
            Route::post('store', [ CentralCommitteeDetailController::class, "store"] )->name('store');
            Route::get('edit/{id}', [ CentralCommitteeDetailController::class, 'edit'] )->name('edit');
            Route::post('update', [ CentralCommitteeDetailController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ CentralCommitteeDetailController::class, 'destroy'] )->name('destroy');
            Route::get("file-import-export-exe", [ CentralCommitteeDetailController::class, "fileImportExport"] )->name('file');
            Route::post("file-import-exe", [ CentralCommitteeDetailController::class, "fileImport"] )->name("file-import-exe");
            Route::get('file-export-exe', [ CentralCommitteeDetailController::class, "fileExport"] )->name("file-export-exe");
        });

        // ROUTES FOR PROVINCE

        Route::as('province.')->prefix('province')->group( function () {
            Route::get('index', [ ProvinceController::class, "index"] )->name("index");
            Route::get('create', [ ProvinceController::class, "create"] )->name("create"); 
            Route::Post('store', [ ProvinceController::class, "store"] )->name("store");
            Route::get('edit/{id}', [ ProvinceController::class, "edit"] )->name("edit");
            Route::Post('update', [ ProvinceController::class, "update"] )->name("update");
            Route::get('destroy/{id}', [ ProvinceController::class, "destroy"] )->name("destroy");
        });

        // ROUTES FOR DISTRICTS

        Route::as('district.')->prefix('district')->group( function () {
            Route::get('index', [ DistrictController::class, "index"] )->name("index");
            Route::get('create', [ DistrictController::class, "create"] )->name("create"); 
            Route::Post('store', [ DistrictController::class, "store"] )->name("store");
            Route::get('edit/{id}', [ DistrictController::class, "edit"] )->name("edit");
            Route::Post('update', [ DistrictController::class, "update"] )->name("update");
            Route::get('destroy/{id}', [ DistrictController::class, "destroy"] )->name("destroy");
        });

        // ROUTES FOR CAMPUS

        Route::as('campus.')->prefix('campus')->group( function () {
            Route::get('index', [ CampusController::class, "index"] )->name("index");
            Route::get('create', [ CampusController::class, "create"] )->name("create"); 
            Route::Post('store', [ CampusController::class, "store"] )->name("store");
            Route::get('edit/{id}', [ CampusController::class, "edit"] )->name("edit");
            Route::Post('update', [ CampusController::class, "update"] )->name("update");
            Route::get('destroy/{id}', [ CampusController::class, "destroy"] )->name("destroy");
        });

        // ROUTES FOR UNIT

        Route::as('unit.')->prefix('unit')->group( function () {
            Route::get('index', [ UnitController::class, "index"] )->name("index");
            Route::get('create', [ UnitController::class, "create"] )->name("create"); 
            Route::Post('store', [ UnitController::class, "store"] )->name("store");
            Route::get('edit/{id}', [ UnitController::class, "edit"] )->name("edit");
            Route::Post('update', [ UnitController::class, "update"] )->name("update");
            Route::get('destroy/{id}', [ UnitController::class, "destroy"] )->name("destroy");
        });

        // ROUTES FOR UNIT

        Route::as('local.')->prefix('local')->group( function () {
            Route::get('index', [ LocalController::class, "index"] )->name("index");
            Route::get('create', [ LocalController::class, "create"] )->name("create"); 
            Route::Post('store', [ LocalController::class, "store"] )->name("store");
            Route::get('edit/{id}', [ LocalController::class, "edit"] )->name("edit");
            Route::Post('update', [ LocalController::class, "update"] )->name("update");
            Route::get('destroy/{id}', [ LocalController::class, "destroy"] )->name("destroy");
        });

        // ROUTES FOR PROVInCE COMMITTEE DETAILS

        Route::as('provincecommitteedetails.')->prefix('provincecommitteedetails')->group( function () {
            Route::get('index', [ ProvinceCommitteeDetailController::class, "index"] )->name('index');
            Route::get('create', [ ProvinceCommitteeDetailController::class, "create"] )->name('create');
            Route::post('store', [ ProvinceCommitteeDetailController::class, "store"] )->name('store');
            Route::get('edit/{id}', [ ProvinceCommitteeDetailController::class, 'edit'] )->name('edit');
            Route::post('update', [ ProvinceCommitteeDetailController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ ProvinceCommitteeDetailController::class, 'destroy'] )->name('destroy');
            Route::get("file-import-export-exe", [ ProvinceCommitteeDetailController::class, "fileImportExport"] )->name('file');
            Route::post("file-import-exe", [ ProvinceCommitteeDetailController::class, "fileImport"] )->name("file-import-exe");
            Route::get('file-export-exe', [ ProvinceCommitteeDetailController::class, "fileExport"] )->name("file-export-exe");
            Route::post('filee-export-exe', [ ProvinceCommitteeDetailController::class, "fileExport"] )->name("filee-export-exe");
        });

        // ROUTES FOR CAMPUS COMMITTEE DETAILS

        Route::as('campuscommitteedetails.')->prefix('campuscommitteedetails')->group( function () {
            Route::get('index', [ CampusCommitteeDetailController::class, "index"] )->name('index');
            Route::get('create', [ CampusCommitteeDetailController::class, "create"] )->name('create');
            Route::post('store', [ CampusCommitteeDetailController::class, "store"] )->name('store');
            Route::get('edit/{id}', [ CampusCommitteeDetailController::class, 'edit'] )->name('edit');
            Route::post('update', [ CampusCommitteeDetailController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ CampusCommitteeDetailController::class, 'destroy'] )->name('destroy');
            Route::get("file-import-export-exe", [ CampusCommitteeDetailController::class, "fileImportExport"] )->name('file');
            Route::post("file-import-exe", [ CampusCommitteeDetailController::class, "fileImport"] )->name("file-import-exe");
            Route::get('file-export-exe', [ CampusCommitteeDetailController::class, "fileExport"] )->name("file-export-exe");
            Route::post('filee-export-exe', [ CampusCommitteeDetailController::class, "fileExport"] )->name("filee-export-exe");
        });

        // ROUTES FOR UNIT COMMITTEE DETAILS

        Route::as('unitcommitteedetails.')->prefix('unitcommitteedetails')->group( function () {
            Route::get('index', [ UnitCommitteeDetailController::class, "index"] )->name('index');
            Route::get('create', [ UnitCommitteeDetailController::class, "create"] )->name('create');
            Route::post('store', [ UnitCommitteeDetailController::class, "store"] )->name('store');
            Route::get('edit/{id}', [ UnitCommitteeDetailController::class, 'edit'] )->name('edit');
            Route::post('update', [ UnitCommitteeDetailController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ UnitCommitteeDetailController::class, 'destroy'] )->name('destroy');
            Route::get("file-import-export-exe", [ UnitCommitteeDetailController::class, "fileImportExport"] )->name('file');
            Route::post("file-import-exe", [ UnitCommitteeDetailController::class, "fileImport"] )->name("file-import-exe");
            Route::get('file-export-exe', [ UnitCommitteeDetailController::class, "fileExport"] )->name("file-export-exe");
            Route::post('filee-export-exe', [ UnitCommitteeDetailController::class, "fileExport"] )->name("filee-export-exe");
        });

        // ROUTES FOR DISTRICT COMMITTEE DETAILS

        Route::as('districtcommitteedetails.')->prefix('districtcommitteedetails')->group( function () {
            Route::get('index', [ DistrictCommitteeDetailController::class, "index"] )->name('index');
            Route::get('create', [ DistrictCommitteeDetailController::class, "create"] )->name('create');
            Route::post('store', [ DistrictCommitteeDetailController::class, "store"] )->name('store');
            Route::get('edit/{id}', [ DistrictCommitteeDetailController::class, 'edit'] )->name('edit');
            Route::post('update', [ DistrictCommitteeDetailController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ DistrictCommitteeDetailController::class, 'destroy'] )->name('destroy');
            Route::get("file-import-export-exe", [ DistrictCommitteeDetailController::class, "fileImportExport"] )->name('file');
            Route::post("file-import-exe", [ DistrictCommitteeDetailController::class, "fileImport"] )->name("file-import-exe");
            Route::get('file-export-exe', [ DistrictCommitteeDetailController::class, "fileExport"] )->name("file-export-exe");
            Route::post('filee-export-exe', [ DistrictCommitteeDetailController::class, "fileExport"] )->name("filee-export-exe");
        });

        // ROUTES FOR LOCAL COMMITTEE DETAILS

        Route::as('localcommitteedetails.')->prefix('localcommitteedetails')->group( function () {
            Route::get('index', [ LocalCommitteeDetailController::class, "index"] )->name('index');
            Route::get('create', [ LocalCommitteeDetailController::class, "create"] )->name('create');
            Route::post('store', [ LocalCommitteeDetailController::class, "store"] )->name('store');
            Route::get('edit/{id}', [ LocalCommitteeDetailController::class, 'edit'] )->name('edit');
            Route::post('update', [ LocalCommitteeDetailController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ LocalCommitteeDetailController::class, 'destroy'] )->name('destroy');
            Route::get("file-import-export-exe", [ LocalCommitteeDetailController::class, "fileImportExport"] )->name('file');
            Route::post("file-import-exe", [ LocalCommitteeDetailController::class, "fileImport"] )->name("file-import-exe");
            Route::get('file-export-exe', [ LocalCommitteeDetailController::class, "fileExport"] )->name("file-export-exe");
            Route::post('filee-export-exe', [ LocalCommitteeDetailController::class, "fileExport"] )->name("filee-export-exe");
        });

        // ROUTES FOR POSTS

        Route::as('posts.')->prefix('posts')->group( function () {
            Route::get('index', [ PostController::class, 'index'] )->name("index");
            Route::get('create', [ PostController::class, 'create'] )->name("create");
            Route::post('store', [ PostController::class, 'store'] )->name("store");
            Route::get('edit/{id}', [ PostController::class, 'edit'] )->name("edit");
            Route::post('update', [ PostController::class, 'update'])->name("update");
            Route::get('destroy/{id}', [ PostController::class, 'destroy'] )->name("destroy");
        });

        // ROUTES FOR ORGCHART 

        Route::as('orgchart.')->prefix('orgchart')->group( function () {
            Route::get('index', [ OrgchartController::class, 'index'] )->name("index");
            Route::get('create', [ OrgchartController::class, 'create'] )->name("create");
            Route::post('store', [ OrgchartController::class, 'store'] )->name("store");
            Route::get('edit/{id}', [ OrgchartController::class, 'edit'] )->name("edit");
            Route::post('update', [ OrgchartController::class, 'update'] )->name("update");
            Route::get('destroy/{id}', [ OrgchartController::class, 'destroy'] )->name("destroy");
        });

        // ROUTES FOR CATEGORIES 

        Route::as('categories.')->prefix('categories')->group( function () {
            Route::get('index', [ CategoryController::class, "index"] )->name("index");
            Route::get('create', [ CategoryController::class, "create"] )->name("create"); 
            Route::Post('store', [ CategoryController::class, "store"] )->name("store");
            Route::get('edit/{id}', [ CategoryController::class, "edit"] )->name("edit");
            Route::Post('update', [ CategoryController::class, "update"] )->name("update");
            Route::get('destroy/{id}', [ CategoryController::class, "destroy"] )->name("destroy");
        });

        // ROUTES FOR USERS 

        Route::as('users.')->prefix('users')->group( function () {
            Route::get('index', [ UserController::class, 'index'] )->name('index');
        });


        // ROUTES FOR TEAM

        Route::as('team.')->prefix('team')->group( function () {
            Route::get('index', [ TeamController::class, 'index'] )->name('index');
            Route::get('create', [ TeamController::class, 'create'] )->name('create');
            Route::post('store', [ TeamController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ TeamController::class, 'edit'] )->name('edit');
            Route::post('update', [ TeamController::class, 'update'] )->name('update');
            Route::get('delete/{id}', [ TeamController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR IMAGE 

        Route::as('image.')->prefix('image')->group( function () {
            Route::get('image', [ ImageController::class, 'index'] );
            Route::get('index', [ ImageController::class, 'index'] )->name('index');
            Route::get('create', [ ImageController::class, 'create'] )->name('create');
            Route::post('store', [ ImageController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ ImageController::class, 'edit'] )->name('edit');
            Route::post('update', [ ImageController::class, 'update'] )->name('update');
            Route::get('delete/{id}', [ ImageController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR DOCUMENTS 

        Route::as('documents.')->prefix('documents')->group( function () {
            Route::get('index', [ DocumentController::class, 'index'] )->name('index');
            Route::get('create', [ DocumentController::class, 'create'] )->name('create');
            Route::post('store', [ DocumentController::class, 'store'] )->name("store");
            Route::post('update', [ DocumentController::class, 'update'] )->name("update");
            Route::get('edit/{id}', [ DocumentController::class, 'edit'] )->name("edit");
            Route::get('destroy/{id}', [ DocumentController::class, 'destroy'] )->name("destroy");
        });

        // ROUTES FOR INFORMATION 

        Route::as('information.')->prefix('information')->group( function () {
            Route::get('index', [ InformationController::class, 'index'] )->name('index');
            Route::get('create', [ InformationController::class, 'create'] )->name('create');
            Route::post('store', [ InformationController::class, 'store'] )->name('store');
            Route::post('update', [ InformationController::class, 'update'] )->name('update');
            Route::get('edit/{id}', [ InformationController::class, 'edit'] )->name('edit');
            Route::get('destroy/{id}', [ InformationController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR SITESETTINGS 

        Route::as('sitesetting.')->prefix('sitesetting')->group( function () {
            Route::get('sitesetting', [ SiteSettingController::class, 'index'] );
            Route::get('index', [ SiteSettingController::class, 'index'] )->name('index');
            Route::get('create', [ SiteSettingController::class, 'create'] )->name('create');
            Route::post('store', [ SiteSettingController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ SiteSettingController::class, 'edit'] )->name('edit');
            Route::post('update', [ SiteSettingController::class, 'update'] )->name('update');
            Route::get('delete/{id}', [ SiteSettingController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR ABOUT 

        Route::as('about.')->prefix('about')->group( function () {
            Route::get('about', [ AboutController::class, 'index'] );
            Route::get('index', [ AboutController::class, 'index'] )->name('index');
            Route::get('create', [ AboutController::class, 'create'] )->name('create');
            Route::post('store', [ AboutController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ AboutController::class, 'edit'] )->name('edit');
            Route::post('update', [ AboutController::class, 'update'] )->name('update');
            Route::get('delete/{id}', [ AboutController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR MVC 

        Route::as('mvc.')->prefix('mvc')->group( function () {
            Route::get('mvc', [ MvcController::class, 'index'] );
            Route::get('index', [ MvcController::class, 'index'] )->name('index');
            Route::get('create', [ MvcController::class, 'create'] )->name('create');
            Route::post('store', [ MvcController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ MvcController::class, 'edit'] )->name('edit');
            Route::post('admin/mvc/update', [ MvcController::class, 'update'] )->name('update');
            Route::get('delete/{id}', [ MvcController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR LINK 

        Route::as('link.')->prefix('link')->group( function () {
            Route::get('link', [ LinkController::class, 'index'] );
            Route::get('index', [ LinkController::class, 'index'] )->name("index");
            Route::get('create', [ LinkController::class, 'create'] )->name('create');
            Route::post('store', [ LinkController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ LinkController::class, 'edit'] )->name('edit');
            Route::post('update', [ LinkController::class, 'update'] )->name('update');
            Route::get('delete/{id}', [ LinkController::class, 'destroy'] )->name('delete');
        });

        // ROUTES FOR VIDEO 

        Route::as('video.')->prefix('video')->group( function () {
            Route::get('video', [ VideoController::class, 'index'] );
            Route::get('index', [ VideoController::class, 'index'] )->name('index');
            Route::get('create', [ VideoController::class, 'create'] )->name('create');
            Route::post('store', [ VideoController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ VideoController::class, 'edit'] )->name('edit');
            Route::post('update', [ VideoController::class, 'update'] )->name('update');
            Route::get('delete/{id}', [ VideoController::class, 'destroy'] )->name('destroy');
        });

        // ROUTES FOR YOUTH 
 
        Route::as('youth.')->prefix('youth')->group( function () {
            Route::get('index', [ YouthController::class, "index"] )->name('index');
            Route::get('create', [ YouthController::class, "create"] )->name('create');
            Route::post('store', [ YouthController::class, "store"] )->name('store');
            Route::post('update', [ YouthController::class, "update"] )->name('update');
            Route::get('edit/{id}', [ YouthController::class, "edit"])->name('edit');
            Route::get('destroy/{id}', [ YouthController::class, "destroy"] )->name('destroy');
        });

        // ROUTES FOR MESSAGE 

        Route::as('message.')->prefix('message')->group( function () {
            Route::get('index', [ MessageController::class, 'index'] )->name('index');
            Route::get('create', [ MessageController::class, 'create'] )->name('create');
            Route::post('store', [ MessageController::class, 'store'] )->name('store');
            Route::get('edit/{id}', [ MessageController::class, 'edit'] )->name('edit');
            Route::post('update', [ MessageController::class, 'update'] )->name('update');
            Route::get('destroy/{id}', [ MessageController::class, 'destroy'] )->name('destroy');
            Route::get('show/{id}', [ MessageController::class, 'show'] )->name('show');
        });

        // ROUTES FOR CONTACTUS 

        Route::as('contactus.')->prefix('contactus')->group( function () {
            Route::get('index', [ ContactUsController::class, 'index'] )->name('index');
            Route::post('store', [ ContactUsController::class, 'store'] )->name('store');
            Route::get('destroy/{id}', [ ContactUsController::class, 'destroy'] )->name('destroy');
            Route::get('show/{id}', [ ContactUsController::class, 'show'] )->name('show');
        });
        
        // ROUTES FOR MEMBER INFORMATION

        Route::as('memberinfo.')->prefix('memberinfo')->group(function (){
            Route::get('index', [MemberInformationController::class,'index'])->name('index');
            Route::get('create', [MemberInformationController::class,'create'])->name('create');
            // Route::get('edit/{id}', [PersonalInformationController::class,'edit'])->name('edit');
            // Route::post('update', [PersonalInformationController::class,'update'])->name('update');
            Route::get('destroy/{id}', [MemberInformationController::class,'destroy'])->name('destroy');
            Route::get('show/{id}', [MemberInformationController::class,'show'])->name('show');
            Route::post('store', [MemberInformationController::class,'store'])->name('store');
            Route::post('sendemail', [MemberInformationController::class, 'sendEmail'])->name('sendemail');
        });

        // ROUTES FOR USER INFORMATION
        Route::as('userinfo.')->prefix('userinfo')->group(function (){
            Route::get('index', [UserInformationController::class, 'index'])->name('index');
            Route::get('show/{id}', [UserInformationController::class, 'show'])->name('show');
            Route::get('destroy/{id}', [UserInformationController::class, 'destroy'])->name('destroy');
            Route::post('user-accept/{id}', [UserInformationController::class,'acceptuser'])->name('acceptuser');
        });

        //ROUTES FOR CARDS
        Route::as('cardgen.')->prefix('cardgen')->group(function (){
            Route::get('index', [CardGenerateController::class, 'index'])->name('index');
            // Route::get('show/{id}', [UserInformationController::class, 'show'])->name('show');
            // Route::get('destroy/{id}', [UserInformationController::class, 'destroy'])->name('destroy');
        });

    });
});


// ROUTES FOR PORTAL 

Route::get('render_about', [ RenderController::class, 'render_about'])->name('render_about');
Route::get('render_images', [ RenderController::class, 'render_images'])->name('render_images');
Route::get('render_videos', [ RenderController::class, 'render_videos'])->name('render_videos');
Route::get('render_notice', [ RenderController::class, 'render_notice'])->name('render_notice');
Route::get('render_publication', [ RenderController::class, 'render_publication'])->name('render_publication');
Route::get('render_tender', [ RenderController::class, 'render_tender'])->name('render_tender');
Route::get('render_rules', [ RenderController::class, 'render_rules'])->name('render_rules');
Route::get('render_directot', [ RenderController::class, 'render_directot'])->name('render_directot');
Route::get('render_press', [ RenderController::class, 'render_press'])->name('render_press');
Route::get('render_news', [ RenderController::class, 'render_news'])->name('render_news');
Route::get('render_other', [ RenderController::class, 'render_other'])->name('render_other');

Route::get('render_central_members', [ RenderController::class, 'render_central_members'])->name('render_central_members');
Route::get('render_province_members', [ RenderController::class, 'render_province_members'])->name('render_province_members');
Route::get('render_district_members', [ RenderController::class, 'render_district_members'])->name('render_district_members');
Route::get('render_local_members', [ RenderController::class, 'render_local_members'])->name('render_local_members');
Route::get('render_campus_members', [ RenderController::class, 'render_campus_members'])->name('render_campus_members');
Route::get('render_unit_members', [ RenderController::class, 'render_unit_members'])->name('render_unit_members');

Route::get('render_administrative', [ RenderController::class, 'render_administrative'])->name('render_administrative');
Route::get('render_chairperson', [ RenderController::class, 'render_chairperson'])->name('render_chairperson');
Route::get('render_posts/{slug}', [ RenderController::class, 'render_posts'])->name('render_posts');
Route::get('render_all_posts', [ RenderController::class, 'render_all_posts'])->name('render_all_posts');
Route::get('orgnizationchart', [ RenderController::class, 'render_orgchart'])->name('render_orgchart');
Route::get('render_otherpost/{slug}', [ RenderController::class, 'render_otherpost'])->name('render_otherpost');
Route::get('render_otherpost_news/{id}', [ RenderController::class, 'render_otherpost_news'])->name('render_otherpost_news');
Route::get('render_info/{slug}', [ RenderController::class, 'render_info'])->name('render_info');
Route::get('render_other_post', [ RenderController::class, 'render_other_post'])->name('render_other_post');


// For Youth
Route::get('render_youthstats', [ RenderController::class, 'render_youthstats'])->name('render_youthstats');
Route::get('render_youthactivity', [ RenderController::class, 'render_youthactivity'])->name('render_youthactivity');

Route::get('portal/contact_page', [ RenderController::class, 'contact_page'])->name('contact_page');