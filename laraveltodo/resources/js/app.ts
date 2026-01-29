import "./bootstrap";

const add_btn = document.getElementById("add_btn") as HTMLButtonElement;

const edit_btns: NodeListOf<HTMLButtonElement> =
    document.querySelectorAll(".edit_btn");

const modal = document.getElementById("modal") as HTMLDivElement;
const modal_bg = document.getElementById("modal_bg") as HTMLDivElement;
const modal_content = document.getElementById(
    "modal_content",
) as HTMLDivElement;

const modal_add = document.getElementById("modal_add") as HTMLDivElement;
const modal_add_bg = document.getElementById("modal_add_bg") as HTMLDivElement;
const modal_add_content = document.getElementById(
    "modal_add_content",
) as HTMLDivElement;

const edit_form = document.querySelector("#edit_form") as HTMLFormElement;
const title_inp = document.querySelector("#title") as HTMLInputElement;
const desc_inp = document.querySelector("#desc") as HTMLTextAreaElement;
const due_inp = document.querySelector("#due") as HTMLInputElement;

const modal_open = function (): void {
    modal.classList.add("block");
    modal.classList.remove("hidden");
};

const modal_close = function (): void {
    modal.classList.add("hidden");
    modal.classList.remove("block");
};

const modal_add_open = function (): void {
    modal_add.classList.add("block");
    modal_add.classList.remove("hidden");
};

const modal_add_close = function (): void {
    modal_add.classList.add("hidden");
    modal_add.classList.remove("block");
};

document.addEventListener("DOMContentLoaded", () => {
    edit_btns.forEach((btn) => {
        btn.addEventListener("click", async () => {
            modal_open();
            title_inp.value = btn.dataset.title!;
            desc_inp.value = btn.dataset.desc!;
            due_inp.value = btn.dataset.due!;

            edit_form.action = `/todos/${btn.dataset.id!}`;
        });
    });

    const todo_boxes: NodeListOf<HTMLDivElement> =
        document.querySelectorAll(".todo_box");

    todo_boxes.forEach((todo_box) => {
        if (todo_box.dataset.is_completed! == "1") {
            todo_box.classList.add("bg-green-200");
            const comp_form = todo_box.querySelector("#comp_form");
            comp_form?.classList.add("hidden");
        } else {
            todo_box.classList.add("bg-neutral-50");
        }
    });

    modal_bg.addEventListener("click", () => modal_close());
    modal_content.addEventListener("click", (e) => e.stopPropagation());

    add_btn.addEventListener("click", () => modal_add_open());
    modal_add_bg.addEventListener("click", () => modal_add_close());
    modal_add_content.addEventListener("click", (e) => e.stopPropagation());
});
