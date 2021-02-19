<?php

use Illuminate\Database\Seeder;

class GeoFencingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('geo_fencings')->truncate();
        DB::table('geo_fencings')->insert([
            [
                'city_name' => 'main',
                'ranges'    => '[{"lat":"82.321655","lng":"-128.294410"},{"lat":"-62.223478","lng":"-81.185035"},{"lat":"-40.374278","lng":"94.596215"},{"lat":"-42.999127","lng":"155.592309"},{"lat":"29.005134","lng":"154.713403"},{"lat":"73.851386","lng":"-175.931129"},{"lat":"80.775926","lng":"134.674340"},{"lat":"82.908779","lng":"39.752465"},{"lat":"83.037797","lng":"-53.763160"}]',
            ],
        ]);

        DB::table('service_types_geo_fencings')->truncate();
        DB::table('service_types_geo_fencings')->insert([
            [
                'service_type_id'                     => 1,
                'geo_fencing_id'                      => 1,
                'fixed'                               => 20,
                'price'                               => 10,
                'status'                              => 1,
                'minute'                              => 0,
                'hour'                                => 0,
                'distance'                            => 1,
                'old_ranges_priceold_ranges_price'    => 0,
                'non_geo_price'                       => 0,
                'city_limits'                         => 0,
                'created_at'                          => Carbon::now(),
                'updated_at'                          => Carbon::now(),
            ],
            [
                'service_type_id'                     => 2,
                'geo_fencing_id'                      => 1,
                'fixed'                               => 20,
                'price'                               => 10,
                'status'                              => 1,
                'minute'                              => 0,
                'hour'                                => 0,
                'distance'                            => 1,
                'old_ranges_priceold_ranges_price'    => 0,
                'non_geo_price'                       => 0,
                'city_limits'                         => 0,
                'created_at'                          => Carbon::now(),
                'updated_at'                          => Carbon::now(),
            ],
            [
                'service_type_id'                     => 3,
                'geo_fencing_id'                      => 1,
                'fixed'                               => 20,
                'price'                               => 10,
                'status'                              => 1,
                'minute'                              => 0,
                'hour'                                => 0,
                'distance'                            => 1,
                'old_ranges_priceold_ranges_price'    => 0,
                'non_geo_price'                       => 0,
                'city_limits'                         => 0,
                'created_at'                          => Carbon::now(),
                'updated_at'                          => Carbon::now(),
            ],
            [
                'service_type_id'                     => 4,
                'geo_fencing_id'                      => 1,
                'fixed'                               => 20,
                'price'                               => 10,
                'status'                              => 1,
                'minute'                              => 0,
                'hour'                                => 0,
                'distance'                            => 1,
                'old_ranges_priceold_ranges_price'    => 0,
                'non_geo_price'                       => 0,
                'city_limits'                         => 0,
                'created_at'                          => Carbon::now(),
                'updated_at'                          => Carbon::now(),
            ],
        ]);
    }
}
