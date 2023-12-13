
const { createApp, ref } = Vue

const app = createApp({
    setup() {
    const title = ref('');
    const author = ref('');
    const description = ref('');
    const img_url = ref('');
    const max_num = ref(0);
    const success_msg = ref(0);
    const whoActive = ref(2);

    // add book
    const add_book = () =>
    {
        if(title.value && author.value && description.value && img_url.value)
        {
            fetch('http://localhost/MVC/public/services/books/add_book', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                title: title.value,
                author: author.value,
                description: description.value,
                img_url: img_url.value,
                max_num: max_num.value
            })
            })
            .then(res => res.json())
            .then(res => 
            {
                if(res[0].status == 1)
                {
                    success_msg.value = 1;
                    title.value = '';
                    author.value = '';
                    description.value = '';
                    img_url.value = '';
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
        success_msg, title, author, description, img_url, max_num, whoActive, add_book
    }

    }
  })

app.mount('#app')
