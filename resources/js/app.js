import './bootstrap';
import './jquery-3.6.1.min.js';
import './mustache.min';
import './sidebar';
import flatpickr from "flatpickr";

$(function () {
    var url = window.location;
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');


    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});