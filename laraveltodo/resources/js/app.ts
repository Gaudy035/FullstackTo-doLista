import "./bootstrap";

const edit_btns: NodeListOf<HTMLButtonElement> =
    document.querySelectorAll(".edit_btn");
const delete_btn = document.getElementById("delete_btn") as HTMLButtonElement;
const modal = document.getElementById("modal") as HTMLDivElement;
const modal_bg = document.getElementById("modal_bg") as HTMLDivElement;
const modal_content = document.getElementById(
    "modal_content",
) as HTMLDivElement;

const modal_open = function (): void {
    modal.classList.add("block");
    modal.classList.remove("hidden");
};

const modal_close = function (): void {
    modal.classList.add("hidden");
    modal.classList.remove("block");
};

edit_btns.forEach((btn) => {
    btn.addEventListener("click", () => modal_open());
});

modal_bg.addEventListener("click", () => modal_close());

modal_content.addEventListener("click", (e) => e.stopPropagation());
