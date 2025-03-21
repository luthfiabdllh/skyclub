import "./bootstrap";
import "flowbite";
import Alpine from "alpinejs";
import "./chart";
import "./descriptionField";
import "./dropzoneFieldPhoto";
import "./dropzonePayment";
import "./editor";
import "./editorUpdate";
import "./tableArticle";
import "./tableBooking";
import "./tableVoucher";

window.Alpine = Alpine;
Alpine.start();
// axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
