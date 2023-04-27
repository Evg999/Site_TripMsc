
let counter = 0;
// cчетчик

let slidesAll = $('.slider-moscow').length
// длинна всего масива слайдов

let firstSlide = $('.slider-moscow').eq(0).clone();
//clone() кланируем элемент eq(0)выбрали какой элемент
$('.slider').append(firstSlide);
// append вставка в конец

$('.slaider-stelka-right').click(function(){

    if (counter != 3){
        counter++;  //если != не равно  тогда мы прибавляем +100

        $('.slider').animate({
            'left' : (-100 * counter) + '%'
        }, 500);
    }else{
        counter++;

        $('.slider').animate({
            'left' : (-100 * counter) + '%'
        }, 500, function(){
            $('.slider').css('left', 0);
        }); //function(){}); функция по заверщению другой функции

        counter = 0; //если равен 4 возвращяем в 0
    } 
    
});

$('.slaider-stelka-left').click(function(){

    if(counter == 0){
        counter = slidesAll;

        $('.slider').animate({
            'left' : (-100 * counter) + '%' //при клики с первого слайда (значение его 0 перескакиваем на 500(клон) мнгновенно)
        }, 0, function(){ // и далее делаем функцию по звершению для плавного переходна на 400
            $('.slider').animate({
                'left' : (-100 * --counter) + '%'//-100 * 500=400(это ) (--counter для уменьшения на 1или100) делаем это уже за 500мсек
            }, 500);
        })

    } else{
        // во всех остальных случаях counter--;( на одно значение меньше)
        counter--;
        $('.slider').animate({
        'left' : (-100 * counter) + '%'
        }, 500);
    }
    
});
