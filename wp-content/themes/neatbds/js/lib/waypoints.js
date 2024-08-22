jQuery.noConflict();
jQuery(document).ready(function ($) {
	function buildwaypoints() {
		$("[data-waypoint]").each(function () {
			let margin = "";
			if ($(this).data("waypoint").includes("px")) {
				margin =
					"-" +
					($(this).data("waypoint") ? $(this).data("waypoint") : 0);
				(" 0px");
			} else {
				margin =
					"-" +
					($(this).data("waypoint")
						? $(this).data("waypoint")
						: 0.25) *
						100 +
					"% 0px";
			}
			let options = {
				threshold: 0,
				rootMargin: margin,
			};
			if (this.waypointObserver) this.waypointObserver.disconnect();
			this.waypointObserver = new IntersectionObserver(
				(entries, observer) => {
					let element = entries[0].target;
					if (entries[0].isIntersecting) {
						$(element).addClass("in").removeAttr("data-waypoint");
						if ($(element).data("function")) {
							window[$(element).data("function")]();
						}
						element.waypointObserver.disconnect();
					}
				},
				options
			);
			this.waypointObserver.observe($(this)[0]);
		});
	}

	$(window).on("resize", function () {
		buildwaypoints();
	});

	$("[data-in]").each(function () {
		var t = this;
		setTimeout(() => {
			jQuery(t).addClass("in");
			if ($(t).data("function")) {
				window[$(t).data("function")]();
			}
		}, $(this).data("in"));
	});

	var CSSloadcheck = setInterval(function () {
		if ($("html").css("box-sizing") == "border-box") {
			buildwaypoints();
			clearInterval(CSSloadcheck);
		}
	}, 100);
});
