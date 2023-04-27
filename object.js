// ООП
// создаём объект
let Aleksei = {
    // название свойство - значение свойства
    name: 'Алексей Соколов',
    age: 25,
    height: 180,
    weight: 83,
    skills:{
        first: 'плавать',
        second: 'бегать',
        trird: 'программировать'
    },

    // первый метод то что умеет объект это будет функция созданная нами
    // параметр в круглых скобках можно указать по умолчанию =''
    sayHello(guestName, item = 'ничего') {
        alert(`привет, ${guestName}! Тебя интересует: ${item}`);
    },
    sayMyName(){
        // но лучше выводить свойство этого объекта xtht
        alert(`привет, я ${this.name}`);
    }
}

// как перебрать свойства объекта
for( let key in Aleksei.skills){
    console.log(Aleksei.skills[key]);
    // или можем обратиться не к значению ключа а к самому ключу 
    // console.log(key);   и получим  first/second/trird
}

//как вызвать метод
// передаём значения в клуглых скобках
Aleksei.sayHello('Пётр Генадич', 'рубашка');

// или
Aleksei.sayMyName();



// как пользоваться этими свойствами
// как получить свойство какое -либо

// console.log(Aleksei.name);
// или
console.log(`${Aleksei.name}: возраст ${Aleksei.age}`);  

