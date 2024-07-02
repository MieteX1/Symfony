document.addEventListener('DOMContentLoaded', function () {

  function updateFileList() {
    imageList.innerHTML = '';

    Array.from(imageInput.files).forEach((file, index) => {
      const listItem = document.createElement('div');
      const fileReader = new FileReader();

      fileReader.onload = function (e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        listItem.innerHTML = `<div>${file.name}<button type="button" data-index="${index}">Anuluj</button></div>`;
        listItem.insertBefore(img, listItem.firstChild);
      };

      fileReader.readAsDataURL(file);
      imageList.appendChild(listItem);
    });
  }

  imageList.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-button')) {
      e.preventDefault();
      const button = e.target;
      const index = parseInt(button.getAttribute('data-index'), 10);
      const dt = new DataTransfer();
      const files = imageInput.files;

      for (let i = 0; i < files.length; i++) {
        if (i !== index) {
          dt.items.add(files[i]);
        }
      }

      imageInput.files = dt.files;
      updateFileList();
    }
  });

  imageInput.addEventListener('change', updateFileList);
});
