import { loadInterface } from "../script.js";

$(document).ready(function () {
	$("main").on("submit", "#notice_form", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "ajax/ajax_editNotice.php",
			data: data,
			dataType: "json",
			success: function (response) {
				if (response.code == 1) {
					$(".success").addClass("d-block");
					$(".success .toast-body").html(response.msg);

					setTimeout(() => {
						$(".success").fadeOut(1000);
						setInterval(() => {
							$(".success").removeClass("d-block");
						}, 950);
					}, 3000);
				} else if (response.code == 2) {
					$(".alert").addClass("d-block");
					$(".alert .toast-body").html(response.msg);

					setTimeout(() => {
						$(".alert").fadeOut(1000);
						setInterval(() => {
							$(".alert").removeClass("d-block");
						}, 950);
					}, 3000);
				}
			},
		});
	});

	$("main").on("submit", "#req_form", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "ajax/ajax_editReq.php",
			data: data,
			dataType: "json",
			success: function (response) {
				if (response.code == 1) {
					$(".success").addClass("d-block");
					$(".success .toast-body").html(response.msg);

					setTimeout(() => {
						$(".success").fadeOut(1000);
						setInterval(() => {
							$(".success").removeClass("d-block");
						}, 950);
					}, 3000);
				} else if (response.code == 2) {
					$(".alert").addClass("d-block");
					$(".alert .toast-body").html(response.msg);

					setTimeout(() => {
						$(".alert").fadeOut(1000);
						setInterval(() => {
							$(".alert").removeClass("d-block");
						}, 950);
					}, 3000);
				}
			},
		});
	});

	$("main").on("submit", "#sms_form", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "ajax/ajax_editSMS.php",
			data: data,
			dataType: "json",
			success: function (response) {
				if (response.code == 1) {
					$(".success").addClass("d-block");
					$(".success .toast-body").html(response.msg);

					setTimeout(() => {
						$(".success").fadeOut(1000);
						setInterval(() => {
							$(".success").removeClass("d-block");
						}, 950);
					}, 3000);
				} else if (response.code == 2) {
					$(".alert").addClass("d-block");
					$(".alert .toast-body").html(response.msg);

					setTimeout(() => {
						$(".alert").fadeOut(1000);
						setInterval(() => {
							$(".alert").removeClass("d-block");
						}, 950);
					}, 3000);
				}
			},
		});
	});
});
