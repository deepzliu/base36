<?php

include_once(__dir__ . '/../php/base-36.php');

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

test1();


