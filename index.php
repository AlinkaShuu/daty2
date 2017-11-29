<html>
	<body>
		<?php	
		/*$daysofWeek=[
		'Mon'=>'Понедельник',
		'Tue'=>'Вторник',
		'Wed'=>'Среда',
		'Thu'=>'Четверг',
		'Fri'=>'Пятница',
		'Sat'=>'Суббота',
		'Sun'=>'Воскресенье',
		]; этот массив находится в  файле days.php*/
		
		$daysofWeek=require('days.php');        //вызов файла days.php
		
			if (isset($_GET['value'])) {
				$myDate=DateTime::createFromFormat('Y-m-d', $_GET['value']);
			}
		?>
		<form metod="GET" action="index.php" >
			<input type="date" name="value" value="<?php if (isset($myDate))
			{
			
			echo htmlspecialchars($myDate->format('Y-m-d'));
			}?>">
			<input type="submit" value="Узнать день недели последнего числа месяца">
		</form>
		<?php
			if (isset($myDate)){
				$month=$myDate -> format('m');
				$year=$myDate -> format('Y');
				$day=1;
				$myDate->setDate((int)$year,(int)$month+1,(int)$day-1);
				
				$dayofWeek=$myDate->format('D');
				//echo $myDate->format('D');  без массива, вывел бы на анг название
				echo $daysofWeek[$dayofWeek]; //выводит на русском
			}		
		?>
	
	</body>
</html>
