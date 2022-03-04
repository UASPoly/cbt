<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Level;
use App\Course;
class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            ['title'=>'Course 1 title','code'=>'CO1'],
            ['title'=>'Course 2 title','code'=>'CO2'],
            ['title'=>'Course 3 title','code'=>'CO3']
        ];
        foreach ($courses as $course) {
            Course::firstOrCreate($course);
        }
        $levels = ['ND1', 'ND2', 'HND1', 'HND2'];
        foreach ($levels as $level) {
            $level = Level::firstOrCreate(['name'=>$level]);
                foreach (Course::all() as $course) {
                    $levelCourse = $level->levelCourses()->create(['course_id'=>$course->id]);
                    $exam = $levelCourse->exams()->create([
                        "semester" => 1,
                        "session" => "2021/2022",
                        "date" => "2022-03-10",
                        "start" => "12:12",
                        "end" => "15:12",
                        'hasStarted'=>1
                    ]);
                    for($i=1; $i<=20; $i++){
                        $exam->questions()->create([
                            'question'=>'we ask some thying veri simple for you to answer',
                            'A'=>'answer A',
                            'B'=>'answer B',
                            'C'=>'answer C',
                            'D'=>'answer D',
                            'ANS'=>$this->getOption(),
                        ]);
                    }
                }
        }
    }
   
    protected function getOption()
    {
        switch (rand(1,4)) {
            case '1':
                $option = 'A';
                break;
            case '2':
            $option = 'B';
                break;
            
            case '3':
            $option = 'C';
                break;
            
            case '4':
            $option = 'D';
                break;
                            
            default:
                # code...
                break;
        }
        return $option;
    }
}
