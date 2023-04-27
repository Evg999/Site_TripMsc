// к медиа запросу 890 left 0 CSS/зверху вниз

// $('.menu-button').click(function(){
//     $('.nav').slideToggle(300);
// })

let counters = 0;
// с права на лево
$('.menu-button').click(function(){
    if (counters == 0){

         $('.nav').animate({
            'left' : "0"
            }, 500);
            counters++

        }else{

            $('.nav').animate({
                'left' : '100%'
            }, 500);
            counters--
            
        } 
        
    });
