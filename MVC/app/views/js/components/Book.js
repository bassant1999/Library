const { ref } = Vue

export default {
    props: {
        book: Object,
        page: Number,
        index: Number
    },
    emits: ['idx'],
    setup(props, { emit }) {

        // borrow
        const borrow = (event) =>
        {
            var book_id = event.target.getAttribute("data-id");
            console.log(book_id);
            fetch('http://localhost/MVC/public/services/books/borrow_book?bookId='+ book_id)
            .then(res => res.json())
            .then(res =>
            {
                if(res[0].status == 1)
                    (props.book).is_current_user = 1; 
            })
        }

        const return_book = (event, index) =>
        {
            console.log("Index IS", index);
            var book_id = event.target.getAttribute("data-id");
            console.log(book_id);
            fetch('http://localhost/MVC/public/services/books/return_book?bookId='+ book_id)
            .then(res => res.json())
            .then(res =>
            {
                if(res[0].status == 1)
                {
                    (props.book).is_current_user = 0;
                    if(props.page)
                        emit('idx', index); 
                }        
                
            })
        }

        
        return {
            borrow, return_book
        }
    },
  template: '#book_template'
}