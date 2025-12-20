const send_btn = document.getElementById('send') as HTMLButtonElement;
const name_inp = document.getElementById('name_inp') as HTMLInputElement;
const desc_inp = document.getElementById('desc') as HTMLTextAreaElement;
const date_inp = document.getElementById('date') as HTMLInputElement;

interface todo_item {
  name: string;
  desc: string;
  date: string;
}

let todos: todo_item[] = [];

let test_item: todo_item = {
  name: 'costam',
  desc: 'costam',
  date: 'costam',
};

function test(): void {
  todos.push({
    name: name_inp.value.trim(),
    desc: desc_inp.value.trim(),
    date: date_inp.value.trim(),
  });
  console.log(todos);
}

send_btn.addEventListener('click', () => test());
