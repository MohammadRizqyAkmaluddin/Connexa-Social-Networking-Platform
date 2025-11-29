
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener("change", function (e) {
            let id = this.id; // contoh: formFile_3 atau portfolio_5
            let jobId = id.split("_")[1];

            let container =
                id.startsWith("formFile")
                    ? document.getElementById("fileNameContainer_" + jobId)
                    : document.getElementById("fileNamePortfolio_" + jobId);

            let file = this.files[0];
            if (!file) return;

            let ext = file.name.split(".").pop().toLowerCase();
            let badge = ext === "pdf" ? "PDF" : ext.toUpperCase();
            let bg = (ext === "pdf") ? "red" : "blue";

            container.innerHTML = `
                <span style="
                    background:${bg};
                    color:white;
                    padding:3px 8px;
                    border-radius:6px;
                    font-size:12px;
                    font-weight:600;
                    margin-right:8px;
                ">${badge}</span>
                ${file.name}
            `;
        });
    });
});
