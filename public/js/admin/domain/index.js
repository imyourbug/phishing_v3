var dataTable = null;
$(document).ready(function () {
    dataTable = $("#table").DataTable({
        ajax: {
            url: "/domains",
            dataSrc: "domains",
        },
        columns: [
            {
                data: "id"
            },
            {
                data: "domain"
            },
            {
                data: function (d) {
                    return `<a class="btn btn-primary btn-sm" href='/domains/update/${d.id}'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <button data-id="${d.id}" class="btn btn-danger btn-sm btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>`;
                },
            },
        ],
    });
})

$(document).on("click", ".btn-delete", function () {
    if (confirm("Bạn có muốn xóa")) {
        let id = $(this).data("id");
        $.ajax({
            type: "DELETE",
            url: `/api/domains/${id}/destroy`,
            success: function (response) {
                if (response.status == 0) {
                    toastr.success("Xóa thành công");
                    dataTable.ajax.reload();
                } else {
                    toastr.error(response.message);
                }
            },
        });
    }
});
