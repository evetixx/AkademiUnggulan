import './bootstrap';
import Swal from './sweetalert2';

windows.konfirmubah = function (name) {
    Swal({
            title: "Are you sure?",
            text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                form.submit();
            }
        });
    return false;
}
