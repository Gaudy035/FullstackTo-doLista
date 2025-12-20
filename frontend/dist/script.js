"use strict";
const send_btn = document.getElementById('send');
const name_inp = document.getElementById('name_inp');
const desc_inp = document.getElementById('desc');
const date_inp = document.getElementById('date');
let todos = [];
let test_item = {
    name: 'costam',
    desc: 'costam',
    date: 'costam',
};
function test() {
    todos.push({
        name: name_inp.value.trim(),
        desc: desc_inp.value.trim(),
        date: date_inp.value.trim(),
    });
    console.log(todos);
}
send_btn.addEventListener('click', () => test());
