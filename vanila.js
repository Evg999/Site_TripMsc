// // 1 создать элемент
// let flake = document.createElement('div');
// // 2 наполнить элемент и изменить (классы или стили...)
// flake.classList.add('snowflake');
// // получаем рандомное число от 0-100
// flake.style.left = Math.round(Math.random()*100) + '%';

// // меняем свойства
// // flake.style.background = 'white';
// // flake.style.borderRadios = '50%';
// // flake.style.width = '60px';
// // flake.style.height = '60px'; 

// // 3 добавить элемент на страницу(вывести элемент на страницу) куда этому элементу встать
// // append() вставка в конец
// // prepend() вставка в начало
// // встать в конец body
// document.body.appendChild(flake);

// как заставить летать снежинку через css анимации


// нам нужно создать 10 снижинов  и с задержкой и с случайного места
// делаем функцию с энтевралом

// нужно ограничить кол - во снижинок
let count = 0;


let flakes = [
    '11.png',
    '22.png',
    '33.png'
];
// 1. узнаём кол-во элементов в масиве
let contflake = flakes.length;
// 2. после получем рандомное число о 0 до 2
// let randomElement = flakes[Math.floor(Math.random() * flakes.length)];
// и подставляем снежинку как свойство бэкгранд к снежинке



// создаём свою функцию что бы при убитие снежинки появлялась ещё одна
// функция генерации снежинки
function createFlake(){
        
         // вписываем действия для создание снежинки
         // 1 создать элемент
    let flake = document.createElement('div');

        // 2. после получем рандомное число о 0 до 2
        // Math.floor отбрасывает дробную часть
         let randomElement = Math.floor(Math.random()*contflake);
    

        // 3 наполнить элемент и изменить (классы или стили...)
    flake.classList.add('snowflake');
        // меняем стиль бэкраунда
    flake.style.backgroundImage = "url(/photoFlakes/" + flakes[randomElement] + ")";
        // получаем рандомное число от 0-100 (на какой ширине выпадет снежинка)
    flake.style.left = Math.round(Math.random()*100) + '%';
    
        // получаем рандомную ширину и длину снежинки в переменную (один раз рандом запрашиваем для равных значений что бы элипс не полусался)
    let rondomSize = Math.round(Math.random()*100) + 'px';
    flake.style.width = rondomSize;
    flake.style.height = rondomSize;


    // вешаем обработчик событий по клику исчезнуть снежинка
    // jq   $().click(function(){})
    flake.addEventListener('click', function(){
        flake.remove();
        // создаём функцию для записи в обновлений в блок  и вызываем тут её для подсчёта
        refreshKillTable();
        // удалили и добавили
        createFlake();
     });

    // меняем свойства
    // flake.style.background = 'white';
    // flake.style.borderRadios = '50%';
    // flake.style.width = '60px';
    // flake.style.height = '60px'; 

    // 3 добавить элемент на страницу(вывести элемент на страницу) куда этому элементу встать
    // append() вставка в конец
    // prepend() вставка в начало
    // встать в конец body
    document.body.appendChild(flake);
}



// как ограничить или остановить инервал(создаём переменную flakeInterval обращяемся к самому энтервалу для того что бы в else очистить)
let flakeInterval = setInterval(function() {

    if(count <= 10){
        createFlake();
        count++;

    }else{
        clearInterval(flakeInterval);
    }


},910)





let countFlake = 0;
let countFlakeKill = 0;

// создаём окно и последний скрытый для оборачивание 0 кол-во сбитых снежинок для того что бы в последствие обратиться к нему
let windowCountFlakeKill = document.createElement('div');
let flakeKillText = document.createElement('h4');
let flakeCounter = document.createElement('div');
// добавим к последнему div класс
flakeCounter.classList.add('flakeCounter');
// внутурь блока вставили значение переменной  countFlakeKill
flakeCounter.innerText = countFlakeKill;

flakeKillText.textContent = "кол-во отловленных снежинок";

// задаём размеры и стили окна
windowCountFlakeKill.classList.add('windowCountFlakeKill');
// выводим окно на страницу с заголовком и счётчиком
document.querySelector('.blok-slider').appendChild(windowCountFlakeKill);
windowCountFlakeKill.prepend(flakeKillText);
windowCountFlakeKill.append(flakeCounter);


function refreshKillTable(){
    // ищем элемент в котором будем менять значение по классу дабавленному
    let insertElement = document.querySelector('.flakeCounter');
    // берём текущий элемент и получить то что в нём находиться
    let killedFlakes = insertElement.innerText;
    // берём и прибавляем одно значение +1
    killedFlakes++;
    //  и перезаписываем первое значение на +1
    insertElement.innerText = killedFlakes;
};















// // чисты JS
// // ищем какой либо элемент
// let service = document.querySelector('.service');
// // .dir выводит в формате объекта
// console.dir(service);
// // обращяемся к свойствам объекта
// console.log(service.className)
// // как устоновить значение или изменить его (=)
// service.className = 'new-class company-class';

// // добавить в масив название класса который мы должны добавить
// service.classList.add('HELLO')

// // проверям есть ли класс у контейнера (нужно в условных конструкциях)
// service.classList.contains('HELLO')
