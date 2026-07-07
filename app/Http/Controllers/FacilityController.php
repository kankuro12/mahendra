<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacilityController extends Controller
{
    protected function getFacilitiesData()
    {
        return [
            'science-lab' => [
                'slug' => 'science-lab',
                'title' => 'Science Laboratory',
                'tagline' => 'Fostering discovery through scientific inquiry.',
                'icon' => 'science',
                'image' => 'assets/images/img_a16209818b80.jpg',
                'summary' => 'Equipped with the latest research instruments and safety protocols for physics, chemistry, and biology.',
                'description' => 'Our state-of-the-art Science Laboratory provides students with the hands-on experience necessary to master complex scientific concepts. Designed to support physics, chemistry, and biology curricula, the laboratory features modern research workstations, professional-grade instruments, and comprehensive safety installations, allowing students to safely conduct advanced experiments and investigations.',
                'features' => ['Modern Microscopes', 'Interactive Smartboards', 'Advanced Chemical Safety Hoods', 'Physics Tinkering Kits'],
                'coordinator' => 'Dr. Rajesh Kumar',
                'coordinator_role' => 'Head of Science Dept.',
                'specifications' => [
                    'Capacity' => '40 Students per session',
                    'Safety Standards' => 'OSHA Compliant eyewash stations & fire shields',
                    'Focus Areas' => 'Physics experiments, Organic chemistry, Microbiology',
                    'Access' => 'Grades 8 to 12'
                ]
            ],
            'library' => [
                'slug' => 'library',
                'title' => 'Central Library',
                'tagline' => 'A gateway to knowledge, imagination, and learning.',
                'icon' => 'menu_book',
                'image' => 'assets/images/img_723930a7fd73.jpg',
                'summary' => 'A vast collection of over 50,000 titles, digital archives, and quiet study zones for immersive learning.',
                'description' => 'The Central Library is the intellectual heart of Mahendra Secondary School. Offering a peaceful sanctuary for study and research, it houses a comprehensive collection of books, academic journals, and modern digital resources. With dedicated quiet zones, group collaboration tables, and high-speed internet terminals, the library supports both independent learning and collaborative research.',
                'features' => ['50,000+ Printed Books', 'E-Library Terminals', 'Dedicated Quiet Zones', 'Collaborative Group Study Rooms'],
                'coordinator' => 'Mrs. Gitanjali Shrestha',
                'coordinator_role' => 'Chief Librarian',
                'specifications' => [
                    'Collection Size' => '50,000+ Books, 1,200 Academic Journals',
                    'Digital Resources' => 'Access to J-STOR, Britannica Online, and local e-learning databases',
                    'Seating Capacity' => '150 seats across multiple study zones',
                    'Opening Hours' => '8:00 AM - 5:00 PM (Monday to Friday)'
                ]
            ],
            'computer-lab' => [
                'slug' => 'computer-lab',
                'title' => 'Computer Laboratory',
                'tagline' => 'Nurturing digital literacy and computer science leaders.',
                'icon' => 'computer',
                'image' => 'assets/images/img_1cd20bdb4292.jpg',
                'summary' => 'High-speed fiber connectivity and high-performance machines for ICT and vocational training.',
                'description' => 'Our Computer Laboratory prepares students for a rapidly evolving digital world. Featuring high-performance computing terminals, dual monitors, and high-speed fiber internet connection, the lab is used for ICT classes, software development courses, graphic design, and vocational technology training. The facility is designed to keep students at the forefront of technology.',
                'features' => ['Dual Monitor Terminals', 'Gigabit Fiber Internet Connection', 'Professional Software Suites', 'Ergonomic Workspaces'],
                'coordinator' => 'Mr. Ramesh Shrestha',
                'coordinator_role' => 'Lead IT Instructor',
                'specifications' => [
                    'Workstations' => '60 High-end computing nodes',
                    'Operating Systems' => 'Windows 11 and Ubuntu Linux dual-boot',
                    'Key Software' => 'VS Code, Python, Adobe Creative Cloud, Blender',
                    'Network' => 'Secure 1Gbps dedicated fiber backhaul'
                ]
            ],
            'sports' => [
                'slug' => 'sports',
                'title' => 'Sports Complex & Athletic Field',
                'tagline' => 'Building discipline, teamwork, and physical fitness.',
                'icon' => 'sports_basketball',
                'image' => 'assets/images/img_6399f06c125d.jpg',
                'summary' => 'Multipurpose ground, basketball courts, and indoor sports hall for physical excellence.',
                'description' => 'Physical education and competitive sports are essential pillars of student development at Mahendra School. Our comprehensive Sports Complex includes a large multipurpose sports field, professional running tracks, basketball courts, and a fully equipped indoor gym. Under the guidance of professional athletic coaches, students participate in a wide variety of indoor and outdoor sports.',
                'features' => ['Multipurpose Football/Cricket Ground', 'Professional Basketball Courts', 'Indoor Athletic Training Hall', 'Synthetic Running Track'],
                'coordinator' => 'Mr. Bikram Thapa',
                'coordinator_role' => 'Athletic Director',
                'specifications' => [
                    'Field Size' => 'Standard football-sized turf field',
                    'Indoor Sports' => 'Table Tennis, Badminton, Chess, Gymnastics',
                    'Coaching Staff' => '4 Certified physical education trainers',
                    'Events Hosted' => 'Annual Inter-School Sports Meet, Koshi Province Athletics'
                ]
            ]
        ];
    }

    public function index()
    {
        $facilities = $this->getFacilitiesData();
        return view('facilities', compact('facilities'));
    }

    public function show($slug)
    {
        $facilities = $this->getFacilitiesData();
        if (!array_key_exists($slug, $facilities)) {
            abort(404);
        }
        $facility = $facilities[$slug];
        return view('facility-detail', compact('facility'));
    }
}
