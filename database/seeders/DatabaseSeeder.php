<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Field;
use App\Models\Photo;
use App\Models\Booking;
use App\Models\Voucher;
use App\Models\Facility;
use App\Models\ListBooking;
use App\Models\FieldFacility;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password123')
        ]);

        // Create regular users
        User::factory(5)->create([
            'role' => 'penyewa'
        ]);

        // Create facilities
        Facility::factory(3)->create();

        // Create single field with its relations
        $field = Field::factory()->create();

        // Create photos for the field
        Photo::factory(3)->create([
            'id_field' => $field->id
        ]);

        // Assign facilities to the field
        $facilities = Facility::all();
        foreach ($facilities as $facility) {
            FieldFacility::create([
                'id_field' => $field->id,
                'id_facility' => $facility->id
            ]);
        }

        // Create vouchers
        Voucher::factory(2)->create();

        // Create bookings
        $users = User::where('role', 'penyewa')->get();
        $vouchers = Voucher::all();
        $admin = User::where('role', 'admin')->first();

        // Create accepted bookings
        Booking::factory(3)->create([
            'status' => 'accept'
        ])->each(function ($booking) use ($users, $field, $vouchers, $admin) {
            // Assign random user as renter
            $booking->rented_by = $users->random()->id;

            // Random chance to assign voucher
            if (rand(0, 1)) {
                $booking->id_voucher = $vouchers->random()->id;
            }

            // Assign admin as approver
            $booking->approved_by = $admin->id;

            $booking->save();

            // Create list bookings
            ListBooking::factory()->create([
                'id_booking' => $booking->id,
                'id_field' => $field->id,
                'date' => fake()->dateTimeBetween('now', '+1 month')
            ]);
        });

        // Create one pending booking
        Booking::factory()->create([
            'status' => 'pending'
        ])->each(function ($booking) use ($users, $field) {
            $booking->rented_by = $users->random()->id;
            $booking->save();

            ListBooking::factory()->create([
                'id_booking' => $booking->id,
                'id_field' => $field->id,
                'date' => fake()->dateTimeBetween('now', '+1 month')
            ]);
        });
    }
}
