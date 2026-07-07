<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::set('contact_addresses', json_encode([
            ['label' => 'Main Campus', 'address' => 'Mahendra Secondary School Compound, Basantapur, Kathmandu 44600, Bagmati Province, Nepal', 'map' => 'https://maps.google.com/?q=Kathmandu'],
        ]));

        Setting::set('contact_phones', json_encode([
            ['label' => 'General Inquiries', 'number' => '+977-1-42XXXXX'],
            ['label' => 'Admissions Office', 'number' => '+977-1-42XXXXY'],
        ]));

        Setting::set('contact_emails', json_encode([
            ['label' => 'Email Address', 'address' => 'info@mahendraschool.edu.np'],
        ]));

        Setting::set('contact_hours', json_encode([
            ['day' => 'Sunday - Thursday', 'time' => '9:00 AM – 4:30 PM'],
            ['day' => 'Friday', 'time' => '9:00 AM – 2:00 PM'],
            ['day' => 'Saturday', 'time' => 'Closed'],
        ]));

        Faq::insert([
            ['question' => 'What are the admission requirements for Grade 11?', 'answer' => 'Students must have successfully completed SEE with a minimum GPA of 2.0 in core subjects. Additional subject-specific requirements apply for Science stream (minimum B in Science and Math) and Humanities stream. Please visit our admissions office for detailed criteria.', 'sort_order' => 1, 'published' => true],
            ['question' => 'Does the school offer scholarship programs?', 'answer' => 'Yes, Mahendra Secondary School offers merit-based and need-based scholarships for deserving students. Scholarships are awarded based on academic performance, extracurricular achievements, and financial background. Applications for scholarships are accepted during the admission period.', 'sort_order' => 2, 'published' => true],
            ['question' => 'What documents are required for admission?', 'answer' => 'You will need: 1) Completed admission form, 2) Original SEE marksheet and certificate, 3) Character certificate from previous school, 4) Recent passport-size photographs (4 copies), 5) Copy of birth certificate, 6) Transfer certificate (if applicable).', 'sort_order' => 3, 'published' => true],
            ['question' => 'What are the school hours?', 'answer' => 'School hours are from 8:00 AM to 2:30 PM, Sunday through Thursday. Friday hours are 8:00 AM to 12:00 PM. The administrative office is open from 9:00 AM to 4:30 PM Sunday-Thursday and 9:00 AM to 2:00 PM on Fridays.', 'sort_order' => 4, 'published' => true],
            ['question' => 'Does the school provide transportation facilities?', 'answer' => 'Yes, we provide bus transportation for students commuting from various parts of Kathmandu. Bus routes and pickup points are established based on student residential locations. Please contact the administrative office for route details and fees.', 'sort_order' => 5, 'published' => true],
        ]);
    }
}
