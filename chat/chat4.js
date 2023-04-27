// создаём класс-шаблон 
class User{
    constructor(userName, userAge){
    this.name = userName;
    this.pic = 'aleksei.jpg';
    this.age = userAge;
    this.profession = 'преподаватель';
    this.email = 'aleksey@mail.ru';
    }
    //метод генерации формы пользователя
    renderForm(){
        // создаём и вешаем обработчик события
        let form = document.createElement('form');
        form.classList.add('user-form');
        form.innerHTML =`
            <textarea name="message"></textarea>
            <input type="submit" value="отправить сообщение">
        `;
        //блокируем стандартное поведение браузера
        form.addEventListener('submit',function(e){
            e.preventDefault();
            //ищем значение textarea
            // let text = form.elements[0].value;
            // или
            let text = form.message.value;
            console.dir(text);
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

        let card =`
            <div class="card">
                <div class="card-image" style="background-image: url(${this.pic}) ;"></div>
                <div class="card-description">
                    <div class="card-description-name">${this.name}</div>
                    <div class="card-description-text">Возраст: ${this.age}</div>
                    <div class="card-description-text">Email: ${this.email}</div>
                    <div class="card-description-text">Професия: ${this.profession}</div>
                </div>
            </div>    
        `;

        insertBlock.innerHTML = card;
        insertBlock.querySelector('.card').appendChild(this.renderForm());
    }

}

//создали нового пользователя(в круглых скобках передаём значения в канструктор)
let Aleksei = new User('Алексей Соколов', 32);
// вывели нового пользователя , прокинули параметр num в метод или по классу эвно указываю куда отображаем карточку
Aleksei.renderUser('.user-tutor');


let Petr = new User('Пётр Генадич', 21);
// вывели нового пользователя , прокинули параметр num в метод
Petr.renderUser('.user-student');


console.log(Aleksei);
console.log(Petr);
