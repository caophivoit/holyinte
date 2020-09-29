// expose jQuery to global, theme dev <3 that!
if (!window.$ || !window.$.fn || !window.$.fn.jquery) {
    window.$ = window.jQuery;
}

// support scrolling
// https://css-tricks.com/styling-based-on-scroll-position/
(function ($) {

    $(document).ready(function () {
        if (
            "IntersectionObserver" in window &&
            "IntersectionObserverEntry" in window &&
            "intersectionRatio" in window.IntersectionObserverEntry.prototype
        ) {
            let observer = new IntersectionObserver(entries => {
                console.log('entries', entries, entries[0].boundingClientRect.y)
                if (entries[0].boundingClientRect.y < 0) {
                    document.body.classList.add("user-scroll");
                } else {
                    document.body.classList.remove("user-scroll");
                }
            });
            observer.observe(document.querySelector("#top-of-site-pixel-anchor"));
        }
    });

}(window.jQuery));