/* LANGUAGE 
================================================== */
if(typeof VMM != 'undefined') {
	VMM.Language = {
		lang: "kr",
		api: {
			wikipedia: "kr"
		},
		date: {
			month: ["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],
			month_abbr: ["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],
			day: ["일요일" , "월요일" , "화요일" , "수요일" , "목요일" , "금요일" , "토요일"],
			day_abbr: ["일" , "월" , "화" , "수" , "목" , "금" , "토"],
		}, 
		dateformats: {
			year: "yyyy",
			month_short: "mmm",
			month: "mmmm yyyy",
			full_short: "d mmm",
			full: "d mmmm yyyy",
			time_no_seconds_short: "HH:MM",
			time_no_seconds_small_date: "HH:MM'<br/><small>'d mmmm yyyy'</small>'",
			full_long: "dddd',' d mmm yyyy 'um' HH:MM",
			full_long_small_date: "HH:MM'<br/><small>'dddd',' d mmm yyyy'</small>'",
		},
		messages: {
			loading_timeline: "Loading Timeline... ",
			return_to_title: "Return to Title",
			expand_timeline: "Expand Timeline",
			contract_timeline: "Contract Timeline",
			wikipedia: "From Wikipedia, the free encyclopedia",
			loading_content: "Loading Content",
			loading: "Loading"
			
		}
	}
}
