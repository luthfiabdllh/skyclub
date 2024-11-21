import axios from "axios";
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

// Nonaktifkan auto-discover agar Dropzone tidak otomatis menginisialisasi elemen
Dropzone.autoDiscover = false;

// Fungsi untuk menginisialisasi Dropzone Banner
function initializeDropzoneSlider(elementId, fileIndex) {
    const dropzoneElement = document.querySelector(elementId);

    // Pastikan elemen ditemukan
    if (dropzoneElement) {
        const csrfToken = document.querySelector('input[name="_token"]').value;

        // Inisialisasi Dropzone
        const myDropzone = new Dropzone(dropzoneElement, {
            url: "/upload-image-slider", // Endpoint backend untuk upload
            autoProcessQueue: true, // Proses upload otomatis saat file ditambahkan
            maxFilesize: 2, // Maksimal ukuran file dalam MB
            acceptedFiles: ".png,.jpg,.jpeg,.gif,.svg",
            headers: {
                "X-CSRF-TOKEN": csrfToken, // Kirim CSRF token
            },
            dictDefaultMessage: `
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-red-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-red-500 dark:text-gray-400">
                        <span class="font-semibold">Click to upload</span> or drag and drop
                    </p>
                    <p class="text-xs text-red-500 dark:text-gray-400">
                        SVG, PNG, JPG or GIF (Recomended. 576x650px)
                    </p>
                </div>
            `,
            init: function () {
                // Pratinjau gambar
                this.on("addedfile", function (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        dropzoneElement.style.backgroundImage = `url(${event.target.result})`;
                        dropzoneElement.style.backgroundSize = "cover";
                        dropzoneElement.style.backgroundPosition = "center";
                        dropzoneElement.style.backgroundRepeat = "no-repeat";
                    };
                    reader.readAsDataURL(file);

                    // Kirim file menggunakan Axios
                    const formData = new FormData();
                    formData.append("file", file);
                    formData.append("fileIndex", fileIndex); // Tambahkan fileIndex ke formData

                    axios
                        .post("/upload-image-slider", formData, {
                            headers: {
                                "Content-Type": "multipart/form-data",
                                "X-CSRF-TOKEN": csrfToken,
                            },
                        })
                        .then((response) => {
                            console.log("File uploaded successfully:", response.data);
                            // Hapus gambar kecil dari Dropzone
                            myDropzone.removeFile(file);
                        })
                        .catch((error) => {
                            console.error("Upload error:", error.response?.data || error.message);
                        });
                });

                // Saat proses upload berhasil
                this.on("success", function (file, response) {
                    console.log("File successfully uploaded:", response);
                });

                // Saat terjadi error
                this.on("error", function (file, errorMessage) {
                    console.error("Upload error:", errorMessage);
                });
            },
        });
    }
}

// Fungsi untuk menginisialisasi Dropzone image
function initializeDropzoneImage(elementId, uploadUrl) {
    const dropzoneElement = document.querySelector(elementId);

    // Pastikan elemen ditemukan
    if (dropzoneElement) {
        const csrfToken = document.querySelector('input[name="_token"]').value;

        // Inisialisasi Dropzone
        const myDropzone = new Dropzone(dropzoneElement, {
            url: uploadUrl, // Endpoint backend untuk upload
            autoProcessQueue: false, // Nonaktifkan default upload
            maxFilesize: 2, // Maksimal ukuran file dalam MB
            acceptedFiles: ".png,.jpg,.jpeg,.gif,.svg",
            headers: {
                "X-CSRF-TOKEN": csrfToken, // Kirim CSRF token
            },
            dictDefaultMessage: `
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-red-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-red-500 dark:text-gray-400">
                        <span class="font-semibold">Click to upload</span> or drag and drop
                    </p>
                    <p class="text-xs text-red-500 dark:text-gray-400">
                        SVG, PNG, JPG or GIF (Recommended. 576x650px)
                    </p>
                </div>
            `,
            init: function () {
                // Saat file ditambahkan
                this.on("addedfile", function (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        // Update background preview
                        dropzoneElement.style.backgroundImage = `url(${event.target.result})`;
                        dropzoneElement.style.backgroundSize = "cover";
                        dropzoneElement.style.backgroundPosition = "center";
                        dropzoneElement.style.backgroundRepeat = "no-repeat";
                    };
                    reader.readAsDataURL(file);

                    // Kirim file menggunakan Axios
                    const formData = new FormData();
                    formData.append("file", file);

                    axios
                        .post(uploadUrl, formData, {
                            headers: {
                                "Content-Type": "multipart/form-data",
                                "X-CSRF-TOKEN": csrfToken,
                            },
                        })
                        .then((response) => {
                            console.log("File uploaded successfully:", response.data);
                            // Hapus gambar kecil dari Dropzone
                            this.removeFile(file);

                            // Refresh halaman setelah upload sukses
                            location.reload();
                        })
                        .catch((error) => {
                            console.error("Upload error:", error.response?.data || error.message);
                        });
                });

                // Saat proses upload berhasil
                this.on("success", function (file, response) {
                    console.log("File successfully uploaded:", response);
                });

                // Saat terjadi error
                this.on("error", function (file, errorMessage) {
                    console.error("Upload error:", errorMessage);
                });
            },
        });
    }
}

