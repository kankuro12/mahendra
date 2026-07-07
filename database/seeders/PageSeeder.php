<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy',
                'published' => true,
                'content' => '<section class="space-y-4"><h2>1. Introduction</h2><p>At Mahendra Secondary School, we value the privacy of our students, parents, staff, and visitors. This Privacy Policy outlines the types of personal data we collect, how we use it, and the security measures we take to protect your information.</p></section><section class="space-y-4"><h2>2. Data We Collect</h2><p>We may collect personal identification information through our student information portal, contact forms, or EMIS login portals. This data includes:</p><ul><li>Student and Parent names, mailing addresses, email addresses, and contact numbers.</li><li>Academic records, attendance logs, and student performance metrics.</li><li>Emergency contact details and medical information for student safety.</li></ul></section><section class="space-y-4"><h2>3. How We Use Your Data</h2><p>Your information is used solely to support student learning, manage academic operations, send emergency notifications, process admissions, and improve official school portals. We do not sell or share student data with unauthorized third parties.</p></section><section class="space-y-4"><h2>4. Security Measures</h2><p>We implement secure database encryption, firewalls, and strict user authentication roles to ensure student files and academic data remain confidential and protected from unauthorized access.</p></section><p class="text-xs text-outline font-semibold pt-6 border-t border-outline-variant/50">Last Updated: October 2024</p>',
            ],
            [
                'title' => 'Tenders & Procurement',
                'slug' => 'tenders',
                'published' => true,
                'content' => '<h2>Active Procurement Projects</h2><div class="space-y-4"><div class="p-6 border border-outline-variant rounded-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4"><div><span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Urgent</span><h3 class="font-bold text-lg mt-2">Construction of Chemistry Laboratory Block C</h3><p class="text-sm text-gray-500">Procurement Reference: MSS/W/02-2024</p><p class="text-xs font-semibold mt-1">Deadline: November 15, 2024</p></div><a href="#" class="px-6 py-2.5 bg-[#b1002c] text-white rounded-lg font-bold text-sm hover:brightness-110 transition-all">Download RFP</a></div><div class="p-6 border border-outline-variant rounded-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4"><div><span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Standard</span><h3 class="font-bold text-lg mt-2">Supply &amp; Commissioning of E-Library Server Terminals</h3><p class="text-sm text-gray-500">Procurement Reference: MSS/G/05-2024</p><p class="text-xs font-semibold mt-1">Deadline: November 30, 2024</p></div><a href="#" class="px-6 py-2.5 bg-[#b1002c] text-white rounded-lg font-bold text-sm hover:brightness-110 transition-all">Download RFP</a></div></div>',
            ],
            [
                'title' => 'Download Center',
                'slug' => 'downloads',
                'published' => true,
                'content' => '<h2>Academic Resources</h2><table><thead><tr><th>Document Title</th><th>Format &amp; Size</th><th>Action</th></tr></thead><tbody><tr><td class="font-bold">MSS Admission Request Form 2024-25</td><td>PDF (1.2 MB)</td><td><a href="#" class="inline-flex items-center gap-1 text-[#b1002c] font-bold"><span class="material-symbols-outlined text-sm">download</span> Download</a></td></tr><tr><td class="font-bold">Academic Calendar &amp; Holidays Schedule</td><td>PDF (850 KB)</td><td><a href="#" class="inline-flex items-center gap-1 text-[#b1002c] font-bold"><span class="material-symbols-outlined text-sm">download</span> Download</a></td></tr><tr><td class="font-bold">SEE Examination Model Questions 2081</td><td>PDF (3.4 MB)</td><td><a href="#" class="inline-flex items-center gap-1 text-[#b1002c] font-bold"><span class="material-symbols-outlined text-sm">download</span> Download</a></td></tr></tbody></table>',
            ],
            [
                'title' => 'Careers',
                'slug' => 'careers',
                'published' => true,
                'content' => '<h2>Open Faculty &amp; Staff Positions</h2><div class="space-y-4"><div class="p-6 border border-outline-variant rounded-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4"><div><h3 class="font-bold text-lg">Secondary Level Physics Teacher</h3><p class="text-sm text-gray-500">Academic Faculty | Full-Time</p><p class="text-xs font-semibold mt-1">Requirements: M.Sc in Physics, minimum 2 years teaching experience.</p></div><a href="/contact" class="px-6 py-2.5 bg-[#b1002c] text-white rounded-lg font-bold text-sm hover:brightness-110 transition-all">Apply Now</a></div><div class="p-6 border border-outline-variant rounded-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4"><div><h3 class="font-bold text-lg">Junior IT Administrator &amp; Instructor</h3><p class="text-sm text-gray-500">Administrative &amp; Tech Staff | Full-Time</p><p class="text-xs font-semibold mt-1">Requirements: B.Sc in Computer Science or BCA, knowledge of network setups.</p></div><a href="/contact" class="px-6 py-2.5 bg-[#b1002c] text-white rounded-lg font-bold text-sm hover:brightness-110 transition-all">Apply Now</a></div></div>',
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
