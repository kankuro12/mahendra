<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected function getGalleryAlbumsData()
    {
        return [
            'science-fair-2024' => [
                'slug' => 'science-fair-2024',
                'title' => 'Annual Science and Technology Fair 2024',
                'description' => 'Showcasing innovative projects from Grade 8-12 students. Exhibited projects include robotics, artificial intelligence models, smart irrigation systems, and renewable energy experiments designed by our young innovators.',
                'date' => 'October 15, 2024',
                'youtube' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'images' => [
                    'assets/images/img_a16209818b80.jpg',
                    'assets/images/img_1cd20bdb4292.jpg',
                    'assets/images/img_4721664e5b37.jpg',
                    'assets/images/img_128d3b34a3e7.jpg',
                    'assets/images/img_ed194979c158.jpg',
                    'assets/images/img_1c0038c95435.jpg'
                ]
            ],
            'sports-meet-2024' => [
                'slug' => 'sports-meet-2024',
                'title' => 'Annual Sports Meet 2024',
                'description' => 'A celebration of sportsmanship, physical endurance, and teamwork. Highlights include the 100m sprint, football finals, basketball matches, high jump, and relay races across different school houses.',
                'date' => 'March 12, 2024',
                'youtube' => 'https://www.youtube.com/embed/2qJg7c271F0',
                'images' => [
                    'assets/images/img_6399f06c125d.jpg',
                    'assets/images/img_723930a7fd73.jpg',
                    'assets/images/img_2c002756cae7.jpg',
                    'assets/images/img_5012d328ff7a.jpg',
                    'assets/images/img_a712d6875dcf.jpg',
                    'assets/images/img_0c19093695eb.jpg'
                ]
            ],
            'classroom-activities' => [
                'slug' => 'classroom-activities',
                'title' => 'Daily Classroom & Academic Activities',
                'description' => 'An inside look at our dynamic classrooms. Our interactive learning approach combines traditional teachings with smart boards, group presentations, hands-on lab training, and creative project-based learning.',
                'date' => 'Ongoing 2024',
                'youtube' => null,
                'images' => [
                    'assets/images/img_d370ec332e7b.jpg',
                    'assets/images/img_11840adcd132.jpg',
                    'assets/images/img_e42ddeecb873.jpg',
                    'assets/images/img_8d309aad5568.jpg',
                    'assets/images/img_949c33d30370.jpg',
                    'assets/images/img_daa3e6fe0a68.jpg'
                ]
            ]
        ];
    }

    public function index()
    {
        $albums = $this->getGalleryAlbumsData();
        return view('gallery', compact('albums'));
    }

    public function show($slug)
    {
        $albums = $this->getGalleryAlbumsData();
        if (!array_key_exists($slug, $albums)) {
            abort(404);
        }
        $album = $albums[$slug];
        return view('gallery-detail', compact('album'));
    }
}
