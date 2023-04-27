// создаём класс-шаблон 
class User{
    constructor(userName, userAge, userEmail){
    this.name = userName;
    this.age = userAge;
    this.email = userEmail;
    }
    //метод генерации формы пользователя
    renderForm(){
        // создаём и вешаем обработчик события
        let form = document.createElement('form');
        form.classList.add('user-form');

        let forma = document.getElementById('form').innerHTML;
        let forms = forma.replace('${this.role_id}', this.role_id);

        // <input type="hidden" name="role" value="${this.role_id}"> 
        // добавляем скрытое поле для понимания какой из пользователей пишет (для дальнейшего раскидвания сообщений в лево или в право)


        let name = this.name;//создаём переменную для вывода имени
        //блокируем стандартное поведение браузера
        form.addEventListener('submit',function(e){
            e.preventDefault();
            //ищем значение textarea
            // let text = form.elements[0].value;
            // или
            let text = form.message.value;
            // проверяем есть ли текст (если да то все действия делаем) trim() режит пробелы
            if(text.trim()){
                    // ищем значение role
                // создаём доп класс и если role ==2 то прилепляем этот класс (создаём в css стили)
                let role = form.role.value
                let dope_class = '';
                if(role == 2){
                    dope_class = 'to-right';
                }

                console.dir(text);
                
                console.log(this);
                // выводим имя пользователя 

                let date= new Date();
                let format_time =  checkTime(date.getHours())+':'+ checkTime(date.getMinutes());


                //шаблон для вывода сообщений
                let shablone = document.getElementById('tmpl-shablone').innerHTML;
                // replace заменет в html заглушку на переменную
                let msg_tmpl = shablone.replace('${names}', name)
                                       .replace('${texts}', text)
                                       .replace('${format_time}', format_time)
                                       .replace('${dope_class}', dope_class);
                                    
                document.querySelector('.chat-message').innerHTML += msg_tmpl;
                // в окошке чистим написанное text area
                form.message.value = '';


            }
            
        });
        // возвращаем результат
        return form;
    }

    //вывод пользователя на экран с помощью переменной (num)(chat3.js c num) выводитв не в нахлёст, а сбоку туда куда нужно
    //задаём селектор для более коректное отображение (прокидываем класс или по id...)
    renderUser(selector){
        //куда мы эту карту вставляем
        // 1 нашли элемент чат chat-user([0] выбрали первый элемент)  2 и вставляем нашу карточку html код
        // let insertBlock = document.querySelectorAll('.chat-user')[num];
        // querySelector метод который находит первый попавшийся элемент в HTML с таким селектором и возвращает только один элемент
        let insertBlock = document.querySelector(selector);
        let card = document.getElementById('tmpl-card').innerHTML;

        // replace заменет в html заклушку на переменную
        let card_rendered = card.replace('${name}', this.name)
                                .replace('${pic}', this.pic)
                                .replace('${age}', this.age)
                                .replace('${email}', this.email)
                                .replace('${profession}', this.profession);

        // let card =`
        //     <div class="card">
        //         <div class="card-image" style="background-image: url(${this.pic}) ;"></div>
        //         <div class="card-description">
        //             <div class="card-description-name">${this.name}</div>
        //             <div class="card-description-text">Возраст: ${this.age}</div>
        //             <div class="card-description-text">Email: ${this.email}</div>
        //             <div class="card-description-text">Професия: ${this.profession}</div>
        //         </div>
        //     </div>    
        // `;

        insertBlock.innerHTML = card_rendered;
        insertBlock.querySelector('.card').appendChild(this.renderForm());
    }

}

//создадим два класса/ задаём разнящиеся параметры(если свойство без метода баз this), + делаем наследование extends из одного класса в друго
class Tutor extends User{
    pic = 'aleksei.jpg';
    profession = 'преподаватель';
    role_id = 1;
}
class Student extends User{
    pic = 'https://ngtk-pr.ru/uploads/s/q/v/8/qv8xcvls5o4j/img/full_gLQj6yrW.jpg';
    profession = 'Студент';
    role_id = 2;
}


//создали нового пользователя(в круглых скобках передаём значения в канструктор)
let Aleksei = new Tutor('Алексей Соколов', 32,'alex@mail.ru');
// вывели нового пользователя , прокинули параметр num в метод или по классу эвно указываю куда отображаем карточку
Aleksei.renderUser('.user-tutor');

//создали нового пользователя(в круглых скобках передаём значения в канструктор)
let Petr = new Student('Пётр Генадич', 21, 'PG@mail.ru');
// вывели нового пользователя , прокинули параметр num в метод
Petr.renderUser('.user-student');


console.log(Aleksei);
console.log(Petr);


let date = new Date();
console.log(date.getHours()+':'+date.getMinutes());


// решаем проблему с выводом даты для приятного формата
function checkTime(i){
    if(i<10){
        i = "0" + i;
    }
    return i;
}