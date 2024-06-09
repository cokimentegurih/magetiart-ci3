$(".form-check-input").on("click", function () {
	const submenuId = $(this).data("submenu");
	const roleId = $(this).data("role");
	const roleSlug = $(this).data("slug");

	$.ajax({
		url: base_url + "Role/changeAccess",
		type: "post",
		data: {
			submenuId: submenuId,
			roleId: roleId,
		},
		success: function () {
			document.location.href = base_url + "Role/detail/" + roleSlug;
		},
	});
});
