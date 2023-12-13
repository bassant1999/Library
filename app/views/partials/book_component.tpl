<template id="book_template">
    <div class="col-sm-4 rounded-lg bg-success">
        <div> 
            <img class="img-fluid" width="200" :src="book.img_url" style="text-align: center;">
        </div>
    </div>
    <div class="col-sm-8">
        <h2>{{ book.title }}</h2>
        <p class="light-text">{{ book.description }}</p>
        {if $login == 1 and $user_type == 1 }
            <input v-if = "page == 0 && book.is_current_user == 0 && book.current_borrow < book.max_num" type="button" @click="borrow($event)" :data-id = "book.id" value="Borrow">  
            <input  v-if = "page == 1 || book.is_current_user == 1" type="button" @click="return_book($event, index)" :data-id = "book.id" value="Return">    
            <input  v-if = "page == 0 && book.is_current_user == 0 && book.current_borrow >= book.max_num" type="text" :data-id = "book.id" value="Not Available" disabled>                                                 
        {/if}
    </div>

</template>