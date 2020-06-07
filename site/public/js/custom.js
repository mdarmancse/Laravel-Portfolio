// Owl Carousel Start..................



$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});





// Owl Carousel End..................

//Contact Send Start..
$('#submitId').click(function () {

    var name=$('#ContactName').val();
    var mobile=$('#ContactMobile').val();
    var email=$('#ContactEmail').val();
    var msg=$('#ContactMsg').val();
    contactSend(name,mobile,email,msg);


})


function contactSend(contact_name,contact_mobile,contact_email,conatact_msg) {


    if(contact_name.length==0){
        $('#submitId').html('আপনার নাম লিখুন')
        setTimeout(function () {
            $('#submitId').html('পাঠিয়ে দিন');
        },2000)
    }
    else if(contact_mobile.length==0){
        $('#submitId').html('আপনার মোবাইল নাম্বার লিখুন')
        setTimeout(function () {
            $('#submitId').html('পাঠিয়ে দিন');
        },2000)
    }
    else if(contact_email.length==0){
        $('#submitId').html('আপনার ইমেইল লিখুন')
        setTimeout(function () {
            $('#submitId').html('পাঠিয়ে দিন');
        },2000)
    }
    else if(conatact_msg.length==0){
        $('#submitId').html('আপনার মেসেজ লিখুন')
        setTimeout(function () {
            $('#submitId').html('পাঠিয়ে দিন');
        },2000)
    }




    var url="/contactIndex";
    var data={
        contact_name:contact_name,
        contact_mobile:contact_mobile,
        contact_email:contact_email,
        conatact_msg:conatact_msg

    }
    axios.post(url,data)
        .then(function (response) {
            if (response.status==200){
                if(response.data==1){
                    $('#submitId').html('মেসেজ পাঠানো সফল হয়েছে')
                    setTimeout(function () {
                        $('#submitId').html('পাঠিয়ে দিন');
                    },2000)

                }
                else{
                    $('#submitId').html('মেসেজ পাঠাতে ব্যার্থ হয়েছেন ! আবার চেষ্টা করুন')
                    setTimeout(function () {
                        $('#submitId').html('পাঠিয়ে দিন');
                    },2000)

                }

            }
            else{


            }

        })
        .catch(function (error) {
            $('#submitId').html('আপনার চেষ্টা করুন')
            setTimeout(function () {
                $('#submitId').html('পাঠিয়ে দিন');
            },2000)

        })

}
