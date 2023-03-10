<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminAwardController;
use App\Http\Controllers\Admin\AdminCertificationController;
use App\Http\Controllers\Admin\AdminCityController;
use App\Http\Controllers\Admin\AdminClinicController;
use App\Http\Controllers\Admin\AdminClinicDetailController;
use App\Http\Controllers\Admin\AdminClinicPhoneController;
use App\Http\Controllers\Admin\AdminComplicationController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminDiagnosisController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHistoryController;
use App\Http\Controllers\Admin\AdminMedicalDiagnosisController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminPreventionController;
use App\Http\Controllers\Admin\AdminPreventionDescriptionController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminSpreadController;
use App\Http\Controllers\Admin\AdminSpreadDescriptionController;
use App\Http\Controllers\Admin\AdminSpreadItemController;
use App\Http\Controllers\Admin\AdminSymptomController;
use App\Http\Controllers\Admin\AdminTownController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminVaccineController;
use App\Http\Controllers\Admin\AdminVaccineInformationController;
use App\Http\Controllers\Admin\Excel\AdminCityExcelController;
use App\Http\Controllers\Admin\Excel\AdminCountryExcelController;
use App\Http\Controllers\Admin\Excel\AdminFaqExcelController;
use App\Http\Controllers\Ai\PatientRadiographyController;
use App\Http\Controllers\EndUser\AboutController;
use App\Http\Controllers\EndUser\ContactController;
use App\Http\Controllers\EndUser\DiagnosisController;
use App\Http\Controllers\EndUser\DoctorController;
use App\Http\Controllers\EndUser\FaqController;
use App\Http\Controllers\EndUser\HistoryController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\NewsController;
use App\Http\Controllers\EndUser\NewsDescriptionController;
use App\Http\Controllers\EndUser\PatientController;
use App\Http\Controllers\EndUser\PreventionController;
use App\Http\Controllers\EndUser\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api', 'prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::post('login', 'login')->name('login');
    });
});

Route::group(['middleware' => ['api', 'jwt.verify'], 'prefix' => 'auth', 'as' => 'auth.'], function () {

    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::controller(AdminUserController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('account', 'account')->name('account');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'history', 'as' => 'history.'], function () {
        Route::controller(AdminHistoryController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::controller(AdminContactController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('delete','delete')->name('delete');
        });
    });

    Route::group(['prefix' => 'medical-diagnosis', 'as' => 'medical-diagnosis.'], function () {
        Route::controller(AdminMedicalDiagnosisController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('delete', 'delete')->name('delete');
        });
    });

    Route::group(['prefix' => 'complication', 'as' => 'complication.'], function () {
        Route::controller(AdminComplicationController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'symptom', 'as' => 'symptom.'], function () {
        Route::controller(AdminSymptomController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::controller(AdminSettingController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::controller(AdminFaqController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });

        Route::controller(AdminFaqExcelController::class)->group(function () {
            Route::post('import','import')->name('import');
            Route::get('export','export')->name('export');
        });

    });

    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::controller(AdminSliderController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });


    Route::group(['prefix' => 'diagnosis', 'as' => 'diagnosis.'], function () {
        Route::controller(AdminDiagnosisController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('delete', 'delete')->name('delete');
        });
    });

    Route::group(['prefix' => 'prevention', 'as' => 'prevention.'], function () {
        Route::controller(AdminPreventionController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'prevention-description', 'as' => 'prevention-description.'], function () {
        Route::controller(AdminPreventionDescriptionController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'spread', 'as' => 'spread.'], function () {
        Route::controller(AdminSpreadController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'spread-description', 'as' => 'spread-description.'], function () {
        Route::controller(AdminSpreadDescriptionController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'spread-description-item', 'as' => 'spread-description-item.'], function () {
        Route::controller(AdminSpreadItemController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
        Route::controller(AdminNewsController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'vaccine', 'as' => 'vaccine.'], function () {
        Route::controller(AdminVaccineController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'vaccine-information', 'as' => 'vaccine-information.'], function () {
        Route::controller(AdminVaccineInformationController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
        Route::controller(AdminCountryController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });

        Route::controller(AdminCountryExcelController::class)->group(function () {
            Route::post('import','import')->name('import');
            Route::get('export','export')->name('export');
        });

    });

    Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
        Route::controller(AdminCityController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });

        Route::controller(AdminCityExcelController::class)->group(function () {
            Route::post('import','import')->name('import');
            Route::get('export','export')->name('export');
        });

    });

    Route::group(['prefix' => 'town', 'as' => 'town.'], function () {
        Route::controller(AdminTownController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::post('create','create')->name('create');
            Route::post('delete','delete')->name('delete');
            Route::post('update','update')->name('update');
        });
    });

    Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function () {
        Route::controller(AdminDoctorController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'certification', 'as' => 'certification.'], function () {
        Route::controller(AdminCertificationController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'award', 'as' => 'award.'], function () {
        Route::controller(AdminAwardController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'clinic', 'as' => 'clinic.'], function () {
        Route::controller(AdminClinicController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'clinic-detail', 'as' => 'clinic-detail.'], function () {
        Route::controller(AdminClinicDetailController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'clinic-phone', 'as' => 'clinic-phone.'], function () {
        Route::controller(AdminClinicPhoneController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('create', 'create')->name('create');
            Route::post('delete', 'delete')->name('delete');
            Route::post('update', 'update')->name('update');
        });
    });

});

Route::group(['prefix' => 'monkey-pox', 'as' => 'user.'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('faq', [FaqController::class, 'index'])->name('faq');
    Route::get('history', [HistoryController::class, 'index'])->name('history');
    Route::get('prevention', [PreventionController::class, 'index'])->name('prevention');
    Route::get('news', [NewsController::class, 'index'])->name('news');
    Route::get('setting', [settingController::class, 'index'])->name('setting');
    Route::get('news-description/{news_id}', [NewsDescriptionController::class, 'index'])->name('news-description');

    Route::group(['prefix' => 'doctor', 'as' => 'doctor.'] , function () {
        Route::controller(DoctorController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('{id}', 'find')->name('find');
            Route::post('apply', 'apply')->name('apply');
        });
    });

    Route::group(['prefix' => 'patient', 'as' => 'patient.'], function () {
        Route::controller(PatientController::class)->group(function () {
            Route::post('login', 'login')->name('login');
            Route::post('register', 'register')->name('register');
        });
    });

    Route::group(['middleware' => ['api', 'patient']], function () {

        Route::group(['prefix' => 'patient', 'as' => 'patient.'], function () {
            Route::controller(PatientController::class)->group(function () {
                Route::post('logout', 'logout')->name('logout');
            });
        });

        Route::group(['prefix' => 'diagnosis', 'as' => 'diagnosis.'], function () {
            Route::controller(DiagnosisController::class)->group(function () {
                Route::post('create', 'create')->name('create');
                Route::get('result', 'result')->name('result');
            });
        });

        Route::group(['prefix' => 'ai', 'as' => 'ai.'], function () {
            Route::controller(PatientRadiographyController::class)->group(function () {
                Route::get('send', 'sendToAi')->name('send');
                Route::post('receive', 'getResultFromAi')->name('receive');
            });
        });

    });

    Route::post('contact', [ContactController::class, 'create'])->name('contact');

    Route::controller(AdminCountryExcelController::class)->group(function () {
        Route::get('country/export','export');
    });

    Route::controller(AdminCityExcelController::class)->group(function () {
        Route::get('city/export','export');
    });

    Route::controller(AdminFaqExcelController::class)->group(function () {
        Route::get('faq/export','export');
    });

});
