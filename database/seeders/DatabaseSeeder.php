<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Department;
use App\Models\Event;
use App\Models\Facility;
use App\Models\LeadershipMessage;
use App\Models\Notice;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(AdminUserSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->seedFacilities();
        $this->seedDepartmentsAndTeachers();
        $this->seedNotices();
        $this->seedEvents();
        $this->seedAlbums();
        $this->seedLeadershipMessages();
    }

    private function seedFacilities(): void
    {
        Facility::create([
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
                'Access' => 'Grades 8 to 12',
            ],
        ]);

        Facility::create([
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
                'Opening Hours' => '8:00 AM - 5:00 PM (Monday to Friday)',
            ],
        ]);

        Facility::create([
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
                'Network' => 'Secure 1Gbps dedicated fiber backhaul',
            ],
        ]);

        Facility::create([
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
                'Events Hosted' => 'Annual Inter-School Sports Meet, Koshi Province Athletics',
            ],
        ]);
    }

    private function seedDepartmentsAndTeachers(): void
    {
        $science = Department::create(['name' => 'Science & Technology', 'slug' => 'science', 'icon' => 'biotech', 'sort_order' => 1]);
        $math = Department::create(['name' => 'Mathematics', 'slug' => 'mathematics', 'icon' => 'functions', 'sort_order' => 2]);
        $humanities = Department::create(['name' => 'Humanities & Languages', 'slug' => 'humanities', 'icon' => 'menu_book', 'sort_order' => 3]);

        Teacher::insert([
            [
                'department_id' => $science->id,
                'name' => 'Dr. Rajesh Kumar',
                'title' => 'Head of Science Department',
                'credentials' => 'Ph.D. in Applied Physics, M.Sc.',
                'image' => 'assets/images/img_d9ddd9689325.jpg',
                'sort_order' => 1,
            ],
            [
                'department_id' => $science->id,
                'name' => 'Anjali Sharma',
                'title' => 'Senior Chemistry Faculty',
                'credentials' => 'M.Sc. in Organic Chemistry, B.Ed.',
                'image' => 'assets/images/img_daa3e6fe0a68.jpg',
                'sort_order' => 2,
            ],
            [
                'department_id' => $science->id,
                'name' => 'Sunil Thapa',
                'title' => 'Biology Specialist',
                'credentials' => 'M.Sc. Zoology, M.Phil.',
                'image' => 'assets/images/img_e42ddeecb873.jpg',
                'sort_order' => 3,
            ],
            [
                'department_id' => $science->id,
                'name' => 'Pooja Adhikari',
                'title' => 'IT & Robotics Lead',
                'credentials' => 'M.Tech in Computer Science',
                'image' => 'assets/images/img_128d3b34a3e7.jpg',
                'sort_order' => 4,
            ],
            [
                'department_id' => $math->id,
                'name' => 'Prof. B.P. Gurung',
                'title' => 'Senior Mathematics Faculty',
                'credentials' => 'M.Sc. Mathematics, 25+ Years Exp.',
                'image' => 'assets/images/img_ac39770ae936.jpg',
                'sort_order' => 1,
            ],
            [
                'department_id' => $math->id,
                'name' => 'Nitesh Pandey',
                'title' => 'Applied Math Teacher',
                'credentials' => 'M.Ed. in Mathematics Education',
                'image' => 'assets/images/img_6aa718c96151.jpg',
                'sort_order' => 2,
            ],
            [
                'department_id' => $humanities->id,
                'name' => 'Sushma Devi',
                'title' => 'Head of Humanities',
                'credentials' => 'M.A. English Literature, B.Ed.',
                'image' => 'assets/images/img_8d309aad5568.jpg',
                'sort_order' => 1,
            ],
            [
                'department_id' => $humanities->id,
                'name' => 'Deepak Basnet',
                'title' => 'Social Studies & History',
                'credentials' => 'M.A. History, Researcher',
                'image' => 'assets/images/img_949c33d30370.jpg',
                'sort_order' => 2,
            ],
        ]);
    }

    private function seedNotices(): void
    {
        Notice::insert([
            [
                'title' => 'Winter Uniform Regulations Update',
                'slug' => 'winter-uniform-regulations',
                'content' => 'All students are required to transition to full winter uniforms by November 1st. Please visit the store for measurements and procurement of the winter uniform set including blazers, sweaters, and woolen trousers.',
                'is_urgent' => true,
                'attachment_path' => null,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Annual Examination Schedule for Grades 8-10 (2024)',
                'slug' => 'annual-examination-schedule-2024',
                'content' => 'The annual examination for grades 8 through 10 will commence from November 15, 2024. Detailed schedule has been published on the notice board and student portal. All students must collect their admit cards from the administration office by November 1st.',
                'is_urgent' => false,
                'attachment_path' => null,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Class 11 Science Stream Admission Merit List - Phase 2',
                'slug' => 'class-11-science-admission-phase-2',
                'content' => 'The second phase merit list for Class 11 Science stream admissions has been published. Candidates must complete the enrollment process within 7 working days from the date of this notice.',
                'is_urgent' => false,
                'attachment_path' => null,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Notice regarding Dashain and Tihar Festival Holidays',
                'slug' => 'dashain-tihar-holiday-notice',
                'content' => 'The school will remain closed from October 20 to November 5, 2024 for the Dashain and Tihar festivals. Regular classes will resume on November 6, 2024. All students and staff are advised to plan accordingly.',
                'is_urgent' => false,
                'attachment_path' => null,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Inter-School Volleyball Tournament Selection Trials',
                'slug' => 'volleyball-tournament-selection-trials',
                'content' => 'Selection trials for the inter-school volleyball tournament will be held on October 25, 2024 at the school sports complex. Interested students from grades 8-12 must register their names with the physical education department by October 20.',
                'is_urgent' => false,
                'attachment_path' => null,
                'published_at' => now()->subDays(25),
            ],
            [
                'title' => 'Mandatory Parent-Teacher Meeting (PTM) for Grade 12',
                'slug' => 'mandatory-ptm-grade-12',
                'content' => 'A mandatory parent-teacher meeting for Grade 12 students will be held on October 30, 2024 at 8:00 AM in the main auditorium. Attendance of at least one parent/guardian is compulsory.',
                'is_urgent' => false,
                'attachment_path' => null,
                'published_at' => now()->subDays(30),
            ],
        ]);
    }

    private function seedEvents(): void
    {
        Event::insert([
            [
                'title' => 'Annual Science and Technology Fair 2024',
                'description' => 'Showcasing innovative projects from Grade 8-12 students.',
                'location' => 'Main Auditorium',
                'type' => 'Academic',
                'starts_at' => '10:00:00',
                'event_date' => '2024-10-15',
            ],
            [
                'title' => 'Parent-Teacher Conference (Term 2)',
                'description' => 'One-on-one sessions to discuss student progress and goals.',
                'location' => 'Classroom Block B',
                'type' => 'Social',
                'starts_at' => '08:00:00',
                'event_date' => '2024-10-22',
            ],
        ]);
    }

    private function seedAlbums(): void
    {
        Album::insert([
            [
                'slug' => 'science-fair-2024',
                'title' => 'Annual Science and Technology Fair 2024',
                'description' => 'Showcasing innovative projects from Grade 8-12 students. Exhibited projects include robotics, artificial intelligence models, smart irrigation systems, and renewable energy experiments designed by our young innovators.',
                'date' => 'October 15, 2024',
                'youtube' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'images' => json_encode([
                    'assets/images/img_a16209818b80.jpg',
                    'assets/images/img_1cd20bdb4292.jpg',
                    'assets/images/img_4721664e5b37.jpg',
                    'assets/images/img_128d3b34a3e7.jpg',
                    'assets/images/img_ed194979c158.jpg',
                    'assets/images/img_1c0038c95435.jpg',
                ]),
            ],
            [
                'slug' => 'sports-meet-2024',
                'title' => 'Annual Sports Meet 2024',
                'description' => 'A celebration of sportsmanship, physical endurance, and teamwork. Highlights include the 100m sprint, football finals, basketball matches, high jump, and relay races across different school houses.',
                'date' => 'March 12, 2024',
                'youtube' => 'https://www.youtube.com/embed/2qJg7c271F0',
                'images' => json_encode([
                    'assets/images/img_6399f06c125d.jpg',
                    'assets/images/img_723930a7fd73.jpg',
                    'assets/images/img_2c002756cae7.jpg',
                    'assets/images/img_5012d328ff7a.jpg',
                    'assets/images/img_a712d6875dcf.jpg',
                    'assets/images/img_0c19093695eb.jpg',
                ]),
            ],
            [
                'slug' => 'classroom-activities',
                'title' => 'Daily Classroom & Academic Activities',
                'description' => 'An inside look at our dynamic classrooms. Our interactive learning approach combines traditional teachings with smart boards, group presentations, hands-on lab training, and creative project-based learning.',
                'date' => 'Ongoing 2024',
                'youtube' => null,
                'images' => json_encode([
                    'assets/images/img_d370ec332e7b.jpg',
                    'assets/images/img_11840adcd132.jpg',
                    'assets/images/img_e42ddeecb873.jpg',
                    'assets/images/img_8d309aad5568.jpg',
                    'assets/images/img_949c33d30370.jpg',
                    'assets/images/img_daa3e6fe0a68.jpg',
                ]),
            ],
        ]);
    }

    private function seedLeadershipMessages(): void
    {
        LeadershipMessage::insert([
            [
                'slug' => 'principal',
                'title' => 'Message from the Principal',
                'author' => 'Dr. Hemanta Raj Joshi',
                'role' => 'Principal',
                'image' => 'assets/images/img_f6a683a3ba3a.jpg',
                'teaser' => 'Education is not just about books; it\'s about building character and fostering global citizenship.',
                'paragraphs' => json_encode([
                    'Welcome to the official portal of Mahendra Secondary School. Since our founding in 1956, our institution has stood as a sanctuary of learning, academic excellence, and character building in Nepal. We believe that true education does not merely consist of acquiring textbook knowledge, but in cultivating critical thinking, empathy, and leadership skills.',
                    'At Mahendra Secondary School, we are committed to providing a balanced environment where students can discover their true potentials. Our state-of-the-art facilities, expert faculty, and rich co-curricular programs ensure that every child receives a comprehensive, future-ready education that prepares them to make positive contributions to the global community.',
                    'I invite students, parents, and alumni to explore our academic programs and join hands with us in our quest to nurture the leaders, innovators, and thinkers of tomorrow. Thank you for your continued trust and partnership.',
                ]),
                'date' => 'July 1, 2024',
            ],
            [
                'slug' => 'chairman',
                'title' => 'Message from the Chairman',
                'author' => 'Mr. Ram Bahadur Thapa',
                'role' => 'School Management Committee Chairman',
                'image' => 'assets/images/img_25e8c3b3d1e4.jpg',
                'teaser' => 'We are dedicated to building robust school infrastructure and providing high-quality resources to support our students\' academic success.',
                'paragraphs' => json_encode([
                    'On behalf of the School Management Committee, I extend my warmest greetings. Our primary objective is to continuously improve the school\'s academic environment, support infrastructural growth, and implement policies that enhance the quality of secondary education in Nepal.',
                    'Through public-private collaborations and support from the Government of Nepal, we have upgraded our classrooms with interactive technology, established high-speed computer labs, and fully modernized our sports complex. We believe that providing state-of-the-art resources is fundamental to empowering our young students.',
                    'We thank our excellent team of educators, supportive parents, and brilliant alumni network for their endless efforts in elevating the reputation of Mahendra Secondary School.',
                ]),
                'date' => 'June 15, 2024',
            ],
            [
                'slug' => 'administration',
                'title' => 'Message from the Administration',
                'author' => 'Mrs. Sunita Dahal',
                'role' => 'Administrative Chief',
                'image' => 'assets/images/img_b68e14dd22b8.jpg',
                'teaser' => 'Ensuring a smooth, organized, and secure environment to support day-to-day academic operations and student welfare.',
                'paragraphs' => json_encode([
                    'The administration department at Mahendra Secondary School works tirelessly to ensure that our campus remains safe, secure, organized, and highly efficient. From managing student admissions and official documents to ensuring campus security and facility upkeep, our team is dedicated to student welfare.',
                    'We have modernized our student portal and implemented digital tools like EMIS logins and automated notice systems to streamline communication with parents and ensure transparency in all administrative processes.',
                    'Our doors are always open to support students and parents. Feel free to contact our administration desk for inquiries regarding admissions, scholarships, transport facilities, or calendar events.',
                ]),
                'date' => 'June 10, 2024',
            ],
        ]);
    }
}
