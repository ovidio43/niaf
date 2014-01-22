<?php 
	function state2digits($state)
	{
		//REPLACE AND JOIN
		$state = str_replace(' ', '', $state);
		switch ($state) 
		{
			case Alabama:
				$state = 'AL';
				break;
			case Alaska:
				$state = 'AK';
				break;
			case Arizona:
				$state = 'AZ';
				break;
			case Arkansas:
				$state = 'AR';
				break;
			case California:
				$state = 'CA';
				break;
			case Colorado:
				$state = 'CO';
				break;
			case Connecticut:
				$state = 'CT';
				break;
			case Delaware:
				$state = 'DE';
				break;
			case DistrictofColumbia:
				$state = 'DC';
				break;
			case Florida:
				$state = 'FL';
				break;
			case Georgia:
				$state = 'GA';
				break;
			case Hawaii:
				$state = 'HI';
				break;
			case Idaho:
				$state = 'ID';
				break;
			case Illinois:
				$state = 'IL';
				break;
			case Indiana:
				$state = 'IN';
				break;
			case Lowa:
				$state = 'IA';
				break;
			case Kansas:
				$state = 'KS';
				break;
			case Kentucky:
				$state = 'KY';
				break;
			case Lousiana:
				$state = 'LA';
				break;
			case Maine:
				$state = 'ME';
				break;
			case MarshallIslands:
				$state = 'MH';
				break;
			case Maryland:
				$state = 'MD';
				break;
			case Massachusetts:
				$state = 'MA';
				break;
			case Michigan:
				$state = 'MI';
				break;
			case Minnesota:
				$state = 'MN';
				break;
			case Mississippi:
				$state = 'MS';
				break;
			case Missouri:
				$state = 'MO';
				break;
			case Montana:
				$state = 'MT';
				break;
			case Nebraska:
				$state = 'NE';
				break;
			case Nevada:
				$state = 'NV';
				break;
			case NewHampshire:
				$state = 'NH';
				break;
			case NewJersey:
				$state = 'NJ';
				break;
			case NewMexico:
				$state = 'NM';
				break;
			case NewYork:
				$state = 'NY';
				break;
			case NorthCarolina:
				$state = 'NC';
				break;
			case NorthDakota:
				$state = 'ND';
				break;
			case Ohio:
				$state = 'OH';
				break;
			case Oklahoma:
				$state = 'OK';
				break;
			case Oregon:
				$state = 'OR';
				break;
			case Pennsylvania:
				$state = 'PA';
				break;
			case RhodeIsland:
				$state = 'RI';
				break;
			case SouthCarolina:
				$state = 'SC';
				break;
			case SouthDakota:
				$state = 'SD';
				break;
			case Tennessee:
				$state = 'TN';
				break;
			case Texas:
				$state = 'TX';
				break;
			case Utah:
				$state = 'UT';
				break;
			case Vermont:
				$state = 'VT';
				break;
			case Virginia:
				$state = 'VA';
				break;
			case Washintong:
				$state = 'WA';
				break;
			case WestVirginia:
				$state = 'WV';
				break;
			case Wisconsin:
				$state = 'WI';
				break;
			case Wyoming:
				$state = 'WY';
				break;
			default:
				$state = " ";
				break;
		}
		return $state;
	}
	function stateOriginalDigits($state)
	{
		//REPLACE AND JOIN
		$state = str_replace(' ', '', $state);
		switch ($state) 
		{
			case 'AL':
				$state = 'Alabama';
				break;
			case 'AK':
				$state = 'Alaska';
				break;
			case 'AZ':
				$state = 'Arizona';
				break;
			case 'AR':
				$state = 'Arkansas';
				break;
			case 'CA':
				$state = 'California';
				break;
			case 'CO':
				$state = 'Colorado';
				break;
			case 'CT':
				$state = 'Connecticut';
				break;
			case 'DE':
				$state = 'Delaware';
				break;
			case 'DC':
				$state = 'District of Columbia';
				break;
			case 'FL':
				$state = 'Florida';
				break;
			case 'GA':
				$state = 'Georgia';
				break;
			case 'HI':
				$state = 'Hawaii';
				break;
			case 'ID':
				$state = 'Idaho';
				break;
			case 'IL':
				$state = 'Illinois';
				break;
			case 'IN':
				$state = 'Indiana';
				break;
			case 'IA':
				$state = 'Lowa';
				break;
			case 'KS':
				$state = 'Kansas';
				break;
			case 'KY':
				$state = 'Kentucky';
				break;
			case 'LA':
				$state = 'Lousiana';
				break;
			case 'ME':
				$state = 'Maine';
				break;
			case 'MH':
				$state = 'Marshall Islands';
				break;
			case 'MD':
				$state = 'Maryland';
				break;
			case 'MA':
				$state = 'Massachusetts';
				break;
			case 'MI':
				$state = 'Michigan';
				break;
			case 'MN':
				$state = 'Minnesota';
				break;
			case 'MS':
				$state = 'Mississippi';
				break;
			case 'MO':
				$state = 'Missouri';
				break;
			case 'MT':
				$state = 'Montana';
				break;
			case 'NE':
				$state = 'Nebraska';
				break;
			case 'NV':
				$state = 'Nevada';
				break;
			case 'NH':
				$state = 'New Hampshire';
				break;
			case 'NJ':
				$state = 'New Jersey';
				break;
			case 'NM':
				$state = 'New Mexico';
				break;
			case 'NY':
				$state = 'New York';
				break;
			case 'NC':
				$state = 'North Carolina';
				break;
			case 'ND':
				$state = 'North Dakota';
				break;
			case 'OH':
				$state = 'Ohio';
				break;
			case 'OK':
				$state = 'Oklahoma';
				break;
			case 'OR':
				$state = 'Oregon';
				break;
			case 'PA':
				$state = 'Pennsylvania';
				break;
			case 'RI':
				$state = 'Rhode Island';
				break;
			case 'SC':
				$state = 'South Carolina';
				break;
			case 'SD':
				$state = 'South Dakota';
				break;
			case 'TN':
				$state = 'Tennessee';
				break;
			case 'TX':
				$state = 'Texas';
				break;
			case 'UT':
				$state = 'Utah';
				break;
			case 'VT':
				$state = 'Vermont';
				break;
			case 'VA':
				$state = 'Virginia';
				break;
			case 'WA':
				$state = 'Washintong';
				break;
			case 'WV':
				$state = 'West Virginia';
				break;
			case 'WI':
				$state = 'Wisconsin';
				break;
			case 'WY':
				$state = 'Wyoming';
				break;
			default:
				$state = " ";
				break;	
		}
		return $state;
	}
?>