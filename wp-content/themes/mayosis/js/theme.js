!(function (e) {
    "use strict";
    var t, o, i, a;
    e(document).ready(function () {
        e(window).scroll(function () {
            50 < e(this).scrollTop() ? e("#back-to-top").fadeIn() : e("#back-to-top").fadeOut();
        }),
            e("#back-to-top").click(function () {
                return e("#back-to-top").tooltip("hide"), e("body,html").animate({ scrollTop: 0 }, 800), !1;
            }),
            e("#back-to-top").tooltip("show");
    }),
        e(document).ready(function () {
            e("#quote-carousel").carousel({ pause: !0, interval: 4e3 });
        }),
        (o = e('.edd_price_options input[type="radio"]')).click(function () {
            o.each(function () {
                e(this).closest(".edd_price_options ul li").toggleClass("item-selected active", this.checked).removeClass("active");
            });
        }),
        e("#menu-close").click(function (t) {
            t.preventDefault(), e("#sidebar-wrapper").toggleClass("active");
        }),
        e("#menu-toggle").click(function (t) {
            t.preventDefault(), e("#sidebar-wrapper").toggleClass("active");
        }),
        e(function () {
            e("input,textarea")
                .focus(function () {
                    e(this).data("placeholder", e(this).attr("placeholder")).attr("placeholder", "");
                })
                .blur(function () {
                    e(this).attr("placeholder", e(this).data("placeholder"));
                });
        }),
        (t = jQuery)('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") && location.hostname === this.hostname) {
                var e = t(this.hash);
                if ((e = e.length ? e : t("[name=" + this.hash.slice(1) + "]")).length) return t("html, body").animate({ scrollTop: e.offset().top - 54 }, 1e3, "easeInOutExpo"), !1;
            }
        }),
        t(".js-scroll-trigger").click(function () {
            t(".navbar-collapse").collapse("hide");
        }),
        e(function () {
            e('[data-toggle="tooltip"]').tooltip(),
                e(".side-nav .collapse").on("hide.bs.collapse", function () {
                    e(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
                }),
                e(".side-nav .collapse").on("show.bs.collapse", function () {
                    e(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
                });
        }),
        e(window).resize(function () {
            e(".parallax-container video").each(function () {
                !(function (t) {
                    var o = e(t);
                    o.attr("style", "");
                    var i = o.width(),
                        a = o.height(),
                        n = o.closest(".parallax-container-inner").width(),
                        s = i / n,
                        r = a / o.closest(".parallax-container-inner").height(),
                        l = i / Math.min(s, r),
                        c = -Math.abs((l - n) / 2);
                    o.attr("style", "height: auto !important; width: " + l + "px !important; left: " + c + "px !important; top: 0px !important;");
                })(e(this));
            }),
                e("iframe.vimeo-player-section").each(function () {
                    var t,
                        o = e(this),
                        i = o.parent().width(),
                        a = o.parent().height();
                    if ((o.data("vimeo-ratio") ? (t = o.attr("data-vimeo-ratio")) : ((t = o.data("height") / o.data("width")), o.attr("data-vimeo-ratio", t)), o.removeAttr("height width"), i * t >= a))
                        o.height(i * t)
                            .width("100%")
                            .css("margin-top", -(i * t - a) / 2)
                            .css("margin-left", 0);
                    else {
                        var n = -(a / t - i) / 2;
                        o.height(a)
                            .width(a / t)
                            .css("margin-left", n)
                            .css("margin-top", 0);
                    }
                }),
                e.getScript("//f.vimeocdn.com/js/froogaloop2.min.js", function () {
                    e("iframe.vimeo-player-section").each(function () {
                        var t = e(this);
                        t.attr("src", t.attr("src"));
                        var o = $f(this);
                        o.addEvent("ready", function () {
                            o.api("setVolume", 0), o.api("play");
                        });
                    });
                }),
                e(window).on("statechangecomplete", function () {
                    e("iframe.vimeo-player-section").each(function () {
                        var e = $f(this);
                        e.addEvent("ready", function () {
                            e.api("setVolume", 0), e.api("play");
                        });
                    });
                });
        }),
        e(".paratrue iframe").each(function () {
            11 == ie && 1e3 < parseInt(e(this).parent().height()) && e(this).closest(".parallax-container").removeClass("paratrue");
        }),
        e(window).resize(function () {
            e(".no-touch .has-anim .owl-carousel").each(function () {
                ($this = e(this)), $this.closest(".has-anim").addClass("notransition");
            }),
                setTimeout(function () {
                    e(".no-touch .has-anim .owl-carousel").closest(".has-anim").removeClass("notransition");
                }, 300);
        }),
        (i = jQuery)(document).ready(function () {
            i("#mayosis-sidemenu li.has-sub>a").on("click", function () {
                i(this).removeAttr("href");
                var e = i(this).parent("li");
                e.hasClass("open")
                    ? (e.removeClass("open"), e.find("li").removeClass("open"), e.find("ul").slideUp())
                    : (e.addClass("open"),
                      e.children("ul").slideDown(),
                      e.siblings("li").children("ul").slideUp(),
                      e.siblings("li").removeClass("open"),
                      e.siblings("li").find("li").removeClass("open"),
                      e.siblings("li").find("ul").slideUp());
            }),
                i("#mayosis-sidemenu>ul>li.has-sub>a").append('<span class="holder"></span>');
        }),
        e(function () {
            e('a[href="#searchoverlay"]').on("click", function (t) {
                t.preventDefault(), e("#searchoverlay").addClass("open"), e('#searchoverlay > form > input[type="search"]').focus();
            }),
                e("#searchoverlay, #searchoverlay button.close").on("click keyup", function (t) {
                    (t.target != this && "close" != t.target.className && 27 != t.keyCode) || e(this).removeClass("open");
                });
        }),
        e(document).ready(function () {
            e("#mayosis-sidebarCollapse").on("click", function () {
                e("#mayosis-sidebar").toggleClass("active"), e(".sidebar-wrapper").toggleClass("mcollapsed");
            });
        }),
        (a = jQuery)(window).on("load", function () {
            0 < a(".load-mayosis").length && a(".load-mayosis").fadeOut("slow");
        }),
        e(window).scroll(function () {
            1 < e(this).scrollTop() ? e(".stickyenabled").addClass("fixedheader") : e(".stickyenabled").removeClass("fixedheader");
        }),
        e(".burger, .overlaymobile").click(function () {
            e(".burger").toggleClass("clicked"), e(".overlaymobile").toggleClass("show"), e(".mobile--nav-menu").toggleClass("show"), e("body").toggleClass("overflow");
        });
})(jQuery),
    jQuery(document).ready(function (e) {
        "use strict";
        var t = e(".justified-grid").isotope({ itemSelector: ".justified-grid-item", layoutMode: "fitRows" }),
            o = e(".filters");
        o.on("click", "li", function (i) {
            o.find(".is-checked").removeClass("is-checked");
            var a = e(i.currentTarget);
            a.addClass("is-checked");
            var n = a.attr("data-filter");
            t.isotope({ filter: n });
        });
    }),
    jQuery(document).ready(function (e) {
        jQuery(".grid--filter--main span").click(function () {
            e(".active").not(e(this)).removeClass("active"), e(this).toggleClass("active");
        });
    }),
    jQuery(document).ready(function (e) {
        e(".humburger-ms").on("click", function () {
            e("#myNav").toggleClass("open");
        });
    }),
    jQuery(document).ready(function (e) {
        "use strict";
        var t = "";
        jQuery(".fil-cat").click(function () {
            (t = e(this).attr("data-rel")),
                e("#isotope-filter-recent").fadeTo(100, 0.1),
                e("#isotope-filter-recent .tile")
                    .not("." + t)
                    .fadeOut()
                    .removeClass("scale-anm"),
                setTimeout(function () {
                    e("." + t)
                        .fadeIn()
                        .addClass("scale-anm"),
                        e("#isotope-filter-recent").fadeTo(300, 1);
                }, 300);
        });
    }),
    jQuery(document).ready(function (e) {
        "use strict";
        var t = "";
        jQuery(".fil-cat").click(function () {
            (t = e(this).attr("data-rel")),
                e("#isotope-filter").fadeTo(100, 0.1),
                e("#isotope-filter .tile")
                    .not("." + t)
                    .fadeOut()
                    .removeClass("scale-anm"),
                setTimeout(function () {
                    e("." + t)
                        .fadeIn()
                        .addClass("scale-anm"),
                        e("#isotope-filter").fadeTo(300, 1);
                }, 300);
        });
    }),
    jQuery(document).ready(function (e) {
        e(
            ".download_cat_filter select,.mayosis_vendor_cat select,.mayosis-filter-title .product_filter_mayosis,.vendor--search-filter--box select,.mayofilter-orderby,.mayosis-filters-select,.mayosis-filters-select-small,.tutor-course-filter-form select"
        ).niceSelect(),
            e(".multiselect,#edd_checkout_form_wrap select,.edd_form select").niceSelect("destroy");
    }),
    jQuery(document).ready(function (e) {
        e(".admin-bar").length;
        var t = e(window).width();
        e(".mayosis-floating-share").each(function () {
            var o = e(".mayosis-floating-share").outerHeight(!0) + 50;
            e(this).css("height", e(".single-prime-layout").height() + (t > 1500 ? o : 0) + "px"), e(this).theiaStickySidebar({ minWidth: 768, updateSidebarHeight: !1, defaultPosition: "absolute", additionalMarginTop: 150 });
        });
    }),
    jQuery(function (e) {
        "use strict";
        if (e("body").is(".download-template-prime-download-template, .single-post")) {
            var t = function (e, t) {
                var o = e.getBoundingClientRect(),
                    i = t.getBoundingClientRect();
                return !(o.top > i.bottom || o.right < i.left || o.bottom < i.top || o.left > i.right);
            };
            if (e(window).width() < 768) return !1;
            var o = [],
                i = e(".mayosis-floating-share");
            e([".bottom-post-footer-widget", ".main-footer", ".alignfull"].join(",")).each(function () {
                o.push(this);
            }),
                e(window).on("scroll", function () {
                    var a = !1,
                        n = i.find(".theiaStickySidebar").get(0);
                    if (e(window).scrollTop() < 0) a = !0;
                    else
                        for (var s in o)
                            if (t(n, o[s])) {
                                a = !0;
                                break;
                            }
                    a ? i.addClass("is-hidden") : i.removeClass("is-hidden");
                });
        }
    }),
    jQuery(document).ready(function (e) {
        e(".format-video .mayosis--video--box,.format-video .product-masonry-item-content,.format-video .product-justify-item-content").hover(
            function (t) {
                e("video", this).get(0).play();
            },
            function (t) {
                e("video", this).get(0).pause();
            }
        ),
            lity.handlers("video", function (e) {
                if ("string" == typeof e && e.indexOf(".mp4") > 0) {
                    var t = '<video style="max-width: 100%;" autoplay playsinline>';
                    return (t += '<source src="' + e + '" type="video/mp4">') + "</video>";
                }
                return !1;
            });
    }),
    jQuery(document).ready(function (e) {
        Plyr.setup("#mayosisplayergrid"), Plyr.setup("#mayosisplayer");
    }),
    jQuery(document).ready(function (e) {
        var t = e(".gridbox");
        e(window).load(function () {
            t.imagesLoaded(function () {
                t.isotope({ itemSelector: ".element-item", layoutMode: "fitRows", transitionDuration: "0.8s" }),
                    setTimeout(function () {
                        t.isotope("layout");
                    }, 500),
                    e(".mayosis-filters-select").change(function () {
                        t.isotope({ filter: this.value });
                    }),
                    e(window).on("resize", function () {
                        t.isotope("layout");
                    }),
                    window.addEventListener(
                        "orientationchange",
                        function () {
                            t.isotope("layout");
                        },
                        !1
                    );
            });
        });
    }),
    jQuery(document).ready(function (e) {
        var t = e(".mayosis_tabbed_grid_featured");
        e(window).load(function () {
            t.imagesLoaded(function () {
                t.isotope({ itemSelector: ".element-item", layoutMode: "fitRows", transitionDuration: "0.8s" }),
                    setTimeout(function () {
                        t.isotope("layout");
                    }, 500),
                    e(".mayosis-filters-select").change(function () {
                        t.isotope({ filter: this.value });
                    }),
                    e(window).on("resize", function () {
                        t.isotope("layout");
                    }),
                    window.addEventListener(
                        "orientationchange",
                        function () {
                            t.isotope("layout");
                        },
                        !1
                    );
            });
        });
    }),
    jQuery(document).ready(function (e) {
        var t = e(".mayosis_tabbed_grid_recent");
        e(window).load(function () {
            t.imagesLoaded(function () {
                t.isotope({ itemSelector: ".element-item", layoutMode: "fitRows", transitionDuration: "0.8s" }),
                    setTimeout(function () {
                        t.isotope("layout");
                    }, 500),
                    e(".mayosis-filters-select").change(function () {
                        t.isotope({ filter: this.value });
                    }),
                    e(window).on("resize", function () {
                        t.isotope("layout");
                    }),
                    window.addEventListener(
                        "orientationchange",
                        function () {
                            t.isotope("layout");
                        },
                        !1
                    );
            });
        });
    }),
    jQuery(document).ready(function (e) {
        var t = e(".gridboxsmall");
        e(window).load(function () {
            t.imagesLoaded(function () {
                t.isotope({ itemSelector: ".grid-product-box", layoutMode: "fitRows", transitionDuration: "0.8s" }),
                    setTimeout(function () {
                        t.isotope("layout");
                    }, 500),
                    e(".mayosis-filters-select-small").change(function () {
                        t.isotope({ filter: this.value });
                    }),
                    e(window).on("resize", function () {
                        t.isotope("layout");
                    }),
                    window.addEventListener(
                        "orientationchange",
                        function () {
                            t.isotope("layout");
                        },
                        !1
                    );
            });
        });
    }),
    jQuery(document).ready(function (e) {
        var t = e(".product-masonry");
        e(window).load(function () {
            t.imagesLoaded(function () {
                t.isotope({ itemSelector: ".product-masonry-item", layoutMode: "masonry", transitionDuration: "0.8s" }),
                    setTimeout(function () {
                        t.isotope("layout");
                    }, 500),
                    e(".product-masonry-filter li a").on("click", function () {
                        e(".product-masonry-filter li a").removeClass("active"), e(this).addClass("active");
                        var o = e(this).attr("data-filter");
                        return (
                            e(".product-masonry").isotope({ filter: o }),
                            setTimeout(function () {
                                t.isotope("layout");
                            }, 700),
                            !1
                        );
                    }),
                    e(window).on("resize", function () {
                        t.isotope("layout");
                    }),
                    window.addEventListener(
                        "orientationchange",
                        function () {
                            t.isotope("layout");
                        },
                        !1
                    );
            });
        });
    }),
    jQuery(document).ready(function (e) {
        e(".statistic-counter").counterUp({ delay: 10, time: 2e3 });
    }),
    jQuery(document).ready(function (e) {
        e(".mayosis--video--box,.photo--section--image").fitVids();
    }),
    jQuery(document).ready(function () {
        $(".overlay_button_search").click(function () {
            $(".main_searchoverlay").addClass("open");
        });
    }),
    jQuery(document).ready(function () {
        $(".floating_play").click(function () {
            $(".floating_pause").show(), $(".floating_pause").css("display", "inline-block"), $(".floating_play").hide();
        }),
            $(".floating_pause").click(function () {
                $(".floating_play").show(), $(".floating_play").css("display", "inline-block"), $(".floating_pause").hide();
            });
    }),
    jQuery(document).ready(function () {
        var e = $("#mayosis-sticky-bar");
        "function" == typeof e.howdyDo &&
            (e.howdyDo({ action: "push", effect: "slide", easing: "easeInBounce", duration: 200, delay: 200, barClass: "mayosis_fixed_notify", initState: "open", closeAnchor: '<i class="zil zi-cross"></i>' }), e.effect("bounce", "medium"));
    }),
    jQuery(document).ready(function () {
        new BeerSlider(document.getElementById("mayosis-before-after"), { start: 50 });
    }),
    jQuery(document).ready(function () {
        new bootstrap.ScrollSpy(document.body, { target: "#mainNav" });
    }),
    jQuery(document).ready(function () {
        $(".post_format.edd-select").select2Buttons();
    }),
    jQuery(document).ready(function () {
        if (document.querySelector("#edd-wl-modal")) {
            var e = new bootstrap.Modal(document.getElementById("edd-wl-modal"));
            $(".edd-wl-action.edd-wl-button.edd-wl-open-modal").click(function () {
                e.toggle();
            });
        }
    });

