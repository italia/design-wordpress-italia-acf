$(function () {
    let parallax = document.querySelectorAll(".innovation-section-head, .hero-head"),
        speed = 0.5;

    window.onscroll = function () {
        // if ratio is smaller than 16:9 image scroll is not behaving correctly
        if (window.innerWidth/window.innerHeight >  1.77) {
            [].slice.call(parallax).forEach(function (element) {
                let windowYOffset = window.pageYOffset,
                    backgroundPositionY = windowYOffset * 0.5;
                element.style.backgroundPositionY = "-" + backgroundPositionY + "px";
            });
        }
    };

    //$('.card').fitVids();

    // Manifesto
    var $accordion = $(".js-accordion");
    var $allPanels = $(" .js-accordion-panel");
    var $allItems = $(".js-accordion-item");

    $accordion.on("click", ".js-accordion-toggle", function() {
        $allPanels.slideUp();
        $allItems.removeClass("is-open");
        if ($(this).next().is(":visible")) {
            $(".js-accordion-panel").slideUp();
        } else {
            $(this).next().slideDown().closest(".js-accordion-item").addClass("is-open");
        }
        return false;

    });

    function isEmail(email) {
        return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email);
    }

    function onFieldsChange() {
        // Enables submit button when at least one option is selected and the input field is filled with an actual email
        $('.js-newsletter-submit')
            .prop('disabled', !isEmail($('.js-newsletter-email').val()));
    }
    $('.js-newsletter-email').on('input', onFieldsChange);
});

!function(){"use strict";function e(e){try{if("undefined"==typeof console)return;"error"in console?console.error(e):console.log(e)}catch(e){}}function t(e){return d.innerHTML='<a href="'+e.replace(/"/g,"&quot;")+'"></a>',d.childNodes[0].getAttribute("href")||""}function r(e,t){var r=e.substr(t,2);return parseInt(r,16)}function n(n,c){for(var o="",a=r(n,c),i=c+2;i<n.length;i+=2){var l=r(n,i)^a;o+=String.fromCharCode(l)}try{o=decodeURIComponent(escape(o))}catch(u){e(u)}return t(o)}function c(t){for(var r=t.querySelectorAll("a"),c=0;c<r.length;c++)try{var o=r[c],a=o.href.indexOf(l);a>-1&&(o.href="mailto:"+n(o.href,a+l.length))}catch(i){e(i)}}function o(t){for(var r=t.querySelectorAll(u),c=0;c<r.length;c++)try{var o=r[c],a=o.parentNode,i=o.getAttribute(f);if(i){var l=n(i,0),d=document.createTextNode(l);a.replaceChild(d,o)}}catch(h){e(h)}}function a(t){for(var r=t.querySelectorAll("template"),n=0;n<r.length;n++)try{i(r[n].content)}catch(c){e(c)}}function i(t){try{c(t),o(t),a(t)}catch(r){e(r)}}var l="/cdn-cgi/l/email-protection#",u=".__cf_email__",f="data-cfemail",d=document.createElement("div");i(document),function(){var e=document.currentScript||document.scripts[document.scripts.length-1];e.parentNode.removeChild(e)}()}();