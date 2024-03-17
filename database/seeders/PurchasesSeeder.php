<?php

namespace Database\Seeders;

use App\Models\Series;
use Carbon\Carbon;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $status = Status::select('id')
            ->where('category', 'purchase')
            ->where('description', 'active')
            ->first()
            ->id;

        $series = Series::where('fiscal', '2024_H1')
            ->where('series', '2024_04')
            ->first();

        $purchases = [
            ['series_id' => $series->id, 'description' => Str::upper('CLEANING MATERIALS'), 'purchase_type_id' => getPurchaseTypeByDescription('Cleaning')->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OFFICE AND CLEANING SUPPLIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('COFFEE, SUGAR, WATER, OTHERS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('SUPPLIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OFFICE AND CLEANING SUPPLIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SOAPS & CLEANING MATERIALS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('SUPPLIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OFFICE AND CLEANING SUPPLIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('DRINKING WATER'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('SUPPLIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OFFICE AND CLEANING SUPPLIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('OFFICE SUPPLIES'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('SUPPLIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OFFICE AND CLEANING SUPPLIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('BREAKTIME PIN'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('SUPPLIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OFFICE AND CLEANING SUPPLIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('LPG '), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('CANTEEN SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('AUTOMATIC DISHWASHING MACHINE'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('CANTEEN SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('EMRO - INNOVA NIE3977'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('EMRO - INNOVA DAN1260'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('EMRO - INNOVA DAN5257'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('EMRO - GRANDIA NAI5292'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRS GRANDIA NCH5899'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRS INNOVA NFV7021'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRS INNOVA NBG6437'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRS ALTIS NAC4286'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('COMPANY VEHICLE MAINTENANCE (AMBULANCE)'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('REPAIR AND MAINTENANCE'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('CAR TRACKER'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TRANSPORTATION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('FLEET CARD'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TRANSPORTATION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('AUTOSWEEP RFID'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TRANSPORTATION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('EASY TRIP CARD'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TRANSPORTATION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMPANY CAR SERVICES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('LTI LOCATOR'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('PEZA DUES'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('COMPANY CAR RENEWAL OF LTO REGISTRATION'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('COMPANY CAR PARKING FEE & OTHERS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('LTI/GREENFIELD/SRE STICKERS OF COMPANY CARS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('TWAIN ELECTRICITY BILLS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('TWAIN WATER BILLS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('TWAIN INTERNET'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('TWAIN LPG'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SHAKESPEARE ELECTRICITY BILLS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SHAKESPEARE  WATER BILLS'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SHAKESPEARE  INTERNET'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SHAKESPEARE  LPG'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('UTILITIES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE UTILITIES'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('ALABANG - BRISTOL - YAMAURA'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('ALABANG - BRISTOL - NISHIYAMA'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('ALABANG - BRISTOL - MUKAI'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('ALABANG - BRISTOL - YAMAMOTO'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('ALABANG -SAN JOSE - D. SATO'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('MAKATI - HIDESHIMA'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('BGC - RED OAK - K. SATO'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('BGC - ASTON-KANEMASA'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('BGC - HASHIMOTO'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRE - SHAKESPEARE - AOKI'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRE - SHAKESPEARE - DIZON'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRE - TWAIN - KAMIYAMA'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRE - BEETHOVEN - KITABAYASHI'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SRE - MONET - YAMADA '), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('VALENZA - AKIHISA'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('131 SHAKESPEARE'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('122 MONET'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('108 CHOPIN'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('105 TWAIN'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('EXPATS HOUSE RENTALS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('VISA'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TAXES AND DUES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('AEP'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TAXES AND DUES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('PASSPORT'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TAXES AND DUES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('E-TICKET'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TAXES AND DUES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('RTPCR BEFORE DEPARTURE'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TAXES AND DUES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('YELLOW CARD'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TAXES AND DUES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('NOTARIAL FEE'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('TAXES AND DUES'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('JAPANESE CHAMBER OF COMMERCE & INDUSTRY'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('DUES AND SUBSCRIPTION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('JAPANESE LEGAL DOCUMENTS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('CANON PHOTOCOPIER'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('RENTAL'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COPIER MACHINE RENTAL'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('JANITORS LABOR COST'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('LABOR EXPENSE'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('SERVICE PERSONNEL LABOR COST'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('MAID\'S LABOR COST '), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('LABOR EXPENSE'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('SERVICE PERSONNEL LABOR COST'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('DRIVER\'S LABOR COST'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('LABOR EXPENSE'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('SERVICE PERSONNEL LABOR COST'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SECURITY LABOR COST'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('LABOR EXPENSE'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('SERVICE PERSONNEL LABOR COST'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('GLOBE POSTPAID PLAN'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('COMMUNICATION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMMUNICATION SERVICE'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('SMART POSTPAID PLAN'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('COMMUNICATION'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('COMMUNICATION SERVICE'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('ALL RISK'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('INSURANCE'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OTHERS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
            ['series_id' => $series->id, 'description' => Str::upper('LAWYER\'S FEE'), 'purchase_type_id' => getPurchaseTypeByDescription(Str::upper('PROFESSIONAL CONSULTING'))->id, 'purchase_category_id' => getPurchaseCategoryByDescription(Str::upper('OTHERS'))->id, 'status_id' => $status, 'dept_id' => getDeptByDescription('General Services')->id, 'created_at' => $date],
        ];

        foreach ($purchases as $purchase) {
            DB::table('purchases')->insert($purchase);
        }
    }
}
