/******/
var calendar;
(function(modules) {
    // webpackBootstrap
    /******/ // The module cache
    /******/
    var installedModules = {}; /******/ // The require function
    /******/
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ // Check if module is in cache
        /******/
        if (installedModules[moduleId]) {
            /******/
            return installedModules[moduleId].exports;
            /******/
        } /******/ // Create a new module (and put it into the cache)
        /******/
        var module = (installedModules[moduleId] = {
            /******/
            i: moduleId,
            /******/
            l: false,
            /******/
            exports: {},
            /******/
        }); /******/ // Execute the module function
        /******/
        /******/
        modules[moduleId].call(
            module.exports,
            module,
            module.exports,
            __webpack_require__
        ); /******/ // Flag the module as loaded
        /******/
        /******/
        module.l = true; /******/ // Return the exports of the module
        /******/
        /******/
        return module.exports;
        /******/
    } /******/ // expose the modules object (__webpack_modules__)
    /******/
    /******/
    /******/
    __webpack_require__.m = modules; /******/ // expose the module cache
    /******/
    /******/
    __webpack_require__.c = installedModules; /******/ // define getter function for harmony exports
    /******/
    /******/
    __webpack_require__.d = function(exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, {
                enumerable: true,
                get: getter,
            });
            /******/
        }
        /******/
    }; /******/ // define __esModule on exports
    /******/
    /******/
    __webpack_require__.r = function(exports) {
        /******/
        if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
            /******/
            Object.defineProperty(exports, Symbol.toStringTag, {
                value: "Module",
            });
            /******/
        }
        /******/
        Object.defineProperty(exports, "__esModule", {
            value: true,
        });
        /******/
    }; /******/ /******/ /******/ /******/ /******/ // create a fake namespace object // mode & 1: value is a module id, require it // mode & 2: merge all properties of value into the ns // mode & 4: return value when already ns object // mode & 8|1: behave like require
    /******/
    /******/
    __webpack_require__.t = function(value, mode) {
        /******/
        if (mode & 1) value = __webpack_require__(value);
        /******/
        if (mode & 8) return value;
        /******/
        if (mode & 4 && typeof value === "object" && value && value.__esModule)
            return value;
        /******/
        var ns = Object.create(null);
        /******/
        __webpack_require__.r(ns);
        /******/
        Object.defineProperty(ns, "default", {
            enumerable: true,
            value: value,
        });
        /******/
        if (mode & 2 && typeof value != "string")
            for (var key in value)
                __webpack_require__.d(
                    ns,
                    key,
                    function(key) {
                        return value[key];
                    }.bind(null, key)
                );
        /******/
        return ns;
        /******/
    }; /******/ // getDefaultExport function for compatibility with non-harmony modules
    /******/
    /******/
    __webpack_require__.n = function(module) {
        /******/
        var getter =
            module && module.__esModule ?
            /******/
            function getDefault() {
                return module["default"];
            } :
            /******/
            function getModuleExports() {
                return module;
            };
        /******/
        __webpack_require__.d(getter, "a", getter);
        /******/
        return getter;
        /******/
    }; /******/ // Object.prototype.hasOwnProperty.call
    /******/
    /******/
    __webpack_require__.o = function(object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
    }; /******/ // __webpack_public_path__
    /******/
    /******/
    __webpack_require__.p = ""; /******/ // Load entry module and return exports
    /******/
    /******/
    /******/
    return __webpack_require__(
        (__webpack_require__.s =
            "../src/assets/js/pages/components/calendar/external-events.js")
    );
    /******/
})(
    /************************************************************************/
    /******/

    {
        /***/
        "../src/assets/js/pages/components/calendar/external-events.js":
        /*!*********************************************************************!*
        !*** ../src/assets/js/pages/components/calendar/external-events.js ***!
        *********************************************************************/
        /*! no static exports found */
        /***/

            function(module, exports, __webpack_require__) {
            var KTCalendarExternalEvents = (function() {
                var initCalendar = function() {
                    var todayDate = moment().startOf("day");
                    var momentoActual = new Date();
                    var hora = momentoActual.getHours();
                    var minuto = momentoActual.getMinutes();
                    var segundo = momentoActual.getSeconds();
                    var horaImprimible;
                    if (hora >= 0 && hora <= 9) {
                        var hora = "0" + hora;
                        horaImprimible = hora + ":" + minuto + ":00";
                    } else {
                        horaImprimible = hora + ":" + minuto + ":00";
                    }
                    if (minuto >= 0 && minuto <= 9) {
                        minuto = "0" + minuto;
                        horaImprimible = hora + ":" + minuto + ":00";
                    } else {
                        horaImprimible = hora + ":" + minuto + ":00";
                    }
                    var YM = todayDate.format("YYYY-MM");
                    var YESTERDAY = todayDate
                        .clone()
                        .subtract(1, "day")
                        .format("YYYY-MM-DD");
                    var TODAY = todayDate.format("YYYY-MM-DD");
                    var TOMORROW = todayDate.clone().add(1, "day").format("YYYY-MM-DD");
                    var calendarEl = document.getElementById("kt_calendar");
                    var containerEl = document.getElementById(
                        "kt_calendar_external_events"
                    );
                    var Draggable = FullCalendarInteraction.Draggable;

                    new Draggable(containerEl, {
                        itemSelector: ".fc-draggable-handle",
                        eventData: function(eventEl) {
                            return $(eventEl).data("event");
                        },
                    });

                    calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: ["interaction", "dayGrid", "timeGrid", "list"],
                        isRTL: KTUtil.isRTL(),
                        header: {
                            left: "prev,next today",
                            center: "title",
                            right: "dayGridMonth,timeGridWeek,timeGridDay",
                        },

                        height: 800,
                        contentHeight: 780,
                        aspectRatio: 3, // see: https://fullcalendar.io/docs/aspectRatio
                        nowIndicator: true,
                        now: TODAY + "T" + horaImprimible, // just for demo
                        views: {
                            dayGridMonth: {
                                buttonText: "Mes",
                            },
                            timeGridWeek: {
                                buttonText: "Semana",
                            },
                            timeGridDay: {
                                buttonText: "Día",
                            },
                        },
                        defaultView: "timeGridWeek",
                        defaultDate: TODAY,
                        droppable: true, // this allows things to be dropped onto the calendar
                        editable: false,
                        eventLimit: false, // allow "more" link when too many events
                        navLinks: true,

                        events: MostrarEventos,

                        eventRender: function(info) {
                            var element = $(info.el);
                            if (
                                info.event.extendedProps &&
                                info.event.extendedProps.description
                            ) {
                                if (
                                    element.hasClass("fc-day-grid-event") ||
                                    element.hasClass("fc-time-grid-event") ||
                                    element.find(".fc-list-item-title").lenght !== 0
                                ) {
                                    element.data(
                                        "content",
                                        info.event.extendedProps.description
                                    );
                                    element.data("placement", "top");
                                    KTApp.initPopover(element);
                                }
                            }
                        },
                    });
                    calendar.setOption("locale", "es");
                    calendar.render();
                };
                return {
                    init: function() {
                        initCalendar();
                    },
                };
            })();
            jQuery(document).ready(function() {
                KTCalendarExternalEvents.init();
            });
        },
    }
);