<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected function getMessagesData()
    {
        return [
            'principal' => [
                'slug' => 'principal',
                'title' => 'Message from the Principal',
                'author' => 'Dr. Hemanta Raj Joshi',
                'role' => 'Principal',
                'image' => 'assets/images/img_f6a683a3ba3a.jpg',
                'teaser' => 'Education is not just about books; it\'s about building character and fostering global citizenship.',
                'date' => 'July 1, 2024',
                'paragraphs' => [
                    'Welcome to the official portal of Mahendra Secondary School. Since our founding in 1956, our institution has stood as a sanctuary of learning, academic excellence, and character building in Nepal. We believe that true education does not merely consist of acquiring textbook knowledge, but in cultivating critical thinking, empathy, and leadership skills.',
                    'At Mahendra Secondary School, we are committed to providing a balanced environment where students can discover their true potentials. Our state-of-the-art facilities, expert faculty, and rich co-curricular programs ensure that every child receives a comprehensive, future-ready education that prepares them to make positive contributions to the global community.',
                    'I invite students, parents, and alumni to explore our academic programs and join hands with us in our quest to nurture the leaders, innovators, and thinkers of tomorrow. Thank you for your continued trust and partnership.'
                ]
            ],
            'chairman' => [
                'slug' => 'chairman',
                'title' => 'Message from the Chairman',
                'author' => 'Mr. Ram Bahadur Thapa',
                'role' => 'School Management Committee Chairman',
                'image' => 'assets/images/img_25e8c3b3d1e4.jpg',
                'teaser' => 'We are dedicated to building robust school infrastructure and providing high-quality resources to support our students\' academic success.',
                'date' => 'June 15, 2024',
                'paragraphs' => [
                    'On behalf of the School Management Committee, I extend my warmest greetings. Our primary objective is to continuously improve the school\'s academic environment, support infrastructural growth, and implement policies that enhance the quality of secondary education in Nepal.',
                    'Through public-private collaborations and support from the Government of Nepal, we have upgraded our classrooms with interactive technology, established high-speed computer labs, and fully modernized our sports complex. We believe that providing state-of-the-art resources is fundamental to empowering our young students.',
                    'We thank our excellent team of educators, supportive parents, and brilliant alumni network for their endless efforts in elevating the reputation of Mahendra Secondary School.'
                ]
            ],
            'administration' => [
                'slug' => 'administration',
                'title' => 'Message from the Administration',
                'author' => 'Mrs. Sunita Dahal',
                'role' => 'Administrative Chief',
                'image' => 'assets/images/img_b68e14dd22b8.jpg',
                'teaser' => 'Ensuring a smooth, organized, and secure environment to support day-to-day academic operations and student welfare.',
                'date' => 'June 10, 2024',
                'paragraphs' => [
                    'The administration department at Mahendra Secondary School works tirelessly to ensure that our campus remains safe, secure, organized, and highly efficient. From managing student admissions and official documents to ensuring campus security and facility upkeep, our team is dedicated to student welfare.',
                    'We have modernized our student portal and implemented digital tools like EMIS logins and automated notice systems to streamline communication with parents and ensure transparency in all administrative processes.',
                    'Our doors are always open to support students and parents. Feel free to contact our administration desk for inquiries regarding admissions, scholarships, transport facilities, or calendar events.'
                ]
            ]
        ];
    }

    public function index()
    {
        $messages = $this->getMessagesData();
        return view('messages', compact('messages'));
    }

    public function show($slug)
    {
        $messages = $this->getMessagesData();
        if (!array_key_exists($slug, $messages)) {
            abort(404);
        }
        $message = $messages[$slug];
        return view('message-detail', compact('message'));
    }
}
