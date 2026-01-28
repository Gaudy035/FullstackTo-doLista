import "./bootstrap";

// const add_btn = document.querySelector("#add_btn") as HTMLButtonElement;
const add_btn = document.getElementById("add_btn") as HTMLButtonElement;
const edit_btns: NodeListOf<HTMLButtonElement> =
    document.querySelectorAll(".edit_btn");
const delete_btn = document.getElementById("delete_btn") as HTMLButtonElement;
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

edit_btns.forEach((btn) => {
    btn.addEventListener("click", () => modal_open());
});

modal_bg.addEventListener("click", () => modal_close());

modal_content.addEventListener("click", (e) => e.stopPropagation());

add_btn.addEventListener("click", () => modal_add_open());

modal_add_bg.addEventListener("click", () => modal_add_close());

modal_add_content.addEventListener("click", (e) => e.stopPropagation());
