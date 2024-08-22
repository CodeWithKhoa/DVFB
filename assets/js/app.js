! function() {
    "use strict";
    var c, d, e, f, a = localStorage.getItem("language");

    function g(b) {
        document.getElementsByClassName("header-lang-img").forEach(function(c) {
            if (c) {
                var d;
                switch (b) {
                    case "eng":
                    default:
                        c.src = "assets3/images/flags/us.jpg";
                        break;
                    case "sp":
                        c.src = "assets3/images/flags/spain.jpg";
                        break;
                    case "gr":
                        c.src = "assets3/images/flags/germany.jpg";
                        break;
                    case "it":
                        c.src = "assets3/images/flags/italy.jpg";
                        break;
                    case "ru":
                        c.src = "assets3/images/flags/russia.jpg"
                }
                localStorage.setItem("language", b), null == (a = localStorage.getItem("language")) && g("en"), (d = new XMLHttpRequest).open("GET", "/assets3/lang/" + a + ".json"), d.onreadystatechange = function() {
                    var a;
                    4 === this.readyState && 200 === this.status && (a = JSON.parse(this.responseText), Object.keys(a).forEach(function(b) {
                        document.querySelectorAll("[data-key='" + b + "']").forEach(function(c) {
                            c.textContent = a[b]
                        })
                    }))
                }, d.send()
            }
        })
    }

    function h() {
        setTimeout(function() {
            var a, b, c, d = document.getElementById("side-menu");
            d && 300 < (b = (a = d.querySelector(".mm-active .active")) ? a.offsetTop : 0) && (b -= 100, (c = document.getElementsByClassName("vertical-menu") ? document.getElementsByClassName("vertical-menu")[0] : "") && c.querySelector(".simplebar-content-wrapper") && setTimeout(function() {
                c.querySelector(".simplebar-content-wrapper").scrollTop = b
            }, 0))
        }, 0)
    }

    function i() {
        for (var b = document.getElementById("topnav-menu-content").getElementsByTagName("a"), a = 0, c = b.length; a < c; a++) "nav-item dropdown active" === b[a].parentElement.getAttribute("class") && (b[a].parentElement.classList.remove("active"), b[a].nextElementSibling.classList.remove("show"))
    }

    function j(a) {
        var b = document.getElementById(a);
        b.style.display = "block";
        var c = setInterval(function() {
            b.style.opacity || (b.style.opacity = 1), 0 < b.style.opacity ? b.style.opacity -= .2 : (clearInterval(c), b.style.display = "none")
        }, 200)
    }

    function b() {
        document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || document.body.classList.remove("fullscreen-enable")
    }
    window.onload = function() {
            document.getElementById("preloader") && (j("pre-status"), j("preloader"))
        }, document.addEventListener("DOMContentLoaded", function(a) {
            document.getElementById("side-menu") && new MetisMenu("#side-menu")
        }), (c = document.querySelectorAll(".counter-value")) && c.forEach(function(a) {
            ! function e() {
                var b = +a.getAttribute("data-target"),
                    d = +a.innerText,
                    c = b / 250;
                c < 1 && (c = 1), d < b ? (a.innerText = (d + c).toFixed(0), setTimeout(e, 1)) : a.innerText = b
            }()
        }),
        function() {
            var c = document.body.getAttribute("data-sidebar-size");
            window.onload = function() {
                var a;
                1024 <= window.innerWidth && window.innerWidth <= 1366 && (a = "sidebar-size-small", document.getElementById(a) && (document.getElementById(a).checked = !0))
            };
            for (var b = document.getElementsByClassName("vertical-menu-btn"), a = 0; a < b.length; a++) b[a] && b[a].addEventListener("click", function(a) {
                a.preventDefault(), document.body.classList.toggle("sidebar-enable"), 992 <= window.innerWidth ? null == c ? null == document.body.getAttribute("data-sidebar-size") || "lg" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "lg") : "md" == c ? "md" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "md") : "sm" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "lg") : document.body.setAttribute("data-sidebar-size", "sm") : h()
            })
        }(), setTimeout(function() {
            var a = document.querySelectorAll("#sidebar-menu a");
            a && a.forEach(function(e) {
                var b, a, c, d, f, g = window.location.href.split(/[?#]/)[0];
                e.href == g && (e.classList.add("active"), (b = e.parentElement) && "side-menu" !== b.id && (b.classList.add("mm-active"), (a = b.parentElement) && "side-menu" !== a.id && (a.classList.add("mm-show"), a.classList.contains("mm-collapsing") && console.log("has mm-collapsing"), (c = a.parentElement) && "side-menu" !== c.id && (c.classList.add("mm-active"), (d = c.parentElement) && "side-menu" !== d.id && (d.classList.add("mm-show"), (f = d.parentElement) && "side-menu" !== f.id && f.classList.add("mm-active"))))))
            })
        }, 0), (e = document.querySelectorAll(".navbar-nav a")) && e.forEach(function(b) {
            var c, f, d, a, e, g, h = window.location.href.split(/[?#]/)[0];
            b.href == h && (b.classList.add("active"), (c = b.parentElement) && (c.classList.add("active"), (f = c.parentElement).classList.add("active"), (d = f.parentElement) && (d.classList.add("active"), (a = d.parentElement).closest("li") && a.closest("li").classList.add("active"), a && (a.classList.add("active"), (e = a.parentElement) && (e.classList.add("active"), (g = e.parentElement) && g.classList.add("active"))))))
        }), (f = document.querySelector('[data-toggle="fullscreen"]')) && f.addEventListener("click", function(a) {
            a.preventDefault(), document.body.classList.toggle("fullscreen-enable"), document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
        }), document.addEventListener("fullscreenchange", b), document.addEventListener("webkitfullscreenchange", b), document.addEventListener("mozfullscreenchange", b),
        function() {
            if (document.getElementById("topnav-menu-content")) {
                for (var b = document.getElementById("topnav-menu-content").getElementsByTagName("a"), a = 0, c = b.length; a < c; a++) b[a].onclick = function(a) {
                    "#" === a.target.getAttribute("href") && (a.target.parentElement.classList.toggle("active"), a.target.nextElementSibling.classList.toggle("show"))
                };
                window.addEventListener("resize", i)
            }
        }(), [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(a) {
            return new bootstrap.Tooltip(a)
        }), [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(a) {
            return new bootstrap.Popover(a)
        }), [].slice.call(document.querySelectorAll(".toast")).map(function(a) {
            return new bootstrap.Toast(a)
        }), "null" != a && "en" !== a && g(a), (d = document.getElementsByClassName("language")) && d.forEach(function(a) {
            a.addEventListener("click", function(b) {
                g(a.getAttribute("data-lang"))
            })
        })
}()