// Fungsi untuk menginisialisasi Dropzone Banner
function initializeDropzoneBanner(elementId, fileIndex) {
    const dropzoneElement = document.querySelector(elementId);

    // Pastikan elemen ditemukan
    if (dropzoneElement) {
        const csrfToken = document.querySelector('input[name="_token"]').value;

        // Inisialisasi Dropzone
        const myDropzone = new Dropzone(dropzoneElement, {
            url: "/upload-image-banner", // Endpoint backend untuk upload
            autoProcessQueue: true, // Proses upload otomatis saat file ditambahkan
            maxFilesize: 2, // Maksimal ukuran file dalam MB
            acceptedFiles: ".png,.jpg,.jpeg,.gif,.svg",
            headers: {
                "X-CSRF-TOKEN": csrfToken, // Kirim CSRF token
            },
            dictDefaultMessage: `
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-red-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-red-500 dark:text-gray-400">
                        <span class="font-semibold">Click to upload</span> or drag and drop
                    </p>
                    <p class="text-xs text-red-500 dark:text-gray-400">
                        SVG, PNG, JPG or GIF (Recomended. 1010x600px)
                    </p>
                </div>
            `,
            init: function () {
                // Pratinjau gambar
                this.on("addedfile", function (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        dropzoneElement.style.backgroundImage = `url(${event.target.result})`;
                        dropzoneElement.style.backgroundSize = "cover";
                        dropzoneElement.style.backgroundPosition = "center";
                        dropzoneElement.style.backgroundRepeat = "no-repeat";
                    };
                    reader.readAsDataURL(file);

                    // Kirim file menggunakan Axios
                    const formData = new FormData();
                    formData.append("file", file);
                    formData.append("fileIndex", fileIndex); // Tambahkan fileIndex ke formData

                    axios
                        .post("/upload-image-banner", formData, {
                            headers: {
                                "Content-Type": "multipart/form-data",
                                "X-CSRF-TOKEN": csrfToken,
                            },
                        })
                        .then((response) => {
                            console.log("File uploaded successfully:", response.data);
                            // Hapus gambar kecil dari Dropzone
                            myDropzone.removeFile(file);
                        })
                        .catch((error) => {
                            console.error("Upload error:", error.response?.data || error.message);
                        });
                });

                // Saat proses upload berhasil
                this.on("success", function (file, response) {
                    console.log("File successfully uploaded:", response);
                });

                // Saat terjadi error
                this.on("error", function (file, errorMessage) {
                    console.error("Upload error:", errorMessage);
                });
            },
        });
    }
}

// Inisialisasi Dropzone slider untuk setiap elemen dengan fileIndex yang sesuai
initializeDropzoneSlider("#dropzone-slider-1", 1);
initializeDropzoneSlider("#dropzone-slider-2", 2);
initializeDropzoneSlider("#dropzone-slider-3", 3);

// Inisialisasi Dropzone banner untuk setiap elemen dengan fileIndex yang sesuai
initializeDropzoneBanner("#dropzone-banner-1", 1);

// Inisialisasi Dropzone image untuk setiap elemen dengan fileIndex yang sesuai
initializeDropzoneImage("#dropzone-image", '/upload-image-image');


