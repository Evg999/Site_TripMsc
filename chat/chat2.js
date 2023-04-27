// создаём объект который будет описывать нашу карточку
let Aleksei = {
    //задаём свойства
    name: 'Алексей',
    pic: 'aleksei.jpg',
    age: 28,
    profession: 'преподаватель',
    email: 'aleksey@mail.ru',
    // делаем форму
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
    },

    //задаём метод создаём карточку и в конец вставляем форму
    renderUser(){
        //куда мы эту карту вставляем
        // 1 нашли элемент чат chat-user([0] выбрали первый элемент)  2 и вставляем нашу карточку 
        let insertBlock = document.querySelectorAll('.chat-user')[0];

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

//вызываем метод(обращаемся к нему , иначе не чего не будет)
Aleksei.renderUser();



// объект 2

let Petr = {
    //задаём свойства
    name: 'Пётр ',
    pic: 'aleksei.jpg',
    age: 22,
    profession: 'ученик',
    email: 'petr@mail.ru',
    // делаем форму
    renderForm(){
        
        let form = document.createElement('form');
        form.classList.add('user-form');
        form.innerHTML =`
            <textarea name="message"></textarea>
            <input type="submit" value="отправить сообщение">
        `;
        
        form.addEventListener('submit',function(e){
            e.preventDefault();
            let text = form.message.value;
            console.dir(text);
        });
        
        return form;
    },

    //задаём метод создаём карточку и в конец вставляем форму
    renderUser(){
        
        let insertBlock = document.querySelectorAll('.chat-user')[1];

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

Petr.renderUser();