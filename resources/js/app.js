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

// POST LIST

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


// CREATE POST

const imageInput = document.getElementById('imageInput');
  const imageInput2 = document.getElementById('imageInput2');
  const imageIcon = document.getElementById('imageIcon');
  const imageIcon2 = document.getElementById('imageIcon2');
  const previewContainer = document.getElementById('imagePreviewContainer');
  const textarea = document.getElementById('autoResizeTextarea');

  // Auto resize textarea
  textarea.addEventListener('input', () => {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
  });

  // Klik icon di modal
  imageIcon.addEventListener('click', () => imageInput.click());

  // Klik icon di luar modal → buka modal + file picker
  imageIcon2.addEventListener('click', () => {
    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    modal.show();
    setTimeout(() => {
      imageInput2.click();
    }, 400);
  });

  // Fungsi preview multiple image
  function handleMultipleImagePreview(files) {
    for (const file of files) {
      if (!file.type.startsWith('image/')) continue;

      const reader = new FileReader();
      reader.onload = (e) => {
        // Tambahkan tiap gambar tanpa menghapus sebelumnya
        const imgWrapper = document.createElement('div');
        imgWrapper.classList.add('position-relative');
        imgWrapper.style.width = '550px';
        imgWrapper.style.height = 'auto';

        imgWrapper.innerHTML = `
          <img src="${e.target.result}" class="rounded" 
               style="width:100%; height:100%; object-fit:cover;">
          <button type="button" class="btn-close position-absolute top-0 end-0 bg-white p-1 rounded-circle"
                  style="transform: translate(25%, -25%);"
                  aria-label="Remove"></button>
        `;

        // tombol hapus image
        imgWrapper.querySelector('.btn-close').addEventListener('click', () => {
          imgWrapper.remove();
        });

        previewContainer.appendChild(imgWrapper);
      };
      reader.readAsDataURL(file);
    }
  }

  // Saat pilih file dari input dalam modal
  imageInput.addEventListener('change', (e) => handleMultipleImagePreview(e.target.files));

  // Saat pilih file dari input luar modal
  imageInput2.addEventListener('change', (e) => handleMultipleImagePreview(e.target.files));



  document.addEventListener('input', function (event) {
    if (event.target.classList.contains('comment-textarea')) {
        event.target.style.height = 'auto';
        event.target.style.height = (event.target.scrollHeight) + 'px';
    }
}, false);

// show comment
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.toggle-comment').forEach(icon => {
    icon.addEventListener('click', function() {
      const postId = this.dataset.postId;
      const commentSection = this.closest('.d-flex.justify-content-between.align-items-center.px-3')
                                 .nextElementSibling; // ambil div .show-comment setelahnya
      
      if (commentSection && commentSection.classList.contains('show-comment')) {
        commentSection.classList.toggle('active');
      }
    });
  });
});