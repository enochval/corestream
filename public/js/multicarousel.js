/*$('.carousel[data-type="multi"] .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<2;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});*/

function invoice() {
    var hours = document.getElementById('event-duration');
    var total = document.getElementById('total');
    var sub_t = total.innerHTML;
    var amount = document.getElementById('amount');
    var kobo = 100;
    hours.addEventListener('keyup', function () {
        var tot = (sub_t * hours.value);
        if (hours.value == 0)
            tot = sub_t;
        var grand_total = total.innerHTML  = tot;
        amount.value = grand_total * kobo;
        console.log(amount.value);
    });
}

function approve(id) {
    $.ajax({
        type: "GET",
        url: baseUrl + '/admin/approve-event/' + id,
        success: function( response ) {
            console.log(response.status);

            if (response.status == true) {
                $('#status' + id).empty();
                $('#status' + id).html("<span class='label label-success'>" + "Approved" + "</span>");
                $.toast({
                    heading: '',
                    text: 'Event successfully approved!',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 4000,
                    stack: 6
                });
            } else if (response.status == false) {
                $.toast({
                    heading: '',
                    text: 'Error: Something went wrong, Please try again',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'danger',
                    hideAfter: 4000,
                    stack: 6
                });
            } else if (response.status == 'approved') {
                $.toast({
                    heading: '',
                    text: 'This event is already approved and published',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'warning',
                    hideAfter: 4000,
                    stack: 6
                });
            } else if (response.status == 'denied') {
                $.toast({
                    heading: '',
                    text: 'Sorry: You do not have the permission to perform this operation, contact the admin',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 4000,
                    stack: 6
                });
            }

        }
    });
}

function decline(id) {
    $.ajax({
        type: "GET",
        url: baseUrl + '/admin/decline-event/' + id,
        success: function( response ) {
            console.log(response.status);

            if (response.status == true) {
                $('#status' + id).empty();
                $('#status' + id).html("<span class='label label-danger'>" + "Declined" + "</span>");
                $.toast({
                    heading: '',
                    text: 'Event Successfully Declined!',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 4000,
                    stack: 6
                });
            } else if (response.status == false) {
                $.toast({
                    heading: '',
                    text: 'Error: Something went wrong, Please try again',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'danger',
                    hideAfter: 4000,
                    stack: 6
                });
            } else if (response.status == 'declined') {
                $.toast({
                    heading: '',
                    text: 'This event is already Declined',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'warning',
                    hideAfter: 4000,
                    stack: 6
                });
            } else if (response.status == 'denied') {
                $.toast({
                    heading: '',
                    text: 'Sorry: You do not have the permission to perform this operation, contact the admin',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 4000,
                    stack: 6
                });
            }

        }
    });
}




$(document).ready(function() {
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })

    // MAterial Date picker
    $('#date-format').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm'
    });

    //x-editor
    $(function() {
        //editables
        $('#username').editable({
            type: 'text',
            pk: 1,
            name: 'username',
            title: 'Enter username'
        });

        $('#firstname').editable({
            validate: function(value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });

        $('#sex').editable({
            prepend: "not selected",
            source: [{
                value: 1,
                text: 'Male'
            }, {
                value: 2,
                text: 'Female'
            }],
            display: function(value, sourceData) {
                var colors = {
                        "": "#98a6ad",
                        1: "#5fbeaa",
                        2: "#5d9cec"
                    },
                    elem = $.grep(sourceData, function(o) {
                        return o.value == value;
                    });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });

        $('#status').editable();

        $('#group').editable({
            showbuttons: false
        });

        $('#dob').editable();

        $('#comments').editable({
            showbuttons: 'bottom'
        });

        //inline


        $('#inline-username').editable({
            type: 'text',
            pk: 1,
            name: 'username',
            title: 'Enter username',
            mode: 'inline'
        });

        $('#inline-firstname').editable({
            validate: function(value) {
                if ($.trim(value) == '') return 'This field is required';
            },
            mode: 'inline'
        });

        $('#inline-sex').editable({
            prepend: "not selected",
            mode: 'inline',
            source: [{
                value: 1,
                text: 'Male'
            }, {
                value: 2,
                text: 'Female'
            }],
            display: function(value, sourceData) {
                var colors = {
                        "": "#98a6ad",
                        1: "#5fbeaa",
                        2: "#5d9cec"
                    },
                    elem = $.grep(sourceData, function(o) {
                        return o.value == value;
                    });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });

        $('#inline-status').editable({
            mode: 'inline'
        });

        $('#inline-group').editable({
            showbuttons: false,
            mode: 'inline'
        });

        $('#inline-dob').editable({
            mode: 'inline'
        });

        $('#inline-comments').editable({
            showbuttons: 'bottom',
            mode: 'inline'
        });

    });

    $('.autoplay').slick({
        focusOnSelect: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
    });

    $('.seen').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 7000,
    });

    $("#paid").hide();

    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#myTable').DataTable();

    $('.edit').click(function () {
        $('.update').removeAttr('disabled');
    });

    $("#print").click(function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea").printArea(options);
    });



});
invoice();

function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}

function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    var daysSpan = clock.querySelector('.days');
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
        var t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);