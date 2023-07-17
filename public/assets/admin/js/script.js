$(document).ready(function () {
    $(".sidebar-list__item").prepend('<i class="fa-solid fa-angle-right"></i>');
});

function toggleCollapse() {
    var element = $("#collapseForm");
    if (element.css("display") === "none") {
        element.css("display", "block");
    } else {
        element.css("display", "none");
    }
}

function toggleCollapseItem(id) {
    var element = $("#collapseItem-"+id);
    if (element.css("display") === "none") {
        element.css("display", "block");
        element.parent().height(element.parent().height() + element.height() +20);
    } else {
        element.parent().height(element.parent().height() - element.height() -20);
        element.css("display", "none");
    }
}
