import './bootstrap';
import '../sass/app.scss';
import * as bootstrap from 'bootstrap';

// ============================
// 🔍 Search overlay effect
// ============================

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('mainSearch');
    const searchInput2 = document.getElementById('mainSearch2');
    const overlay = document.getElementById('overlay');

    if (searchInput) {
        searchInput.addEventListener('focus', () => {
            document.body.classList.add('search-active');
        });
        searchInput.addEventListener('blur', () => {
            document.body.classList.remove('search-active');
        });
    }
    if (searchInput2) {
        searchInput2.addEventListener('focus', () => {
            document.body.classList.add('search-active');
        });
        searchInput2.addEventListener('blur', () => {
            document.body.classList.remove('search-active');
        });
    }

    if (overlay) {
        overlay.addEventListener('click', () => {
            if (searchInput) searchInput.blur();
        });
    }
    if (overlay) {
        overlay.addEventListener('click', () => {
            if (searchInput2) searchInput2.blur();
        });
    }
});


const imageInput = document.getElementById('imageInput');
const imageIcon = document.getElementById('imageIcon');
const imageInput2 = document.getElementById('imageInput2');
const imageIcon2 = document.getElementById('imageIcon2');
const previewContainer = document.getElementById('imagePreviewContainer');
const textarea = document.getElementById('autoResizeTextarea');


imageIcon.addEventListener('click', () => {
  imageInput.click();
});

imageInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (!file) return;

  if (!file.type.startsWith('image/')) {
    alert('Please select an image file only.');
    imageInput.value = '';
    return;
  }

  const reader = new FileReader();
  reader.onload = function (e) {
    previewContainer.innerHTML = `
      <img src="${e.target.result}" alt="Image preview" class="img-fluid rounded mt-2" style="max-height: 700px; object-fit: contain;">
    `;
  };
  reader.readAsDataURL(file);
});

imageIcon2.addEventListener('click', () => {
  imageInput2.click();
});

imageInput2.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (!file) return;

  if (!file.type.startsWith('image/')) {
    alert('Please select an image file only.');
    imageInput2.value = '';
    return;
  }

  const reader = new FileReader();
  reader.onload = function (e) {
    previewContainer.innerHTML = `
      <img src="${e.target.result}" alt="Image preview" class="img-fluid rounded mt-2" style="max-height: 700px; object-fit: contain;">
    `;
  };
  reader.readAsDataURL(file);
});

textarea.addEventListener('input', () => {
  textarea.style.height = 'auto'; 
  textarea.style.height = textarea.scrollHeight + 'px';
});

document.querySelectorAll('.toggle-btn').forEach(button => {
    button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-target');
        const desc = document.getElementById(targetId);

        if (desc.classList.contains('truncated')) {
            desc.classList.remove('truncated');
            button.textContent = 'less';
        } else {
            desc.classList.add('truncated');
            button.textContent = 'more';
        }
    });
});

