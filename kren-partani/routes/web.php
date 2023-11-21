<?php
use App\Models\Barang;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PenjualanTiketController;
use App\Http\Controllers\GaleriUserController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\EtiketController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtikelUserController;
use App\Http\Controllers\DataPengunjungController;
use App\Http\Controllers\DetailMenuController;


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

// Route::get('/', function () {
//     return view('user.home');
// });

//mesan barang




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ArtikelUserController::class, 'indexhome'])->name('artikel');

Auth::routes();

Route::get('/list-menu', [MenuController::class, 'menuUser'])->name('product.menu');


Route::get('/list-menu', [MenuController::class, 'menuUser'])->name('product.menu');

Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index']);

Route::post('pesan-process/{id}', [App\Http\Controllers\PesanController::class, 'pesan']);

Route::get('checkout', [App\Http\Controllers\PesanController::class, 'check_out']);

Route::delete('check-out/{id}', [App\Http\Controllers\PesanController::class, 'delete']);

Route::get('konfirmasi-check-out', [App\Http\Controllers\PesanController::class, 'konfirmasi']);


Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);

Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update']);

Route::get('pesanan', [App\Http\Controllers\HistoryController::class, 'index'])->name('history.detail');

Route::get('pesanan/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);

// Route::get('/contact', [HomeController::class, 'contact'])->name('reservation');

// Route::post('/reservation', [HomeController::class, 'reservation']);

Route::get('/upload/{id}', [HomeController::class, 'upload'])->name('upload');
Route::get('/edit-upload/{id}', [HomeController::class, 'Editupload'])->name('upload');
Route::post('/edit-upload-process/{id}', [HomeController::class, 'Edituploadprocess'])->name('upload');

Route::post('/upload-process/{id}', [HomeController::class, 'uploadProcess'])->name('upload.process');

Route::get('/aboutususer', [AboutUsController::class, 'indexuser']);

Route::get('/detailbandrek', function () {
    return view('user.detailmenu.bandrek');
});

// Route::get('/hubungi-kami', [HomeController::class, 'contactus'])->name('contactus');
// Route::post('/hubungi-kami', [HomeController::class, 'contactUsProcess'])->name('contactus.process');

Route::get('/history', [HistoryController::class, 'history'])->name('history');
Route::get('/history/{id}', [HistoryController::class, 'historyDetail'])->name('history');
// Route::get('/aboutususer', [AboutUsController::class, 'slideSatu']);
// Route::get('/aboutususer', [AboutUsController::class, 'slideSatu']);
// Route::get('/review', [ReviewController::class, 'index'])->name('review');
// Route::get('/berikan-ulasan/{id}', [ReviewController::class, 'store']);
// Route::post('/berikan-ulasan-process/{id}', [ReviewController::class, 'mendapatkan']);
// Route::post('/berikan-ulasan-process/{id}', [ReviewController::class, 'storeProcess']);

// Route::get('/image', [GalleryController::class, 'userGallery'])->name('user.gallery');

//E-tiket print

Route::get('/e-tiket', [EtiketController::class, 'downloadpdf'])->name('confirm.photo');


// For Admin
Route::get('/user-role', [HomeController::class, 'userManagement'])->name('user.role');

Route::get('/delete-role/{id}', [HomeController::class, 'delete'])->name('delete.user');

Route::get('/trash', [HomeController::class, 'trash'])->name('trash.user');

Route::get('/restore/{id}', [HomeController::class, 'restoreUser'])->name('restore.user');

Route::get('/restore-all', [HomeController::class, 'restoreAll'])->name('restore.all.user');

Route::get('/delete-role/{id}', [HomeController::class, 'delete'])->name('delete.user');

Route::get('/trash', [HomeController::class, 'trash'])->name('trash.user');

Route::get('/restore/{id}', [HomeController::class, 'restore'])->name('restore.user');

Route::get('/restore-all', [HomeController::class, 'restoreAll'])->name('restore.all.user');

//galeri admin
//gambar (blog)
Route::get('/show-galeri', [GaleriController::class, 'index'])->name('show-galeri');
Route::get('/add-galeri', [GaleriController::class, 'create'])->name('add-artikel');
Route::post('/store-galeri', [GaleriController::class, 'store'])->name('store-galeri');
Route::delete('delete-galeri/{id_galeri}', [GaleriController::class, 'destroy']);
Route::get('/edit-galeri/{id_galeri}', [GaleriController::class, 'edit']);
Route::post('/edit-galeri/{id_galeri}', [GaleriController::class, 'update']);
Route::get('/detail-galeri/{id_galeri}', [GaleriController::class, 'show']);

//galeri user 
Route::get('/user-galeri', [GaleriUserController::class, 'index'])->name('user.galeri');
Route::get('/user-detail-galeri/{id_galeri}', [GaleriUserController::class, 'show']);


// Restore for admin Tiket
// Route::get('/detail-kamar/{id}', [MenuController::class, 'lihatKamar'])->name('lihat.kamar');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/add-menu', [MenuController::class, 'menu'])->name('add.menu');
Route::post('/add-menu-process', [MenuController::class, 'store'])->name('add.menu.process');
Route::get('/edit-menu', [MenuController::class, 'getUpdate'])->name('edit.menu');
Route::get('/edit-menu/{id}', [MenuController::class, 'getUpdate'])->name('edit.menu');
Route::post('/edit-menu-process/{id}', [MenuController::class, 'update'])->name('edit.menu.process');

//detail kamar 
Route::get('/detail-kamar-user/{id}', [MenuController::class, 'show'])->name('lihat.kamar');

//Restore for admin Kamar
Route::get('/show-kamar', [KamarController::class, 'index'])->name('show-kamar');
Route::get('/add-kamar', [KamarController::class, 'create'])->name('add-kamar');
Route::post('/store-kamar', [KamarController::class, 'store'])->name('store-kamar');
Route::delete('delete-kamar/{id_kamar}', [KamarController::class, 'destroy']);
Route::get('/edit-kamar/{id_kamar}', [KamarController::class, 'edit']);
Route::post('/edit-kamar/{id_kamar}', [KamarController::class, 'update']);
Route::get('/detail-kamar/{id_kamar}', [KamarController::class, 'show']);

//Data Pengunjung
Route::get('/show-datapengunjung', [DataPengunjungController::class, 'index'])->name('show-datapengunjung');
Route::get('/add-datapengunjung', [DataPengunjungController::class, 'create'])->name('add-datapengunjung');
Route::post('/store-datapengunjung', [DataPengunjungController::class, 'store'])->name('store-datapengunjung');
Route::delete('delete-datapengunjung/{id_data}', [DataPengunjungController::class, 'destroy']);
Route::get('/edit-datapengunjung/{id_data}', [DataPengunjungController::class, 'edit']);
Route::post('/edit-datapengunjung/{id_data}', [DataPengunjungController::class, 'update']);

//about us
Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('delete');
// Route::get('/aboutus', [AboutUsController::class, 'home'])->name('aboutus');
// Route::get('/addaboutus', [AboutUsController::class, 'create']);
// Route::post('/add-aboutus-process', [AboutUsController::class, 'store'])->name('add.aboutus.process');
// Route::delete('/delete/{id}', [AboutUsController::class, 'destroy'])->name('delete');
// Route::get('/edit-aboutus/{id}', [AboutUsController::class, 'edit'])->name('edit.aboutus');
// Route::post('/edit-aboutus-process/{id}', [AboutUsController::class, 'update'])->name('edit.aboutus.process');

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// Route::get('/viewagen', [HomeController::class, 'viewagen']);

// Route::post('/uploadagen', [HomeController::class, 'uploadagen']);

// Route::get('/updateagen/{id}', [HomeController::class, 'updateagen']);

// Route::post('/editagen/{id}', [HomeController::class, 'editagen']);

// Route::get('/addagen', [HomeController::class, 'addagen']);

// Route::get("/deleteagen/{id}", [HomeController::class, "deleteagen"]);

// Route::get('/viewreservation', [HomeController::class, 'viewreservation']);

//Galery
// Route::get('/gallerys', [GalleryController::class, 'home'])->name('gallerys');
// Route::get('/add-gallery', [GalleryController::class, 'getStore'])->name('add.gallery');
// Route::post('/add-gallery-process', [GalleryController::class, 'store'])->name('add.gallery.process');
// Route::get('/update-gallery/{id}', [GalleryController::class, 'getUpdate']);
// Route::post('/update-gallery-process/{id}', [GalleryController::class, 'getUpdateProcess']);
// Route::get('/delete-gallery/{id}', [GalleryController::class, 'deleteGallery']);



//artikel
Route::get('/add-artikel', [ArtikelController::class, 'create'])->name('add-artikel');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/show-artikel', [ArtikelController::class, 'index'])->name('show-artikel');
Route::get('/detail-artikel/{id_artikel}', [ArtikelController::class, 'show']);
Route::get('/add-artikel/{id_artikel}/edit', [ArtikelController::class, 'edit']);
Route::put('/add-artikel/{id_artikel}', [ArtikelController::class, 'update']);
Route::delete('delete-produk/{id_artikel}', [ArtikelController::class, 'destroy']);


//artikel -user
Route::get('/user-artikel', [ArtikelUserController::class, 'index'])->name('user.artikel');
Route::get('/user-detail-artikel/{id_artikel}', [ArtikelUserController::class, 'show']);



//penjualan tiket
Route::get('/penjualan-tiket', [PenjualanTiketController::class, 'indexpenjualan'])->name('penjualan.tiket');

//print pdf
Route::get('/download-pdf/{id}', [PesanController::class, 'downloadPDF'])->name('invoice');
// Route::get('/view-transaction/{id}', 'App\Http\Controllers\TransactionController@viewTransaksi');



Route::get('/order-details', [PesanController::class, 'orderDetails'])->name('oder.deatail');
Route::get('/order-details/{id}', [PesanController::class, 'detail'])->name('order.detail');

Route::get('/confirm-order-process/{id}', [PesanController::class, 'confirmOrdersProcess'])->name('oder.confirm.process');
Route::get('/reject-order-process/{id}', [PesanController::class, 'rejectOrderProcess'])->name('order.reject.process');

Route::get('/order-finish', [PesanController::class, 'orderResult'])->name('oder.finish');
Route::get('/order-finish/{id}', [PesanController::class, 'orderResultUpload'])->name('oder.finish.upload');
Route::get('/result-file/{id}', [PesanController::class, 'resultFile'])->name('result.file');
// Route::post('/confirm-order/{id}', [PesanController::class, 'confirmOrders'])->name('confirm.order');
Route::get('/profile-admin', [ProfileController::class, 'profileAdmin'])->name('profile.admin');

Route::get('/setting', [ProfileController::class, 'setting'])->name('setting.admin');

Route::post('/setting-process', [ProfileController::class, 'updateProfileAdmin'])->name('setting.process');

// Route::get('/contact-us', [HomeController::class, 'contactUsAdmin'])->name('contact.us');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/add-admin', [AdminController::class, 'store'])->name('add.admin');
Route::post('/add-admin-process', [AdminController::class, 'storeProcess'])->name('add.admin.process');
Route::get('/edit-admin/{id}', [AdminController::class, 'edit'])->name('edit.admin');
Route::post('/edit-admin-process/{id}', [AdminController::class, 'editProcess'])->name('edit.admin.process');

Route::get('/confirm-photo', [PesanController::class, 'confirmPhoto'])->name('confirm.photo');
Route::post('/confirm-photo-process/{id}', [PesanController::class, 'confirmPhotoProcess'])->name('confirm.photo.process');
Route::get('/tracking', [PesanController::class, 'tracking'])->name('order.tracking');
Route::get('/form-tracking/{id}', [PesanController::class, 'formTracking']);
Route::post('/form-tracking-process/{id}', [PesanController::class, 'formTrackingProcess']);

// Route::get('/reviews-admin/', [ReviewController::class, 'reviewAdmin'])->name('reviews.admin');
// Route::delete('/delete-review-admin/{id}', [ReviewController::class, 'deleteReviewAdmin'])->name('delete');
