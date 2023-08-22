

function toggleCollapse() {
    var element = $("#collapseForm");
    if (element.css("display") === "none") {
        element.css("display", "block");
    } else {
        element.css("display", "none");
    }
}

function toggleCollapseItem(id) {
    var element = $("#collapseItem-" + id);
    if (element.css("display") === "none") {
        element.css("display", "block");
        element.parent().height(element.parent().height() + element.height() + 20);
    } else {
        element.parent().height(element.parent().height() - element.height() - 20);
        element.css("display", "none");
    }
}

function closeAllSidebarItem() {
    $(".sidebar-list__item").toggle()
}



/* profile foto arka plan rengi değiştirme her seferinde farklı renkler*/
$(document).ready(function() {
    $(".user-profile").each(function() {
        const colors = generateRandomColors();
        $(this).css("--color-1", colors[0]);
        $(this).css("--color-2", colors[1]);
    });
});


function generateRandomColors() {
    const color1 = getRandomColor();
    let color2 = getRandomColor();

    while (calculateColorDifference(color1, color2) < 30) {
        color2 = getRandomColor();
    }

    return [color1, color2];
}

function getRandomColor() {
    const letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function calculateColorDifference(color1, color2) {
    const rgb1 = hexToRgb(color1);
    const rgb2 = hexToRgb(color2);

    const diff = Math.sqrt(
        (rgb1.r - rgb2.r) ** 2 +
        (rgb1.g - rgb2.g) ** 2 +
        (rgb1.b - rgb2.b) ** 2
    );

    return diff;
}

function hexToRgb(hex) {
    const bigint = parseInt(hex.slice(1), 16);
    const r = (bigint >> 16) & 255;
    const g = (bigint >> 8) & 255;
    const b = bigint & 255;
    return { r, g, b };
}
