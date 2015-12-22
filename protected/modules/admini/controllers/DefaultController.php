<?php
/**
 * 系统首页
 */

class DefaultController extends XAdminiBase
{
    /**
     * 首页
     */
    public function actionIndex ()
    {
			
        $this->render('index');
    }
    
    /**
	 * 主界面
	 */
    public function actionHome ()
    {
		//查询课程
		$lessons = Lesson::model()->findAll(array(
			'select' =>array('catalog_id',
				'arrivals',
				'price'))
		);
		
		//学员活跃度
		$studentAllCount = Student::model()->count();
		
		$studentActiveCount = StudentLesson::model()->countBySql("SELECT COUNT(DISTINCT student_id) FROM `seed_student_lesson` WHERE is_pay=:is_pay",array(':is_pay'=>1));
		$studentPercentage = @round(($studentActiveCount/$studentAllCount)*100).'%';
		
		//学员月活跃度
		$time = date('Y-m',time());
		
		for($i = -1; $i < 8; $i++){
			$m = date('m',time());
			
			$m = $m - $i - 1;
			$ii = $i + 1;
			
			$startTime[$m] = date('Y-m-d H:i:s',strtotime("$time -$ii month"));
			$endTime[$m] = date('Y-m-d H:i:s',strtotime("$time -$i month"));
			$sMoAcCount[$m] = StudentLesson::model()->countBySql("SELECT COUNT(DISTINCT student_id) FROM `seed_student_lesson` WHERE is_pay=:is_pay AND pay_time>=:start_time AND pay_time<:end_time",array(':is_pay'=>1,':start_time'=>$startTime[$m],':end_time'=>$endTime[$m]));
			$sAllMoAcCount[$m] = Student::model()->countBySql('SELECT COUNT(id) FROM `seed_student` WHERE register_time>=:start_time AND register_time<:end_time',array(':start_time'=>$startTime[$m],':end_time'=>$endTime[$m]));
			
			if($sAllMoAcCount[$m] == 0)
				$sMoPercentage[$m] = "0%";
			else
				$sMoPercentage[$m] = round(($sMoAcCount[$m]/$sAllMoAcCount[$m])*100).'%';
		}
		
		//获取课程分类数组
		$catalogs = Catalog::model()->findAllByAttributes(array('parent_id' => 6));
		$allCountLesson = Lesson::model()->count();
		
		
		foreach($catalogs as $catalog){
			//初始化
			$lessonMoney[$catalog[id]] = 0;
			$allLesson[$catalog[id]] = 0;
			
			$catalogName[$catalog[catalog_name]] = $catalog[id];
			
			//各分类中已报名课程和发布课程总量
			$allLesson[$catalog[id]] = Lesson::model()->count("catalog_id=:catalog_id",array(":catalog_id"=>$catalog[id]));
			$applyLesson[$catalog[id]] = Lesson::model()->count("catalog_id=:catalog_id AND actual_students<>:actual_students",array(":catalog_id"=>$catalog[id],":actual_students"=>0));
		}
		
		//成交总金额
		foreach($lessons as $lesson){
			$lessonMoney[$lesson[catalog_id]] = (int)$lesson[arrivals] * (int)$lesson[price];
		}
		
        $this->render('home', array (
			'catalogName' => json_encode($catalogName),
			'lessonMoney' => json_encode($lessonMoney),
			'allLesson' => json_encode($allLesson),
			'applyLesson' => json_encode($applyLesson),
			'studentPercentage' => $studentPercentage,
			'sMoPercentage' => $sMoPercentage
			));
    }
}