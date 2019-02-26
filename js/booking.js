$(document).ready(function () {

    var valueSelectDogs = $('#numberOfDogs');
    var valueSelectWalk = $('#typeOfWalk');

    //dog pictures in booking form
    var dogPic1 = $('img[alt="dog1"]');
    var dogPic2 = $('img[alt="dog2"]');
    var dogPic3 = $('img[alt="dog3"]');
    dogPic1.hide();
    dogPic2.hide();
    dogPic3.hide();

    //Button and heading for dog section
    var RegisterButton = $('.booking_register');
    var EnterDogInfo = $('.enter_dog_info');
    RegisterButton.hide();
    EnterDogInfo.hide();

    //dog number segments
    var dog1 = $('div[dog="1"]');
    var dog2 = $('div[dog="2"]');
    var dog3 = $('div[dog="3"]');
    dog1.hide();
    dog2.hide();
    dog3.hide();

    //walk type segment
    var date = $('div[walk="date"]');
    var time = $('div[walk="time"]');
    var day = $('div[walk="day"]');

    //redirection from pricing to booking form with the value selected
    $("#oneTimeWalk").click(function(){
        valueSelectWalk.val("oneTime");
        walkType();
    });
    $("#dailyWalk").click(function(){
        valueSelectWalk.val("daily");
        walkType();
    });
    $("#weeklyWalk").click(function(){
        valueSelectWalk.val("weekly");
        walkType();
    });

    //Changes the amount of dog forms based on dropdown number
    valueSelectDogs.on('change', function () {
        dogCount();
    });

    valueSelectWalk.on('change',function () {
        walkType();
    });

    //adds +381 when clicked on input phone
    var phone = $('input[name="phone"]');
    phone.focus(function () {
        phone.val('+381 ');
    });

    //prevents the user from deleting +381
    phone.keydown(function (event) {
        if(phone.val() > 5) {
            var key =  event.keyCode;
            if (key === 8 || key === 46) {
                event.preventDefault();
                return false;
            }
        }

    });

    function dogCount() {
        if(valueSelectDogs.val() === ''){
            dog1.fadeOut('slow');
            dog2.fadeOut('slow');
            dog3.fadeOut('slow');
            dogPic1.fadeTo('slow',0);
            dogPic2.fadeTo('slow',0);
            dogPic3.fadeTo('slow',0);
            RegisterButton.fadeOut('slow');
            EnterDogInfo.fadeOut('slow');
        }
        if(valueSelectDogs.val() === '1'){
            dog1.fadeTo('slow',1);
            dog2.fadeTo('slow',0);
            dog3.fadeTo('slow',0);
            dogPic1.fadeTo('slow',1);
            dogPic2.fadeTo('slow',0);
            dogPic3.fadeTo('slow',0);
            RegisterButton.fadeTo('slow',1);
            EnterDogInfo.fadeTo('slow',1);
        }
        if(valueSelectDogs.val() === '2'){
            dog1.fadeTo('slow',1);
            dog2.fadeTo('slow',1);
            dog3.fadeTo('slow',0);
            dogPic1.fadeTo('slow',1);
            dogPic2.fadeTo('slow',1);
            dogPic3.fadeTo('slow',0);
            RegisterButton.fadeTo('slow',1);
            EnterDogInfo.fadeTo('slow',1);
        }
        if(valueSelectDogs.val() === '3'){
            dog1.fadeTo('slow',1);
            dog2.fadeTo('slow',1);
            dog3.fadeTo('slow',1);
            dogPic1.fadeTo('slow',1);
            dogPic2.fadeTo('slow',1);
            dogPic3.fadeTo('slow',1);
            RegisterButton.fadeTo('slow',1);
            EnterDogInfo.fadeTo('slow',1);
        }

    }
    function walkType() {

        if(valueSelectWalk.val() === ''){
            date.addClass("none");
            time.addClass("none");
            day.addClass("none");
            date.addClass("none");

        }
        if(valueSelectWalk.val() === 'oneTime'){
            date.removeClass("none");
            time.removeClass("none");
            day.addClass("none");

        }
        if(valueSelectWalk.val() === 'daily'){
            date.addClass("none");
            time.removeClass("none");
            day.addClass("none");

        }
        if(valueSelectWalk.val() === 'weekly'){
            date.addClass("none");
            time.removeClass("none");
            day.removeClass("none");

        }
    }




}) ;
