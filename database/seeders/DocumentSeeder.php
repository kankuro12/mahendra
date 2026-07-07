<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        Document::create([
            'type' => 'tender',
            'title' => 'Construction of Chemistry Laboratory Block C',
            'description' => 'Construction of a new chemistry laboratory building with modern safety equipment and workstations.',
            'reference' => 'MSS/W/02-2024',
            'deadline' => now()->addMonths(4),
            'published' => true,
            'sort_order' => 1,
        ]);

        Document::create([
            'type' => 'tender',
            'title' => 'Supply & Commissioning of E-Library Server Terminals',
            'description' => 'Supply, delivery, and installation of 20 high-performance computer terminals for the e-library.',
            'reference' => 'MSS/G/05-2024',
            'deadline' => now()->addMonths(5),
            'published' => true,
            'sort_order' => 2,
        ]);

        Document::create([
            'type' => 'download',
            'title' => 'MSS Admission Request Form 2024-25',
            'description' => 'Official admission application form for the academic year 2024-25.',
            'published' => true,
            'sort_order' => 1,
        ]);

        Document::create([
            'type' => 'download',
            'title' => 'Academic Calendar & Holidays Schedule',
            'description' => 'Complete academic calendar including holidays, exam dates, and events.',
            'published' => true,
            'sort_order' => 2,
        ]);

        Document::create([
            'type' => 'download',
            'title' => 'SEE Examination Model Questions 2081',
            'description' => 'Model questions for SEE preparation across all major subjects.',
            'published' => true,
            'sort_order' => 3,
        ]);
    }
}
