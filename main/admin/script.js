$(document).ready(function () {
	loadInterface("overview.php");

	/*
      sidebar tabs action event
   */
	$("#overview_tab").on("click", () => {
		loadInterface("overview.php");

		$(".nav-links div a").removeClass("active");
		$("#overview_tab a").addClass("active");

		$(".nav-heading-icon").html(
			'<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>'
		);
		$(".nav-heading").html("Admin Dashboard");
	});
	$(".content main, .sidebar").on("click", "#applicationView_tab", () => {
		loadTableInterface("applicationView.php", "#application_table", [3, 4]);

		$(".nav-links div a").removeClass("active");
		$("#applicationView_tab a").addClass("active");

		$(".nav-heading-icon").html(
			'<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>'
		);
		$(".nav-heading").html("Application List");
	});
	$(".content main, .sidebar").on("click", "#scholars_tab", () => {
		loadReportDataInterface("scholarList.php", "#scholars_tbl");

		$(".nav-links div a").removeClass("active");
		$("#scholars_tab a").addClass("active");

		$(".nav-heading-icon").html(
			'<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>'
		);
		$(".nav-heading").html("Scholar List");
	});
	$(".content main, .sidebar").on("click", "#viewCourse_tab", () => {
		loadInterface("viewCourse.php");

		$(".nav-links div a").removeClass("active");
		$("#viewCourse_tab a").addClass("active");

		$(".nav-heading-icon").html(
			'<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>'
		);
		$(".nav-heading").html("Courses");
	});
	$(".content main, .sidebar").on("click", "#configure_tab", () => {
		loadInterface("configureInfo.php");

		$(".nav-links div a").removeClass("active");
		$("#configure_tab a").addClass("active");

		$(".nav-heading-icon").html(
			'<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>'
		);
		$(".nav-heading").html("Configure System Information");
	});
	// end =========================

	/*
      top navbar action events
   */
	$("#notif_btn").on("click", () => {
		let hasclass = $("#notif_badge").hasClass("d-block");
		if (hasclass) {
			$("#notif_badge").removeClass("d-block").addClass("d-none");
		}
		loadInterface("notifView.php");
	});

	/*
      application table actions
    */
	$("main").on("click", "#appDetails_btn", function () {
		let row_id = $(this).attr("data-id");

		$.ajax({
			type: "POST",
			url: "applicationDetails.php",
			data: { id: row_id },
			cache: "false",
			success: function (response) {
				$("main").html(response);
			},
		});
	});

	$("main").on("click", "#approve_btn", function () {
		$("main .approve-container").toggleClass("d-none", "d-flex");
		$("main .reject-container").removeClass("d-flex").addClass("d-none");
	});
	$("main").on("click", "#approve_confirm", function () {
		let formID = $("#application_id").val();
		let schedDateTime = $("#schedule").val();
		let formNote = $("#note").val();

		$.ajax({
			type: "POST",
			url: "ajax/ajax_adminAppControls.php",
			data: {
				id: formID,
				sched: schedDateTime,
				note: formNote,
				req: "approve",
			},
			cache: "false",
			dataType: "json",
			success: function (response) {
				if (response.type == "success") {
					$(".success").addClass("d-block");
					$(".success .toast-body").html(response.msg);

					loadTableInterface(
						"applicationView.php",
						"#application_table",
						[3, 4]
					);

					setTimeout(() => {
						$(".success").fadeOut(1000);
						setInterval(() => {
							$(".success").removeClass("d-block");
						}, 950);
					}, 5000);
				} else if (response.type == "error") {
					$(".alert").addClass("d-block");
					$(".alert .toast-body").html(response.msg);

					setTimeout(() => {
						$(".alert").fadeOut(1000);
						setInterval(() => {
							$(".alert").removeClass("d-block");
						}, 950);
					}, 5000);
				}
			},
		});
	});

	$("main").on("click", "#reject_btn", function () {
		$("main .reject-container").toggleClass("d-none", "d-flex");
		$("main .approve-container").removeClass("d-flex").addClass("d-none");
	});
	$("main").on("click", "#reject_confirm", function () {
		let formID = $("#application_id").val();
		let formNote = $("#reject_note").val();

		$.ajax({
			type: "POST",
			url: "ajax/ajax_adminAppControls.php",
			data: {
				id: formID,
				note: formNote,
				req: "reject",
			},
			cache: "false",
			dataType: "json",
			success: function (response) {
				if (response.type == "success") {
					$(".success").addClass("d-block");
					$(".success .toast-body").html(response.msg);

					loadTableInterface(
						"applicationView.php",
						"#application_table",
						[3, 4]
					);

					setInterval(() => {
						$(".success").fadeOut(1000);
						setInterval(() => {
							$(".success").removeClass("d-block");
						}, 950);
					}, 5000);
				} else if (response.type == "error") {
					$(".alert").addClass("d-block");
					$(".alert .toast-body").html(response.msg);

					setInterval(() => {
						$(".alert").fadeOut(1000);
						setInterval(() => {
							$(".alert").removeClass("d-block");
						}, 950);
					}, 5000);
				}
			},
		});
	});

	/*
      modal scripts for finalization
   */
	let req;
	$("main").on("click", "#confirmScholar_btn", function () {
		req = "confirmScholar";
		$("#confirm_label").html("Notice");
		$("#confirm_modal .modal-body").html(
			"Finalize this application form and make them a scholar?"
		);
	});
	$("main").on("click", "#deleteScholar_btn", function () {
		req = "deleteScholar";
		$("#confirm_label").html("Warning");
		$("#confirm_modal .modal-body").html(
			"Confirm deletion of this application form? This cannot be revised"
		);
	});
	$("main").on("click", "#finalConfirm_btn", function () {
		let formID = $("#application_id").val();

		$.ajax({
			type: "POST",
			url: "ajax/ajax_adminAppControls.php",
			data: { id: formID, req: req },
			cache: "false",
			dataType: "json",
			success: function (response) {
				if (response.type == "success") {
					$(".success").addClass("d-block");
					$(".success .toast-body").html(response.msg);

					loadTableInterface(
						"applicationView.php",
						"#application_table",
						[3, 4]
					);

					setInterval(() => {
						$(".success").fadeOut(1000);
						setInterval(() => {
							$(".success").removeClass("d-block");
						}, 950);
					}, 5000);
				} else if (response.type == "error") {
					$(".alert").addClass("d-block");
					$(".alert .toast-body").html(response.msg);

					setInterval(() => {
						$(".alert").fadeOut(1000);
						setInterval(() => {
							$(".alert").removeClass("d-block");
						}, 950);
					}, 5000);
				}
			},
		});
	});
	// end ===========================

	$("main").on("click", "#appliBack_btn", function () {
		loadTableInterface("applicationView.php", "#application_table", [3, 4]);
	});
	$("main").on("click", "#appliCancel", function () {
		$("main .approve-container").removeClass("d-flex").addClass("d-none");
		$("main .reject-container").removeClass("d-flex").addClass("d-none");
	});

	/* 
      notification actions
   */
	$("main").on("click", "#notif_pane", function () {
		let ref_id = $(this).attr("data-ref");
		let badge_id = $(this).attr("data-id");

		$.ajax({
			type: "POST",
			url: "applicationDetails.php",
			data: {
				id: ref_id,
				badge: badge_id,
			},
			cache: "false",
			success: function (response) {
				$("main").html(response);
			},
		});
	});
});

