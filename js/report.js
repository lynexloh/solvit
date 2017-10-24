/**
 * @depends /core/site.js
 */

$(document).ready(function () {

    // add datepicker
    $( ".datepicker" ).datepicker();

    // add datepicker open on glyph calendar click
    //$('.glyphicon-calendar').on('click', function() {
    //    $('.datepicker').focus();
    //});

    $('div.report-type').on('click', 'input.btn', function(e) {
        e.preventDefault();
        var $this = $(this);

        $this.siblings().removeClass('btn-primary').end().addClass('btn-primary');
    });

    //$('a#editQuickReports').on('click', function(e) {
    //    e.preventDefault();
    //    $('.reports-actions a.btn').toggleClass('hidden', 'visible');
    //    $('.quick-reports span.glyphicon').toggleClass('hidden');
    //});

    // change text on collapse button
    $(".btn.btn-hide").click(function(e) {
        e.preventDefault();
        var $this = $(this),
            $seeMore = $this.find(".see-more");

        $seeMore.text(function(i, v) {
           return v === 'Collapse' ? 'Expand' : 'Collapse'
        });
    });

    // change class on collapse button
    $("div.employee-info-table").on("click", "button.btn-hide", function(e) {
        e.preventDefault();
        if(!$(this).find("i").hasClass("fa-angle-down")) {
            $(this).find("i").addClass("fa-angle-down").removeClass("fa-angle-up");
        } else {
            $(this).find("i").removeClass("fa-angle-down").addClass("fa-angle-up");
        }
    });

    // collapse and expand the employee-info-table
    $('div#hr-report').on('click', 'button.btn-hide', function() {
        var hideMe = $( '.hide-me' );
        $(this).closest('.employee-info-table').find( hideMe ).toggleClass('hide');

    });

    $('div.report-type input[type="button"]').click(function(){
        $("#employeeInfo, #payroll, #renewals").removeClass("show").addClass("hide");
        switch ( $(this).attr("value") ) {
            case "Employee Info":
                $("#employeeInfo").removeClass("hide").addClass("show");
                break;
            case "Payroll":
                $("#payroll").removeClass("hide").addClass("show");
                break;
            case "Renewals":
                $("#renewals").removeClass("hide").addClass("show");
                break;
        }
    });

    $("body #hr-dashboard").on('click', '#btnEvaluations',function(evt){
        evt.preventDefault();
        $("#btnLicenseRenewals").removeClass('btn-primary');
        $(this).addClass('btn-primary');
    });

    $("body #hr-dashboard").on('click', '#btnLicenseRenewals',function(evt){
        evt.preventDefault();
        $("#btnEvaluations").removeClass('btn-primary');
        $(this).addClass('btn-primary');
    });

    $("body #hr-dashboard").on('click', '#btnEvaluations',function(evt){
        evt.preventDefault();
        $(".renewals-graphs").addClass("hide").removeClass("show");
        $(".evaluations-graphs").addClass("show");
    });

    $("body #hr-dashboard").on('click', '#btnLicenseRenewals',function(evt){
        evt.preventDefault();
        $(".evaluations-graphs").addClass("hide").removeClass("show");
        $(".renewals-graphs").addClass("show");
    });

});
