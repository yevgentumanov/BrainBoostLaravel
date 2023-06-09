window.onscroll = function() {
    scrollFunction();
};

document.addEventListener("DOMContentLoaded", function() {
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        var scrollToTopButton = document.getElementById("scrollToTopButton");

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopButton.style.display = "block";
        } else {
            scrollToTopButton.style.display = "none";
        }
    }

    document.getElementById("scrollToTopButton").onclick = function() {
        scrollToTop();
    };

    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
});
