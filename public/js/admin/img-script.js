function previewImg() {
	const img = document.querySelector("#image");
	const imgPreview = document.querySelector(".img-preview");

	const fileImage = new FileReader();
	fileImage.readAsDataURL(img.files[0]);
	fileImage.onload = function (e) {
		imgPreview.src = e.target.result;
	};
}

function previewCover() {
	const cover = document.querySelector("#cover");
	const imgCover = document.querySelector(".img-cover");

	const fileCover = new FileReader();
	fileCover.readAsDataURL(cover.files[0]);
	fileCover.onload = function (e) {
		imgCover.src = e.target.result;
	};
}
