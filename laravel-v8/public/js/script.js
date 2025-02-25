const title = document.querySelector("#title");
const slug = document.querySelector("#slug");

title.addEventListener("change", function () {
    fetch("/dashboard/posts/checkslug?title=" + title.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});

document.addEventListener("trix-file-accept", function (e) {
    e.preventDefault();
});

function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    // First way
    // const oFReader = new FileReader();
    // oFReader.readAsDataURL(image.files[0]);

    // oFReader.onload = function(oFREvent) {
    //     imgPreview.src = oFREvent.target.result;
    // }

    // Second way
    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;

}
