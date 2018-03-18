<?php

namespace common\components;

class SportTypes
{
	const TYPE_BADMINTON = 1;
	const TYPE_BALL_BADMINTON = 2;
	const TYPE_CRICKET = 3;
	
	public static $types = [
		self::TYPE_BADMINTON => 'Badminton',
		self::TYPE_BALL_BADMINTON => 'Ball Badminton',
		self::TYPE_CRICKET => 'Cricket',
	];
}