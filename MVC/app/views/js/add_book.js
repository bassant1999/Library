
const { createApp, ref } = Vue

const app = createApp({
    setup() {

    const objNewBook = ref({
        title:'',
        author:'',
        description: '',
        img_url:'',
        max_num:0

    });
    const success_msg = ref(0);
    const whoActive = ref(2);


    // add book
    const add_book = () =>
    {
        if(objNewBook.value.title && objNewBook.value.author && objNewBook.value.description && objNewBook.value.img_url)
        {
            fetch('http://localhost/MVC/public/services/books/add_book', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                newBook: objNewBook.value
            })
            })
            .then(res => res.json())
            .then(res => 
            {
                if(res[0].status == 1)
                {
                    success_msg.value = 1;
                    objNewBook.value.title = '';
                    objNewBook.value.author = '';
                    objNewBook.value.description = '';
                    objNewBook.value.img_url = '';
                    objNewBook.value.imax_num = 0;
                }
                else
                {
                    success_msg.value = 3;
                }
                
            });
        }
        else
        {
            success_msg.value = 2;
        }
    }

    
    return {
        objNewBook, success_msg , whoActive, add_book
    }

    }
  })

app.mount('#app')
