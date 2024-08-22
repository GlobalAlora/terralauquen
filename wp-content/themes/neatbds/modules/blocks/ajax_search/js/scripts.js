jQuery(document).ready(function () {
	jQuery(".block-ajax-search__form select").select2({
		allowClear: false,
		minimumResultsForSearch: -1,
	});
});
const ajaxfiltersubmit = (args) => {
	console.log(args)
	if (typeof args.filters == "string" && args.currentpage == 1) {
		jQuery(".clear").hide();
	} else {
		jQuery(".clear").css("display", "flex");
		jQuery("html, body").animate({
			scrollTop: jQuery(".bracket-ajax-filters").offset().top - 140,
		});
	}
};