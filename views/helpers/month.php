<?php

class MonthHelper extends AppHelper {

	function getMonthName($month)
	{
		$monthName = '';
		switch ($month)
		{
			case 1: $monthName = __("January", true); break;
			case 2: $monthName = __("February", true); break;
			case 3: $monthName = __("March", true); break;
			case 4: $monthName = __("April", true); break;
			case 5: $monthName = __("May", true); break;
			case 6: $monthName = __("June", true); break;
			case 7: $monthName = __("July", true); break;
			case 8: $monthName = __("August", true); break;
			case 9: $monthName = __("September", true); break;
			case 10: $monthName = __("October", true); break;
			case 11: $monthName = __("November", true); break;
			case 12: $monthName = __("December", true); break;
		}
		return $monthName;
	}
	
	function getMonthRomanNum($month)
	{
		$monthRomanNum = '';
		switch ($month)
		{
			case 1: $monthRomanNum = "I"; break;
			case 2: $monthRomanNum = "II"; break;
			case 3: $monthRomanNum = "III"; break;
			case 4: $monthRomanNum = "IV"; break;
			case 5: $monthRomanNum = "V"; break;
			case 6: $monthRomanNum = "VI"; break;
			case 7: $monthRomanNum = "VII"; break;
			case 8: $monthRomanNum = "VII"; break;
			case 9: $monthRomanNum = "IX"; break;
			case 10: $monthRomanNum = "X"; break;
			case 11: $monthRomanNum = "XI"; break;
			case 12: $monthRomanNum = "XII"; break;
		}
		return $monthRomanNum;
	}
	
	function getDay($date)
	{
		$timeStamp = strtotime($date);
		$dateArray  = getdate ($timeStamp);
		
		return $dateArray["mday"];
	}
	
	function getMonth($date)
	{
		$timeStamp = strtotime($date);
		$dateArray  = getdate ($timeStamp);
		
		return $dateArray["mon"];
	}
}