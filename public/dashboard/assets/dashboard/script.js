function addUser() {
    alert("هنا سيتم فتح فورم إضافة مستخدم جديد");
}

function editUser(name) {
    alert("تعديل بيانات المستخدم: " + name);
}

function deleteUser(button) {

    const confirmDelete = confirm(
        "هل أنت متأكد من حذف هذا المستخدم؟"
    );

    if (confirmDelete) {
        button.closest("tr").remove();
    }
}


function addBook() {
    alert("هنا سيتم فتح فورم إضافة كتاب جديد");
}

function editBook(title) {
    alert("تعديل بيانات الكتاب: " + title);
}

function deleteBook(button) {

    const confirmDelete = confirm(
        "هل أنت متأكد من حذف هذا الكتاب؟"
    );

    if (confirmDelete) {
        button.closest("tr").remove();
    }
}



const sidebarLinks = document.querySelectorAll(".sidebar-link");

const usersSection = document.getElementById("users");
const booksSection = document.getElementById("books");

sidebarLinks.forEach(link => {

    link.addEventListener("click", function (e) {

        e.preventDefault();

        const section = this.dataset.section;

        // إزالة active من كل الروابط
        sidebarLinks.forEach(item => {
            item.classList.remove("active");
        });

        // إضافة active للرابط المختار
        this.classList.add("active");

        // لوحة التحكم → إظهار الاثنين
        if (section === "dashboard") {
            usersSection.style.display = "block";
            booksSection.style.display = "block";
        }

        // المستخدمون → إظهار المستخدمين فقط
        else if (section === "users") {
            usersSection.style.display = "block";
            booksSection.style.display = "none";
        }

        // الكتب → إظهار الكتب فقط
        else if (section === "books") {
            usersSection.style.display = "none";
            booksSection.style.display = "block";
        }

    });

});