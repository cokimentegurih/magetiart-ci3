// tombol logout
$(".tombol-logout").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	new Swal({
		title: "Apakah anda yakin?",
		text: "Anda akan logout.",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Iya",
		cancelButtonText: "Tidak",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});

// tombol hapus
$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	new Swal({
		title: "Apakah anda yakin?",
		text: "Anda akan menghapus data ini.",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Iya",
		cancelButtonText: "Tidak",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
