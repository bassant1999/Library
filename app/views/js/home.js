
const { createApp, ref, onMounted } = Vue
// import { Book } from "./services/book";
import Book from '/MVC/app/views/js/components/Book.js';

const app = createApp({
    setup() {
    const books = ref([]);
    const sbook_title = ref("");
    const page = ref(0);
    const whoActive = ref(0);
    
    const search = () =>
    {
        console.log('http://localhost/MVC/public/services/books/get_books?bookTitle='+sbook_title.value);
        fetch('http://localhost/MVC/public/services/books/get_books?bookTitle='+sbook_title.value)
        .then(res => res.json())
        .then(res =>
        {
            page.value = 0;
            const user_id = ref(0);
            books.value = [];
            if(res.login)
            {
                user_id.value = res.user_id;
            }
            // loop through each book
            for (let i = 0; i < res[0].length; i++) {
                console.log("book before: ");
                console.log(res[0][i]);
                let is_current_user = 0;
                for (let j = 0; j < res[0][i].users.length; j++) {
                    console.log(res[0][i].users[j], user_id.value);
                    if(user_id.value == res[0][i].users[j])
                    {
                        is_current_user = 1;
                    }
                }
                res[0][i]["is_current_user"] = is_current_user;
                res[0][i]["current_borrow"] = res[0][i].users.length;
                console.log("book after: ");
                console.log(res[0][i]);
                books.value.push(res[0][i]);
            }
        })
        
    }

    // view borrowed books 
    const borrowed_books = () =>
    {
        whoActive.value = 3;
        fetch('http://localhost/MVC/public/services/books/borrowed_books')
        .then(res => res.json())
        .then(res =>
        {
            page.value = 1;
            books.value = [];
            res.forEach(get_book);

            function get_book(value) {
                books.value.push(value);
            }
        })
    }

    onMounted(() => {
        search();
    });

    return {
        books, sbook_title, page, whoActive, search, borrowed_books
    }

    }
  })

app.component('Book', Book);
app.mount('#app')
