<?php

namespace Database\Seeders;

use App\Models\Award;
use App\Models\Certification;
use App\Models\City;
use App\Models\Clinic;
use App\Models\ClinicDetail;
use App\Models\ClinicPhone;
use App\Models\Complication;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\History;
use App\Models\MedicalDiagnosis;
use App\Models\News;
use App\Models\Patient;
use App\Models\Prevention;
use App\Models\PreventionDescription;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Spread;
use App\Models\SpreadDescription;
use App\Models\SpreadItem;
use App\Models\Symptom;
use App\Models\Town;
use App\Models\Vaccine;
use App\Models\VaccineInformation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * To Run This Command In Testing Database Use This Command
         * Config::set('database.connections.mysql.database', 'monkey_pox_test');
         * */


        Setting::factory()->create();
        Symptom::factory()->create();
        Complication::factory()->create();
        Contact::factory()->create();
        Faq::factory()->create();
        History::factory()->create();
        Slider::factory()->create();

        Vaccine::factory()->create()->each(function ($vaccine) {

            VaccineInformation::factory()->create([
                'vaccine_id' => $vaccine->id
            ]);

        });

        News::factory()->create();

        Prevention::factory()->create()->each(function ($prevention) {

            PreventionDescription::factory()->create([
                'prevention_id' => $prevention->id
            ]);

        });

        Spread::factory()->create()->each(function ($spread) {

            SpreadDescription::factory()->create([
                'spread_id' => $spread->id
            ])->each(function ($spreadDescription) {

                SpreadItem::factory()->create([
                    'spread_description_id' => $spreadDescription->id
                ]);

            });

        });

        Country::factory()->create()->each(function ($country) {

            City::factory()->create([
                'country_id' => $country->id
            ])->each(function ($city) {

                Town::factory()->create([
                   'city_id' => $city->id
                ]);

            });

        });

        Doctor::factory()->create([ 'town_id' => Town::inRandomOrder()->first()->id ])->each(function ($doctor) {

            Award::factory()->create([
                'doctor_id' => $doctor->id
            ]);

            Certification::factory()->create([
                'doctor_id' => $doctor->id
            ]);

        });

        Clinic::factory()->create([
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'town_id' => Town::inRandomOrder()->first()->id
        ])->each(function ($clinic) {

            ClinicDetail::factory()->create([
                'clinic_id' => $clinic->id
            ]);

            ClinicPhone::factory()->create([
                'clinic_id' => $clinic->id
            ]);

        });

        Patient::factory()->create()->each(function ($patient) {

            Diagnosis::factory()->create([
                'patient_id' => $patient->id
            ]);

            MedicalDiagnosis::factory()->create([
                'patient_id' => $patient->id
            ]);
        });

    }
}
