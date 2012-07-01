/* LANGUAGE 
================================================== */
if(typeof VMM != 'undefined') {
	VMM.Language = {
		lang: "dk",
		api: {
			wikipedia: "dk"
		},
		date: {
			month: ["Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December"],
			month_abbr: ["Jan.", "Feb.", "Marts", "April", "Maj", "Juni", "Juli", "Aug.", "Sept.", "Okt.", "Nov.", "Dec."],
			day: ["S?ndag","Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "L?rdag"],
			day_abbr: ["S?.","Ma.", "Ti.", "On.", "To.", "Fr.", "L?."],
		}, 
		dateformats: {
			year: "yyyy",
			month_short: "mmm",
			month: "mmmm yyyy",
			full_short: "d. mmm",
			full: "d. mmmm',' yyyy",
			time_no_seconds_short: "HH:MM",
			time_no_seconds_small_date: "HH:MM'<br/><small>'d mmmm',' yyyy'</small>'",
			full_long: "dddd',' d. mmm',' yyyy 'um' HH:MM",
			full_long_small_date: "HH:MM'<br/><small>'dddd',' d. mmm yyyy'</small>'",
		},
		messages: {
			loading_timeline: "Henter timeline... ",
			return_to_title: "Tilbage til titel",
			expand_timeline: "Forst?r timeline",
			contract_timeline: "Minim?r timeline",
			wikipedia: "Fra Wikipedia",
			loading_content: "Henter indhold",
			loading: "Arbejder"
		}
	}
}