// loads normal tables
export function loadInterface(src) {
	$.ajax({
		url: src,
		method: "GET",
		success: function (data) {
			$("main").html(data);
		},
	});
}
// loads contents with data tables
export function loadTableInterface(src, table, columns) {
	$.ajax({
		url: src,
		method: "GET",
		success: function (data) {
			$("main").html(data);

			new DataTable(table, {
				initComplete: function () {
					this.api()
						.columns(columns)
						.every(function () {
							let column = this;

							let select = document.createElement("select");
							select.add(new Option(""));
							column.footer().replaceChildren(select);

							select.addEventListener("change", function () {
								var val = DataTable.util.escapeRegex(select.value);

								column
									.search(val ? "^" + val + "$" : "", true, false)
									.draw();
							});

							column
								.data()
								.unique()
								.sort()
								.each(function (d, j) {
									select.add(new Option(d));
								});
						});
				},
			});
		},
	});
}
// loads content with special tables such as reports
export function loadReportDataInterface(src, table) {
	const year = new Date();
	$.ajax({
		url: src,
		method: "GET",
		success: function (data) {
			$("main").html(data);

			new DataTable(table, {
				dom: "Bfrtip",
				buttons: [
					{
						extend: "print",
						title: "Scholars for the year " + year.getFullYear(),
						messageTop: "See the list below",
					},
				],
			});
		},
	});
}
