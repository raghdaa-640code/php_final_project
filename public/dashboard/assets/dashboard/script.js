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