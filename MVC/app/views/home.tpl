{extends file="{$smarty.const.VIEW_TPL_PATH}/views/layout.tpl"}

{block name=additional}
    <form class="navbar-form navbar-left">
    <div class="form-group">
        <input type="text" class="form-control" name = "book_title" placeholder="Search For Book" v-model="sbook_title">
    </div>
    <button type="button" class="btn" style="margin-left: 4px;"  @click="search()">Search</button>
    </form>
{/block}
{block name=title}Home{/block}
{block name=body}    
        <!-- view all books -->
        <div class="container home-books">
            <h1><strong>BOOKS</strong></h1>
            <div class="row" v-for="(book, index) in books">
                <Book :book="book" :index="index" :page="page" @idx="(idx) => books.splice(idx, 1)"></Book>
            </div>
        </div>
    <script type="module" src="http://localhost/MVC/app/views/js/home.js"></script>
{/block}
{block name="component"}
    {include file="{$smarty.const.VIEW_TPL_PATH}/views/partials/book_component.tpl"}
{/block}
    
