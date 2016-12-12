<?php

define("BASE36", 36);

class Base36
{
	private static $base36_map = [ 
				'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
				'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
				'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
				'u', 'v', 'w', 'x', 'y', 'z'
			];

	private static $base36_char_map = [ 
				'0' => 0,  '1' => 1,  '2' => 2,  '3' => 3, 	'4' => 4,  '5' => 5,  '6' => 6,  '7' => 7,  '8' => 8,  '9' => 9,
				'a' => 10, 'b' => 11, 'c' => 12, 'd' => 13, 'e' => 14, 'f' => 15, 'g' => 16, 'h' => 17, 'i' => 18, 'j' => 19,
				'k' => 20, 'l' => 21, 'm' => 22, 'n' => 23, 'o' => 24, 'p' => 25, 'q' => 26, 'r' => 27, 's' => 28, 't' => 29,
				'u' => 30, 'v' => 31, 'w' => 32, 'x' => 33, 'y' => 34, 'z' => 35
			];
	
	public static function base36_encode($integer_val)
	{
		$result = "";
		$integer_val = intval($integer_val);

		do{
			$v = $integer_val % BASE36;
			$integer_val = intval($integer_val / BASE36);
			$result = self::$base36_map[$v] . $result;
		}while($integer_val > 0);

		return $result;
	}
	
	public static function base36_decode($base36_str)
	{
		$base36_str = strtolower($base36_str);

		$result = 0;
		$base = 1;
		$len = strlen($base36_str);

		for($i = $len - 1; $i >= 0; $i--)
		{
			if(empty(self::$base36_char_map[$base36_str[$i]]))
			{
				break;
			}

			$result += self::$base36_char_map[$base36_str[$i]] * $base;
			$v = self::$base36_char_map[$base36_str[$i]];

			$base *= BASE36;
		}

		return $result;
	}

}

function test1()
{
	$n1 = 231325;
	$n2 = 9876329897322;
	$n3 = 0;
	$n4 = 36;
	$n5 = 37;

	$s1 = Base36::base36_encode($n1);
	$s2 = Base36::base36_encode($n2);
	$s3 = Base36::base36_encode($n3);
	$s4 = Base36::base36_encode($n4);
	$s5 = Base36::base36_encode($n5);

	echo "$n1 = $s1\n";
	echo "$n2 = $s2\n";
	echo "$n3 = $s3\n";
	echo "$n4 = $s4\n";
	echo "$n5 = $s5\n";

	$n11 = Base36::base36_decode($s1);
	$n12 = Base36::base36_decode($s2);
	$n13 = Base36::base36_decode($s3);
	$n14 = Base36::base36_decode($s4);
	$n15 = Base36::base36_decode($s5);
	
	echo "$s1 = $n11\n";
	echo "$s2 = $n12\n";
	echo "$s3 = $n13\n";
	echo "$s4 = $n14\n";
	echo "$s5 = $n15\n";
}

//test1();


