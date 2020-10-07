<?php
	function checkBrackets($path) {
		$text = file_get_contents($path);
		$countOpenBrackets = 0;
		$countCloseBrackets = 0;
		$error = false;
		$firstOpenBracket = false;
		$sentenceSize = strlen($text);
		for($i=0; $i<$sentenceSize; $i++) {
			if ($text[$i] == '(') {
				$countOpenBrackets++;
				$firstOpenBracket = true;
			}
			if ($text[$i] == ')') {
				$countCloseBrackets++;
				if (!$firstOpenBracket) $error = true;
			}
			if (($text[$i] == '(') && ($text[$i+1] == ')')) $error = true;
			if (($text[$i] == ')') && ($text[$i+1] == '(')) $error = true;
		}
		echo '<h1> Соответствие круглых скобок </h1>';
		echo 'Открывающих скобочек - '.$countOpenBrackets.'<br>';
		echo 'Закрывающих скобочек - '.$countCloseBrackets.'<br>';
		echo $text;
		if (($countOpenBrackets == $countCloseBrackets)&&(!$error )) {
			echo "<br>Соответствие присутствует. Всё хорошо.";
		} else {
			echo "<br>Соответствие отсутствует. Ошибка.";
		}
	}
?>