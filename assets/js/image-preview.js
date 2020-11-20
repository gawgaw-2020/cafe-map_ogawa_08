function loadImage(obj)
{
	document.getElementById('preview').innerHTML = '<p>プレビュー</p>';
	for (i = 0; i < obj.files.length; i++) {
		var fileReader = new FileReader();
		fileReader.onload = (function (e) {
			document.getElementById('preview').innerHTML += '<img src="' + e.target.result + '">';
		});
		fileReader.readAsDataURL(obj.files[i]);
	}
}
