<?php

namespace Database\Seeders;

use App\Models\Teachers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacherInfo = new Teachers();
        $teacherInfo->teacher_name = "Engr. Syed Zahidur Rashid";
        $teacherInfo->teacher_designetion = "Assistant Professor";
        $teacherInfo->accademic_profile ="<ul><li>M.Sc. in Computer Science and Engineering</li><li>Major in Advanced Optical Communication Systems and Networks</li><li>B.Sc. in Computer and Communication Engineering</li></ul>";


        
        $teacherInfo->biography = "An academician with a profound interest in the field of Electronics, Computer, and Telecommunication Engineering.
        I aim to bring an open mind, a positive attitude, and high expectations to the classroom each day. I believe that I owe it to my students, as well as the community, to bring consistency, diligence, and warmth to my job in the hope that I can ultimately inspire and encourage such traits in the students as well.";
        $teacherInfo->research_areas = '<ol><li><a href="https://scholar.google.com/citations?user=E5qkKLYAAAAJ&amp;hl=en&amp;oi=ao" target="_blank">Google Scholar</a></li><li><a href="https://www.researchgate.net/profile/Syed-Zahidur-Rashid" target="_blank">Research Gate</a></li><li><a href="https://orcid.org/0000-0002-8635-5771" target="_blank">ORCID</a><br><br><br></li></ol>';
        $teacherInfo->teaching_subject = "<ol><li>Computer Network&nbsp;</li><li>programming&nbsp;</li></ol>";
        $teacherInfo->teacher_image = "http://127.0.0.1:8000/storage/Teachers//placeholder.jpg";
        $teacherInfo->teacher_phone = "01857522408";
        $teacherInfo->teacher_email = "szrashidcce@yahoo.com";
        $teacherInfo->save();
    }
}