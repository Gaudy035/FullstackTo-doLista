"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const send_btn = document.getElementById('send');
const name_inp = document.getElementById('name_inp');
const desc_inp = document.getElementById('desc');
const date_inp = document.getElementById('date');
let todos = [];
// let test_item: todo_item = {
//   name: 'costam',
//   desc: 'costam',
//   date: 'costam',
// };
// function test(): void {
//   todos.push({
//     name: name_inp.value.trim(),
//     desc: desc_inp.value.trim(),
//     date: date_inp.value.trim(),
//     comp: false,
//   });
//   console.log(todos);
// }
function saveTodo() {
    return __awaiter(this, void 0, void 0, function* () {
        const newTodo = {
            name: name_inp.value.trim(),
            desc: desc_inp.value.trim(),
            date: date_inp.value,
            comp: false,
        };
        try {
            const response = yield fetch('http://localhost:8080/api/todos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(newTodo),
            });
            if (response.ok) {
                alert('Zapisano');
                // loadTodos();
            }
        }
        catch (error) {
            console.error('Blad polaczenia: ', error);
        }
    });
}
send_btn.addEventListener('click', () => saveTodo());
